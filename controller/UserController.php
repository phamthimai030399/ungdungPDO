<?php

class UserController extends MyController
{
    private $userModel;

    public function __construct()
    {
        $this->loadModel("UserModel");
        $this->userModel = new UserModel();
    }

    public function checkLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            if (!empty($_SESSION["is_login"])) {
                redirect(route('products list'));
            } else {
                $this->loadView('users/login');
            }

        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            $inputUsername = $_POST["user_name"];
            $inputPassword = $_POST["password"];
            $arr = $this->userModel->checkLogin($inputUsername, $inputPassword);
            if (count($arr) == 1) {
                $_SESSION["is_login"] = 1;
                redirect(route('products list'));
            } else {
                $_SESSION["login_message"] = "Đăng nhập không thành công";
                $this->loadView('users/login');
            }

        }
    }

    function logOut(){
        if ($_SERVER['REQUEST_METHOD'] == "GET"){
            $_SESSION["is_login"] = NULL;
            $_SESSION["login_message"] = null;
            $_SESSION["logout_message"] = "LogOut thành công";
            redirect(route('login'));
        }
    }

    public function insertUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $this->loadView('users/register');
        } elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
            if ($_POST["re_password"] != $_POST["password"]) {
                $_SESSION["register_false"] = 1;
                redirect(route('register'));
            }
            $inputName = $_POST["user_name"];
            $inputPassword = $_POST["password"];
            $this->userModel->insertUser($inputName, $inputPassword);
            $_SESSION["login_message"] = "Đăng ký thành công. Vui lòng đăng nhập tài khoản";
            import('core/Mail');
            $mail = new Mail('mai.pham.tda@gmail.com', 'New user', 'new user register');
            $mail->send();
            redirect(route('login'));
        }
    }

}
