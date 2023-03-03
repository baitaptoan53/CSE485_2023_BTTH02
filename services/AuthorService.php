<?php
    require_once("./configs/DBConnection.php");
    require_once('./models/Author.php');

    // require_once("../configs/DBConnection.php"); //test
    // require_once('../models/Author.php');
    class AuthorService{
        public function getAllAuthor($type = 'multi',$columnName=null,$condition=null){
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();

            $sql = "";
            if($type =='multi'){
                $sql = "SELECT * FROM tacgia";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
            }elseif($type =='single' && $columnName != null){
                $sql = "SELECT * FROM tacgia WHERE $columnName = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$condition]);
            }
            $newArray =[];
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $array = [];
                $author = new Author($row['ma_tgia'],$row['ten_tgia'],$row['hinh_tgia']);
                $array = [
                    'ma_tgia'=> $author->getMa_tgia(),
                    'ten_tgia'=> $author->getTen_tgia(),
                    'hinh_tgia'=> $author->getHinh_tgia(),
                ]; 
                array_push($newArray,$array);
            }
            return $newArray;
        }
    }
$author = new AuthorService();
?>