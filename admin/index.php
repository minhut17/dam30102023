<?php
session_start();
include "../dao/pdo.php";
include "../dao/loai.php";
include "../dao/hang-hoa.php";
include "../dao/khach-hang.php";
include "../dao/binh-luan.php";
include "../dao/thong-ke.php";

// var_dump($_SESSION["khach_hang"]["vai_tro"]);
// die();
if($_SESSION["khach_hang"]["vai_tro"] == 1 ){

}else{
header("location:http://damnhutlmpc05605.com/index.php?pg=dangnhap ");
}
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
        <link rel="stylesheet" href="../layout/css/css.css">
</head>

<body>
   
    <?php
    include "../admin/view/header.php";
    ?>
    <div style="min-height:60vh;" class="container-fluid">
    <?php
    if (!isset($_GET['pg'])) {
        include "../admin/view/home.php";

    } else {
        switch ($_GET['pg']) {
            case 'addlh':
                //kiểm tra người dùng có click vào nút add hay không
                if ( isset($_POST['themmoi']) && ($_POST['tenloai'] !="")) {
                    $ten_loai = $_POST['tenloai'];
                    loai_insert($ten_loai);
                }
                include "loai_hang/add.php";
                break;
            case 'listlh':
                $dslh = loai_select_all();
                include "loai_hang/list.php";
                break;
            case 'updatelh':
                if (!isset($_GET['ma_loai'])) {
                    //code trang 404
                    exit;
                }
                $ma_loai = $_GET['ma_loai'];
                $getOneTB = loai_select_by_id($ma_loai);
                //kiểm tra người dùng có click vào nút add hay không
                if (isset($_POST['capnhatlh'])) {
                    $ten_loai = $_POST['tenloai'];
                    $ma_loai = $_POST['maloai'];
                    loai_update($ma_loai, $ten_loai);
                    header("location: http://damnhutlmpc05605.com/admin/index.php?pg=listlh ");
                }
                include "loai_hang/update.php";
                break;
            case 'deletelh':
                $ma_loai = $_GET['ma_loai'];
                loai_delete($ma_loai);
                header("location: http://damnhutlmpc05605.com/admin/index.php?pg=listlh ");
                break;
            case 'addhh':
                if (isset($_POST['themmoi'])) {

                    $ten_hh = $_POST['name'];
                    $thumbnail = $_FILES['thumbnail'];
                    $folder_name = "uploads/" . date('Y') . '/' . time();

                    if (!is_dir($folder_name)) {
                        mkdir($folder_name, 0777, true);
                    }
                    $file = $thumbnail['tmp_name'];
                    $error = $thumbnail['error'];
                    $hinh = $folder_name . '/' . $thumbnail['name'];

                    if ($error == 0 && move_uploaded_file($file, $hinh)) {
                        // echo "upload Xong";
                    } else {
                        echo "upload loi";
                    }

                    $don_gia = $_POST['price'];
                    $giam_gia = $_POST['sale_price'];
                    $ma_loai = $_POST['ma_loai'] ?? 1;
                    $mo_ta = $_POST['mo_ta'];
                    $dac_biet = $_POST['hang_db'];

                    $ngay_nhap = $_POST['ngay_nhap'];

                    hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $ngay_nhap, $mo_ta);
                    header("location: http://damnhutlmpc05605.com/admin/index.php?pg=listhh ");

                }
                include "hang_hoa/add.php";
                break;
            case 'listhh':
                include "hang_hoa/list.php";
                break;
            case 'updatehh':
                if (!isset($_GET['ma_hh'])) {
                    echo 'đây là trang 404';
                    exit;
                }
                $ma_hh = $_GET['ma_hh'];
                $getOneTBHH = hang_hoa_select_by_id($ma_hh);
                ?>
                <?php
                //kiểm tra người dùng có click vào nút cập nhật hay không
                if (isset($_POST['capnhat'])) {
                    $ma_hh = $_POST['ma_hh'];
                    $ten_hh = $_POST['name'];
                    $thumbnail = $_FILES['thumbnail'];
                    $don_gia = $_POST['price'];
                    $giam_gia = $_POST['sale_price'];  
                    $mo_ta = $_POST['mo_ta'];
                    $folder_name = "uploads/".date('Y').'/'.time();
                  
                    if (!is_dir($folder_name)) {
                        mkdir($folder_name, 0777, true);
                    }
                    $file = $thumbnail['tmp_name'];
                    $error = $thumbnail['error'];
                    $hinh = $folder_name . '/' . $thumbnail['name'];
                    if($hinh != "" ){
                        move_uploaded_file($file, $hinh);
                        // if ($error == 0 && ) {
                        //     // echo "upload Xong";
                        // } else {
                        //     echo "upload loi";
                        // }

                    }else{
                        $hinh == "";
                    }
                    


                    hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $mo_ta);
                    echo "câp nhật thành công";
                    header('location:http://damnhutlmpc05605.com/admin/index.php?pg=listhh');


                }
              

                include "hang_hoa/update.php";
                break;


            case 'deletehh':
                $ma_hh = $_GET['ma_hh'];
                hang_hoa_delete($ma_hh);
                header("location: http://damnhutlmpc05605.com/admin/index.php?pg=listhh ");
                break;
            case 'addkh':
                if (isset($_POST['subkh'])) {

                    $mkkh = $_POST['password'];
                    $mat_khau = password_hash($mkkh, PASSWORD_DEFAULT);
                    $ho_ten = $_POST['name'];
                    $email = $_POST['email'];
                    $thumbnail = $_FILES['thumbnail'];
                    $folder_name = "uploads/" . date('Y') . '/' . time();

                    if (!is_dir($folder_name)) {
                        mkdir($folder_name, 0777, true);
                    }
                    $file = $thumbnail['tmp_name'];
                    $error = $thumbnail['error'];
                    $hinh = $folder_name . '/' . $thumbnail['name'];

                    if ($error == 0 && move_uploaded_file($file, $hinh)) {
                        // echo "upload Xong";
                    } else {
                        echo "upload loi";
                    }
                    $kich_hoat = $_POST['kich_hoat'];
                    $vai_tro = $_POST['vai_tro'];
                    khach_hang_insert($mat_khau, $ho_ten, $kich_hoat, $hinh, $email, $vai_tro);
                    header("location: http://damnhutlmpc05605.com/admin/index.php?pg=listkh ");
                   
                }
                include "khach_hang/add.php";
                break;
            case 'listkh':
                include "khach_hang/list.php";
                break;
            case 'deletekh':
                $ma_kh = $_GET['ma_kh'];
                khach_hang_delete($ma_kh);
                header("location: http://damnhutlmpc05605.com/admin/index.php?pg=listkh ");
                break;
            case 'updatekh':
                if (!isset($_GET['ma_kh'])) {
                    echo 'đây là trang 404';
                    exit;
                }
                $ma_kh = $_GET['ma_kh'];
                $getOneTBKH = khach_hang_select_by_id($ma_kh);
                ?>
                <?php
                //kiểm tra người dùng có click vào nút cập nhật hay không
                if (isset($_POST['capnhatkhachhang'])) {
                    $mkkh = $_POST['password'];
                    $mat_khau = password_hash($mkkh, PASSWORD_DEFAULT);
                    $ho_ten = $_POST['name'];
                    $email = $_POST['email'];
                    $thumbnail = $_FILES['thumbnail'];
                    $folder_name = "uploads/" . date('Y') . '/' . time();

                    if (!is_dir($folder_name)) {
                        mkdir($folder_name, 0777, true);
                    }
                    $file = $thumbnail['tmp_name'];
                    $error = $thumbnail['error'];
                    $hinh = $folder_name . '/' . $thumbnail['name'];

                    if ($error == 0 && move_uploaded_file($file, $hinh)) {
                        // echo "upload Xong";
                    } else {
                        echo "upload loi";
                    }
                    $kich_hoat = $_POST['kich_hoat'];
                    $vai_tro = $_POST['vai_tro'];
                    khach_hang_update($ma_kh,$mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
                    header("location: http://damnhutlmpc05605.com/admin/index.php?pg=listkh ");
                  

                }
                   

             
                include "khach_hang/update.php";
                break;
            case 'listbl':
                $dsbl = thong_ke_binh_luan();
                include "binh_luan/list.php";
                break;
            case 'chitietbl':
                if(isset($_GET['ma_hh'])){
                    $ma_hh =$_GET['ma_hh'];
                    $detailbl = chitietbinhluan($ma_hh);
                }
                
                include "binh_luan/chitiet.php";
                break;
            case 'listtk':
                include "thong_ke/list.php";
                break;


            default:
                include "../admin/view/home.php";
                break;
        }

    }
    
    ?>
    
    </div>   

    <?php
    include "view/footer.php";
    ?>
</body>

</html>