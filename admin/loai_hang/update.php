
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
</head>

<body>
    <div class="container ">
        <div class="row">
            <h1>CẬP NHẬT LOẠI HÀNG HÓA</h1>
        </div>
        <div class="container row">
            <form action="" method="POST">
                <div class="row ">
                    Mã loại<br>
                    <input class="form-control" type="text" name="maloai" value="<?= $getOneTB['ma_loai'] ?? ''; ?>">
                </div>
                <div class="row ">
                    Tên loại <br>
                    <input class="form-control" type="text" name="tenloai" value="<?= $getOneTB['ten_loai'] ?? ''; ?>">
                </div>
                <div class="row m-3 ">
                    <div class="col text-center">
                        <a href=""></a>
                        <input class="btn btn-primary" type="submit" name="capnhatlh" value="cập nhật">
                        <a href=""><input class="btn btn-primary" type="reset" value="Nhập Lại"></a>
                        <a href="index.php?pg=listlh">
                            <input class="btn btn-primary" type="button" value="Danh Sách">
                        </a>
                    </div>
                    
                </div>


            </form>
        </div>

    </div>

</body>

</html>