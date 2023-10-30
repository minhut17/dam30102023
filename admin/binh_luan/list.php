<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>bình luận</title>
</head>

<body>
  <div class="container mt-3">
    <h1>QUẢN LÝ BÌNH LUẬN</h1>
  </div>

  <?php
  

  if (!empty($dsbl)):

    ?>
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>Hàng Hóa </th>
          <th>Số Bình Luận</th>
          <th>Củ Nhất</th>
          <th>Mới Nhất</th>
          <th>Thành Động</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($dsbl as $bl):
         
          ?>
          <tr>
            <td>
              <?=$bl['ten_hh'] ?>
            </td>

            <td>
              <?= $bl['soluong'] ?>
            </td>
            
            <td>
              <?= $bl['cunhat'] ?>
            </td>
            <td>
              <?= $bl['moinhat'] ?>
            </td>
            <td>
              <a href="index.php?pg=chitietbl&ma_hh=<?= $bl['ma_hh'] ?>" class="badge bg-success">Chi Tiết</a>
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