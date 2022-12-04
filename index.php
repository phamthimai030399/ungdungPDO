<?php
require_once("core/common.php");
require_once("core/MyController.php");
require_once("core/MyModel.php");
require_once("middleware/User.php");

require_once("controller/ProductController.php");
require_once("controller/UserController.php");


$route = [
    [
        'source' => 'user-login',
        'controller' => new UserController(),
        'function' => 'checkLogin',
        'is_auth' => false,
        'name' => 'login'
    ],
    [
        'source' => 'user-register',
        'controller' => new UserController(),
        'function' => 'insertUser',
        'is_auth' => false,
        'name' => 'register'
    ],
    [
        'source' => 'user-logout',
        'controller' => new UserController(),
        'function' => 'logOut',
        'is_auth' => false,
        'name' => 'logout'
    ],
    [
        'source' => 'product-list',
        'controller' => new ProductController(),
        'function' => 'list',
        'is_auth' => true,
        'name' => 'products danh sach'
    ],
    [
        'source' => 'product-insert',
        'controller' => new ProductController(),
        'function' => 'insert',
        'is_auth' => true,
        'name' => 'products insert'
    ],
    [
        'source' => 'product-update',
        'controller' => new ProductController(),
        'function' => 'update',
        'is_auth' => true,
        'name' => 'products update'
    ],
    [
        'source' => 'product-delete',
        'controller' => new ProductController(),
        'function' => 'delete',
        'is_auth' => true,
        'name' => 'products delete'
    ],
];
$source = $_GET["source"];
$existRoute = false;
foreach ($route as $item) {
    if ($source == $item['source']) {
        $existRoute = true;
        if ($item['is_auth']) {
            User::auth();
        }
        $item['controller']->{$item['function']}();
        break;
    }
}

if (!$existRoute) {
    echo "url not found";
}