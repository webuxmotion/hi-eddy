<?php

namespace app\controllers;

use core\Tone;
use app\services\GoogleAuth;
use app\services\Mailer;
use app\models\UserModel;
use app\models\TmpUserModel;

class UserController extends AppController {

    public function profileAction() {
        $user = $_SESSION['user'] ?? null;

        if (!$user) {
            redirect(baseUrl() . 'login');
        }

        $this->setMeta(
            'Profile - ' . Tone::$app->getProperty('site_name'),
            'Profile page. HI-EDDY Academy',
            'hi-eddy, academy, education, profile page'
        );

        $this->set(compact('user'));
    }

    public function loginWithPasswordAction() {
        if (!empty($_POST)) {
            $data = $_POST;

            $user_model = new UserModel();
            $duplicate = $user_model->findByEmail($data['email']);
            
            if ($duplicate) {
                if (password_verify($data['password'], $duplicate['password'])) {
                    $loginned = $user_model->loginUser($duplicate);
                    if ($loginned) {
                        $_SESSION['success'] = 'Ви успішно авторизовані!';
                        if (isset($_GET['redirectTo'])) {
                            redirect($_GET['redirectTo']);
                        } else {
                            redirect(baseUrl() . 'profile');
                        }
                    }
                }
            }

            $_SESSION['errors'] = 'Wrong email or password';

            if (isset($_GET['redirectTo'])) {
                redirect('/login?redirectTo=' . $_GET['redirectTo']);
            }

            redirect('/login');
        }
        redirect();
    }

    public function registerWithPasswordAction() {
        if (!empty($_POST)) {
            $data = $_POST;

            if ($data['email'] && $data['password']) {
                $email = $data['email'];
                $user_model = new UserModel();
                $duplicate = $user_model->findByEmail($email);
                
                if ($duplicate) {
                    $_SESSION['errors'] = 'This email already exists';
                } else {
                    $tmp_user_model = new TmpUserModel();
                    $token = password_hash(rand(), PASSWORD_DEFAULT);
                    $password_hash = password_hash($data['password'], PASSWORD_DEFAULT);
                    $meta = [
                        'password_hash' => $password_hash,
                        'email' => $email,
                    ];
                    $meta = json_encode($meta);
                    $newData = [
                        'token' => $token,
                        'expired' => time() + 1200, // 20 min
                        'type' => 'REGISTRATION',
                        'meta' => $meta
                    ];
                    $saved = $tmp_user_model->saveTmpUser($newData);

                    if ($saved) {
                        $href = baseUrl() . "user/register-with-password?token=" . $token;
                        $mailer = new Mailer();
                        $mailer->loadView('pages/User/mail/register-with-password', [
                            'href' => $href,
                        ]);
                        $mailer->send('Реєстрація', 'HI-EDDY', $email);

                        redirect(baseUrl() . 'user/registration-check-email');
                    }
                }
            }
        } elseif (!empty($_GET)) {
            if (isset($_GET['token'])) {
                $tmp_user_model = new TmpUserModel();
                $tmp_user = $tmp_user_model->findByToken($_GET['token']);

                if ($tmp_user && $tmp_user['type'] == 'REGISTRATION') {
                    $meta = json_decode($tmp_user['meta']);
                    $data = [
                        'email' => $meta->email,
                        'password' => $meta->password_hash
                    ];

                    $user_model = new UserModel();
                    $saved = $user_model->saveUser($data);

                    if ($saved) {
                        $tmp_user_model->deleteById($tmp_user['id']);
                        $_SESSION['success'] = 'Вітаємо! Акаунт створено. Можете увійти зі своїм email та паролем';
                        redirect(baseUrl() . 'login');
                    }
                }

                $_SESSION['errors'] = 'Посилання вже не актуально. Почніть процес з початку.';
            }
        }
        
        redirect(baseUrl() . 'registration');
    }
    
    public function loginAction() {
        $lang = Tone::$app->getProperty('lang');
        $lang = $lang ? '/' . $lang : '';
        
        $this->setMeta(
            __('user_login_enter_to_site') . ' - ' . Tone::$app->getProperty('site_name'),
            'Login page. HI-EDDY Academy',
            'hi-eddy, academy, education'
        );

        GoogleAuth::run();

        $form_action = "/user/login-with-password";

        $queryParamsString = '';
        $redirectTo = $_GET['redirectTo'] ?? null;
        if ($redirectTo) {
            $queryParamsString .= '?redirectTo=' . $redirectTo;
            $form_action .= $queryParamsString;
        }
        $google_login_url = $lang . '/user/click-on-google-login-button' . $queryParamsString;

        $this->set(compact('google_login_url', 'form_action'));
    }

