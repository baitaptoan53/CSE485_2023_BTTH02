<?php
include '../configs/DBConnection.php';
$conn = (new DBConnection())->getConnection();

// số bản ghi trên 1 trang
$numberofrecords = 10;

if (!isset($_POST['searchTerm'])) {

  // lấy tất cả bản ghi với giới hạn là $numberofrecords
  $stmt = $conn->prepare("select * from theloai order by ten_tloai limit :limit");
  $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
  $stmt->execute();
  $ten_tloai = $stmt->fetchAll();
} else {
  $search = $_POST['searchTerm']; // Search text

  // lấy bản ghi theo từ khóa tìm kiếm
  $stmt = $conn->prepare("SELECT * FROM theloai WHERE ten_tloai like :ten_tloai ORDER BY ten_tloai LIMIT :limit");
  $stmt->bindValue(':ten_tloai', '%' . $search . '%', PDO::PARAM_STR);
  $stmt->bindValue(':limit', (int)$numberofrecords, PDO::PARAM_INT);
  $stmt->execute();
  $ten_tloai = $stmt->fetchAll();
}

$response = array();

// đọc dữ liệu từ mảng 
foreach ($ten_tloai as $user) {
  $response[] = array(
    "id" => $user['ma_tloai'],
    "text" => $user['ten_tloai']
  );
}

echo json_encode($response);
exit();