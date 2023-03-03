<?php
require_once("configs/BDConnection.php");
require("models/Author.php");
class AuthorService
{
                   public function getAllAuthor(): array
                   {
                                      $dbConn = new DBConnection();
                                      $conn = $dbConn->getConnection();
                                      $sql = "SELECT * FROM tacgia";
                                      $stmt = $conn->prepare($sql);
                                      $stmt->execute();
                                      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                      $authors = [];
                                      foreach ($result as $row) {
                                                     $author = new Author();
                                                     $author->setMa_tgia($row['ma_tgia']);
                                                     $author->setTen_tgia($row['ten_tgia']);
                                                     $author->setHinh_tgia($row['hinh_tgia']);
                                                     $authors[] = $author;
                                      }
                                      return $authors;
                   }
                   public function createAuthor($ma_tgia, $ten_tgia): void
                   {
                                      $dbConn = new DBConnection();
                                      $conn = $dbConn->getConnection();
                                      $sql = "INSERT INTO tacgia (ma_tgia, ten_tgia) VALUES (:ma_tgia, :ten_tgia)";
                                      $stmt = $conn->prepare($sql);
                                      $stmt->bindParam(':ma_tgia', $ma_tgia);
                                      $stmt->bindParam(':ten_tgia', $ten_tgia);
                                      $stmt->execute();
                   }
                   public function deleteAuthor($ma_tgia): void
                   {
                                      $dbConn = new DBConnection();
                                      $conn = $dbConn->getConnection();
                                      $sql = "DELETE FROM tacgia WHERE ma_tgia = :ma_tgia";
                                      $stmt = $conn->prepare($sql);
                                      $stmt->bindParam(':ma_tgia', $ma_tgia);
                                      $stmt->execute();
                   }
                   public function editAuthor($ma_tgia, $ten_tgia, $hinh_tgia): void
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
}
