<?php

use Camondoni\Framework\Api;
use Camondoni\Framework\Response;

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
$dotenv->required(['DB_HOST', 'DB_NAME', 'DB_USER', 'DB_PASS']);

$method = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['PATH_INFO'] ?? '/';

require __DIR__ . '/config/database.php';

$router = new Camondoni\Framework\Router($method, $path);
//$router->setPrefix("");
$api = new Api($router);
$api->routing();

$result = $router->handler();
$data = $result->getData();

try {
    if ($data['action'] instanceof Closure) {
        echo $data['action']($router->setRequestBody());
    }
} catch (Exception $e) {
    $error = array(
        "error" => true,
        "errorsMessage" => [$e->getMessage()]
    );
    echo Response::json($error, $e->getCode());
}
