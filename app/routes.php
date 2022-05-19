<?php

use core\Router;


Router::add('^(?P<lang>[a-z]+)?/?tutorials/(?P<alias>[a-z-]+)?/?(?P<section>[a-z-]+)?$', ['controller' => 'Tutorials', 'action' => 'tutorial']);

Router::add('^(?P<lang>[a-z]+)?/?about/?$', ['controller' => 'Pages', 'action' => 'about']);
Router::add('^(?P<lang>[a-z]+)?/?contacts/?$', ['controller' => 'Pages', 'action' => 'contacts']);
Router::add('^(?P<lang>[a-z]+)?/?sponsors/?$', ['controller' => 'Pages', 'action' => 'sponsors']);
Router::add('^(?P<lang>[a-z]+)?/?command/?$', ['controller' => 'Pages', 'action' => 'command']);

Router::add('^(?P<lang>[a-z]+)?/?login/?$', ['controller' => 'User', 'action' => 'login']);
Router::add('^(?P<lang>[a-z]+)?/?profile/?$', ['controller' => 'User', 'action' => 'profile']);

Router::add('^(?P<lang>[a-z]+)?/?$', ['controller' => 'Main', 'action' => 'index']);

// custom route here
// ...
