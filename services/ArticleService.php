<?php
require_once("./configs/DBConnection.php");
require_once('./models/Article.php');

// require_once("../configs/DBConnection.php");//test
// require_once('../models/Article.php');
class ArticleService
{
    public function getAllArticle($type = 'multi', $columnName = null, $condition = null)
    {
        $dbconn = new DBConnection();
        $conn = $dbconn->getConnection();
        $sql = "";
        if ($type == 'multi') {
            $sql = "SELECT * FROM baiviet";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
        } elseif ($type == 'single' && $columnName != null) {
            $sql = "SELECT * FROM baiviet WHERE $columnName = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$condition]);
        }

        $newArray = [];
        if ($stmt->execute()) {
            $array = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $a = new Article($row['ma_bviet'], $row['tieude'], $row['ten_bhat'], $row['ma_tloai'], $row['tomtat'], $row['noidung'], $row['ma_tgia'], $row['ngayviet'], $row['hinhanh']);
                $array = [
                    'ma_bviet' => $a->getMa_bviet(),
                    'tieude' => $a->getTieude(),
                    'ten_bhat' => $a->getTen_bhat(),
                    'ma_tloai' => $a->getMa_tloai(),
                    'tomtat' => $a->getTomtat(),
                    'noidung' => $a->getNoidung(),
                    'ma_tgia' => $a->getMa_tgia(),
                    'ngayviet' => $a->getNgayviet(),
                    'hinhanh' => $a->gethinhanh(),
                ];
                array_push($newArray, $array);
            }
        } else {
            echo "<script>alert('Select that bai')</script>";
        }
        return $newArray;
    }

    public function update($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh, $ma_bviet)
    {
        $dbcon = new DBConnection();
        $conn = $dbcon->getConnection();

        $sql = "UPDATE baiviet SET tieude=?,ten_bhat=?,ma_tloai=?,tomtat=?,noidung=?,ma_tgia=?,ngayviet=?,hinhanh=? WHERE ma_bviet=?";
        $stmt = $conn->prepare($sql);
        if (!$stmt->execute([$tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh, $ma_bviet])) {
            echo "<script>alert('Xửa thất bại!!!')</script>";
        }
        ;
    }
    public function add($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh)
    {
        $dbcon = new DBConnection();
        $conn = $dbcon->getConnection();
        
        $sql = "INSERT INTO baiviet(tieude,ten_bhat,ma_tloai,tomtat,noidung,ma_tgia,ngayviet,hinhanh) 
        VALUE(?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        if (!$stmt->execute([
            $tieude,
            $ten_bhat,
            $ma_tloai,
            $tomtat,
            $noidung,
            $ma_tgia,
            $ngayviet,
            $hinhanh,])) {
            echo "<script>alert('Thêm thất bại!!!')</script>";
        }
    }
    public function delete($ma_bviet){
        $dbcon = new DBConnection();
        $conn = $dbcon->getConnection();
        
        $sql = "DELETE FROM baiviet WHERE ma_bviet =?";
        $stmt = $conn->prepare($sql);
        if (!$stmt->execute([$ma_bviet])) {
            echo "<script>alert('Xóa thất bại!!!')</script>";
        }else{
            header('Location: ./index.php?controller=article');
        }
    }
}
$article = new ArticleService();

$ma_bviet = $ma_tloai = $ma_tgia = '';
if (isset($_GET['ma_bviet']) && isset($_GET['ma_tloai']) && isset($_GET['ma_tgia'])) {
    $ma_bviet = $_GET['ma_bviet'];
    $ma_tloai = $_GET['ma_tloai'];
    $ma_tgia = $_GET['ma_tgia'];
}

$arrayArticle = [];
foreach ($article->getAllArticle('single', 'ma_bviet', $ma_bviet) as $value) {
    $arrayArticle = [
        'tieude' => $value['tieude'],
        'ten_bhat' => $value['ten_bhat'],
        'tomtat' => $value['tomtat'],
        'noidung' => $value['noidung'],
        'ngayviet' => $value['ngayviet'],
        'hinhanh' => $value['hinhanh'],
    ];
}

require_once('CategoryService.php');
require_once('AuthorService.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['ma_bviet'])&&isset($_POST['tieude'])&&isset($_POST['ten_bhat'])&&isset($_POST['ma_tloai'])&&isset($_POST['tomtat'])&&isset($_POST['noidung'])&&isset($_POST['ma_tgia'])&&isset($_POST['ngayviet'])&&isset($_POST['hinhanh'])){
        $ma_bviet = $_POST['ma_bviet'];
        $tieude = $_POST['tieude'];
        $ten_bhat = $_POST['ten_bhat'];
        $ma_tloai = $_POST['ma_tloai'];
        $tomtat = $_POST['tomtat'];
        $noidung = $_POST['noidung'];
        $ma_tgia = $_POST['ma_tgia'];
        $ngayviet = $_POST['ngayviet'];
        $hinhanh = $_POST['hinhanh'];
        $article->update($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh, $ma_bviet);
    }
    else if(!isset($_POST['ma_bviet'])&&isset($_POST['tieude'])&&isset($_POST['ten_bhat'])&&isset($_POST['ma_tloai'])&&isset($_POST['tomtat'])&&isset($_POST['noidung'])&&isset($_POST['ma_tgia'])&&isset($_POST['ngayviet'])&&isset($_POST['hinhanh'])){
        $tieude = $_POST['tieude'];
        $ten_bhat = $_POST['ten_bhat'];
        $ma_tloai = $_POST['ma_tloai'];
        $tomtat = $_POST['tomtat'];
        $noidung = $_POST['noidung'];
        $ma_tgia = $_POST['ma_tgia'];
        $ngayviet = $_POST['ngayviet'];
        $hinhanh = $_POST['hinhanh'];
        
        require_once('AllService.php');
        $allService->addAutoPrimaryKey('baiviet','ma_bviet');
        $article->add($tieude, $ten_bhat, $ma_tloai, $tomtat, $noidung, $ma_tgia, $ngayviet, $hinhanh);
        $allService->delAutoPrimaryKey('baiviet','ma_bviet');
    }
}
if(isset($_GET['action'])){
    $deleteAction = $_GET['action'];
    if($deleteAction=='delete'){
        $ma_bviet = $_GET['ma_bviet'];
        $article->delete($ma_bviet);
    }
}
?>