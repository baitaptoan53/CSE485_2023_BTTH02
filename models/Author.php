<?php
class Author
{
                   private $ma_tgia;
                   private $ten_tgia;
                   private $hinh_tgia;
                   public function __construct()
                   {
                                      require('../configs/BDConnection.php');
                                      require('../models/Author.php');
                                      $this->ma_tgia = $ma_tgia;
                                      $this->ten_tgia = $ten_tgia;
                                      $this->hinh_tgia = $hinh_tgia;
                   }
                   // setter
                   public function setMa_tgia($ma_tgia)
                   {
                                      $this->ma_tgia = $ma_tgia;
                   }
                   public function setTen_tgia($ten_tgia)
                   {
                                      $this->ten_tgia = $ten_tgia;
                   }
                   public function setHinh_tgia($hinh_tgia)
                   {
                                      $this->hinh_tgia = $hinh_tgia;
                   }
                   // getter
                   public function getMa_tgia()
                   {
                                      return $this->ma_tgia;
                   }
                   public function getTen_tgia()
                   {
                                      return $this->ten_tgia;
                   }
                   public function getHinh_tgia()
                   {
                                      return $this->hinh_tgia;
                   }
                   public function getAll()
                   {
                                      $con = new DBConnection();
                                      $sql       = "SELECT * FROM tacgia";
                                      $statement = $con->getConnection()->prepare($sql);
                                      $statement->setFetchMode(PDO::FETCH_OBJ);
                                      $members = $statement->fetchAll();
                   }
                   public function store()
                   {
                                      $con = new DBConnection();
                                      $sql = "INSERT INTO tacgia (ma_tgia, ten_tgia, hinh_tgia) VALUES (:ma_tgia, :ten_tgia, :hinh_tgia)";
                                      $statement = $con->getConnection()->prepare($sql);
                                      $statement->bindParam(':ma_tgia', $this->ma_tgia);
                                      $statement->bindParam(':ten_tgia', $this->ten_tgia);
                                      $statement->bindParam(':hinh_tgia', $this->hinh_tgia);
                                      $statement->execute();
                   }
                   public function delete()
                   {
                                      $con = new DBConnection();
                                      $sql = "DELETE FROM tacgia WHERE ma_tgia = :ma_tgia";
                                      $statement = $con->getConnection()->prepare($sql);
                                      $statement->bindParam(':ma_tgia', $this->ma_tgia);
                                      $statement->execute();
                   }
                   public function edit()
                   {
                                      $con = new DBConnection();
                                      $sql = "SELECT * FROM tacgia WHERE ma_tgia = :ma_tgia";
                                      $statement = $con->getConnection()->prepare($sql);
                                      $statement->bindParam(':ma_tgia', $this->ma_tgia);
                                      $statement->execute();
                                      $statement->setFetchMode(PDO::FETCH_OBJ);
                                      $member = $statement->fetch();
                                      return $member;
                   }
}
