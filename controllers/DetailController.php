<?php 
    class DetailController{
        public function index(){
            require_once("./services/DetailService.php");
            require_once("./views/detail/index_detail.php");
        }
    }
?>