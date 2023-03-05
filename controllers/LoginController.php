<?php
    class LoginController{
        public function index(){
            require_once("./services/UserService.php");
            require_once("./views/login/index_login.php");
        }
        public function user(){
            echo '<h1 style="color:red;">Chào mừng bạn đến với trang người dùng ❤❤❤</h1>';
        }
    }
?>