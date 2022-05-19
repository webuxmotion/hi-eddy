<?php

define("PATH", siteUrl());

function customRequire($path) {
    if (file_exists($path)) {
        require($path);
    } else {
        echo "Page not found";
    }
}

function doc($file) {
    $fileContent = file_get_contents(APP . $file);
    $fileContent = str_replace('<', '&lt;', $fileContent);
    $fileContent = str_replace('>', '&gt;', $fileContent);
    $fileContent = str_replace('?', '&#63;', $fileContent);
    
    return $fileContent;
}

function get($key, $type = 'i')
{
    $param = $key;
    $$param = $_GET[$param] ?? '';
    if ($type == 'i') {
        return (int)$$param;
    } elseif ($type == 'f') {
        return (float)$$param;
    } else {
        return trim($$param);
    }
}

/**
 * @param string $key Key of POST array
 * @param string $type Values 'i', 'f', 's'
 * @return float|int|string
 */
function post($key, $type = 's')
{
    $param = $key;
    $$param = $_POST[$param] ?? '';
    if ($type == 'i') {
        return (int)$$param;
    } elseif ($type == 'f') {
        return (float)$$param;
    } else {
        return trim($$param);
    }
}

function base_url()
{
    return PATH . (\core\Tone::$app->getProperty('lang') ? \core\Tone::$app->getProperty('lang') . '/' : '');
}

function __($key)
{
    return \app\services\LanguageService::get($key);
}

function isUser() {
    return !empty($_SESSION['user']);
}