<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>bình luận</title>
</head>

<body>
  <div class="container mt-3">
    <h1>CHI TIẾT BÌNH LUẬN</h1>
  </div>

  <?php
  

  if (!empty($detailbl)):

    ?>
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>Nội dung</th>
          <th>Ngày Bình Luận</th>
          <th>mã Bình Luận</th>
          <th>Tên Khách Hàng</th>
          <th>Mã hàng hóa</th>
          <th>Thành Động</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($detailbl as $ct):
         
          ?>
          <tr>
            <td>
              <?=$ct['noi_dung'] ?>
            </td>

            <td>
              <?= $ct['ngay_bl'] ?>
            </td>
            
            <td>
              <?= $ct['ma_bl'] ?>
            </td>
            <td>
              <?= $ct['ho_ten'] ?>
            </td>
            <td>
              <?= $ct['ma_hh'] ?>
            </td>
            <td>
              <!-- <a href="index.php?pg=chitietbl&ma_hh=" class="badge bg-success">Chi Tiết</a> -->
              <!-- <a href="index.php?pg=deletelh&ma_loai=class="btn btn-danger">xoa</a> -->
            </td>


          </tr>
          <?php
        endforeach;
        ?>

      </tbody>
    </table>
    <?php
  else:
    ?>
    <div class="card-body">
      dang cap nhat du lieu
    </div>
    <?php
  endif;
  ?>

  </div>
</body>

</html>