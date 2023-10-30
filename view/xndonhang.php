<?php 

if(!empty($bill)) :



?>


        <div class="containerfull">
                <div class="bgbanner">ĐƠN HÀNG</div>
        </div>

            <section class="containerfull">
                <div class="container">
                   
                <h2>Cảm ơn quý khách <?=$bill['ten_nguoi_nhan']?> Đơn hàng đã đặt thành công. <br>
                    </h2>
                    </div>
            </section>

       
   
<?php else:?>
    <div class="card-body">
      dang cap nhat du lieu
    </div>
<?php endif;?>
