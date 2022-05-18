<?php

namespace app\controllers;

use core\base\Controller;
use core\Tone;
use app\widgets\language\Language;
use app\models\AppModel;

class AppController extends Controller {
  
  public function __construct($route) {
    parent::__construct($route);

    if (!empty($route['lang'])) {
      Tone::$app->setProperty('lang', $route['lang']);
    }

    //new AppModel();

    Tone::$app->setProperty('languages', Language::getLanguages());
    Tone::$app->setProperty('language', Language::getLanguage(Tone::$app->getProperty('languages')));
  }
}