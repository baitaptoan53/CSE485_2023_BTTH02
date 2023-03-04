<?php
    class HomeService
    {
        public function getHomeArticle()
        {
            require_once("ArticleService.php");
            $article = new ArticleService();
            return $article->getAllArticle();
        }
    }
    $home = new HomeService();
    $html = '';
?>