<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('front/_layout/Head'); ?>
</head>
<!-- DEVELOP BY : HAMZAH SAPUTRA -->
<style>
    .wave {
        min-height: 100%;
        background-attachment: scroll;
        background-repeat: no-repeat;
        background-position: bottom left, bottom right;
    }

    .wave2 {
        min-height: 100%;
        background-attachment: fixed;
        background-repeat: no-repeat;
        background-position: top left, top right;
    }
    .btn-ku {
        background-color: #e5505d;
        color: white;
    }
    .bg-ku {
        background-color: transparent;
    }
</style>
<body class="wave2">

  <!-- ======= Navbar ======= -->
  <?php $this->load->view('front/_layout/Navbar'); ?>

<div class="loader">
    <div class="cube-wrapper">
        <div class="cube-folding">
            <span class="leaf1"></span>
            <span class="leaf2"></span>
            <span class="leaf3"></span>
            <span class="leaf4"></span>
        </div>
        <span class="loading" data-name="Loading">Mohon tunggu</span>
    </div>
</div>
<div class="main">
    <div class="slide-home container">
        <div class="in-slide bg-ku rounded" style="padding:0px;">
            <div id="carouselExampleIndicators" class="carousel slide col-md-12 col-12" data-bs-ride="carousel">

                <div class="carousel-inner rounded">
                    <?php $i=0; foreach ($dataSlide as $d): $i++?>
                                        <div class="carousel-item <?php if ($i == 1) {
  echo "active";
  } ?>">
                        <a href="">
                            <img src="<?php echo $d->FotoSlide; ?>" class="img-slide d-block w-100 rounded-3" alt="...">
                        </a>
                    </div>
                    <?php endforeach; ?>
                                    </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>


    <!-- ======= Works Section
    <!-- <main id="main" style="padding:0;">
    <div class="mvstyle">
      <div class="slide-home mvstyle">
        <div class="col-md-12 col-12 mvstyle" style="padding:0px;">
          <div id="carouselExampleControls" class="carousel slide mvstyle" data-ride="carousel">
            <div class="carousel-inner">
              <?php $i=0; foreach ($dataSlide as $d): $i++?>
                <div class="carousel-item <?php if ($i == 1) {
  echo "active";
  } ?>" >
                  <img class="d-block w-100 rounded" src="<?php echo $d->FotoSlide; ?>" alt="First slide">
                </div>
              <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div> -->
    
    <section class="section site-portfolio text-white mvstyle" style="padding-top:10px;padding-bottom:10px;">
      <div class="container mvstyle">
        <div class="rounded mvstyle" style="">
          <?php foreach ($dataCat as $dc): ?>
          <div class="d-inline-block">
            <h2 class="mb-2 mt-1 tilte-category" style="color:black;"><?php echo $dc->ProductCat; ?> TOPUP</h2>
          </div>
          <div id="portfolio-grid" class="row no-gutter pt-3 rounded mx-1"   data-aos-delay="200">
            <?php foreach ($dataProduct as $d): ?>
              <?php if ($dc->ProductCat == $d->ProductCat): ?>
              <div class="item branding col-sm-4 col-md-2 col-lg-3 mb-3 col-4" style="padding:10px;">
                  <div class="card-sizer">
                <a href="<?php if ($d->ProductLink == '-') {
                  echo base_url('order/id/').$d->ProductSlug;
                }else {
                  echo $d->ProductLink;
                }  ?>" class="card-container a-plain aproduct">
                  <div class="card-title-publisher-wrap">
                      <div class="card-game-title text-dark"><?php echo $d->ProductName ?>
                  </div>
                  </div>
                  <div class="topup-button rounded-pill flex-center-xy">
                                          TOP UP
                                      </div>
                  <img class="card-image img-fluid rounded" src="<?php echo $d->ProductImage; ?>">
                  <!-- <div class="bg-dark text-white p-1">
                    <p class="m-0 text-center " style="font-size:13px;">PULSA ALL OPERATOR</p>
                  </div> -->
                </a>

              </div>
              </div>
              <?php endif; ?>
            <?php endforeach; ?>

          </div>
          <?php endforeach; ?>
        </div>

      </div>
    </section>

   <!-- <section class="section site-portfolio text-white mvstyle" style="padding-top:10px;padding-bottom:10px;">
      <div class="container mvstyle">
        <div class="rounded mvstyle" style="">
          <?php foreach ($dataCat as $dc): ?>
          <div class="d-inline-block">
            <h2 class="mb-2 mt-1 tilte-category" style="color:black;"><?php echo $dc->ProductCat; ?> TOPUP</h2>
          </div>
          <div id="portfolio-grid" class="row no-gutter pt-3 rounded mx-1"   data-aos-delay="200">
            <?php foreach ($dataProduct as $d): ?>
              <?php if ($dc->ProductCat == $d->ProductCat): ?>
              <div class="item branding col-sm-4 col-md-2 col-lg-3 mb-3 col-4" style="padding:10px;">
                  <div class="card-sizer">
                <a href="<?php if ($d->ProductLink == '-') {
                  echo base_url('order/id/').$d->ProductSlug;
                }else {
                  echo $d->ProductLink;
                }  ?>" class="card-container a-plain aproduct">
                  <div class="card-title-publisher-wrap">
                      <div class="card-game-title text-dark"><?php echo $d->ProductName ?>
                  </div>
                  </div>
                  <div class="topup-button rounded-pill flex-center-xy">
                                          TOP UP
                                      </div>
                  <img class="card-image img-fluid rounded" src="<?php echo $d->ProductImage; ?>">
                  <!-- <div class="bg-dark text-white p-1">
                    <p class="m-0 text-center " style="font-size:13px;">PULSA ALL OPERATOR</p>
                  </div> 
                </a>

              </div>
              </div>
              <?php endif; ?>
            <?php endforeach; ?>

          </div>
          <?php endforeach; ?>
        </div>

      </div>
    </section> -->
    
     <!--<section class="section site-portfolio text-white mvstyle" style="padding-top:10px;padding-bottom:10px;">
