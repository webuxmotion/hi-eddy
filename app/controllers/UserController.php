<?php

namespace app\controllers;

use core\Tone;
use app\services\GoogleAuth;
use app\models\UserModel;
use app\models\TmpUserModel;

class UserController extends AppController {

    public function profileAction() {
        $user = $_SESSION['user'] ?? null;

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
            $duplicate = $user_model->findDuplicate('email', $data['email']);
            
            if ($duplicate) {
                if (!$duplicate['password']) {
                    $_SESSION['errors'] = 'Wrong email or password';
                }
            } 

            $_SESSION['errors'] = 'Wrong email or password';
        
            redirect();
        }
        redirect();
    }

    public function registerWithPasswordAction() {
        if (!empty($_POST)) {
            $data = $_POST;

            if ($data['email'] && $data['password']) {
                $user_model = new UserModel();
                $duplicate = $user_model->findDuplicate('email', $data['email']);
                
                if ($duplicate) {
                    $_SESSION['errors'] = 'This email already exists';
                } else {
                    $tmp_user_model = new TmpUserModel();
                    $hash = password_hash($data['password'], PASSWORD_DEFAULT);
                    $newData = [
                        'email' => $data['email'],
                        'token' => $hash,
                        'expired' => time() + 5,
                        'type' => 'REGISTRATION',
                    ];
                    $saved = $tmp_user_model->saveTmpUser($newData);

                    if ($saved) {
                        $href = baseUrl() . "user/registerWithPassword?token=" . $hash;
                        $url = "<a href='" . $href . "'>Підтвердити</a>";
                        $_SESSION['success'] =  $url . $href;
                    }
                }
            }
        } elseif (!empty($_GET)) {
            
            if (isset($_GET['token'])) {
                $tmp_user_model = new TmpUserModel();
                $created = $tmp_user_model->newFromToken($_GET['token']);

                if ($created) {
                    $_SESSION['success'] = 'Вітаємо! Акаунт створено. Можете увійти зі своїм email та паролем';
                    redirect(baseUrl() . 'login');
                } else {
                    $_SESSION['errors'] = 'Посилання вже не актуально. Почніть процес з початку.';
                }
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

        $queryParamsString = '';
        $redirectTo = $_GET['redirectTo'] ?? null;
        if ($redirectTo) {
            $queryParamsString .= '?redirectTo=' . $redirectTo;
        }
        $google_login_url = $lang . '/user/click-on-google-login-button' . $queryParamsString;

        $this->set(compact('google_login_url'));
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
                $duplicate = $user_model->findDuplicate('email', $data['email']);
            
                if ($duplicate) {
                    $tmp_user_model = new TmpUserModel();
                    $hash = password_hash(rand(), PASSWORD_DEFAULT);
                    $newData = [
                        'email' => $email,
                        'token' => $hash,
                        'expired' => time() + 600,
                        'type' => 'CREATE_PASSWORD',
                    ];
                    $saved = $tmp_user_model->saveTmpUser($newData);

                    if ($saved) {
                        $href = baseUrl() . "user/create-password?token=" . $hash;
                        $url = "<a href='" . $href . "'>Підтвердити</a>";
                        $_SESSION['success'] =  $url . $href;
                    } else {
                        $_SESSION['errors'] = "Щось пішло не так.";
                    }
                } else {
                    $_SESSION['errors'] = 'Упс. Ми не знайшли користувача з такою поштою:<br> ' . $email;
                }
            }

            redirect();
        }
    }

    public function changeEmailAction() {

    }

    public function createPasswordAction() {
        if (!empty($_POST)) {
            debug($_POST);
            $token = $_POST['token'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $tmp_user_model = new TmpUserModel();
            $user = $tmp_user_model->findByToken($token);      
            
            if ($user) {
                if (isExpired($user['expired'])) {
                    $tmp_user_model->deleteById($user['id']);
                    $_SESSION['errors'] = 'Щось пішло не так. Почніть процес з початку.';
                    redirect(baseUrl() . 'login');
                } else {
                    if ($email == $user['email']) {
                        $user_model = new UserModel();
                        $updated = $user_model->updatePasswordByEmail($password, $email);
                    
                        if ($updated) {
                            $_SESSION['success'] = 'Пароль був оновлений!.';
                            $tmp_user_model->deleteById($user['id']);

                            redirect(baseUrl() . 'login');
                        } else {
                            $_SESSION['errors'] = 'Щось пішло не так. Почніть процес з початку.';
                        }
                    }
                }
            } else {
                $_SESSION['errors'] = 'Щось пішло не так. Почніть процес з початку.';
                redirect(baseUrl() . 'login');
            }
            
            redirect();
        } elseif (!empty($_GET)) {
            $email = '';
            $token = '';
            
            if (isset($_GET['token'])) {
                $token = $_GET['token'];
                $tmp_user_model = new TmpUserModel();
                $user = $tmp_user_model->findByToken($token);

                if ($user) {
                    if (isExpired($user['expired'])) {
                        $tmp_user_model->deleteById($user['id']);
                        $_SESSION['errors'] = 'Посилання вже не актуально. Почніть процес з початку.';
                        redirect(baseUrl() . 'login');
                    } else {
                        $email = $user['email'];

                        $this->set(compact('email', 'token'));
                    }
                } else {
                    $_SESSION['errors'] = 'Посилання вже не актуально. Почніть процес з початку.';
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