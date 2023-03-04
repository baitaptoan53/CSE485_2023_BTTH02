<?php
    class HomeAdminController{
        public function index(){
            require_once("./services/HomeAdminService.php");
            require_once("./views/homeadmin/index_homeadmin.php");
        }
    }
?>