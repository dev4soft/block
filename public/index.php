<?php
require '../vendor/autoload.php';

use \Block\Controllers\MainForm;

$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$c = new \Slim\Container($configuration);

$app = new \Slim\App($c);
$app->add(
    new \Slim\Middleware\Session([
        'name' => 'block',
        'autorefresh' => true,
        'lifetime' => '1 hour',
    ])
);

$container = $app->getContainer();
$container['configdb'] = require '../config/db.php';

$container['views'] = function () {
    return new \Slim\Views\PhpRenderer('../views');
};

$container['session'] = function () {
    return new \SlimSession\Helper();
};

$container['db'] = function ($container) {
    return new \Novokhatsky\DbConnect($container['configdb']);
};

$container['auth'] = function($container) {
    return new \Block\Middle\Auth($container['session']);
};

$container['login'] = function($container) {
    return new \Block\Controllers\Login(
        $container->views,
        $container['session']
    );
};

$container['BlockList'] = function($container) {
    return new \Block\Models\BlockList($container->db);
};

$container['MainForm'] = function($container) {
    return new MainForm($container->views, $container->BlockList);
};

$app->get('/login', 'login:form');
$app->post('/login', 'login:check');
$app->group('', function () {
    $this->get('/', 'MainForm:main');
    $this->get('/logout', 'login:logout');
})->add('auth:logined');

$app->run();

