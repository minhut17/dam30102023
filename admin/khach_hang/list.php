<?php
$dskh = khach_hang_select_all();
if (!empty($dskh)):
  ?>
<h1 class="m-3 text-center">QUẢN LÝ KHÁCH HÀNG</h1>
  <table class="table container table-striped table-bordered mt-3">
    <thead>
      <tr>
        <th>Mã Khách hàng</th>
        <th>Họ Và Tên</th>
        <th>Địa Chỉ Email</th>
        <th>Hình Ảnh</th>
        <!-- <th>passwword</th> -->
        <th>Vai Trò</th>
        <th>Thành Động</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($dskh as $kh):
        // var_dump($products);
        ?>
        <tr>
          <td>
            <?= $kh['ma_kh'] ?>
          </td>

          <td>
            <?= $kh['ho_ten'] ?>
          </td>
          <td>
            <?= $kh['email'] ?>
          </td>
          <td>
           <img class="w-25" src="<?= $kh['hinh'] ?>" alt="">
          </td>
          

          <td>
            <?= $kh['vai_tro'] ?>
          </td>
          <td>
            <a  href="index.php?pg=updatekh&ma_kh=<?= $kh['ma_kh'] ?>" class="btn btn-primary mb-3">Sửa</a>
            <a href="index.php?pg=deletekh&ma_kh=<?= $kh['ma_kh'] ?>" class="btn btn-danger">Xóa</a>
          </td>


        </tr>

        <?php
      endforeach;
      ?>

    </tbody>
    <!-- </div> -->

  </table>
  
    
  <?php else: ?>
    <div class="card-body">
      dang cap nhat du lieu
    </div>
    <?php
endif;
?>
