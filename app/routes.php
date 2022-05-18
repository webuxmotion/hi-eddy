<?php

use core\Router;

Router::add('^tutorials/(?P<alias>[a-z-]+)?/?(?P<section>[a-z-]+)?$', ['controller' => 'Tutorials', 'action' => 'tutorial']);

// custom route here
// ...
