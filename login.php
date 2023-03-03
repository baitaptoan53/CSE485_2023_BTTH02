<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="./assets/css/app-creative.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

    <div class="auth-fluid">
        <!--Auth fluid left content -->
        <div class="auth-fluid-form-box">
            <div class="align-items-center d-flex h-100">
                <div class="card-body">

                    <!-- Logo -->
                    <div class="auth-brand text-center text-lg-left">
                        <a href="index.html" class="logo-dark">
                            <span><img src="images/logo.png" alt="" height="24"></span>
                        </a>
                    </div>

                    <!-- title-->
                    <h4 class="mt-0">Đăng Nhập</h4>
                    <p class="text-muted mb-4">Nhập địa chỉ email và mật khẩu của bạn để truy cập tài khoản.</p>
                    <?php
                    require_once("connection.php"); 
                    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                        if (isset($_POST['email']) && isset($_POST['password'])) {
                            $email = trim($_POST['email']);
                            $password = trim($_POST['password']);
                            $sql = "SELECT * FROM users WHERE email = '$email'";
                            $stmt = $conn->query($sql);
                            $row = $stmt->fetch_assoc();
                            if ($row['level'] == 1) {
                                if (password_verify($password, $row['password'])) {
                                    echo '<script>
                                   var confirmMsg = confirm("Đăng nhập thành công","Thông báo");
                                   if(confirmMsg==true){
                                    window.location.href = "./admin/index.php";
                                   }else{
                                    window.location.href = "login.php";
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
                    ?>
                    <!-- form -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="emailaddress">Email</label>
                            <input class="form-control" type="email" id="emailaddress" required="" placeholder="Nhập email" name="email">
                        </div>
                        <div class="form-group">
                            <a href="pages-recoverpw-2.html" class="text-muted float-right"><small>Bạn quên mật khẩu ?</small></a>
                            <label for="password">Mật khẩu</label>
                            <input class="form-control" type="password" required="" id="password" placeholder="Nhập mật khẩu" name="password">
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox-signin">
                                <label class="custom-control-label" for="checkbox-signin">Nhớ tài khoản</label>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit" name="submit"><i class="mdi mdi-login"></i> Log In </button>
                        </div>
                        <!-- social-->
                        <div class="text-center mt-4">
                            <p class="text-muted font-16">Đăng kí với</p>
                            <ul class="social-list list-inline mt-3">
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="fa-brands fa-facebook"></i></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="fa-brands fa-google"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="fa-brands fa-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="fa-brands fa-github"></i></a>
                                </li>
                            </ul>
                        </div>
                    </form>
                    <!-- end form-->

                    <!-- Footer-->
                    <footer class="footer footer-alt">
                        <p class="text-muted">Don't have an account? <a href="register.php" class="text-muted ml-1"><b>Sign Up</b></a></p>
                    </footer>

                </div> <!-- end .card-body -->
            </div> <!-- end .align-items-center.d-flex.h-100-->
        </div>
        <!-- end auth-fluid-form-box-->

        <!-- Auth fluid right content -->
        <div class="auth-fluid-right text-center">
            <div class="auth-user-testimonial">
                <h2 class="mb-3">Nghe nhạc online mễn phí</h2>
                <p class="lead"><i class="mdi mdi-format-quote-open"></i>Không lo các quảng cáo giữa chừng làm chúng ta khó chịu .<i class="mdi mdi-format-quote-close"></i>
                </p>
                <p>
                    TLU'S MUSIC GARDEN
                </p>
            </div> <!-- end auth-user-testimonial-->
        </div>
        <!-- end Auth fluid right content -->
    </div>
    <!-- end auth-fluid-->


</body>

</html>