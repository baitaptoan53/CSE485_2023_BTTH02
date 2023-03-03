<?php
require_once("./configs/DBConnection.php");
require_once('./models/Author.php');

// require_once("../configs/DBConnection.php"); //test
// require_once('../models/Author.php');
    class HomeAdminService{
        public function countGlobal($type = 'multi',$nameTable=null,$columnName = null , $condition = null){
            $dbcon = new DBConnection();
            $conn = $dbcon->getConnection();
    
            $sql = "";
            if ($type == 'multi'){
                $sql = "SELECT * FROM $nameTable";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
            }elseif($type == 'single' && $columnName != null){
                $sql = "SELECT * FROM $nameTable WHERE $columnName = ?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$condition]);
            }
            return $stmt->rowCount();
        }
    }
    $homeAdmin = new HomeAdminService();

    $countArticle = $homeAdmin->countGlobal('multi','baiviet');
    $coutAuthor = $homeAdmin->countGlobal('multi','tacgia');
    $coutCategory = $homeAdmin->countGlobal('multi','theloai');
    $coutUser = $homeAdmin->countGlobal('multi','users');
?>