<?php
include ("/configs/BDConnection.php");	
include  ("/models/Category.php");
class CategoryService{
                   public function getAllCategory(){
                                      $dbConn = new BDConnection();
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
}
?>