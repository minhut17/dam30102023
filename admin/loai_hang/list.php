

  <div class="container mt-3">
    <h1>QUẢN LÝ LOẠI HÀNG</h1>
  </div>

  <?php



  if (!empty($dslh)):

    ?>
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>Mã Loại</th>
          <th>Tên Loại</th>
          <th>Thành Động</th>

        </tr>
      </thead>
      <tbody>
        <?php foreach ($dslh as $lh):
          // var_dump($products);
          ?>
          <tr>
            <td>
              <?= $lh['ma_loai'] ?>
            </td>

            <td>
              <?= $lh['ten_loai'] ?>
            </td>
            <td>
             <div class="m-3">
             <a href="index.php?pg=updatelh&ma_loai=<?= $lh['ma_loai'] ?>" class="btn btn-primary">Sua</a>
              
              <a href="index.php?pg=deletelh&ma_loai=<?= $lh['ma_loai'] ?>" class="btn btn-danger">xoa</a>
             </div>
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
