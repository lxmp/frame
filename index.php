<?php
require './Lxmp/Autoload.php';


$params = $_GET;


$path = $params['s'];
list($controller, $action) = explode('/', $path);

unset($params['s']);

$dispatcher = new Lxmp\Dispatcher('\\App\\Controller\\'.ucfirst($controller), $action, $params);
$dispatcher->exec();