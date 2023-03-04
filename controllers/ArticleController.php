<?php
    class ArticleController {
        public function index(){
            require_once('./services/ArticleService.php');
            require_once('../CSE485_2023_BTTH02/views/article/index_article.php');
        }
        public function add(){
            require_once("./services/ArticleService.php");
            require_once("./views/article/add_article.php");
        }
        public function edit(){
            require_once('./services/ArticleService.php');
            require_once('./views/article/edit_article.php');
        }
        public function delete(){
            require_once('./services/ArticleService.php');
        }
    }
?>