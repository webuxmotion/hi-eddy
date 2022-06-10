<?php

namespace app\controllers;

use core\Tone;
use app\services\LiqPay;

class MainController extends AppController {
    
    public function indexAction() {
        // $liqpay = new LiqPay(
        //     $_ENV['LIQPAY_PUBLIC_KEY'], 
        //     $_ENV['LIQPAY_PRIVATE_KEY']
        // );
        // $html = $liqpay->cnb_form(array(
        // 'action'         => 'pay',
        // 'amount'         => '4',
        // 'currency'       => 'UAH',
        // 'description'    => 'description text',
        // 'order_id'       => 'order_id_10',
        // 'version'        => '3',
        // 'language' => 'en',
        // 'result_url'     => baseUrl(),
        // 'server_url'     => 'https://hi-eddy.com/payment-payment/sdfsdf/payyyy'
        // ));

        // debug($html);
    
       $this->setMeta(
           Tone::$app->getProperty('site_name'),
           'hi-eddy - це освітня платформа',
           'hi-eddy, освітня платформа'
       );
    }
}