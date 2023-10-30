<?php
session_start();
ob_start();
if (!isset($_SESSION['giohang'])) {
    $_SESSION['giohang'] = [];
}

?>
<!-- kết nối dao -->
<?php

include "dao/khach-hang.php";
include "dao/loai.php";
include "dao/hang-hoa.php";
include "dao/cart.php";
include "dao/binh-luan.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
	    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="../layout/css/style.css">
    
  
</head>

<body>

    <?php
    include "view/header.php";
    ?>
    <!-- giới hạn chiều cao của body c  thấp nhất phải là 96vh-->
    <section style="min-height:96vh;" class="container">
        <?php

        if (!isset($_GET['pg'])) {
            //kiểm tra nếu khongo tồn tại biến pg thì sẽ load trang main lên và hiện dssp mới và dssp hot;
            $dssp_moi = get_hang_hoa_new(4);
            $dssp_hot = get_hang_hoa_hot(2);

            include "view/main.php";

        } else {
            switch ($_GET['pg']) {
                // trang sản phẩm
                case 'sanpham':
                    $dsdm = loai_select_all_desc();
                    if (!isset($_GET['ma_loai'])) {
                        $ma_loai = 0;
                    } else {
                        $ma_loai = $_GET['ma_loai'];
                    }
                    if(isset($_GET['timkiem'])){
                        $kw = $_GET['kw'];
                        $titlepage = "Kết quả tìm kiếm với từ khóa ".$kw;
                    }else{
                        $kw ="";
                        $titlepage="";
                    }
                    $dssp = get_dssp($kw,$ma_loai, 12);
                    include "view/sanpham.php";
                    break;
                //sản phẩm chi tiết
                case 'sanphamchitiet':
                    if (isset($_GET['ma_hh'])) {
                        $ma_hh = $_GET['ma_hh'];
                        $spct = hang_hoa_select_by_id($ma_hh);

                        $dsdm = loai_select_all_desc();
                        $ma_loai = $spct['ma_loai'];
                        $splq = getdssplq($ma_loai, $ma_hh, 4);
                        include "view/sanphamchitiet.php";
                    } else {
                        include "view/main.php";
                    }
                    break;
                // đăng nhập tài khoản
                case 'dangnhap':
                    if (isset($_POST['subdn'])) {
                        //lấy dử liệu từ form
        
                       
                        $emaildn = $_POST['email'];
                        $mkdn = $_POST['password'];

                        //lấy dử liệu từ cơ sở dử liệu
        
                        $getkhachhang = khach_hang_select_by_email($emaildn);
                    

                        $pass = $getkhachhang['mat_khau'] ?? '';
                       
                        if (password_verify($mkdn, $pass)) {
                            $_SESSION['khach_hang'] = $getkhachhang;
                            header('Location:http://damnhutlmpc05605.com/index.php');
                        } else {
                            $fail = "email hoặc password không đúng";
                        }
                    }
                    include "view/dangnhap.php";
                    break;
                // đăng ký tài khoản
                case 'dangky':
                    // xác định giá trị input
                    if (isset($_POST['sub'])) {
                        $email = $_POST['email'];
                        $mk = $_POST['password'];
                        $mat_khau = password_hash($mk, PASSWORD_DEFAULT);

                        $getkhachhang = khach_hang_select_by_email($email);
                        if ($getkhachhang['email'] == $email) {
                            $fail = "Tài khoản đã tồn tại";
                        } elseif ((!empty($email) && !empty($mat_khau))) {
                            // xử lý input
                            user_insert($mat_khau, $email);
                            header('Location:http://damnhutlmpc05605.com/index.php?pg=dangnhap');
                            exit;

                        }
                    }
                    include "view/dangky.php";
                    break;

                //cập nhât user
                case "myaccout":
                    if(isset($_POST['subac'])){
                        
                        $ho_ten = $_POST['name'];
                        $mk = $_POST['password'];
                        $email = $_POST['email'];
                        $dia_chi = $_POST['diachi'];
                        $sdt = $_POST['sdt'];
                        $vai_tro =0;
                        $ma_kh = $_POST['ma_kh'];
                    
                      
                
                        user_update( $ho_ten,$mk, $email,$vai_tro,$dia_chi,$sdt,$ma_kh);
                        header('Location:http://damnhutlmpc05605.com/index.php?pg=myaccout_conform');
                        
                    }
                    
                    

                    include "view/myaccout.php";
                    break;
                case"myaccout_conform":
                    include "view/myaccout_conform.php";
                    break;

                //đâng xuất
                case "thoathethong":
                    if(isset( $_SESSION['khach_hang'] )){
                        unset($_SESSION['khach_hang']);
                        $_SESSION['giohang'] =[];
                        header('Location:http://damnhutlmpc05605.com/index.php');

                    }
                  
                    break;
                //thêm sản phẩm vào giỏ hàng
                case "addcart":
                    if (isset($_POST['addtocart'])) {
                        $ten_hh = $_POST['ten_hh'];
                        $ma_hh = $_POST['ma_hh'];
                        $hinh = $_POST['hinh'];
                        $don_gia = $_POST['don_gia'];
                        if (isset($_POST['soluong']) && ($_POST['soluong']) > 0) {
                            $soluong = $_POST['soluong'];
                        } else {
                            $soluong = 1;
                        }
                        $flash = 0;
                        // kiểm tra sản phẩm có tồn tại trong giỏ hàng hay khong
                        // nếu tồn tại cập nhật lại số lượng
                        $i = 0;

                        foreach ($_SESSION['giohang'] as $sp) {
                            if ($sp[1] == $ma_hh) {
                                $slmoi = $soluong + $sp[4];
                                $_SESSION['giohang'][$i][4] = $slmoi;
                                $flash = 1;
                                break;
                            }
                            $i++;
                        }
                        // ngược lại add sp mới vào giỏ hàng
                        if ($flash == 0) {
                            $cart = [
                                $ten_hh,
                                $ma_hh,
                                $hinh,
                                $don_gia,
                                $soluong
                            ];
                            $_SESSION['giohang'][] = $cart;
                            // var_dump($cart);
                            // die();
        
                        }
                        header('Location:index.php?pg=viewcart');
                    }
                    break;
                // trang giỏ hàng
                case "viewcart":
                    if (isset($_GET['delall']) && ($_GET['delall'] == 1)) {
                        unset($_SESSION['giohang']);
                        header('location: index.php');
                    }
                    //xóa sản phẩm trong giỏ hàng
                    if (isset($_GET['del']) && ($_GET['del'] >= 0)) {
                        array_splice($_SESSION['giohang'], $_GET['del'], 1);
                        header('location: index.php?pg=viewcart');
                    } else {
                        if (isset($_SESSION['giohang'])) {
                            $tongDonHang = tongDonHang();
                        }
                        $giaTriVoucher = 0;
                        if (isset($_GET['voucher']) && $_GET['voucher'] == 1) {
                            $tongDonHang = $_POST['tongdonhang'];
                            $mavoucher = $_POST['mavoucher'];
                            // so sanh mavoucher vừa lấy với voucher có sẳn trong database
                            //selet *from where mavoucher = mavoucher
                            $giaTriVoucher = 10;
                        }
                        $tt = $tongDonHang - $giaTriVoucher;
                        include "view/viewcart.php";
                    }
                    break;
                //trang đơn hàng
                case "donhang":
                    include "view/donhang.php";
                    break;
                // trang xác nhận đơn hàng
                case "xndonhang":
                    //tạo bill
                    if(isset($_POST['hhthanhtoan'])){
                        $ten_nguoi_nhan = $_POST['hoten_nguoinhan'];
                        $diachi_nguoinhan = $_POST['diachi_nguoinhan'];
                        $email_nguoinhan = $_POST['email_nguoinhan'];
                        $dienthoai_nguoinhan = $_POST['dienthoai_nguoinhan'];
                        $ngaydh =date_format(date_create(), 'Y-m-d');
                        $tongdh = tongDonHang();
                        $pttt = $_POST['pttt'];
                       
                        $idbill = insert_bill($ten_nguoi_nhan,$diachi_nguoinhan,$email_nguoinhan,$dienthoai_nguoinhan,$ngaydh,$tongdh,$pttt);
                    
                        foreach ($_SESSION['giohang'] as $sp) {
                            
                            insert_cart($sp[1],$sp[2],$sp[0],(int)$sp[3],$sp[4],$tongdh,$idbill);

                        }
                    $bill = bill_select_by_id($idbill);
                    $_SESSION['giohang'] = [];



                    }
                    include "view/xndonhang.php";
                    break;


                default:
                    include "view/main.php";
                    break;
            }
        }
        ?>
    </section>


    <?php
    include "view/footer.php";

    ?>

</body>
<?php ob_end_flush(); ?>