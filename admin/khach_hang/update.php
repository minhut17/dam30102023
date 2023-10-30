<?php 
extract($getOneTBKH)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1 class="m-3 text-center">QUẢN LÝ KHÁCH HÀNG SỬA</h1>
       
        <form action="" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6">
                <div> Mã Khách Hàng<br>
                    <input class="form-control" name="ma_kh" class="form-control" disabled type="text" ><br>

                </div>
                <div>
                   Mật Khẩu<br>
                    <input class="form-control" name="password" class="form-control" type="password" value="<?=$mat_khau?>" >
                    <br>
                </div>
                <div>
                  Địa chỉ email<br>
                    <input class="form-control" name="email" class="form-control" type="email" value="<?=$email?>">
                    <br>
                </div>
                <div>
                    <label for="">Kích Hoạt</label>
                    <div class="form-control">
                        <label class="radio-inline"><input name="kich_hoat" value="<?=$kich_hoat?>" type="radio"> chưa kích hoạt</label>
                        <label class="radio-inline"><input name="kich_hoat" value="<?=$kich_hoat?>" type="radio" checked> kích hoạt</label>
                    </div>

                </div>


            </div>
            <div class="col-md-6">
                <div> Họ Và Tên <br>
                    <input class="form-control" name="name" type="text"value="<?=$ho_ten?>"><br>
                </div>
                <!-- <div>
                    Xác Nhận Mật Khẩu<br>
                    <input class="form-control" name="xacnhanpass" type="password">
                    <br>
                </div> -->
                <div> Hình Ảnh <br>
                    <input class="form-control" name="thumbnail" type="file" value="<?=$hinh?>"><br>
                </div>
                <div>
                    <label for="">Vai Trò</label>
                    <div class="form-control">
                        <label class="radio-inline"><input name="vai_tro" value="<?=$vai_tro?>" type="radio"> khách Hàng </label>
                        <label class="radio-inline"><input name="vai_tro"value="<?=$vai_tro?>" type="radio" checked> Nhân Viên</label>
                    </div>

                </div>


           

        </div>
       
        <div class="row">
        <div class="row m-3  ">
                    <div class="col text-center">
                        <a href=""><input class="btn btn-primary" type="submit" name="capnhatkhachhang" value="Cập Nhật"></a>
                        <a href=""><input class="btn btn-primary" type="reset" value="Nhập Lại"></a>
                        <a href="index.php?pg=listkh">
                            <input class="btn btn-primary" type="button" value="Danh Sách">
                        </a>
                    </div>

                </div>
        </div>
        <div class="row">
        <?php 
      
        
        ?>
              
        </div>


        </form>

       
    </div>
    </div>
</body>

</html>