<div class="container">
<div class="list-product">
    <?php foreach ($dataCat as $dc): ?>
<div class="col-md-12 col-12">
<div class="d-inline-block">
<h3 class="mb-0 mt-1 tilte-category"><font color="black"><?php echo $dc->ProductCat; ?> <strong>TOPUP</strong> </font></span> </h3>
</div>
<div class="row">
    <?php foreach ($dataProduct as $d): ?>
              <?php if ($dc->ProductCat == $d->ProductCat): ?>
<div class="col-4 col-md-2  " style="padding:10px;">
<a class="aproduct" href="<?php if ($d->ProductLink == '-') {
                  echo base_url('order/id/').$d->ProductSlug;
                }else {
                  echo $d->ProductLink;
                }  ?>">
<div class="product" style="margin-top:40px;">
<div class=" cards-list bg-light" style="border-radius:15px;heigth:100%;padding:0 5px 0 5px;">
<div class="card 1" style="border-color:transparent;background-color:transparent;">
<div class="card_image"> <img alt="Higgs Domino" src="<?php echo $d->ProductImage; ?>" /> </div>
<div class="card_title title-white">
</div>
<div class="text-center text-truncate" style="margin-top:10px;margin-bottom:10px;">
<span class="text-dark text-lowercase "><?php echo $d->ProductName ?></span><br>
<span style=" font-size: 13px;" class="text-secondary">Games</span>
</div>
<div class="mx-auto w-100 " style="margin: 0 0 5px 0;">
<button class="btn btn-ku d-block w-100 fw-bolder" type="button" style="border-radius: 15px;font-size:10px">TOP UP</button>
</div>
</div>
</div>
 
</div>
</a>
</div>

<?php endif; ?>
            <?php endforeach; ?>
</div>
<?php endforeach; ?>
</div>
</div>
</div>
</div>
      </section> -->
      
    <!-- <section class="section site-portfolio text-white mvstyle" style="padding-top:10px;padding-bottom:10px;">
