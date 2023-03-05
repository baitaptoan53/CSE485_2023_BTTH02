<?php
    class LogupController{
        public function index(){
            require_once("./services/UserService.php");
            require_once("./views/logup/index_logup.php");
        }
    }
?>