<?php
include '../configs/DBConnection.php';
$conn = (new DBConnection())->getConnection();
// số bản ghi trên 1 trang
$numberofrecords = 10;

if (!isset($_POST['searchTerm'])) {

  // lấy tất cả bản ghi với giới hạn là $numberofrecords
  $stmt = $conn->prepare("select * from tacgia order by ten_tgia limit :limit");
  $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
  $stmt->execute();
  $ten_tgia = $stmt->fetchAll();
} else {
  $search = $_POST['searchTerm']; // Search text

  // lấy bản ghi theo từ khóa tìm kiếm
  $stmt = $conn->prepare("SELECT * FROM tacgia WHERE ten_tgia like :ten_tgia ORDER BY ten_tgia LIMIT :limit");
  $stmt->bindValue(':ten_tgia', '%' . $search . '%', PDO::PARAM_STR);
  $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
  $stmt->execute();
  $ten_tgia = $stmt->fetchAll();
}

$response = array();

// đọc dữ liệu từ mảng 
foreach ($ten_tgia as $user) {
  $response[] = array(
    "id" => $user['ma_tgia'],
    "text" => $user['ten_tgia']
  );
}
echo json_encode($response);
exit();