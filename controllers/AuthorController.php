<?php 
    class AuthorController{
        public function index(){
            require_once("./services/AuthorService.php");
            require_once("./views/author/index_author.php");
        }
        public function add(){
            require_once("./services/AuthorService.php");
            require_once("./views/author/add_author.php");
        }
        public function edit(){
            require_once("./services/AuthorService.php");
            require_once("./views/author/edit_author.php");
        }
        public function delete(){
            require_once("./services/AuthorService.php");
        }
    }
?>
