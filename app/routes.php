<?php

use core\Router;



Router::add('^(?P<lang>[a-z]+)?/?tutorials/(?P<alias>[a-z-]+)?/?(?P<section>[a-z-]+)?$', ['controller' => 'Tutorials', 'action' => 'tutorial']);

Router::add('^(?P<lang>[a-z]+)?/?$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<lang>[a-z]+)/(?P<controller>[a-z-]+)/(?P<action>[a-z-]+)/?$');

// custom route here
// ...
