<?php

namespace app\services;

use core\base\View;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;

class Mailer {
    public $mailer;
    public $body;
    
    public function __construct() {
        $transport = (new Swift_SmtpTransport(
            $_ENV['SMTP_HOST'], 
            $_ENV['SMTP_PORT'], 
            $_ENV['SMTP_PROTOCOL']
        ))
            ->setUsername($_ENV['SMTP_LOGIN'])
            ->setPassword($_ENV['SMTP_PASSWORD'])
        ;
        $this->mailer = new Swift_Mailer($transport);
    }

    public function loadView($name, $vars = []) {
        $this->body = View::loadView($name, $vars);
    }

    public function send($title, $from, $to) {
        $message = (new Swift_Message($title))
            ->setFrom([$_ENV['SMTP_LOGIN'] => $from])
            ->setTo($to)
            ->setBody($this->body, 'text/html')
        ;

        $this->mailer->send($message);
    }
}