<?php
require_once 'models/Authorization.php';
require_once("./configs/DBConnection.php");
class AuthorizationService
{
        public function index()
        {
        }
        public function login($email, $password)
        {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (isset($_POST['email']) && isset($_POST['password'])) {
                                $email = trim($_POST['email']);
                                $password = trim($_POST['password']);
                                $conn = new DBConnection();
                                $conn = $conn->getConnection();
                                $sql = "SELECT * FROM users WHERE email = '$email'";
                                $statement = $conn->query($sql); // Execute
                                $statement->setFetchMode(PDO::FETCH_OBJ); // Fetch mode
                                $member = $statement->fetch();
                                if ($member->level == 1) {
                                        if (password_verify($password, $member->password)) {
                                                header("Location: ?controller=homeAdmin");
                                        } else {

                                                echo "<script>alert('Đăng nhập thất bại')</script>";
                                        }
                                }
                                if ($member->level == 0) {
                                        if (password_verify($password, $member->password)) {
                                                header("Location: ?controller=home");
                                        } else {
                                                echo "<script>alert('Đăng nhập thất bại')</script>";
                                        }
                                }
                        }
                }
        }
        public function createuser($usersname, $email, $password)
        {
                $conn = new DBConnection();
                $conn = $conn->getConnection();
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $error = false;
                        $usersname = $_POST['usersname'];
                        $email = $_POST['email'];
                        $password = $_POST['password'];
                        // kiểm tra email đã tồn tại chưa
                        $sql = "SELECT * FROM users WHERE email = '$email'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        if ($count > 0) {
                                header("Location: ?controller=authorization&action=register");
                                $error = true;
                                $error_email = true;
                                echo "<script>alert('Email đã tồn tại')</script>";
                        }
                        // kiểm tra tên tài khoản đã tồn tại chưa
                        $sql = "SELECT * FROM users WHERE usersname = '$usersname'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $count = $stmt->rowCount();
                        if ($count > 0) {
                                header("Location: ?controller=authorization&action=register");
                                $error = true;
                                $error_username = true;
                                echo "<script>alert('Tên tài khoản đã tồn tại')</script>";
                        }
                        if ($error == false) {
                                $password = password_hash($password, PASSWORD_DEFAULT);
                                $sql = "INSERT INTO users (user_id,usersname, email, password) VALUES ('','$usersname', '$email', '$password')";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                header("Location: ?controller=authorization");
                        }
                }
        }
}
