<?php
$showgh = viewcart(0);
$td = tongDonHang();

if (isset($_SESSION['khach_hang'])) {
    $ten_nguoi_nhan = $_SESSION['khach_hang']['ho_ten'];
    $diachi_nguoinhan = $_SESSION['khach_hang']['dia_chi'];
    $email_nguoinhan = $_SESSION['khach_hang']['email'];
    $dienthoai_nguoinhan = $_SESSION['khach_hang']['sdt'];
} else {
    $tbchuadangnhap = "Bạn chưa đăng nhập ";
    $ten_nguoi_nhan = "";
    $diachi_nguoinhan = "";
    $email_nguoinhan = "";
    $dienthoai_nguoinhan = "";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffe House</title>
    <link rel="stylesheet" href="../layout/css/style.css">
</head>

<body>

    <div class="containerfull">
        <div class="bgbanner">ĐƠN HÀNG</div>
    </div>

    <section class="containerfull">
        <div class="container">
            <form action="index.php?pg=xndonhang" method="post">
                <div class="row">

                    <div class="col-8 viewcart">
                        <div class="ttdathang">
                            <h2>Thông tin người đặt hàng</h2>
                            <div class="span text-danger">
                                <?php
                                if (isset($tbchuadangnhap)) {
                                    echo $tbchuadangnhap;
                                } else {
                                    $tbchuadangnhap = '';
                                }
                                ?>
                            </div>


                            <label for="hoten"><b>Họ và tên</b></label>
                            <input class="form-control" type="text" placeholder="Nhập họ tên đầy đủ"
                                name="hoten_nguoinhan" id="hoten" value="<?= $ten_nguoi_nhan ?>" required>

                            <label for="diachi"><b>Địa chỉ</b></label>
                            <input class="form-control" type="text" placeholder="Nhập địa chỉ" name="diachi_nguoinhan"
                                id="diachi" value="<?= $diachi_nguoinhan ?>" required>

                            <label for="email"><b>Email</b></label>
                            <input class="form-control" type="text" placeholder="Nhập email" name="email_nguoinhan"
                                id="email" value="<?= $email_nguoinhan ?>" required>

                            <label for="dienthoai"><b>Điện thoại</b></label>
                            <input class="form-control" type="text" placeholder="Nhập điện thoại"
                                name="dienthoai_nguoinhan" id="dienthoai" value="<?= $dienthoai_nguoinhan ?>" required>
                        </div>
                        <!-- <div class="ttdathang">
        <a onclick="showttnhanhang()" style="cursor: pointer;">
        &rArr; Thay đổi thông tin nhận hàng
        </a>
    </div> -->
                        <!-- <div class="ttdathang" id="ttnhanhang">
        <h2>Thông tin người nhận hàng</h2>
      
          <label for="hoten"><b>Họ và tên</b></label>
          <input class="form-control" type="text" placeholder="Nhập họ tên đầy đủ" name="hoten" id="hoten" required>
      
          <label for="diachi"><b>Địa chỉ</b></label>
          <input class="form-control" type="text" placeholder="Nhập địa chỉ" name="diachi" id="diachi" required>
      
          <label for="dienthoai"><b>Điện thoại</b></label>
          <input class="form-control" type="text" placeholder="Nhập điện thoại" name="dienthoai" id="dienthoai" required>
    </div> -->

                        <!-- show gio hang -->
                        <div class="div">
                            <?php
                            if ($showgh != ""): ?>
                                <table class="table table-bordered table-hover table-responsive text-center">
                                    <?= $showgh ?>
                                </table>
                            <?php else: ?>
                                <div class="card-body">
                                    dang cap nhat du lieu
                                </div>
                            <? endif; ?>
                        </div>
                        <!-- ket thuc show gio hang -->

                    </div>
                    
                    <div class="col-4">
                        <h2>ĐƠN HÀNG</h2>
                        <div class="total">
                            <div class="boxcart">
                                <?php
                                //  var_Dump($_SESSION['giohang']);
                                //  exit();
                                foreach ($_SESSION['giohang'] as $sp) {
                                    echo '<li>Tên sản Phẩm: ' . $sp['0'] . ' - Số Lượng: ' . $sp['4'] . '</li>';
                                }
                                ?>

                                <h3>Tổng:
                                    <?= $td ?>
                                </h3>
                            </div>
                        </div>

                        <div class="coupon">
                            <div class="boxcart">
                                <h3>Vouche: </h3>
                            </div>
                        </div>
                        <div class="pttt">
                            <div class="boxcart">
                                <h3>Phương thức thanh toán: </h3>
                                <input type="radio" name="pttt" value="0" id="" checked> Tiền mặt<br>
                                <input type="radio" name="pttt" value="1" id=""> Chuyển khoản<br>
                             
                            </div>
                        </div>
                        <div class="total">
                            <div class="boxcart bggray">
                                <h3>Tổng thanh toán:
                                    <?= $td ?>
                                </h3>
                            </div>
                        </div>
                        
                            <button type="submit" name = "hhthanhtoan">Thanh Toán</button>
                        

                    </div>
                </div>
            </form>
        </div>
    </section>




    <script>
        var ttnhanhang = document.getElementById("ttnhanhang");
        ttnhanhang.style.display = "none";
        function showttnhanhang() {
            if (ttnhanhang.style.display == "none") {
                ttnhanhang.style.display = "block";
            } else {
                ttnhanhang.style.display = "none";
            }
        }


    </script>

</body>

</html>