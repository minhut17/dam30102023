<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="container mt-3">
    <h1>QUẢN LÝ HÀNG HÓA</h1>
  </div>

  <?php
  
  $dshh = hang_hoa_select_all();

  if (!empty($dshh)):

    ?>
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>Mã Hàng Hóa</th>
          <th>Tên Hàng Hóa</th>
          <th>Đơn Giá</th>
          <th>Giảm Giá</th>
          <!-- <th>Lược Xem</th> -->
          <th>Thành Động</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($dshh as $hh):
          // var_dump($products);
          ?>
          <tr>
            <td>
              <?= $hh['ma_hh'] ?>
            </td>

            <td>
              <?= $hh['ten_hh'] ?>
            </td>
            <td>
              <?=number_format($hh['don_gia'],0,",",".")?>đ
            </td>
            <td>
              <?php 
              
              $giam_gia=(($hh['giam_gia'])*100);
              echo $giam_gia.'%';
              ?>
            </td>
            
            
            <td>
              <a href="index.php?pg=updatehh&ma_hh=<?= $hh['ma_hh'] ?>" class="btn btn-primary">Sửa</a>
              <a onclick="return confirm('bạn có muốn xóa : <?= $hh['ten_hh'] ?>')" href="index.php?pg=deletehh&ma_hh=<?= $hh['ma_hh'] ?>" class="btn btn-danger">Xóa</a>
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