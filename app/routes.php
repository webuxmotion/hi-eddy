<?php

use core\Router;


Router::add('^(?P<lang>[a-z]+)?/?lessons/(?P<alias>[a-z-]+)?$', ['controller' => 'Lessons', 'action' => 'one-item']);

Router::add('^(?P<lang>[a-z]+)?/?about/?$', ['controller' => 'Pages', 'action' => 'about']);
Router::add('^(?P<lang>[a-z]+)?/?contacts/?$', ['controller' => 'Pages', 'action' => 'contacts']);
Router::add('^(?P<lang>[a-z]+)?/?sponsors/?$', ['controller' => 'Pages', 'action' => 'sponsors']);
Router::add('^(?P<lang>[a-z]+)?/?command/?$', ['controller' => 'Pages', 'action' => 'command']);

Router::add('^(?P<lang>[a-z]+)?/?prices/?$', ['controller' => 'Prices', 'action' => 'list']);

Router::add('^(?P<lang>[a-z]+)?/?lessons/?$', ['controller' => 'Lessons', 'action' => 'list']);

Router::add('^(?P<lang>[a-z]+)?/?login/?$', ['controller' => 'User', 'action' => 'login']);
Router::add('^(?P<lang>[a-z]+)?/?profile/?$', ['controller' => 'User', 'action' => 'profile']);

Router::add('^(?P<lang>[a-z]+)?/?$', ['controller' => 'Main', 'action' => 'index']);

// custom route here
// ...
