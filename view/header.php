<?php  

    if(isset($_SESSION['khach_hang'])){
        extract( $_SESSION['khach_hang'] );
        $info_user = khach_hang_select_by_id($ma_kh);
        extract($info_user);
    
   $html_accout =' 
    <a href="index.php?pg=dangnhap">'.$email.'</a>
    <a href="index.php?pg=thoathethong"><i class="fa-regular fa-circle-xmark"></i></i>Thoát</a>';

    }else{
    $html_accout =' 
    <a href="index.php?pg=dangnhap"><i class="fa-solid fa-user"></i>ĐĂNG NHẬP</a>
    <a href="index.php?pg=dangky"><i class="fa-solid fa-user"></i>ĐĂNG KÝ</a>';

    
    } 
    ?>

</a>
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
    <div class="containerfull padd20">
        <div class="container">
            <div class="row">
            <div class="logo col-2"><img src="layout/images/logomn.jpg" height="50px" alt=""></div>
            <div class="menu col-10">
                <div class="row">
                <div class="col-4">
                    <form action="index.php?pg=sanpham" method="get">
                        <div class="row">
                            <div class="col-9"> 
                             <input  type="text" name="kw" placeholder="nhập sản phẩm tìm kiếm" ></div>
                            <div class="col-3">
                                  <input class="ms-4" type="submit" value="timkiem" name="timkiem" >
                        </div>
                      
                            
                        </div>
                        
                    </form>
                </div>
                <div class="col-8">
                <a href="index.php">TRANG CHỦ</a>
                <!-- <a href="#">GIỚI THIỆU</a> -->
                <a href="index.php?pg=sanpham">SẢN PHẨM</a>
                 <?=$html_accout?>

              
              
                <a href="#">
                
                </div>
               
                </div>
                
              

                <!-- <a href="#">DỊCH VỤ</a>
                <a href="#">LIÊN HỆ</a> -->
            </div>

            </div>
           
        </div>
        <div class="">
        <a class="p-3 fs-3" href="index.php?pg=viewcart"><i class="fa-solid fa-cart-shopping"></i></a>
        </div>
    </div>
  
   