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
require('controllers/HomeController.php');
require('controllers/CategoryController.php');
require('controllers/AuthorController.php');

$controller = isset($_GET['controller']) ?   $_GET['controller'] : 'home';
$action     = isset($_GET['action']) ?       $_GET['action'] : 'index';
switch ($controller) {
                   case 'home':
                                      (new HomeController())->index();
                                      break;
                   case 'author':
                                      switch ($action) {
                                                         case 'index':
                                                                            (new AuthorController())->index();
                                                                            break;
                                                         case 'create':
                                                                            (new AuthorController())->create();
                                                                            break;
                                                         case 'store':
                                                                            (new AuthorController())->store();
                                                                            break;
                                                         case 'edit':
                                                                            (new AuthorController())->edit();
                                                                            break;
                                                         case 'update':
                                                                            (new AuthorController())->update();
                                                                            break;
                                                         case 'delete':
                                                                            (new AuthorController())->delete();
                                                                            break;
                                                         default:
                                                                            echo "Nhập linh tinh gì thế";
                                                                            break;
                                      }
                                      break;
                   case 'category':
                                      switch ($action) {
                                                         case 'index':
                                                                            (new CategoryController())->index();
                                                                            break;
                                                         case 'create':
                                                                            (new CategoryController())->create();
                                                                            break;
                                                         case 'store':
                                                                            (new CategoryController())->store();
                                                                            break;
                                                         case 'edit':
                                                                            (new CategoryController())->edit();
                                                                            break;
                                                         case 'update':
                                                                            (new CategoryController())->update();
                                                                            break;
                                                         case 'delete':
                                                                            (new CategoryController())->delete();
                                                                            break;
                                                         default:
                                                                            echo "Nhập linh tinh gì thế";
                                                                            break;
                                      }
                                      break;
                   default:
                                      echo 'Nhập controller sai rồi';
                                      break;
}

?>