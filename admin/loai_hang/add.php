
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container ">
        <div class="row m-3 text-center">
            <h1>THÊM MỚI LOẠI HÀNG HÓA</h1>
        </div>
        <div class="container row">
            <form action="" method="post" id="addlh" >
                <div class="row mb10">
                    Mã loại<br>
                    <input class="form-control" type="text" value="Auto number" name="maloai" disabled>
                </div>
                <div class="row mb10">
                    Tên loại <br>
                    <input class="form-control" type="text" name="tenloai">
                </div>
                <div class="row m-3 ">
                    <div class="col text-center">
                        <a href=""><input class="btn btn-primary" type="submit" name="themmoi" value="Thêm Mới"></a>
                        <a href=""><input class="btn btn-primary" type="reset" value="Nhập Lại"></a>
                        <a href="index.php?pg=listlh">
                            <input class="btn btn-primary" type="button" value="Danh Sách">
                        </a>
                    </div>

                </div>


            </form>
        </div>

    </div>

</body>
<script>
    $().ready(function() {
	$("#addlh").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
			"tenloai": {
				required: true,
				
			},
		
		},
		messages: {
		
            "tenloai": {
				required: "không Được để trống tên",
			
			}
		}
	});
});
</script>


</html>