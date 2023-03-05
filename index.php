
<!-- Routing là gì? Định tuyến/Điều hướng -->
<!-- Phân tích xem: URL của người dùng > Muốn gì -->
<!-- Ví dụ: Trang chủ, Quản lý bài viết hay Thêm bài viết -->
<!-- Chuyển quyền cho Controller tương ứng điều khiển tiếp -->
<!-- URL của tôi thiết kế luôn có dạng: -->

<!-- http://localhost/btth02v2/index.php?controller=A&action=B -->
<!-- http://localhost/btth02v2/index.php -->
<!-- http://localhost/btth02v2/index.php?controller=home&action=index -->

<!-- Controller là tên của FILE controller mà chúng ta sẽ gọi -->
<!-- Action là tên cả HÀM trong FILE controller mà chúng ta gọi -->
<?php
// B1: Bắt giá trị controller và action
$controller = ucfirst(isset($_REQUEST['controller']) ? strtolower($_REQUEST['controller']) : 'home');
$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'index';
// B2: Chuẩn hóa tên trước khi gọi
$controller .= 'Controller';
$controllerPath = './controllers/'.$controller.'.php';
// B3. Để gọi nó Controller
if(!file_exists($controllerPath)){
    die("Không tìm thấy file $controllerPath");
}
require_once($controllerPath);
// B4. Tạo đối tượng và gọi hàm của Controller
$myObj = new $controller();

$myObj->$action();
$myObj->$action();
?>
