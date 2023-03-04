<?php 
    class CategoryController{
        public function index(){
            require_once("./services/CategoryService.php");
            require_once("./views/category/index_category.php");
        }
        public function add(){
            require_once("./services/CategoryService.php");
            require_once("./views/category/add_category.php");
        }
        public function edit(){
            require_once("./services/CategoryService.php");
            require_once("./views/category/edit_category.php");
        }
        public function delete(){
            require_once("./services/CategoryService.php");
        }
    }
?>
