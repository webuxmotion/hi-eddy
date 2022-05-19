<?php

namespace app\controllers;

use core\Tone;
use app\services\GoogleAuth;
use app\services\Telegram;

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
    
    public function loginAction() {
        $this->setMeta(
            'Вход на сайт - ' . Tone::$app->getProperty('site_name'),
            'Login page. HI-EDDY Academy',
            'hi-eddy, academy, education'
        );

        GoogleAuth::run();

        if (isUser()) {
            Telegram::instance()
                ->sendMessage(
                    $_ENV['BOT_CHAT_ID'], 
                    "User with email: {$_SESSION['user']['email']} was loginned!"
                );
        }

        $queryParamsString = '';
        $redirectTo = $_GET['redirectTo'] ?? null;
        if ($redirectTo) {
            $queryParamsString .= '?redirectTo=' . $redirectTo;
        }
        $google_login_url = '/user/click-on-google-login-button' . $queryParamsString;

        $this->set(compact('google_login_url'));
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
        redirect(siteUrl());
    }
}