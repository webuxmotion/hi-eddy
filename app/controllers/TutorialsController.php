<?php

namespace app\controllers;

class TutorialsController extends AppController {
    
    public function indexAction() {

       $this->setMeta(
           "Tutorials"
       );
    }

    public function tutorialAction() {
        $alias = $this->route['alias'] ?? null;
        $lang = \core\Tone::$app->getProperty('language')['code'];

        $this->setMeta(
            "Tutorial - $alias"
        );

        $this->set(compact('alias', 'lang'));
     }
}