    public function registrationAction() {
        $lang = Tone::$app->getProperty('lang');
        
        $this->setMeta(
            'Registration' . ' - ' . Tone::$app->getProperty('site_name'),
            'Login page. HI-EDDY Academy',
            'hi-eddy, academy, education'
        );

        GoogleAuth::run();

        $queryParamsString = '';
        $redirectTo = $_GET['redirectTo'] ?? null;
        if ($redirectTo) {
            $queryParamsString .= '?redirectTo=' . $redirectTo;
        }
        $google_login_url = $lang . '/user/click-on-google-login-button' . $queryParamsString;

        $this->set(compact('google_login_url'));
    }

    public function resetPasswordAction() {
        if (!empty($_POST)) {
            $data = $_POST;
            $email = $data['email'];
            
            if ($email) {
                $user_model = new UserModel();
                $user = $user_model->findByEmail($data['email']);
            
                if ($user) {
                    $tmp_user_model = new TmpUserModel();
                    $token = password_hash(rand(), PASSWORD_DEFAULT);
                    $meta = [
                        'email' => $email
                    ];
                    $meta = json_encode($meta);

                    $newData = [
                        'token' => $token,
                        'expired' => time() + 1200, // 20 min
                        'type' => 'CREATE_PASSWORD',
                        'meta' => $meta
                    ];
                    $saved = $tmp_user_model->saveTmpUser($newData);

                    if ($saved) {
                        $href = baseUrl() . "user/create-password?token=" . $token;
                        $mailer = new Mailer();
                        $mailer->loadView('pages/User/mail/reset-password', [
                            'href' => $href,
                        ]);
                        $mailer->send('Зкидання паролю', 'HI-EDDY', $email);

                        redirect(baseUrl() . 'user/reset-password-check-email');
                    } else {
                        $_SESSION['errors'] = "Щось пішло не так.";
                    }
                } else {
                    $_SESSION['errors'] = 'Упс. Ми не знайшли користувача з такою поштою:<br> ' . $email;
                }
            }

            redirect();
        } else {
            $email = '';
            
            if (isUser()) {
                $email = $_SESSION['user']['email'];
            }

            $this->set(compact('email'));
        }
    }

    public function resetPasswordCheckEmailAction() {}

    public function resetPasswordSuccessAction() {}

    public function registrationCheckEmailAction() {}

    public function changeEmailCheckEmailAction() {}

    public function newEmailCheckEmailAction() {}

    public function confirmNewEmailAction() {
        $user = $_SESSION['user'] ?? null;

        if (!empty($_GET) && $user) {
            $token = $token = $_GET['token'] ?? null;

            if ($token) {
                $tmp_user_model = new TmpUserModel();
                $tmp_user = $tmp_user_model->findByToken($token);

                if ($tmp_user) {
                    $meta = json_decode($tmp_user['meta']);
                    $email = $meta->email ?? null;
                    
                    $newEmail = $meta->{'new-email'} ?? null;

                    if ($user['email'] == $email && $newEmail) {
                        
                        $user_model = new UserModel();
                        $updated = $user_model->updateEmail($email, $newEmail);

                        if ($updated) {
                            $tmp_user_model->deleteById($tmp_user['id']);

                            $_SESSION['success'] = 'Пошту успішно підтверджено!';
                            redirect(baseUrl() . 'profile');
                        }
                    }
                }
            }
        }

        $_SESSION['errors'] = "Щось пішло не так.";
        redirect(baseUrl() . 'profile');
    }

    public function newEmailAction() {
        $user = $_SESSION['user'] ?? null;

        if (!empty($_POST) && $user) {
            $token = $_POST['token'] ?? null;
            $newEmail = $_POST['new-email'] ?? null;

            if ($user['email'] == $newEmail) {
                $_SESSION['errors'] = "Цей email вже є у вашому профілі.";
                redirect();
            } else {
                $user_model = new UserModel();
                $duplicate = $user_model->findByEmail($newEmail);

                if ($duplicate) {
                    $_SESSION['errors'] = "Цей email вже використовується для іншого аккаунту.";
                    redirect();
                }

                $tmp_user_model = new TmpUserModel();
                $tmp_user = $tmp_user_model->findByToken($token);
    
                if ($tmp_user) {
                    if ($tmp_user['type'] == 'CHANGE_EMAIL') {
                        $newMeta = [
                            'email' => $user['email'],
                            'new-email' => $newEmail,
                        ];
                        $newMeta = json_encode($newMeta);
                        $newToken = password_hash(rand(), PASSWORD_DEFAULT);
                        $newData = [
                            'token' => $newToken,
                            'expired' => time() + 1200, // 20 min
                            'type' => 'NEW_EMAIL',
                            'meta' => $newMeta
                        ];
    
                        $saved = $tmp_user_model->saveTmpUser($newData);
    
                        if ($saved) {
                            $tmp_user_model->deleteById($tmp_user['id']);

                            $href = baseUrl() . "user/confirm-new-email?token=" . $newToken;
                            $mailer = new Mailer();
                            $mailer->loadView('pages/User/mail/new-email', [
                                'href' => $href,
                            ]);
                            $mailer->send('Новий email', 'HI-EDDY', $newEmail);
                            
                            redirect(baseUrl() . 'user/new-email-check-email');
                        } else {
                            $_SESSION['errors'] = "Щось пішло не так.";
                        }
                    } else {
                        $_SESSION['errors'] = 'Щось пішло не так. Почніть процес з початку.';
                        redirect(baseUrl() . 'change-email');
                    }
                } else {
                    $_SESSION['errors'] = 'Щось пішло не так. Почніть процес з початку.';
                    redirect(baseUrl() . 'change-email');
                }
            }
        } elseif (!empty($_GET) && $user) {
            $token = $_GET['token'] ?? null;
            $tmp_user_model = new TmpUserModel();
            $tmp_user = $tmp_user_model->findByToken($token);

            if ($tmp_user) {
                $meta = json_decode($tmp_user['meta']);

                if ($meta->email == $user['email'] && $tmp_user['type'] == 'CHANGE_EMAIL') {
                    $this->set(compact('token'));
                } else {
                    $_SESSION['errors'] = 'Щось пішло не так. Почніть процес з початку.';
                    redirect(baseUrl() . 'change-email');
                }
            } else {
                $_SESSION['errors'] = 'Щось пішло не так. Почніть процес з початку.';
                redirect(baseUrl() . 'change-email');
            }
        } else {
            redirect(baseUrl() . 'profile');
        }
    }

