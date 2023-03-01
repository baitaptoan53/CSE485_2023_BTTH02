<?php
class CategoryController
{
                   public function __construct()
                   {
                                      require('../configs/BDConnection.php');
                                      require('../models/Category.php');
                   }
                   public function index()
                   {
                                      // lấy dữ liệu từ model
                                      $category = new Category();
                                      $categories = $category->getAll();
                                      // gọi view
                                      require('../views/category/index.php');
                   }
                   // public function store()
                   // {
                   //                    $category = new Category();
                   //                    $category->setMa_tloai($_POST['ma_tloai']);
                   //                    $category->setTen_tloai($_POST['ten_tloai']);
                   //                    $category->create();
                   //                    require('../views/category/index.php');
                   // }

                   public function delete()
                   {
                                      $category = new Category();
                                      $category->setMa_tloai($_GET['ma_tloai']);
                                      $category->delete();
                                      require('../views/category/list_category.php');
                   }
                   public function edit()
                   {
                                      $category = new Category();
                                      $category->setMa_tloai($_GET['ma_tloai']);
                                      $category->edit();
                                      require('index.php?controller=category&action=index');
                   }
}
