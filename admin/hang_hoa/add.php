<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <h1 class="m-3 text-center">THÊM HÀNG HÓA</h1>
       
        <form action="" method="post" enctype="multipart/form-data" id="adhh" >
        <div class="row">
            <div class="col-md-4">
                <div> Mã Hàng Hóa <br>
                    <input class="form-control" name="ma_loai" class="form-control" type="text" disabled><br>

                </div>
                <div>
                    Giảm Giá<br>
                    <input class="form-control"  name="sale_price" min="0" step="0.1" max="1" class="form-control" type="number">
                    <br>
                </div>
                <div>
                    <label for="">Hàng Đặc Biệt</label>
                    <div  class="form-control">
                        <label class="radio-inline"><input name="hang_db" value="0" type="radio"> bình thường</label>
                        <label class="radio-inline"><input name="hang_db" value="1" type="radio" checked>đặc biệt</label>
                    </div>

                </div>


            </div>
            <div class="col-md-4">
                <div> Tên Hàng Hóa <br>
                    <input  class="form-control" name="name" type="text"><br>
                </div>
                <div>
                    Hình Ảnh<br>
                    <input  class="form-control" name="thumbnail" type="file" >
                    <br>
                </div>
                <div> Ngày nhập <br>
                    <input class="form-control" name="ngay_nhap" type="date"><br>
                </div>

            </div>
            <div class="col-md-4">
                <div> Đơn Giá <br>
                    <input class="form-control" name="price" type="text" ><br>
                </div>
                <div>
                  
                    <label for="">Loại Hàng</label>
                    <select  name="ma_loai" class="form-select" aria-label="Default select example">
                    <?php 
                    $loai_hang = loai_select_all(); 
                    foreach ($loai_hang as $loaihang) {
                        extract($loaihang);
                        echo ' <option value="'.$ma_loai.'" selected>'.$ten_loai.'</option>';
                    }
                    ?>
                    </select>
                    <br>
                </div>
                <div>Số lược xem<br>
                    <input class="form-control" name="soluotxem" disabled value="0" type="number"><br>
                </div>

            </div>

        </div>
        <div class="row mt-3 mb-3 ">

            <div class="form-floating">
                <textarea class="form-control" name="mo_ta" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px"></textarea>
                <label for="floatingTextarea2 m-3">Mô Tả</label>
            </div>
        </div>
        <div class="row">
        <div class="row m-3  ">
                    <div class="col text-center">
                        <a href=""><input class="btn btn-primary" type="submit" name="themmoi" value="Thêm Mới"></a>
                        <a href=""><input class="btn btn-primary" type="reset" value="Nhập Lại"></a>
                        <a href="index.php?pg=listhh">
                            <input class="btn btn-primary" type="button" value="Danh Sách">
                        </a>
                    </div>

                </div>
        </div>


        </form>

       
    </div>
    </div>
</body>
<script>
    $().ready(function() {
	$("#adhh").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: false,
		rules: {
			"hang_db": {
				required: true,
				
			},
			"name": {
				required: true,
				minlength: 20
			},
			"price": {
				required: true	,
                min :0
			},
            "ngay_nhap": {
                required: true,	
            },
            "sale_price": {
                required: true,	
            },
            "thumbnail": {
                required: true,	
            }

            
		},
		messages: {
			"hang_db": {
				required: "Bắt buộc chọn hàng đặc biệt or không đặc biệt",
				
			},
			"name": {
				required: "Bắt buộc nhập tên sản phẩm",
				minlength: "Hãy nhập ít nhất 20 ký tự"
			},
			"price": {
				required: "Bắt buộc nhập đơn giá",
                min : "giá phải lớn hơn 0"
			
			},
            "ngay_nhap": {
				required: "Chưa điền ngày nhập",
			
			},
            "sale_price": {
				required: "Chưa điền giảm giá",
			
			}
            ,
            "thumbnail": {
				required: "chưa nhập ảnh",
			
			}
		}
	});
});
</script>

</html>
