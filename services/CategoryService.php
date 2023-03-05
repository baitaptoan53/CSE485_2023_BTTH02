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

        public function add($ten_tloai){
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();

            $sql = "INSERT INTO theloai(ten_tloai) VALUES(?)";
            $stmt = $conn->prepare($sql);
            if (!$stmt->execute([$ten_tloai])){
                echo "<script>alert('Thêm thất bại')</script>";
            }else{
                header('location: index.php?controller=category');
            }
        }

        public function edit($ma_tloai,$ten_tloai){
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();

            $sql = "UPDATE theloai SET ten_tloai =? WHERE ma_tloai =?";
            $stmt = $conn->prepare($sql);
            if (!$stmt->execute([$ten_tloai,$ma_tloai])){
                echo "<script>alert('Sửa thất bại')</script>";
            }else{
                header('location: index.php?controller=category');
            }
        }
        public function delete($ma_tloai){
            $dbconn = new DBConnection();
            $conn = $dbconn->getConnection();

            $sql = "DELETE FROM theloai WHERE ma_tloai=?";
            $stmt = $conn->prepare($sql);
            
            $sql1 = "DELETE FROM baiviet WHERE ma_tloai=?";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->execute([$ma_tloai]);

            if(!$stmt->execute([$ma_tloai])){
                echo "<script>alert('Thêm thất bại')</script>";
            }else{
                header('location: index.php?controller=category');
            }
        }
    }
$category = new CategoryService();
require_once("AllService.php");
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['txtCatName']) && $_POST['isAction']=='add') {
        $txtCatName = $_POST['txtCatName'];

        $allService->delForeiginKey('baiviet','baiviet_ibfk_1');
        $allService->addAutoPrimaryKey('theloai','ma_tloai');
        $category->add($txtCatName);
        $allService->addForeiginKey('baiviet','ma_tloai','theloai','ma_tloai','baiviet_ibfk_1');
        $allService->delAutoPrimaryKey('theloai','ma_tloai');
    }elseif(isset($_POST['txtCatId']) && isset($_POST['txtCatName']) && $_POST['isAction']== 'edit'){
        $txtCatId = $_POST['txtCatId'];
        $txtCatName = $_POST['txtCatName'];

        $category->edit($txtCatId,$txtCatName);
    }
}

$id = $ten_tloai = '';
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_GET['id'])&& isset($_GET['ten_tloai']) && $_GET['action'] == 'edit'){
        $id = $_GET['id'];
        $ten_tloai = $_GET['ten_tloai'];
    }elseif(isset($_GET['id'])&& $_GET['action'] == 'delete'){
        $id = $_GET['id'];

        $category->delete($id);
    }
}
?>

