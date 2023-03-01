<?php
include ("services/CategoryService.php");
include ("services/AuthorService.php");
class HomeController {
                   public function index()
                   {
                                      $categoryService = new CategoryService();
                                      $categories = $categoryService->getAllCategory();
                                      $authorService = new AuthorService();
                                      $authors = $authorService->getAllAuthor();
                                      require('views/home/index.php');
                   }
}
?>