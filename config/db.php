<?php


try {
    $dotenv = Dotenv\Dotenv::create(realpath(dirname(__DIR__)));
    $dotenv->load();
} catch (\Exception $e) {
}

$host = 'localhost';
$dbname = 'consolide';
$username = 'root';
$password = '';

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

if (isset($url["host"]) && isset($url["user"]) && isset($url["pass"]) && isset($url["path"])) {
    $host = $url["host"];
    $username = $url["user"];
    $password = $url["pass"];
    $dbname = substr($url["path"], 1);
}

return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=' . $host . ';dbname=' . $dbname,
    'username' => $username,
    'password' => $password,
    'charset' => 'utf8',
];
