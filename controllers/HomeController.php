<?php 
    class HomeController{
        public function index(){
            require_once("./services/HomeService.php");
            require_once("./views/home/index_home.php");
        }
    }
?>
