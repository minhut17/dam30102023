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
                <h2>Cập Nhật</h2>
                <form class="form-horizontal" action="" method="post">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control"  placeholder="Enter email" name="email" value="<?=$email?>" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="">HỌ Tên:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  placeholder="Enter HỌ Tên" name="name" value="<?=$ho_ten?>"required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" value="<?=$mat_khau?>"required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Địa chỉ:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control"  placeholder="Enter Địa chỉ"
                                name="diachi" value="<?=$dia_chi?>"required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" >Số Điện Thoại:</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control"  placeholder="Enter SĐT"
                                name="sdt" value="<?=$sdt?>"required>
                        </div>
                    </div>
                 
                  
                    <div class="form-group">
                        <div class="col-sm-offset-2 mt-3 col-sm-10">
                            <input type="hidden" name="ma_kh" value="<?=$ma_kh?>" >
                            <button name="subac" type="submit" class="btn btn-primary">Cập Nhật</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</section>