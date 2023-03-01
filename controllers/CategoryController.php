<?php
class CategoryController
{
                   public function __construct()
                   {
                                      require_once __DIR__ . ('../configs/BDConnection.php');
                                      require_once __DIR__ . ('../models/Category.php');
                   }
                   public function index()
                   {
                                      // lấy dữ liệu từ model
                                      $category = new Category();
                                      $categories = $category->getAll();
                                      // gọi view
                                      require_once __DIR__ . ('../views/category/index.php');
                   }
                   public function store()
                   {
                                      $category = new Category();
                                      $category->setMa_tloai($_POST['ma_tloai']);
                                      $category->setTen_tloai($_POST['ten_tloai']);
                                      $category->create();
                                      header('Location: index.php?controller=category&action=index');
                   }

                   public function delete()
                   {
                                      $category = new Category();
                                      $category->setMa_tloai($_GET['ma_tloai']);
                                      $category->delete();
                                      header('Location: index.php?controller=category&action=index');
                   }
                   public function edit()
                   {
                                      $category = new Category();
                                      $category->setMa_tloai($_GET['ma_tloai']);
                                      $category->edit();
                                      header('Location: index.php?controller=category&action=index');
                   }
}
