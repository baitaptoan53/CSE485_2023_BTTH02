<?php
class AuthorController
{
                   public function index()
                   {
                                      $authorService = new AuthorService();
                                      $authors = $authorService->getAllAuthor();
                                      include_once("views/author/index_author.php");
                   }
                   public function create()
                   {
                                      include_once("views/author/add_author.php");
                   }
                   public function edit()
                   {
                                      $authorService = new AuthorService();
                                      $author = $authorService->editAuthor($_GET['ma_tgia'], $_GET['ten_tgia'], $_GET['hinh_anh']);
                                      include_once("views/author/edit_author.php");
                   }
                   public function delete()
                   {
                                      $authorService = new AuthorService();
                                      $authorService->deleteAuthor($_GET['ma_tgia']);
                                      header("Location: index.php?controller=author&action=index");
                   }

}
