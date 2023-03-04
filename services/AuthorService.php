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

        public function add($ten_tgia,$hinh_tgia){
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();

            $sql = "INSERT INTO tacgia(ten_tgia,hinh_tgia) VALUES(?,?)";
            $stmt = $conn->prepare($sql);
            if($stmt->execute([$ten_tgia,$hinh_tgia])){
                header("location: ./index.php?controller=author");
            }else{
                echo "<script>alert('Thêm thất bại!!')</script>";
            }
        }
        public function edit($ma_tgia,$ten_tgia,$hinh_tgia){
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();

            $sql = "UPDATE tacgia SET ten_tgia =?,hinh_tgia=? WHERE ma_tgia =?";
            $stmt = $conn->prepare($sql);
            if (!$stmt->execute([$ten_tgia,$hinh_tgia,$ma_tgia])){
                echo "<script>alert('Sửa thất bại')</script>";
            }else{
                header('location: index.php?controller=author');
            }
        }
        public function delete($ma_tgia){
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();

            $sql = "DELETE FROM tacgia WHERE ma_tgia=?";
            $stmt = $conn->prepare($sql);

            $sql1 = "DELETE FROM baiviet WHERE ma_tgia=?";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->execute([$ma_tgia]);
            if(!$stmt->execute([$ma_tgia])){
                echo "<script>alert('Thêm thất bại')</script>";
            }else{
                header('location: index.php?controller=author');
            }
        }
    }
$author = new AuthorService();
require_once("AllService.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['ten_tgia']) && isset($_POST['hinh_tgia']) && $_POST['isAction'] == 'add'){
        $ten_tgia = $_POST['ten_tgia'];
        $hinh_tgia = $_POST['hinh_tgia'];

        $allService->delForeiginKey('baiviet','baiviet_ibfk_2');
        $allService->addAutoPrimaryKey('tacgia','ma_tgia');
        $author->add($ten_tgia,$hinh_tgia);
        $allService->addForeiginKey('baiviet','ma_tgia','tacgia','ma_tgia','baiviet_ibfk_2');
        $allService->delAutoPrimaryKey('tacgia','ma_tgia');
    }elseif(isset($_POST['txtCatId']) && isset($_POST['txtCatName']) && isset($_POST['txtCatImg']) && $_POST['isAction'] == 'edit'){
        $txtCatId = $_POST['txtCatId'];
        $txtCatName = $_POST['txtCatName'];
        $txtCatImg = $_POST['txtCatImg'];

        $author->edit($txtCatId,$txtCatName,$txtCatImg);
    }
}
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['id']) && isset($_GET['ten_tgia']) && $_GET['action']=='edit'){
        $id = $_GET['id'];
        $ten_tgia = $_GET['ten_tgia'];
    }
    elseif(isset($_GET['id']) && $_GET['action']=='delete'){
        $id = $_GET['id'];

        $author->delete($id);
    }
}
?>