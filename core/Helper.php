<?php
function redirect($url) {
    header("Location: " . $url);
    exit();
}
function route($name) {
    global $route;
    $thisRoute = null;
    foreach ($route as $item) {
        if ($item['name'] == $name) {
            $thisRoute = $item;
            break;
        }
    }
    return empty($thisRoute) ? '' : 'index.php?source=' . $thisRoute['source'];
}

function dd($data) {
    print_r($data);
    die();
}

function import($file) {
    require_once($file . '.php');
}
