<?php
$html_dm = showdm($dsdm);
extract($spct);

if (isset($_POST['submit_bl'])) {
    //input
    $ma_hh = $_POST['ma_hh'];
    $ma_kh = $_POST['ma_kh'];
    $noi_dung = $_POST['binhlluan'];
    $ngay_bl = date_format(date_create(), 'Y-m-d');
    binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl);
}


$html_splq = showhh($splq);
$dsbl = getAllComment($ma_hh);

$html_dsbl = showbl($dsbl);






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffe House</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="containerfull">
        <div class="bgbanner">SẢN PHẨM</div>
    </div>

    <section class="containerfull">
        <!-- <div class="container"> -->
            <div class="row">
                <div class="boxleft mr2pt menutrai col-4">
                    <h1>DANH MỤC</h1><br><br>
                    <?= $html_dm ?>
                </div>
                <div class="boxright col-7">
                    <h1>SẢN PHẨM CHI TIỂT</h1><br>
                    <div class="">
                        <div class="row">
                            <div class="col-3">
                                <img style="height:70%" class="w-100" src="../admin/<?=$hinh?>" alt="">
                            </div>
                            <div class="col-8 textchitiet">
                                <h2>
                                    <?= $ten_hh ?>
                                </h2>
                                <p class="text-color-red">
                                    Giá Sản Phẩm:
                                    <?= $don_gia ?>đ
                                </p>

                                <form action="index.php?pg=addcart" method="post">
                                    <input type="hidden" name="ten_hh" value="<?= $ten_hh ?>">
                                    <input type="hidden" name="ma_hh" value="<?= $ma_hh ?>">
                                    <input type="hidden" name="hinh" value="<?= $hinh ?>">
                                    <input type="hidden" name="don_gia" value="<?= $don_gia ?>">
                                    <label for="">số Lượng</label>:
                                    <input class="form-control mb-3" type="number" name="soluong" min="1" max="10" value="1">
                                   
                                    <button type="submit" name="addtocart">Đặt hàng</button>
                                </form>
                            </div>
                          

                        </div>



                        <iframe src="" frameborder="0"></iframe>
                        <?php

                        if (isset($_SESSION['khach_hang'])):


                            ?>
                            <div class="row">
                                <div class="col-12">
                                    <form action="#" method="post">
                                        <div class="comment-form-comment m-3">
                                            <label for="comment">
                                            Nhận xét của bạn <?= $_SESSION['khach_hang']['ma_kh'] ?>
                                           
                                            </label><br>
                                            <textarea class="form-control" placeholder="đánh giá sản phẩm" id="comment" name="binhlluan" cols="50" rows="3" required=""></textarea>
                                            <input type="hidden" name="ma_hh" value="<?= $ma_hh ?>">
                                            <input type="hidden" name="ma_kh"
                                                value="<?= $_SESSION['khach_hang']['ma_kh'] ?>">
                                            <input class="btn btn-danger mt-3" type="submit" name="submit_bl"
                                                value="gửi">
                                        </div>

                                    </form>
                                </div>
                            </div>
                            
                            <?php
                        else:
                            echo '<a href="http://damnhutlmpc05605.com/index.php?pg=dangnhap">đăng nhập để bình luận</a>';
                            ?>
                            <!-- thông báo đăng nhập để được bình luận -->



                            <?php
                            

                        endif;
                        ?>
                          <div class="row">
                                <div class="h3 ">Đánh giá</div>
                                <?= $html_dsbl ?>
                            </div>
                    </div>
                    <hr>
                    <h1>SẢN PHẨM LIÊN QUAN</h1>
                    <?= $html_splq ?>
                </div>

            </div>



        </div>
    </section>





</body>

</html>