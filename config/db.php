<?php

$db_host = $_ENV['DB_HOST'];
$db_user = $_ENV['DB_USERNAME'];
$db_password = $_ENV['DB_PASSWORD'];
$db_name = $_ENV['DB_DATABASE'];

return [
  'dsn' => "mysql:host=$db_host;dbname=$db_name;charset=utf8",
  'user' => $db_user,
  'pass' => $db_password
];