    public function changeEmailAction() {
        $user = $_SESSION['user'] ?? null;

        if ($user && !empty($_POST)) {
            $email = $user['email'];
            $tmp_user_model = new TmpUserModel();
            $token = password_hash(rand(), PASSWORD_DEFAULT);
            $meta = [
                'email' => $email,
            ];
            $meta = json_encode($meta);

            $newData = [
                'token' => $token,
                'expired' => time() + 1200, // 20 min
                'type' => 'CHANGE_EMAIL',
                'meta' => $meta
            ];
            $saved = $tmp_user_model->saveTmpUser($newData);

            if ($saved) {
                $href = baseUrl() . "user/new-email?token=" . $token;
                $mailer = new Mailer();
                $mailer->loadView('pages/User/mail/change-email', [
                    'href' => $href,
                ]);
                $mailer->send('Зміна email', 'HI-EDDY', $email);

                redirect(baseUrl() . 'user/change-email-check-email');
            } else {
                $_SESSION['errors'] = "Щось пішло не так.";
            }
        }

        if (!$user) {
            redirect(baseUrl() . 'profile');
        }
    }

    public function createPasswordAction() {
        if (!empty($_POST)) {
            
            $token = $_POST['token'];
            $password = $_POST['password'];

            $tmp_user_model = new TmpUserModel();
            $user = $tmp_user_model->findByToken($token);      
            
            if ($user) {
                $meta = json_decode($user['meta']);
                $email = $meta->email;

                $user_model = new UserModel();
                $updated = $user_model->updatePasswordByEmail($password, $email);
            
                if ($updated) {
                    $tmp_user_model->deleteById($user['id']);

                    if (isUser()) {
                        $_SESSION['success'] = 'Пароль було оновлено!';
                        redirect(baseUrl() . 'profile');
                    }
                    
                    redirect(baseUrl() . 'user/reset-password-success');
                } else {
                    $_SESSION['errors'] = 'Щось пішло не так. Почніть процес з початку.';
                }
            } else {
                $_SESSION['errors'] = 'Щось пішло не так. Почніть процес з початку.';
                redirect(baseUrl() . 'login');
            }
            
            redirect();
        } elseif (!empty($_GET)) {
            if (isset($_GET['token'])) {
                $token = $_GET['token'];
                $tmp_user_model = new TmpUserModel();
                $tmp_user = $tmp_user_model->findByToken($token);

                if ($tmp_user) {
                    $this->set(compact('token'));
                } else {
                    $_SESSION['errors'] = 'Посилання вже не актуально. Почніть процес з початку.';
                    
                    if (isUser()) {
                        redirect(baseUrl() . 'profile');
                    }
                    redirect(baseUrl() . 'login');
                }
            }
        } else {
            redirect(baseUrl() . 'login');
        }
    }

    public function changePasswordAction() {
        
    }

    public function clickOnGoogleLoginButtonAction() {
        $redirectTo = $_GET['redirectTo'] ?? null;
        GoogleAuth::run();

        $google_login_url = GoogleAuth::$google_login_url;

        if ($redirectTo) {
            $_SESSION['redirectTo'] = $redirectTo;
        }
        redirect($google_login_url);
    }

    public function logoutAction() {
        unset($_SESSION['user']);
        redirect(baseUrl());
    }

    public function updateAction() {
        if (!empty($_POST)) {
            $data = $_POST;
        
            $user_model = new UserModel();
            $isUpdated = $user_model->updateProfile($data);

            if ($isUpdated) {
                $_SESSION['success'] = "Профіль збережено";
            }
        }
        
        redirect();
    }
}