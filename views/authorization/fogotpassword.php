<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="\CSE485_2023_BTTH02\assets\css\app-creative.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="authentication-bg pb-0" data-layout-config='{"darkMode":false}'>

<div class="auth-fluid">
    <!--Auth fluid left content -->
    <div class="auth-fluid-form-box">
        <div class="align-items-center d-flex h-100">
            <div class="card-body">

                <!-- Logo -->
                <!-- Logo -->
                <div class="auth-brand text-center text-lg-left">
                        <a href="?controller=home" class="logo-dark">
                            <span><img src="\CSE485_2023_BTTH02\assets\images\logo.png" alt="" height="24"></span>
                        </a>
                    </div>

                <!-- title-->
                <h4 class="mt-0">Đặt lại mật khẩu</h4>
                <p class="text-muted mb-4">
Nhập địa chỉ email của bạn và chúng tôi sẽ gửi cho bạn một email có hướng dẫn để đặt lại mật khẩu của bạn.</p>

                <!-- form -->
                <form action="#">
                    <div class="form-group mb-3">
                        <label for="emailaddress">Địa chỉ email</label>
                        <input class="form-control" type="email" id="emailaddress" required="" placeholder="Nhập địa chỉ email">
                    </div>
                    <div class="form-group mb-0 text-center">
                        <button class="btn btn-primary btn-block" type="submit"><i class="mdi mdi-lock-reset"></i> Đặt lại mật khẩu </button>
                    </div>
                    
                </form>
                <!-- end form-->

                <!-- Footer-->
                <footer class="footer footer-alt">
                    <p class="text-muted">Trở lại để  <a href="?controller=authorization&action=index" class="text-muted ml-1"><b>Đăng nhập</b></a></p>
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

<!-- bundle -->
<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/app.min.js"></script>

</body>

</html>