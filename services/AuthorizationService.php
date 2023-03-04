<?php
require_once 'models/Authorization.php';
require_once("./configs/DBConnection.php");
class AuthorizationService
{
                   public function index()
                   {
                                      $conn = new DBConnection();
                                      $conn = $conn->getConnection();
                                      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                                         if (isset($_POST['email']) && isset($_POST['password'])) {
                                                                            $email = trim($_POST['email']);
                                                                            $password = trim($_POST['password']);
                                                                            $sql = "SELECT * FROM users WHERE email = '$email'";
                                                                            $stmt = $conn->prepare($sql);
                                                                            $stmt->execute();
                                                                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                                            if ($row['level'] == 1) {
                                                                                               if (password_verify($password, $row['password'])) {
                                                                                                                  echo '<script>
                                                                    var confirmMsg = confirm("Đăng nhập thành công","Thông báo");
                                                                    if(confirmMsg==true){
                                                                     window.location.href = "./admin/index.php";
                                                                    }else{
                                                                     window.location.href = "?controller=home";
                                                                    }
                                                                 </script>';
                                                                                               } else {
                                                                                                                  echo "<script>alert('Đăng nhập thất bại')</script>";
                                                                                               }
                                                                            }
                                                                            if ($row['level'] == 0) {
                                                                                               if (password_verify($password, $row['password'])) {
                                                                                                                  echo '<script>
                                                                    var confirmMsg = confirm("Đăng nhập thành công","Thông báo");
                                                                    if(confirmMsg==true){
                                                                     window.location.href = "./index.php";
                                                                    }else{
                                                                     window.location.href = "login.php";
                                                                    }
                                                                 </script>';
                                                                                               } else {
                                                                                                                  echo "<script>alert('Đăng nhập thất bại')</script>";
                                                                                               }
                                                                            }
                                                         }
                                      }
                   }
                   public function register()
                   {
                                      $error_email = false;
                                      $error_username = false;
                                      $conn = new DBConnection();
                                      $conn = $conn->getConnection();
                                      if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['usersname']) && isset($_POST['emailaddress']) && isset($_POST['password'])) {
                                                         $error = false;
                                                         $usersname = $_POST['usersname'];
                                                         $email = $_POST['emailaddress'];
                                                         $password = $_POST['password'];
                                                         // kiểm tra email đã tồn tại chưa
                                                         $sql = "SELECT * FROM users WHERE email = '$email'";
                                                         $stmt = $conn->prepare($sql);
                                                         $stmt->execute();
                                                         $count = $stmt->rowCount();
                                                         if ($count > 0) {
                                                                            $error = true;
                                                                            $error_email = true;
                                                         }
                                                         // kiểm tra tên tài khoản đã tồn tại chưa
                                                         $sql = "SELECT * FROM users WHERE usersname = '$usersname'";
                                                         $stmt = $conn->prepare($sql);
                                                         $stmt->execute();
                                                         $count = $stmt->rowCount();
                                                         if ($count > 0) {
                                                                            $error = true;
                                                                            $error_username = true;
                                                         }
                                                         if ($error == false) {
                                                                            $password = password_hash($password, PASSWORD_DEFAULT);
                                                                            $sql = "INSERT INTO users (user_id,usersname, email, password) VALUES ('','$usersname', '$email', '$password')";
                                                                            $stmt = $conn->prepare($sql);
                                                                            $stmt->execute();
                                                                            header("Location: ?controller=authorization&action=login");
                                                         }
                                      }
                   }
}
