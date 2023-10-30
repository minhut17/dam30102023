<?php

if (is_array($getOneTBHH) && (count($getOneTBHH) > 0)) {
    extract($getOneTBHH);
    if (is_file($hinh)) {
        $hinhupdate = '<img src="' . $hinh . '" width = 90px>';
    } else {
        $hinhupdate = '';
    }

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
</head>

<body>
    <div class="container ">
        <div class="row mt-3 mb-3">
            <h1>CẬP NHẬT HÀNG HÓA</h1>
        </div>
        <div class="container row">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-4">
                        <div>
                            Mã Hàng Hóa <br>
                            <input class="form-control" name="ma_loai" class="form-control" type="text" disabled><br>

                        </div>
                        <div> Mã Hàng Hóa <br>
                            <input class="form-control" name="ma_hh" class="form-control"
                                value="<?= $getOneTBHH['ma_hh'] ?? ''; ?>" type="text"><br>

                        </div>
                        <div>
                            Giảm Giá<br>
                            <input class="form-control" min="0" max="1" step="0.1" name="sale_price"
                                class="form-control" value="<?= $getOneTBHH['giam_gia'] ?? ''; ?>" type="number">
                            <br>
                        </div>



                    </div>
                    <div class="col-md-4">

                        <div> Tên Hàng Hóa <br>
                            <input class="form-control" name="name" value="<?= $getOneTBHH['ten_hh'] ?? ''; ?>"
                                type="text"><br>
                        </div>
                        <div>
                            Hình Ảnh<br>
                            <input class="form-control" name="thumbnail" value='<?= $hinh ?>' type="file">
                            <?= $hinhupdate ?>

                            <br>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div> Đơn Giá <br>
                            <input class="form-control" name="price" value="<?= $getOneTBHH['don_gia'] ?? ''; ?>"
                                type="text"><br>
                        </div>
                        <!-- <div>
                            <br>
                        <select name="ma_loai" class="form-select" aria-label="Default select example">
                            
                            $loai_hang = loai_select_all();
                            foreach ($loai_hang as $loaihang) {
                                extract($loaihang);
                                echo ' <option value="' . $ma_loai . '" selected>' . $ten_loai . '</option>';
                            }
                            
                        </select>
                        </div> -->
                       
                        </div>
                   


                </div>
                <div class="row mt-3 mb-3 ">
                    <div class="form-floating">
                        <textarea class="form-control" name="mo_ta" placeholder="Leave a comment here"
                            id="floatingTextarea2" style="height: 100px"
                            value="<?= $getOneTBHH['mo_ta'] ?? ''; ?>"></textarea>
                        <label for="floatingTextarea2 m-3">Mô Tả</label>
                    </div>
                </div>
                <div class="row">
                    <div class="row m-3  ">
                        <div class="col text-center">
                            <a href=""><input class="btn btn-primary" type="submit" name="capnhat" value="cập nhật"></a>
                            <a href=""><input class="btn btn-primary" type="reset" value="Nhập Lại"></a>
                            <a href="index.php?pg=listhh">
                                <input class="btn btn-primary" type="button" value="Danh Sách">
                            </a>
                        </div>

                    </div>
                </div>


            </form>
        </div>

    </div>

</body>

</html>