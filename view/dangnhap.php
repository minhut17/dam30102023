



<div class="container-fuild">
    <div class="bgbanner">ĐĂNG NHẬP</div>
</div>

<section class="containerfull">
    <div class="container">
        
        <div class="boxright">


            <div class="container">
                <h2>ĐĂNG NhẬP</h2>
                <?php if (isset($fail)) {
                    echo '<h4 style = "color:red;">' . $fail . '</h4>';
                } ?>

                <?php
                // kiểm tra tồn tại khách hàng hiển thị khách hàng ra ngoài
                if (isset($_SESSION['khach_hang'])) {

                    extract($_SESSION['khach_hang']);
              
                    $infouser = khach_hang_select_by_id($ma_kh);
                    extract($infouser);
                    
                    ?>
                    <?= 'xin chào ' . $email ?>

                    <?php 
                    
                    if($vai_tro == 0){
                        echo '  <li><a href="index.php?pg=myaccout">Cập nhật tài khoản</a></li>';

                    }else{
                        echo"";
                    }
                    ?>
                  



                        <?php if($vai_tro == 1 ){?>
                    <li><a href="../admin/index.php">Đăng nhập admin</a></li>
                    <?php }?>


                    <li><a href="index.php?pg=thoathethong">Thoát hệ thống</a></li>
                   


                <?php } else { ?>
                    <!-- hiện form đăng nhập -->
                    <form class="form-horizontal" action="" method="post" id="dangnhap" >
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="email">Email:</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="password">Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="password" placeholder="Enter password"
                                    name="password">
                            </div>
                        </div>
                        <div class="form-group mt-3">
                        <label class="control-label col-sm-2" for="re-password">Commit Password:</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="re-password" placeholder="Enter commit password"
                                name="re-password">
                        </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-2 mt-3 col-sm-10">
                                <button name="subdn" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>


                <?php } ?>


            </div>
        </div>
    </div>


</section>
<script>
    $().ready(function() {
	$("#dangnhap").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
			"email": {
				required: true,
				maxlength: 50
			},
			"password": {
				required: true,
				minlength: 3
			},
			"re-password": {
				equalTo: "#password",
				minlength: 3
				
			}
		},
		messages: {
			"email": {
				required: "Bắt buộc nhập email",
				maxlength: "Hãy nhập tối đa 15 ký tự"
			},
			"password": {
				required: "Bắt buộc nhập password",
				minlength: "Hãy nhập ít nhất 3 ký tự"
			},
			"re-password": {
				equalTo: "password không khớp",
				minlength: "Hãy nhập ít nhất 3 ký tự"
			}
		}
	});
});
</script>