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
$controller = isset($_GET['controller']) ?   $_GET['controller'] : 'home';
$action     = isset($_GET['action']) ?       $_GET['action'] : 'index';

switch ($controller) {
                   case 'home':
                                      switch ($action) {
                                                         case 'index':
                                                                            require_once('controllers/HomeController.php');
                                                                            $controller = new HomeController();
                                                                            $controller->index();
                                                                            break;
                                      }
                                      
                   case 'category':
                                      switch ($action) {
                                                         case 'index':
                                                                            require_once('controllers/CategoryController.php');
                                                                            $controller = new CategoryController();
                                                                            $controller->index();
                                                                            break;
                                                         case 'create':
                                                                            require_once('controllers/CategoryController.php');
                                                                            $controller = new CategoryController();
                                                                            $controller->create();
                                                                            break;
                                                         case 'edit':
                                                                            require_once('controllers/CategoryController.php');
                                                                            $controller = new CategoryController();
                                                                            $controller->edit();
                                                                            break;
                                                         case 'delete':
                                                                            require_once('controllers/CategoryController.php');
                                                                            $controller = new CategoryController();
                                                                            $controller->delete();
                                                                            break;
                                      }
                   case 'author':
                                      switch ($action) {
                                                         case 'index':
                                                                            require_once('controllers/AuthorController.php');
                                                                            $controller = new AuthorController();
                                                                            $controller->index();
                                                                            break;
                                                         case 'create':
                                                                            require_once('controllers/AuthorController.php');
                                                                            $controller = new AuthorController();
                                                                            $controller->create();
                                                                            break;
                                                         case 'edit':
                                                                            require_once('controllers/AuthorController.php');
                                                                            $controller = new AuthorController();
                                                                            $controller->edit();
                                                                            break;
                                                         case 'delete':
                                                                            require_once('controllers/AuthorController.php');
                                                                            $controller = new AuthorController();
                                                                            $controller->delete();
                                                                            break;
                                      }
}
?>