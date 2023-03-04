<?php

require_once("configs/DBConnection.php");
require("models/Author.php");
class AuthorService
{
                   public function getAllAuthor()
                   {
                                      $dbConn = new DBConnection();
                                      $conn = $dbConn->getConnection();
                                      $sql = "SELECT * FROM tacgia";
                                      $stmt = $conn->prepare($sql);
                                      $stmt->execute();
                                      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                      $authors = [];
                                      foreach ($result as $row) {
                                                         $author = new Author($row['ma_tgia'], $row['ten_tgia'], $row['hinh_tgia']);
                                                         array_push($authors, $author);
                                      }
                                      return $authors;
                   }
                   public function createAuthor($ma_tgia, $ten_tgia)
                   {
                                      $dbConn = new DBConnection();
                                      $conn = $dbConn->getConnection();
                                      $sql = "INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (:ma_tgia, :ten_tgia)";
                                      $stmt = $conn->prepare($sql);
                                      $stmt->bindParam(':ma_tgia', $ma_tgia);
                                      $stmt->bindParam(':ten_tgia', $ten_tgia);
                                      $stmt->execute();
                   }
                   public function deleteAuthor($ma_tgia)
                   {
                                      $dbConn = new DBConnection();
                                      $conn = $dbConn->getConnection();
                                      $sql = "DELETE FROM tacgia WHERE ma_tgia = :ma_tgia";
                                      $stmt = $conn->prepare($sql);
                                      $stmt->bindParam(':ma_tgia', $ma_tgia);
                                      $stmt->execute();
                   }
                   public function editAuthor($ma_tgia)
                   {
                                      $dbConn = new DBConnection();
                                      $conn = $dbConn->getConnection();
                                      $sql = "UPDATE tacgia SET ten_tgia = :ten_tgia WHERE ma_tgia = :ma_tgia AND hinh_tgia = :hinh_tgia";
                                      $stmt = $conn->prepare($sql);
                                      $stmt->bindParam(':ma_tgia', $ma_tgia);
                                      $stmt->bindParam(':ten_tgia', $ten_tgia);
                                      $stmt->bindParam(':hinh_tgia', $hinh_tgia);
                                      $stmt->execute();
                   }
                   public function updateAuthor($ma_tgia, $ten_tgia, $hinh_tgia)
                   {
                                      $dbConn = new DBConnection();
                                      $conn = $dbConn->getConnection();
                                      $sql = "UPDATE tacgia SET ten_tgia = :ten_tgia, hinh_tgia = :hinh_tgia WHERE ma_tgia = :ma_tgia";
                                      $stmt = $conn->prepare($sql);
                                      $stmt->bindParam(':ma_tgia', $ma_tgia);
                                      $stmt->bindParam(':ten_tgia', $ten_tgia);
                                      $stmt->bindParam(':hinh_tgia', $hinh_tgia);
                                      $stmt->execute();
                   }

}
?>