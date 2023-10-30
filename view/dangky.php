
<div class="container-fuild">
    <div class="bgbanner">Đăng ký</div>

</div>

<section class="containerfull">
    <div class="container">
        
        <div class="boxright">
         

            <div class="container">
                <h2>ĐĂNG KÝ</h2>
                <?php if (isset($fail)) {
                    echo '<h4 style = "color:red;">' . $fail . '</h4>';
                } ?>
                <form class="form-horizontal" action="" method="post" id="dangky" >
                    <div class="form-group mt-3">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label class="control-label col-sm-2" for="pwd">Password:</label>
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
                  
                    <div class="form-group mt-3">
                        <div class="col-sm-offset-2 mt-3 col-sm-10">
                            <button name="sub" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</section>
<script>
    $().ready(function() {
	$("#dangky").validate({
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
				minlength: 8
			},
			"re-password": {
				equalTo: "#password",
				minlength: 8
				
			}
		},
		messages: {
			"email": {
				required: "Bắt buộc nhập email",
				maxlength: "Hãy nhập tối đa 15 ký tự"
			},
			"password": {
				required: "Bắt buộc nhập password",
				minlength: "Hãy nhập ít nhất 8 ký tự"
			},
			"re-password": {
				equalTo: "password không khớp",
				minlength: "Hãy nhập ít nhất 8 ký tự"
			}
		}
	});
});
</script>