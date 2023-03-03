<?php
require_once("./configs/DBConnection.php");
require_once("./models/Category.php");
    class CategoryService{
        public function getAllCategory($type = 'multi',$columnName=null,$condition=null){
            $dbcon = new DBConnection;
            $conn = $dbcon->getConnection();

            $sql = '';
            if($type == 'multi'){
                $sql = "SELECT * FROM theloai";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
            }elseif($type == 'single' && $columnName != null){
                $sql = "SELECT * FROM theloai WHERE $columnName =?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$condition]);
            }
            $newArray = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $array = [];
                $category = new Category($row['ma_tloai'],$row['ten_tloai']);
                $array = [
                    'ma_tloai' => $row['ma_tloai'],
                    'ten_tloai' => $row['ten_tloai']
                ];
                array_push($newArray,$array);
            }
            return $newArray;
        }
    }
$category = new CategoryService();
?>