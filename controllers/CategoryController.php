<?php
class CategoryController
{
                   public function index()
                   {
                                      $categoryService = new CategoryService();
                                      $categories = $categoryService->getAllCategory();
                                      include_once("views/category/index_category.php");
                   }
                   public function create()
                   {
                                      include_once("views/category/create_category.php");
                   }
                   public function edit()
                   {
                                      $categoryService = new CategoryService();
                                      $category = $categoryService->editCategory($_GET['ma_loai'], $_GET['ten_loai']);
                                      include_once("views/category/edit_category.php");
                   }
                   public function delete()
                   {
                                      $categoryService = new CategoryService();
                                      $categoryService->deleteCategory($_GET['ma_loai']);
                                      header("Location: index.php?controller=category&action=index");
                   }
}
