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
                                if (password_verify($password, $member->password)) {
                                        if ($member->level == 1) {
                                                header("Location: ?controller=homeAdmin");
                                        }
                                        if ($member->level == 0) {
                                                header("Location: ?controller=home");
                                        }
                                } else {
                                        echo "<script>
                                        alert('Sai tài khoản hoặc mật khẩu');
                                        window.location.href='?controller=authorization&action=index';
                                        </script>";
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
                        $count_email = $stmt->rowCount();
                        if ($count_email > 0) {
                                $error = true;
                                echo "<script>
                                        alert('Email đã tồn tại');
                                        window.location.href='?controller=authorization&action=register';
                                        </script>";
                        }
                        // kiểm tra tên tài khoản đã tồn tại chưa
                        $sql = "SELECT * FROM users WHERE usersname = '$usersname'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $count_usersname = $stmt->rowCount();
                        if ($count_usersname > 0) {
                                $error = true;
                                echo "<script>
                                        alert('Tên tài khoản đã tồn tại');
                                        window.location.href='?controller=authorization&action=register';
                                        </script>";
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
