<html>
<head>
    <title>PHP2-Demo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="view/css/style.css">
</head>
<body>
  <div class="container">
    <div class="container p-4 fs-1 bg-success mb-3">
      <h1 style="color:aliceblue">Dự Án Mẫu</h1>
    </div>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Trang chủ</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?pg=addlh">Loại hàng </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?pg=addhh">Hàng hóa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?pg=addkh">Khách hàng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?pg=listbl">Bình luận</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?pg=listtk">Thống kê</a>
        </li>

        <?php
          // if(isset($_SESSION["admin"]))
          // {
          //   echo ' <li class="nav-item">
          //   <a class="nav-link" href="index.php?act=logout">Logout:'.$_SESSION["admin"].'</a>
          // </li>';
          // }
           
        ?>
       
      </ul>
    </nav>