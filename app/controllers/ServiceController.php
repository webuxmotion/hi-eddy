<?php

namespace app\controllers;

use core\Tone;

class ServiceController extends AppController {
    
    public function offertAction() {
    
       $this->setMeta(
           Tone::$app->getProperty('site_name') . ' - Договір публічної оферти',
           'hi-eddy | Договір публічної оферти',
           'hi-eddy, освітня платформа, публічна оферта'
       );
    }

    public function privacyPolicyAction() {
    
        $this->setMeta(
            Tone::$app->getProperty('site_name') . ' - Політика конфіденційності HI-EDDY',
            'hi-eddy | Політика конфіденційності HI-EDDY',
            'hi-eddy, освітня платформа, політика конфіденційності'
        );
     }

     public function aboutAction() {
        //  $var = !empty($_POST['signature']) ? $_POST['signature'] : '';
        //  $test = !empty($_GET['test']) ? $_GET['test'] : '';

        // throw new \Exception("$test Oh yessssss {$var}", 404);
        // die;
        //  if (isAjax()) {
        //     throw new \Exception("Oh yessssss", 404);
        //     debug($_POST);
        //     die;
        //  }
    
        $this->setMeta(
            Tone::$app->getProperty('site_name') . ' - Про нас',
            'hi-eddy | Про нас',
            'hi-eddy, освітня платформа, про нас'
        );
     }

     public function paymentAndDeliveryAction() {
    
        $this->setMeta(
            Tone::$app->getProperty('site_name') . ' - Оплата та доставка',
            'hi-eddy | Оплата та доставка',
            'hi-eddy, освітня платформа, оплата, доставка'
        );
     }
}