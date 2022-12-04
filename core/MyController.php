<?php
class MyController
{

    function __construct()
    {

    }

    function loadModel($string)
    {
        require_once('model/' . $string . '.php');
    }
    function loadView($view, $data = [])
    {
        extract($data);
        require_once('view/layout/index.php');
    }
}