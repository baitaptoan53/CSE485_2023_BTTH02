<!DOCTYPE html>
<html lang="en">


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php include_once('../layouts/header.php');?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->

        <form action=add_category.php method=POST>
            <div class="row">
                <div class="col-sm">
                    <h3 class="text-center text-uppercase fw-bold">Thêm mới thể loại</h3>
                    <form action="process_add_category.php" method="post">
                        <div class="input-group mt-3 mb-3">
                            <span class="input-group-text" id="lblCatName">Tên thể loại</span>
                            <input type="text" class="form-control" name="ten_tloai">
                        </div>
                        <div class="form-group  float-end ">
                            <input type="submit" value="Thêm" class="btn btn-success">
                            <a href="category.php" class="btn btn-warning ">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </form>

    </main>
    <?php include_once('../layouts/footer.php');?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>


</html>