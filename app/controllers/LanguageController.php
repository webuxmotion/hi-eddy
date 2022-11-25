<?php

namespace app\controllers;

use core\Tone;

class LanguageController extends AppController
{
    public function changeAction()
    {
        $lang = get('lang', 's');
        if ($lang) {
            if (array_key_exists($lang, Tone::$app->getProperty('languages'))) {
                
                $url = trim(str_replace(PATH, '', $_SERVER['HTTP_REFERER']), '/');

                $url_parts = explode('/', $url, 2);
                if (array_key_exists($url_parts[0], Tone::$app->getProperty('languages'))) {
                    if ($lang != Tone::$app->getProperty('language')['code']) {
                        $url_parts[0] = $lang;
                    } else {
                        array_shift($url_parts);
                    }
                } else {
                    if ($lang != Tone::$app->getProperty('language')['code']) {
                        array_unshift($url_parts, $lang);
                    }
                }

                $url = PATH . implode('/', $url_parts);
                redirect($url);
            }
        }
        redirect();
    }
}