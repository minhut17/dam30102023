<?php
require_once 'pdo.php';

function hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $ngay_nhap, $mo_ta)
{
    $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, giam_gia, hinh, ma_loai, dac_biet, ngay_nhap, mo_ta) VALUES (?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $ngay_nhap, $mo_ta);
}

function hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $mo_ta)
{   if($hinh != ""){
    $sql = "UPDATE hang_hoa SET ten_hh=?,don_gia=?,giam_gia=?,hinh=?,mo_ta=? WHERE ma_hh=?";
    pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $mo_ta, $ma_hh);
    }else{
    $sql = "UPDATE hang_hoa SET ten_hh=?,don_gia=?,giam_gia=?,mo_ta=? WHERE ma_hh=?";
    pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $mo_ta, $ma_hh);

    }
   
}

function hang_hoa_delete($ma_hh)
{
    $sql = "DELETE FROM hang_hoa WHERE  ma_hh=?";
    if (is_array($ma_hh)) {
        foreach ($ma_hh as $ma) {
            pdo_execute($sql, $ma);
        }
           } else {
        pdo_execute($sql, $ma_hh);
    }
}

function hang_hoa_select_all()
{
    $sql = "SELECT * FROM hang_hoa order by ma_hh DESC";
    return pdo_query($sql);
}
function get_hang_hoa_new($limit)
{
    $sql = "SELECT * FROM hang_hoa order by ma_hh DESC LIMIT " . $limit;
    return pdo_query($sql);
}
function get_hang_hoa_hot($limit)
{
    $sql = "SELECT * FROM hang_hoa where dac_biet=1  order by ma_hh DESC LIMIT " . $limit;
    return pdo_query($sql);
}
function get_dssp($kw,$ma_loai, $limit)
{
    $sql = "SELECT * FROM hang_hoa where 1";
    if ($ma_loai > 0) {
        $sql .= " AND ma_loai =" . $ma_loai;
    }
    if($kw!=""){
        $sql .= " AND ten_hh like  '%".$kw."%'";
    }
    $sql .= " order by ma_hh desc limit " . $limit;

    return pdo_query($sql);
}


function hang_hoa_select_by_id($ma_hh)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_hh=?";
    return pdo_query_one($sql, $ma_hh);
}

function hang_hoa_exist($ma_hh)
{
    $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh=?";
    return pdo_query_value($sql, $ma_hh) > 0;
}

function hang_hoa_tang_so_luot_xem($ma_hh)
{
    $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh=?";
    pdo_execute($sql, $ma_hh);
}

function hang_hoa_select_top10()
{
    $sql = "SELECT * FROM hang_hoa WHERE so_luot_xem > 0 ORDER BY so_luot_xem DESC LIMIT 0, 10";
    return pdo_query($sql);
}

function hang_hoa_select_dac_biet()
{
    $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
    return pdo_query($sql);
}

function hang_hoa_select_by_loai($ma_loai)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_loai=?";
    return pdo_query($sql, $ma_loai);
}

function hang_hoa_select_keyword($keyword)
{
    $sql = "SELECT * FROM hang_hoa hh "
        . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
        . " WHERE ten_hh LIKE ? OR ten_loai LIKE ?";
    return pdo_query($sql, '%' . $keyword . '%', '%' . $keyword . '%');
}

function getdssplq($ma_loai, $ma_hh, $limit)
{
    $sql = "SELECT * FROM hang_hoa where ma_loai=? and ma_hh<>? order by ma_loai desc limit " . $limit;
    return pdo_query($sql, $ma_loai, $ma_hh);

}
/**
 * hàm dùng để hiển thị hàng hóa
 */
function showhh($dssp)
{
    $html_dssp = '';
    foreach ($dssp as $sp) {
        extract($sp);
        $don_gia = number_format( $don_gia,0,',','.');
        if ($dac_biet == 1) {
            $db = '<div class="best"></div>';
        } else {
            $db = '';
        }
        $html_dssp .= '

    <div class="box25 mr15 mb">
   <div class="product-card-image">
   <div class=">
   <span class="">'. $db .'</span>
   </div>
   <div class="product-media">  <a href="index.php?pg=sanphamchitiet&ma_hh=' . $ma_hh . '"">
   <img class="img-thumbnail img-fluid" src="admin/' . $hinh . '" alt="">
    </a></div>
   </div>
 



    <span class="price">'.$don_gia . 'đ</span>
    <h4 class="text-center">'. $ten_hh . '</h4>

    <form action="index.php?pg=addcart" method="post">
    <input type="hidden" name="ten_hh" value="' . $ten_hh . '">
    <input type="hidden" name="ma_hh" value="' . $ma_hh . '">
    <input type="hidden" name="hinh" value="' . $hinh . '">
    <input type="hidden" name="don_gia" value="' . $don_gia . '">
    <input type="hidden" name="soluong" value="1">

    <button type="submit" class= "btn btn-success" name="addtocart">Đặt hàng</button>
    </form>
 
</div>';




    }
    return $html_dssp;
}

// function hang_hoa_select_page(){
//     if(!isset($_SESSION['page_no'])){
//         $_SESSION['page_no'] = 0;
//     }
//     if(!isset($_SESSION['page_count'])){
//         $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
//         $_SESSION['page_count'] = ceil($row_count/10.0);
//     }
//     if(exist_param("page_no")){
//         $_SESSION['page_no'] = $_REQUEST['page_no'];
//     }
//     if($_SESSION['page_no'] < 0){
//         $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
//     }
//     if($_SESSION['page_no'] >= $_SESSION['page_count']){
//         $_SESSION['page_no'] = 0;
//     }
//     $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT ".$_SESSION['page_no'].", 10";
//     return pdo_query($sql);
// }