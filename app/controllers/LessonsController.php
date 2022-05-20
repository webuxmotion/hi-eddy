<?php

namespace app\controllers;

use \app\models\LessonModel;
use \core\Tone;

class LessonsController extends AppController {
    
    public function listAction() {
        $model = new LessonModel();
        $list = $model->getList();

        $this->setMeta(
           "Lessons Page"
        );

        $this->set(compact('list'));
    }

    public function oneItemAction() {
        $alias = $this->route['alias'] ?? null;
        $lang = Tone::$app->getProperty('language')['code'];

        $model = new LessonModel();
        $item = $model->getOneByAlias($alias);

        ob_start();
        $vars = [];
        if (file_exists(APP . "/pages/Lessons/{$alias}/constants.php")) {
            $vars = require APP . "/pages/Lessons/{$alias}/constants.php";
        }
        
        extract($vars);
        
        if (file_exists(APP . "/pages/Lessons/{$alias}/{$lang}-index.php")) {
            require APP . "/pages/Lessons/{$alias}/{$lang}-index.php";
        } else {
            require APP . "/pages/Lessons/not-found-lesson.php";
        }
        
        $content = ob_get_clean();

        $this->setMeta(
            "Tutorial - $alias",
            $item['meta_description'],
            $item['meta_keywords']
        );

        $this->set(compact('content', 'item'));
     }
}