<?php
require_once 'pdo.php';

function binh_luan_insert($ma_kh, $ma_hh, $noi_dung, $ngay_bl){
    $sql = "INSERT INTO binh_luan(ma_kh, ma_hh, noi_dung, ngay_bl) VALUES (?,?,?,?)";
    pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl);
}


function binh_luan_update($ma_bl, $ma_kh, $ma_hh, $noi_dung, $ngay_bl){
    $sql = "UPDATE binh_luan SET ma_kh=?,ma_hh=?,noi_dung=?,ngay_bl=? WHERE ma_bl=?";
    pdo_execute($sql, $ma_kh, $ma_hh, $noi_dung, $ngay_bl, $ma_bl);
}

function binh_luan_delete($ma_bl){
    $sql = "DELETE FROM binh_luan WHERE ma_bl=?";
    if(is_array($ma_bl)){
        foreach ($ma_bl as $ma) {
            pdo_execute($sql, $ma);
        }
    }
    else{
        pdo_execute($sql, $ma_bl);
    }
}

function binh_luan_select_all(){
    $sql = "SELECT * FROM binh_luan bl ORDER BY ngay_bl DESC";
    return pdo_query($sql);
}

function binh_luan_select_by_id($ma_bl){
    $sql = "SELECT * FROM binh_luan WHERE ma_bl=?";
    return pdo_query_one($sql, $ma_bl);
}

function binh_luan_exist($ma_bl){
    $sql = "SELECT count(*) FROM binh_luan WHERE ma_bl=?";
    return pdo_query_value($sql, $ma_bl) > 0;
}
//-------------------------------//
function binh_luan_select_by_hang_hoa($ma_hh){
    $sql = "SELECT b.*, h.ten_hh FROM binh_luan b JOIN hang_hoa h ON h.ma_hh=b.ma_hh WHERE b.ma_hh=? ORDER BY ngay_bl DESC";
    return pdo_query($sql, $ma_hh);
}
function chitietbinhluan($ma_hh){
    $sql = "SELECT binh_luan.noi_dung,binh_luan.ngay_bl,binh_luan.ma_bl,khach_hang.ho_ten,hang_hoa.ma_hh
    FROM binh_luan
    JOIN khach_hang ON binh_luan.ma_kh = khach_hang.ma_kh
    JOIN hang_hoa ON binh_luan.ma_hh = hang_hoa.ma_hh
    WHERE hang_hoa.ma_hh = $ma_hh";
    return pdo_query($sql, $ma_hh);
}
function getAllComment($ma_hh){
    $sql = "SELECT khach_hang.hinh
     as hinh, khach_hang.ho_ten as hoten,
      binh_luan.noi_dung as noidung,
       binh_luan.ngay_bl as ngay_bl 
       FROM khach_hang 
       JOIN binh_luan
        ON khach_hang.ma_kh = binh_luan.ma_kh 
        JOIN hang_hoa ON 
        hang_hoa.ma_hh = binh_luan.ma_hh 
        WHERE hang_hoa.ma_hh = $ma_hh";
    return pdo_query($sql, $ma_hh);
}
function showbl($dsbl)
{ 
    
    $html_dsbl= '';
    foreach ($dsbl as $bl) {
       
        $html_dsbl .= '<div class="table  table-hover ">
        
       
        <tr> <img style="width:5%"; src="admin/' .$bl['hinh']. '" alt="">
          <td scope="row">'.$bl['hoten'].'</td>
          <td>'.$bl['ngay_bl'].'</td><br>
        
         
          <td>noidung: '.$bl['noidung'].'</td>
          
        </tr>
       
      
       
    </div>';
    }
    return $html_dsbl;
    
}