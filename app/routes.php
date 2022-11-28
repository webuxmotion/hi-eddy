<?php

use core\Router;

Router::add('^(?P<lang>[a-z]{2}+)?/?lessons/?$', ['controller' => 'Lessons', 'action' => 'list']);
Router::add('^(?P<lang>[a-z]{2}+)?/?lessons/(?P<alias>[a-z-]+)?$', ['controller' => 'Lessons', 'action' => 'one-item']);

Router::add('^(?P<lang>[a-z]{2}+)?/?about/?$', ['controller' => 'Service', 'action' => 'about']);
Router::add('^(?P<lang>[a-z]{2}+)?/?offert/?$', ['controller' => 'Service', 'action' => 'offert']);
Router::add('^(?P<lang>[a-z]{2}+)?/?privacy-policy/?$', ['controller' => 'Service', 'action' => 'privacy-policy']);

Router::add('^(?P<lang>[a-z]{2}+)?/?payment-and-delivery/?$', ['controller' => 'Service', 'action' => 'payment-and-delivery']);

Router::add('^(?P<lang>[a-z]{2}+)?/?contacts/?$', ['controller' => 'Pages', 'action' => 'contacts']);
Router::add('^(?P<lang>[a-z]{2}+)?/?sponsors/?$', ['controller' => 'Pages', 'action' => 'sponsors']);
Router::add('^(?P<lang>[a-z]{2}+)?/?command/?$', ['controller' => 'Pages', 'action' => 'command']);

Router::add('^(?P<lang>[a-z]{2}+)?/?prices/?$', ['controller' => 'Prices', 'action' => 'list']);

Router::add('^(?P<lang>[a-z]{2}+)?/?login/?$', ['controller' => 'User', 'action' => 'login']);
Router::add('^(?P<lang>[a-z]{2}+)?/?registration/?$', ['controller' => 'User', 'action' => 'registration']);
Router::add('^(?P<lang>[a-z]{2}+)?/?reset-password/?$', ['controller' => 'User', 'action' => 'reset-password']);
Router::add('^(?P<lang>[a-z]{2}+)?/?change-email/?$', ['controller' => 'User', 'action' => 'change-email']);
Router::add('^(?P<lang>[a-z]{2}+)?/?create-password/?$', ['controller' => 'User', 'action' => 'create-password']);
Router::add('^(?P<lang>[a-z]{2}+)?/?change-password/?$', ['controller' => 'User', 'action' => 'change-password']);

Router::add('^(?P<lang>[a-z]{2}+)?/?profile/?$', ['controller' => 'User', 'action' => 'profile']);

Router::add('^(?P<lang>[a-z]{2}+)?/?docs/?$', ['controller' => 'Docs', 'action' => 'index']);

Router::add('^(?P<lang>[a-z]{2}+)?/(?P<controller>[a-z-]+)?/(?P<action>[a-z-]+)?$');
Router::add('^(?P<lang>[a-z]{2}+)?/?$', ['controller' => 'Main', 'action' => 'index']);

// custom route here
// ...
