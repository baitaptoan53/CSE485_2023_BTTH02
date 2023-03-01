<?php
include ("/configs/BDConnection.php");	
include  ("/models/Category.php");
class AuthorService{
                   public function getAllAuthor()
                   {
                                      $dbConn = new DBConnection();
                                      $conn = $dbConn->getConnection();
                                      $sql = "SELECT * FROM tacgia";
                                      $stmt = $conn->query($sql);

                                      $authors = array();
                                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                         $author = new Author($row['ma_tgia'], $row['ten_tgia']);
                                                         array_push($authors, $author);
                                      }
                                      return $authors;
                   }
}
?>