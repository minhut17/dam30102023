<?php  

$html_dssp_moi =showhh($dssp_moi);



$html_dssp_hot =showhh($dssp_hot);



?>

<!-- <div  id="carouselExampleIndicators" class="carousel slide mt-3" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../layout/images/Tay-cam-SteelSeries-Stratusgia-tot.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../layout/images/banner1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../layout/images/banner-samsung.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div> -->

        <img src="../layout/images/Tay-cam-SteelSeries-Stratusgia-tot.jpg" alt="">
    

    <section class="containerfull">
        <div class="container">
            <h1>SẢN PHẨM HOT</h1><br>
            <div class="containerfull row">
                <div class="col-6">
                    <img src="../layout/images/baner3.webp" alt="">
                    <img src="../layout/images/banner4.webp" alt="">
                </div>
               <?=$html_dssp_hot?>
            </div>

            <div class="containerfull mr30">
                <h1>SẢN PHẨM MỚI</h1><br>
                <!-- in sản phẩm mới nhất -->
                <?=$html_dssp_moi?>
            
            </div>
        </div>
           
    </section>


 