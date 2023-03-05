<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông tin các bài viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>

<body>
    <?php require_once("../CSE485_2023_BTTH02/views/layout/header.php") ?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <a href="./index.php?controller=article&action=add" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề </th>
                            <th scope="col">Tên bài hát </th>
                            <th scope="col">Mã thể loại </th>
                            <th scope="col">Tóm tắt </th>
                            <th scope="col">Nội dung </th>
                            <th scope="col">Mã tác giả </th>
                            <th scope="col">Ngày viết</th>
                            <th scope="col">Hình ảnh</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($article->getAllArticle() as $value) {
                            $img = '';
                            if ($value['hinhanh'] == null) {
                                $img = 'https://www.gravatar.com/avatar/3b3be63a4c2a439b013787725dfce802?d=identicon';
                            } else {
                                $img = $value['hinhanh'];
                            }
                            echo '
                                <tr>
                                   <th scope="row">' . $value['ma_bviet'] . '</th>
                                   <th scope="row">' . $value['tieude'] . '</th>
                                   <td>' . $value['ten_bhat'] . '</td>
                                   <td>' . $value['ma_tloai'] . '</td>
                                   <td>' . $value['tomtat'] . '</td>
                                   <td>' . $value['noidung'] . '</td>
                                   <td>' . $value['ma_tgia'] . '</td>
                                   <td>' . $value['ngayviet'] . '</td>
                                   <td><img src="' . $img . '" alt=""></td>
                                   <td><a href="./index.php?controller=article&action=edit&ma_bviet=' . $value['ma_bviet'] . '&ma_tloai=' . $value['ma_tloai'] . '&ma_tgia=' . $value['ma_tgia'] . '" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
                                   <td><a href="./index.php?controller=article&action=delete&ma_bviet=' . $value['ma_bviet'] . '" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a></td>
                                </tr> 
                                ';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <?php require_once("../CSE485_2023_BTTH02/views/layout/footer.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</body>

</html>