<?php
require_once 'pdo.php';

// function thong_ke_hang_hoa()
// {
//     $sql = "SELECT lo.ma_loai, lo.ten_loai,"
//         . " COUNT(*) so_luong,"
//         . " MIN(hh.don_gia) gia_min,"
//         . " MAX(hh.don_gia) gia_max,"
//         . " AVG(hh.don_gia) gia_avg,"
//         . " FROM hang_hoa hh "
//         . " JOIN loai lo ON lo.ma_loai=hh.ma_loai "
//         . " GROUP BY lo.ma_loai, lo.ten_loai";
//     return pdo_query($sql);
// }
$data = thong_ke_hang_hoa();
function thong_ke_hang_hoa(){
    $sql = "SELECT COUNT(hang_hoa.ma_loai) as countct, 
    loai.ten_loai as name , 
    MIN(hang_hoa.don_gia) as minprice,
    MAX(hang_hoa.don_gia) as maxprice, 
    AVG(hang_hoa.don_gia) as avgprice 
    FROM loai 
    LEFT JOIN hang_hoa 
    ON loai.ma_loai = hang_hoa.ma_loai 
    GROUP BY loai.ma_loai";
    return pdo_query($sql);
}
       


function thong_ke_binh_luan()
{
    $sql = " SELECT hang_hoa.ma_hh, hang_hoa.ten_hh,
    COUNT(binh_luan.noi_dung) AS'soluong', 
    MIN(binh_luan.ngay_bl) as 'cunhat',
    MAX(binh_luan.ngay_bl) as 'moinhat'
    FROM binh_luan JOIN hang_hoa on binh_luan.ma_hh = hang_hoa.ma_hh 
    GROUP BY hang_hoa.ma_hh, hang_hoa.ten_hh HAVING soluong > 0 
    ORDER by soluong DESC;";
    return pdo_query($sql);
}
