<?php
require('services/CategoryService.php');
class CategoryController
{
                   public function index()
                   {
                                      $categoryService = new CategoryService();
                                      $categories = $categoryService->getAllCategory();
                                      require("views/category/index_category.php");
                   }
                   public function create()
                   {
                                      require("views/category/create_category.php");
                   }
                   public function edit()
                   {
                                      $categoryService = new CategoryService();
                                      $category = $categoryService->editCategory($_GET['ma_tloai']);
                                      require("views/category/edit_category.php");
                   }
                   public function delete()
                   {
                                      $categoryService = new CategoryService();
                                      $category = $categoryService->deleteCategory($_GET['ma_tloai']);
                                      header("Location: index.php?controller=category&action=index");
                   }
                   public function store()
                   {
                                      $categoryService = new CategoryService();
                                      $category = $categoryService->createCategory($_POST['ma_tloai'], $_POST['ten_tloai']);
                                      header("Location: index.php?controller=category&action=index");
                   }
                   public function update()
                   {
                                      $categoryService = new CategoryService();
                                      $category = $categoryService->updateCategory($_POST['ma_tloai'], $_POST['ten_tloai']);
                                      header("Location: index.php?controller=category&action=index");
                   }
}
