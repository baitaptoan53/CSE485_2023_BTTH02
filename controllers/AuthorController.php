<?php
class AuthorController
{
                   public function __construct()
                   {
                                      require_once('../configs/BDConnection.php');
                                      require_once('../models/Author.php');
                   }
                   public function index()
                   {
                                      // lấy dữ liệu từ model
                                      $author = new Author();
                                      $authors = $author->getAll();
                                      // gọi view
                                      require_once('../views/author/index.php');
                   }
                   public function store()
                   {
                                      $author = new Author();
                                      $author->setMa_tgia($_POST['ma_tgia']);
                                      $author->setTen_tgia($_POST['ten_tgia']);
                                      $author->setHinh_tgia($_POST['hinh_tgia']);
                                      $author->store();
                                      header('Location: index.php?controller=author&action=index');
                   }
                   public function delete()
                   {
                                      $author = new Author();
                                      $author->setMa_tgia($_GET['ma_tgia']);
                                      $author->delete();
                                      header('Location: index.php?controller=author&action=index');
                   }
                   public function edit()
                   {
                                      $author = new Author();
                                      $author->setMa_tgia($_GET['ma_tgia']);
                                      $author->edit();
                                      header('Location: index.php?controller=author&action=index');
                   }
}
