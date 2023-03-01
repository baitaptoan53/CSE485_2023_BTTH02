<?php
class Category
{
                   private $ma_tloai;
                   private $ten_tloai;
                   public function __construct()
                   {
                                      require('../configs/BDConnection.php');
                                      require('../models/Category.php');
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
                   public function create()
                   {
                                      $con =new DBConnection();
                                      $sql = "INSERT INTO theloai (ma_tloai, ten_tloai) VALUES (:ma_tloai, :ten_tloai)";
                                      $statement = $con->getConnection()->prepare($sql);
                                      $statement->bindParam(':ma_tloai', $this->ma_tloai);
                                      $statement->bindParam(':ten_tloai', $this->ten_tloai);
                                      $statement->execute();
                   }
                   public function store()
                   {
                   }
                   public function delete(){
                                      $con = new DBConnection();
                                      $sql = "DELETE FROM theloai WHERE ma_tloai = :ma_tloai";
                                      $statement = $con->getConnection()->prepare($sql);
                                      $statement->bindParam(':ma_tloai', $this->ma_tloai);
                                      $statement->execute();
                   }
                   public function edit(){
                                      $con = new DBConnection();
                                      $sql = "SELECT * FROM theloai WHERE ma_tloai = :ma_tloai";
                                      $statement = $con->getConnection()->prepare($sql);
                                      $statement->bindParam(':ma_tloai', $this->ma_tloai);
                                      $statement->execute();
                                      $statement->setFetchMode(PDO::FETCH_OBJ);
                                      $members = $statement->fetchAll();
                   }
}
