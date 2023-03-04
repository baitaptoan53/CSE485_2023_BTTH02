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
                                      require("views/author/create_author.php");
                   }
                   public function edit()
                   {
                                      $authorService = new AuthorService();
                                      $author = $authorService->editAuthor($_GET['ma_tgia']);
                                      require("./views/author/edit_author.php");
                   }
                   public function delete()
                   {
                                      $authorService = new AuthorService();
                                      $author = $authorService->deleteAuthor($_GET['ma_tgia']);
                                      header("Location: index.php?controller=author&action=index");
                   }
                   public function store()
                   {
                                      $authorService = new AuthorService();
                                      $author = $authorService->createAuthor($_POST['ma_tgia'], $_POST['ten_tgia'], $_POST['hinh_tgia']);
                                      header("Location: index.php?controller=author&action=index");
                   }
                   public function update()
                   {
                                      $authorService = new AuthorService();
                                      $author = $authorService->updateAuthor($_POST['ma_tgia'], $_POST['ten_tgia'], $_POST['hinh_tgia']);
                                      header("Location: index.php?controller=author&action=index");
                   }
}