<div class="container">
        <div class="list-product">
            <div class="col-md-12 col-12">
                <?php foreach ($dataCat as $dc): ?>
                                <div class="d-inline-block">
                    <h3 class="mb-2 mt-1 tilte-category"><?php echo $dc->ProductCat; ?> TOPUP</h3>
                </div>
                <div class="games-all-container">
                    <?php foreach ($dataProduct as $d): ?>
              <?php if ($dc->ProductCat == $d->ProductCat): ?>
                <div class="row">
                                                          <div class="col-4 col-md-2" style="padding:10px;">
                  <div class="card-sizer">
                      <a class="card-container a-plain aproduct" href="<?php if ($d->ProductLink == '-') {
                  echo base_url('order/id/').$d->ProductSlug;
                }else {
                  echo $d->ProductLink;
                }  ?>">

                                      <div class="card-image">
                                          <img src="<?php echo $d->ProductImage; ?>" loading="lazy">
                                      </div>
                                      <div class="card-title-publisher-wrap">
                                      <div class="card-game-title text-dark">
                                          <?php echo $d->ProductName ?>                                   </div>
                                      </div>
                                      <div class="topup-button rounded-pill flex-center-xy">
                                          TOP UP
                                      </div>

                        </a>
                  </div>
                  </div>
                                                        </div>
                                                        <?php endif; ?>
                                                        
            <?php endforeach; ?>
                </div>
                
          <?php endforeach; ?>
                </div>
                </div>
                            </div>
    </section> -->
    
    
    
    <div class="container bg-white rounded" style="margin-top:25px;">
      <div class="col-md-12 col-12">
        <div class="title text-dark text-center">
          <h2><?php echo SITE_NAME ?>: Website top-up terbesar & terpercaya di Indonesia</h2>
        </div>
        <div class="col-md-12 col-12 text-dark text-center">
          <p>Setiap bulannya, jutaan gamers menggunakan Kaneki Pedia untuk melakukan pembelian kredit game dengan lancar: tanpa registrasi ataupun log-in, dan kredit permainan akan ditambahkan secara instan. Top-up Mobile Legends, Free Fire, Ragnarok M, dan berbagai game lainnya!</p>
        </div>
      </div>
      <div class="row text-dark">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          <div class="m-1 ">
            <div class="row">
              <div class="icon text-dark col-2 text-center">
                  <i class="bi bi-clock-history" style="font-size:30px;"></i>
              </div>
              <div class="col-10">
                <div class="title text-left">
                  Bayar dalam hitungan detik
                </div>
                <div class="text-left subtitle" style="font-size:13px;">
                  Hanya dibutuhkan beberapa detik saja untuk menyelesaikan pembayaran di Kaneki Pedia karena situs kami berfungsi dengan baik dan mudah untuk digunakan.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          <div class="m-1 ">
            <div class="row">
              <div class="icon text-dark col-2 text-center">
                  <i class="bi bi-wallet-fill" style="font-size:30px;"></i>
              </div>
              <div class="col-10">
                <div class="title text-left">
                  Metode pembayaran terbaik
                </div>
                <div class="text-left subtitle" style="font-size:13px;">
                  Kami menawarkan begitu banyak pilihan pembayaran mulai dari potong pulsa, e-wallet, bank transfer, dan pembayaran di mini market terdekat.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          <div class="m-1 ">
            <div class="row">
              <div class="icon text-dark col-2 text-center">
                  <i class="bi bi-tags-fill" style="font-size:30px;"></i>
              </div>
              <div class="col-10">
                <div class="title text-left">
                  Promosi-promosi menarik
                </div>
                <div class="text-left subtitle" style="font-size:13px;">
                  Penggemar game dapat bergantung pada Kaneki Pedia karena kami memberikan penawaran menarik, diskon dan kode item dari promosi game yang disukai kamu.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          <div class="m-1 ">
            <div class="row">
              <div class="icon text-dark col-2 text-center">
                  <i class="bi bi-gem" style="font-size:30px;"></i>
              </div>
              <div class="col-10">
                <div class="title text-left">
                  Pengiriman instan
                </div>
                <div class="text-left subtitle" style="font-size:13px;">
                  Ketika kamu melakukan top-up di Kaneki Pedia, item atau barang yang kamu beli akan selalu dikirim ke akun kamu secara instan dan cepat, tanpa tertunda.
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
          <div class="m-1 ">
            <div class="row">
              <div class="icon text-dark col-2 text-center">
                  <i class="bi bi-people-fill" style="font-size:30px;"></i>
              </div>
              <div class="col-10">
                <div class="title text-left">
                  Pelayanan Pelanggan
                </div>
                <div class="text-left subtitle" style="font-size:13px;">
                  Tim support siap membantu Anda dari pukul 9 pagi hingga 12 pagi, 7 hari seminggu. Kirimkan Support Request Form dan kami akan segera menghubungi Anda!
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->


  <!-- Vendor JS Files -->
  <?php $this->load->view('front/_layout/Footer'); ?>
  <script>
  if ($(window).width() < 960) {
   $('.slide-home').removeClass('container');
  }
  else {
   $('.slide-home').addClass('container');
  }
  </script>
</body>

</html>
