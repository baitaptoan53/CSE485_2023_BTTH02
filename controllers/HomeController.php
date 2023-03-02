<?php
// require ("../services/CategoryService.php");
// require ("../services/AuthorService.php");
class HomeController {
                   public function index()
                   {
                                      // $categoryService = new CategoryService();
                                      // $categories = $categoryService->getAllCategory();
                                      // $authorService = new AuthorService();
                                      // $authors = $authorService->getAllAuthor();
                                      require('views/home/index.php');
                   }
}
?>