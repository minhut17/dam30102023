<?php
$html_viewcart = viewcart(1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffe House</title>
    <link rel="stylesheet" href="layout/css/style.css">
</head>

<body>

    <div class="containerfull">
        <div class="bgbanner">GIỎ HÀNG</div>
    </div>
<?php if($_SESSION['giohang'] != [] ):?>
    <section class="containerfull">
        <div class="container">
            <div class="viewcart">
                <h2>ĐƠN HÀNG</h2>
                <div class="row">
                    <div class="col-8">
                        <table class="table table-bordered table-hover table-responsive text-center">
                          
                           <?php echo $html_viewcart?>


                        </table>
                        <div class="row">
                            <div class="col-6">
                                <a href="index.php?pg=viewcart&delall=1"><button class="btn btn-danger">Xóa tất
                                        cả</button></a>

                            </div>
                            <div class="col-6">
                                <a href="index.php?pg=sanpham"><button class="btn btn-success">Xem thêm</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="">
                            <h2>ĐƠN HÀNG</h2>

                            <div class="total mt-3">
                                <h3>Tổng:
                                    <?= $tongDonHang ?>
                                </h3>
                            </div>
                            <div class="coupon input-group">
                                <form action="index.php?pg=viewcart&voucher=1" method="post">

                                    <input type="hidden" name="tongdonhang" value="<?= $tongDonHang ?>">
                                    <input class="form-control" type="text" name="mavoucher" placeholder="ma voucher">
                                    <button class="mt-3 btn btn-success" type="submit">áp mã</button>
                                </form>
                            </div>
                            <div class="total mt-3">
                                <h3>Tổng thanh toán:
                                    <?= $tt ?>
                                </h3>
                            </div>
                            <a href="index.php?pg=donhang">
                            <button class="btn btn-success">Tiến Thành đặc hàng</button>
                        </a>
                           
                        </div>
                    </div>

                </div>

            </div>



        </div>
    </section>
<?php else:?>
    <div>
        <h4 class="text-warning">không có sản phẩm trong giỏ hàng</h4>
        <a href="index.php?pg=sanpham"><button class="btn btn-primary">Xem Thêm</button></a>

    </div>
<?php endif;?>





</body>

</html>