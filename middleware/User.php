<?php

class User
{
    public static function auth(){
        $_SESSION['is_login'] = 1;
        if (empty($_SESSION['is_login'])) {
            redirect(route('login'));
        }
    }

    public static function isAuth() {
        return !empty($_SESSION['is_login']);
    }
}