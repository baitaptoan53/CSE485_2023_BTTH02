<?php
include ("/configs/BDConnection.php");	
include  ("/models/Category.php");
class CategoryService{
                   public function getAllCategory(){
                                      $dbConn = new DBConnection();
                                      $conn = $dbConn->getConnection();
                                      $sql = "SELECT * FROM theloai";
                                      $stmt = $conn->query($sql);

                                      $categories = array();
                                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                         $category = new Category($row['ma_tloai'], $row['ten_tloai']);
                                                         array_push($categories, $category);
                                      }
                                      return $categories;
                   }
                   public function createCategory($ma_tloai, $ten_tloai){
                                      $dbConn = new DBConnection();
                                      $conn = $dbConn->getConnection();
                                      $sql = "INSERT INTO theloai (ma_tloai, ten_tloai) VALUES (:ma_tloai, :ten_tloai)";
                                      $stmt = $conn->prepare($sql);
                                      $stmt->bindParam(':ma_tloai', $ma_tloai);
                                      $stmt->bindParam(':ten_tloai', $ten_tloai);
                                      $stmt->execute();
                   }
}
?>