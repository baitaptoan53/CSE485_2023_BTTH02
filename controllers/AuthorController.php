<?php
require("services/AuthorService.php");
class AuthorController
{
                   public function index()
                   {
                                      $authorService = new AuthorService();
                                      $authors = $authorService->getAllAuthor();
                                      require("views/author/index_author.php");
                   }
                   public function create()
                   {
                                      require("views/author/add_author.php");
                   }
                   public function edit()
                   {
                                      $authorService = new AuthorService();
                                      $author = $authorService->editAuthor($_GET['ma_tgia'], $_GET['ten_tgia'], $_GET['hinh_anh']);
                                      require(".//views/author/edit_author.php");
                   }
                   public function delete()
                   {
                                      $authorService = new AuthorService();
                                      $author = $authorService->deleteAuthor($_GET['ma_tgia']);
                                      header("Location: index.php?controller=author&action=index");
                   }
}
