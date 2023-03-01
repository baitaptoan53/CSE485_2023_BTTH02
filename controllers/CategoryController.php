<?php
class CategoryController
{
                   private $conectar;
                   private $Connection;
                   public function __construct()
                   {
                                      require_once __DIR__ . ('../configs/BDConnection.php');
                                      require_once __DIR__ . ('../models/Category.php');
                   }
                   public function index()
                   {
                                      Category::getAll();
                                      // hiển thị danh sách các thể loại bằng view
                   }
                   public function create()
                   {
                   }
                   public function store()
                   {
                   }
}
