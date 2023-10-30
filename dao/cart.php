<?php

function viewcart($del)
{
    $html_viewcart = '';
    $i = 0;
    if ($del == 1) {
        $xspth = '<th>Thao tác</th>';


    } else {
        $xspth = '';

    }
    $html_viewcart .= '  <thead class="table-success">
            <tr>
            <th>STT</th>
            <th>Hình</th>
            <th>Tên sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Thành tiền</th>
            ' . $xspth . '
        </tr>                

    </thead>'
    ;
    foreach ($_SESSION['giohang'] as $sp) {
        // extract($sp);
        $tongtien =  $sp[3] *  $sp[4];
        $linkdel = "index.php?pg=viewcart&del=" . $i;
        if ($del == 1) {

            $xsptd = '<td><a href="index.php?pg=viewcart&del=' . $i . '"><input class="btn btn-danger" type ="button" value ="xóa"></a></td>';
        } else {

            $xsptd = '';
        }
        $html_viewcart .= '
       
         <tr>
                        <td>' . $i . '</td>
                        <td><img class="w-50" src="../admin/' . $sp[2] . '" alt="" ></td>
                        <td>' . $sp[0] . '</td>
                        <td>' . $sp[3] . '</td>
                        <td>' . $sp[4] . '</td>
                        <td>' . $tongtien .'</td>
                        ' . $xsptd . '
                      
      </tr>
        ';
        $i++;

    }

    return $html_viewcart;
}


function tongDonHang()
{

    $tongDonHang = 0;

    foreach ($_SESSION['giohang'] as $sp) {

        $tongtien = (int) $sp[3] * (int) $sp[4];
        $tongDonHang += $tongtien;

    }

    return $tongDonHang;
}

function insert_bill($ten_nguoi_nhan, $diachi_nguoinhan, $email_nguoinhan, $dienthoai_nguoinhan, $ngaydh, $tongdh, $pttt)
{
    $sql = "INSERT INTO bill(ten_nguoi_nhan, diachi_nguoinhan, email_nguoinhan, dienthoai_nguoinhan, ngaydh, tongdh,pttt) VALUES (?,?,?,?,?,?,?)";
    return pdo_execute_return_lastID($sql, $ten_nguoi_nhan, $diachi_nguoinhan, $email_nguoinhan, $dienthoai_nguoinhan, $ngaydh, $tongdh, $pttt);
}
function insert_cart($ma_hh, $hinh, $hoten, $don_gia, $so_luong, $total, $idbill)
{
    $sql = "INSERT INTO gio_hang(ma_hh, hinh, hoten, don_gia, so_luong, total,idbill) VALUES (?,?,?,?,?,?,?)";
    pdo_execute($sql, $ma_hh, $hinh, $hoten, $don_gia, $so_luong, $total, $idbill);
}
/**
 * Summary of hang_hoa_select_by_id
 *Lấy 1 hàng từ bill theo mà idbill
 */
function bill_select_by_id($idbill)
{
    $sql = "SELECT * FROM bill WHERE id=?";
    return pdo_query_one($sql, $idbill);
}


?>