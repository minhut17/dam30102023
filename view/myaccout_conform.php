<?php 

if(isset($_SESSION['khach_hang'])){
    extract( $_SESSION['khach_hang'] );
    $infouser = khach_hang_select_by_id($ma_kh);
    extract($infouser);
}
?>
<div class="container-fuild">
    <div class="bgbanner">Cập Nhật</div>

</div>

<section class="containerfull">
    <div class="container">
        
        <div class="boxright">
         

            <div class="container">
                <h2>Cập Nhật hoàn tất</h2>
                <table class="table table-success table-striped">
                    <thead>
                        <tr>
                        <th>Tên</th>
                        <th>email</th>
                        <th>sdt</th>
                        <th>Địa Chỉ</th>
                    </tr>

                    </thead>
                    
                    <tr>
                        <td><?=$ho_ten?></td>
                        <td><?=$email?></td>
                        <td><?=$sdt?></td>
                        <td><?=$dia_chi?></td>
                    </tr>
                </table>
               
                
            </div>
        </div>
    </div>


</section>