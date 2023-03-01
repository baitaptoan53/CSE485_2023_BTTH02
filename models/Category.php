<?php
class Category
{
                   private $ma_tloai;
                   private $ten_tloai;
                   public function __construct($ma_tloai, $ten_tloai)
                   {
                                      require_once('../configs/BDConnection.php');
                                      require_once('../models/Category.php');
                                      $this->ma_tloai = $ma_tloai;
                                      $this->ten_tloai = $ten_tloai;
                   }
                   // setter
                   public function setMa_tloai($ma_tloai)
                   {
                                      $this->ma_tloai = $ma_tloai;
                   }
                   public function setTen_tloai($ten_tloai)
                   {
                                      $this->ten_tloai = $ten_tloai;
                   }
                   // getter
                   public function getMa_tloai()
                   {
                                      return $this->ma_tloai;
                   }
                   public function getTen_tloai()
                   {
                                      return $this->ten_tloai;
                   }
                   public function getAll()
                   {
                                      $con = new DBConnection();
                                      $sql       = "SELECT * FROM theloai";
                                      $statement = $con->getConnection()->prepare($sql);
                                      $statement->setFetchMode(PDO::FETCH_OBJ); 
                                      $members = $statement->fetchAll();
                   }
}
