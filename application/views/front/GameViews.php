<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('front/_layout/Head'); ?>
  <style media="screen">
  /* Chrome, Safari, Edge, Opera */
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }
  a:not([href]):not([tabindex]){
    color: black;
  }
    a.readmore{
      cursor: pointer;
      color: black;
    }
    a.readmore:hover{
      color: black;
    }
    p.readmore{
      cursor: pointer;
      color: black;
    }
    .balance{
      cursor: pointer;
    }
    .readmore:hover {
      color: red;
    }
        .wave {
        min-height: 100%;
        background-attachment: scroll;
        background-image: url("https://www.nevipedia.com/assets/main/img/wave4.svg");
        background-repeat: no-repeat;
        background-position: bottom left, bottom right;
    }

    .wave2 {
        min-height: 100%;
        background-attachment: fixed;
        background-image: url("https://www.nevipedia.com/assets/main/img/wave4.svg");
        background-repeat: no-repeat;
        background-position: top left, top right;
    }
    .listpayment {
        background-color: white;
        color: black;
    }
  </style>
</head>
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
        <span class="loading" data-name="Loading">Loading</span>
    </div>
</div>
   <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mt-2 mb-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="card shadow text-center">
                                <div class="card-body">
                                    <img class="product-icon" src="<?php echo $gamePic; ?>" alt="Image">
                                    <h5><?php echo $gameName; ?></h5>
                                    <div id="product-description" class="product-game-description mt-2">
                                        <p><span class="text-muted"> PERINGATAN: Mohon untuk hubungi pihak <?php echo $gameName; ?> jika anda ada pertanyaan perihal Top up ! Cukup masukan User ID <?php echo $gameName; ?> Anda, pilih jumlah Top up yang Anda inginkan, selesaikan pembayaran, dan Diamond akan secara langsung ditambahkan ke akun <?php echo $gameName; ?> Anda.Bayarlah menggunakan GoPay, OVO, Bank Transfers, DANA, Shopee Pay, LinkAja, Alfamart . <?php echo SITE_NAME; ?> adalah cara terbaik untuk top up <?php echo $gameName; ?>  secara online tanpa perlu kartu kredit, registrasi ataupun log-in.Unduh dan mainkan <?php echo $gameName; ?> sekarang!'</span></p>
                                        <div class="product-show-more" id="product-description-showmore">
                                            <a href="javascript:void(0)" type="button">More</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <center>
                                        <div class="card-body bg-kuning rounded">
                                            <a href="https://wa.me/+6285713205339" style="color:black;"><span class="bi bi-whatsapp"></span>
                                                Kontak Developer </a>
                                        </div>
                                    </center>
                                    <div class="product-links">
                                        <a href="https://kaneki-pedia.site/deposit" target="_blank" class="product-link text-dark">
                                            <img src="https://kaneki-pedia.site/cart.png" width="38"><span class="bi bi-Deposit"></span>
                                             Deposit
                                        </a>
                                        <a href="https://instagram.com/kuroz.pedia" target="_blank" class="product-link text-dark">
                                            <span class="bi bi-instagram"></span>
                                             Instagram
                                        </a>
                                        <a href="<?php echo base_url(); ?>" target="_blank" class="product-link text-dark">
                                            <span class="bi bi-globe"></span>
                                             Situs Web
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
              
                        <div class="col mt-3 d-lg-block d-none">
                            <div class="card shadow">
                                <div class="card-header">Game Lainnya</div>
                                <div class="card-body">
                                                                        <div class="row mb-2">
                                        <div class="col">
                                            <div class="card flex-row flex-wrap">
                                                <div class="card-header border-0">
                                                    <a href="<?php echo base_url(); ?>/order/id/higgs-domino"
                                                        class="stretched-link">
                                                        <img src="<?php echo base_url(); ?>assets/upload/home/product/94ab67ef157472f237dde7d172fa6089.png" height="50px">
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <b>Higgs Domino</b><br>
                                                    Games                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                        <div class="row mb-2">
                                        <div class="col">
                                            <div class="card flex-row flex-wrap">
                                                <div class="card-header border-0">
                                                    <a href="<?php echo base_url(); ?>/order/id/free-fire"
                                                        class="stretched-link">
                                                        <img src="<?php echo base_url(); ?>assets/upload/home/product/192b3cf68cad2f5389e8245d73d90fea.png" height="50px">
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <b>FREE FIRE</b><br>
                                                    Games                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                        <div class="row mb-2">
                                        <div class="col">
                                            <div class="card flex-row flex-wrap">
                                                <div class="card-header border-0">
                                                    <a href="<?php echo base_url(); ?>/order/id/mobile-legend"
                                                        class="stretched-link">
                                                        <img src="<?php echo base_url(); ?>assets/upload/home/product/e6059c38aaa4b84b1d550f0413ba8b95.png" height="50px">
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <b>MOBILE LEGEND</b><br>
                                                    Games                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-8 mt-2 mb-2">
                    <div class="row">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h5 class="title-game">1. Masukkan Nomor Pelanggan</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row input-group mt-4 pb-4" style="width: auto;">
                                                                                    <div class="col-md-12 col-12 form-group">
                                                <div class="input-group input-main-id">
                                                  	<span class="input-group-text"><i class="bi bi-person"></i></span>
                                                  	<input value="" nickname="" status="true" style="" type="text" placeholder="User ID & Server ID" name="id" class="form-control inputnew userid" id="id" required>
                                              </div>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <input type="text" class="form-control nicknamecek text-center" placeholder="Nickname" readonly>
                                           </div>
                                           </div>
                                       <p><small><?php echo $gameId; ?></small></p>
                                       <!-- <button class="btn btn-primary btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#petunjukModal">Petunjuk</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                      
                                
                    <div class="row mt-3">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h5 class="title-game">2. Pilih Jumlah</h5>
                                </div>
                                <div class="card-body">
                                    <div class="listproduct">
                                        <div class="row">
                                            <?php foreach ($data as $d):                       if ($d->buyer_product_status == true && $d->seller_product_status == true &&  $d->brand == $gameName) {                       ?>                                       <div class="col-md-4 col-6 text-center align-middle" style="padding:10px;">
                                                <div desc="no pelanggan = gabungan antara user_id dan zone_id" class="border rounded item" style="padding:5px;height:100%;" id="<?php echo $d->buyer_sku_code; ?>" price="<?php echo $d->newprice; ?>" itemname="<?php echo $d->product_name; ?>">
                                                    <h6 class="item-name"><?php echo $d->product_name; ?></h6>
                                                </div>
                                            </div>
                                            <?php }  endforeach; ?>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h5 class="title-game">3. Pilih Metode Pembayaran</h5>
                                    <center>
                                <p><small>NOTED : Jika Ingin Memilih Paymentnya Silahkan Klik Pada Bagian Angka Total Harganya.</small></p>
                                </center>
                                </div>
                                <div class="card-body">
                                    <div class="listproduct">
                                        <div class="row listpayment"> 
                                            
                                      	</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-3 pb-5">
                        <div class="col">
                            <div class="card shadow">
                                <div class="card-header">
                                    <h5 class="title-game">4. Beli Sekarang</h5>
                                </div>
                                <?php if (!$this->ion_auth->logged_in()) {?>
                                <div class="card-body">
                                                               <input value="" style="" type="email" placeholder="Masukkan Email" name="EmailSend" class="form-control rounded sendemail" id="SendEmail" required>
                                                               </div>
                                                               	<?php } ?>
                                                                        <div style="margin-top:10px;" class="g-recaptcha" data-sitekey="<?php echo GOOGLESITE_KEY; ?>"></div>
                              		
                                    <div class="row mt-3 mb-2">
                    					<div class="col-lg-12 clearfix">
                        					<div class="float-end">
                            					<button nickname="" itemid="" payment="" userids="false" userid="" price="" type="button" class="btn btn-primary buy" name="button"><i class="bi bi-bag-check"></i> Beli Sekarang</button>
                        					</div>
                    					</div>
                					</div>  
                              	</div>
                              
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- ======= Footer ======= -->
  <!-- Vendor JS Files -->
  <?php $this->load->view('front/_layout/Footer'); ?>
  
  
  <script>
    // Description show more event listener
    if($('#product-description-showmore').length){
        $('#product-description-showmore').on('click',function(event){
        $('#product-description').addClass('expanded');
        $(this).hide();
        });
    }
</script>
  <script type="text/javascript">
  $( document ).ready(function() {
    getPayment();
    $('.userid').focusout(function(){
      var cekurl = '<?php echo $gameCekId; ?>';
      if (this.value != '') {
        if (cekurl != '') {
          var UserId = this.value;
          $.LoadingOverlay("show");
          $.ajax({
              url: cekurl,
              cache: false,
              type: "post",
              dataType: "json",
              async: true,
              data: {
                  "UserId": UserId,
              },

              success: function (data) {
                if (!data.Status) {
                  Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Id Tidak Ditemukan.',
                            // footer: '<a href="">Why do I have this issue?</a>'
                          })
                  $(".userid").attr('status', 'false');
                  $(".buy").attr('userids','false');
                } else {
                  Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: 'Username : '+data.NickName,
                            // footer: '<a href="">Why do I have this issue?</a>'
                          })
                          $('.nicknamecek').val(data.NickName);
                  $(".userid").attr('status', 'true');
                  $(".userid").attr('nickname', data.NickName);
                  $(".buy").attr('userid',$(".userid").val());
                  $(".buy").attr('userids','true');
                  $(".buy").attr('nickname',data.NickName);
                }
                $.LoadingOverlay("hide");
              },
              error: function () {
                $.ajax(this);
                return false;
              }
          });
        } else {
          $(".buy").attr('userid',$(".userid").val());
          $(".buy").attr('userids','true');
          $(".buy").attr('nickname',$(".userid").val());
        }
      }
    });
    function getPayment(){
      $.ajax({
          url: "<?php echo base_url('order/getPayment') ?>",
          cache: false,
          type: "get",
          dataType: "json",
          async: true,
          success: function (data) {

            if (data === null) {
              alert('TERJADI KESALAHAN SILAHKAN COBA KEMBALI.');
            } else {
              $(".listpayment").empty();
              for (var i = 0; i < data.data.length; i++) {
                if (data.data[i].code != "BALANCE") {
                  $(".listpayment").append('<div class="row p-1 mt-2 rounded mx-0 bg-kuning" style="height:60px;">'
                    +'<div class="col-md-4 col-4" style="height:100%;">'
                      +'<img style="height:40px;max-width:100%;" src="'+data.data[i].image+'" alt="">'
                    +'</div>'
                    +'<div class="col-md-8 col-8">'
                      +'<p style="width:100%;"><button disabled style="width:100%;margin-top:2px;" id="'+data.data[i].code+'" class="readmore text-center align-middle payment rounded '+data.data[i].code+'">'+formatRupiah(data.data[i].price.toString(), 'Rp. ')+'</button></p>'
                    +'</div>'
                  +'</div>');
                }else {
                  <?php if ($this->ion_auth->logged_in()){ ?>
                  $(".listpayment").append('<div class="row p-1 mt-2 rounded mx-0 bg-kuning" style="height:60px;">'
                    +'<div class="col-md-4 col-4" style="height:100%;">'
                      +'<h4 class="h4 text-dark" style="margin-top:10px;">'+data.data[i].code+'</h4>'
                    +'</div>'
                    +'<?php if ($this->ion_auth->logged_in()){ ?>'
                      +'<div class="col-md-8 col-8">'
                        +'<p style="width:100%;"><button style="width:100%;" id="'+data.data[i].code+'"  class="readmore text-center align-middle payment rounded '+data.data[i].code+'">'+formatRupiah(data.data[i].price.toString(), 'Rp. ')+'</button></p>'
                      +'</div>'
                    +'<?php }else{ ?>'
                      +'<div class="col-md-8 col-8">'
                        +'<p style="width:100%;" class="readmore text-center align-middle'+data.data[i].code+'">Rp.0</p>'
                      +'</div>'
                    +'<?php } ?>'
                  +'</div>');
                  <?php } ?>
                }
              }

            }
          },
          error: function () {
            $.ajax(this);
            return false;
          }
      });
    }

    if ($(window).width() < 960) {
     $(".deskpro").text('PERINGATAN: Mohon untuk hubungi pihak <?php echo $gameName; ?> jika anda ada pertanyaan....');
     $(".readmorep").append('<a style="color:white;" class="readmorea">Readmore</a>');
    }
    else {
     $(".deskpro").text('PERINGATAN: Mohon untuk hubungi pihak <?php echo $gameName; ?> jika anda ada pertanyaan perihal Top up ! Cukup masukan User ID <?php echo $gameName; ?> Anda, pilih jumlah Top up yang Anda inginkan, selesaikan pembayaran, dan Diamond akan secara langsung ditambahkan ke akun <?php echo $gameName; ?> Anda.Bayarlah menggunakan GoPay, OVO, Bank Transfers, DANA, Shopee Pay, LinkAja, Alfamart . <?php echo SITE_NAME; ?> adalah cara terbaik untuk top up <?php echo $gameName; ?>  secara online tanpa perlu kartu kredit, registrasi ataupun log-in.Unduh dan mainkan <?php echo $gameName; ?> sekarang!');
    }
    $('.readmorep').on('click','.readmorea',function() {
      $(".deskpro").text('PERINGATAN: Mohon untuk hubungi pihak <?php echo $gameName; ?> jika anda ada pertanyaan perihal Top up ! Cukup masukan User ID <?php echo $gameName; ?> Anda, pilih jumlah Top up yang Anda inginkan, selesaikan pembayaran, dan Diamond akan secara langsung ditambahkan ke akun <?php echo $gameName; ?> Anda.Bayarlah menggunakan GoPay, OVO, Bank Transfers, DANA, Shopee Pay, LinkAja, Alfamart. <?php echo SITE_NAME; ?> adalah cara terbaik untuk top up <?php echo $gameName; ?>  secara online tanpa perlu kartu kredit, registrasi ataupun log-in.Unduh dan mainkan <?php echo $gameName; ?> sekarang!');
      $(".readmorea").remove();
      $(".readmorep").append('<a style="color:white;" class="readmorem">Hide</a>');
    });
    $('.readmorep').on('click','.readmorem',function() {
      $(".deskpro").text('PERINGATAN: Mohon untuk hubungi pihak <?php echo $gameName; ?> jika anda ada pertanyaan....');
      $(".readmorem").remove();
      $(".readmorep").append('<a style="color:white;" class="readmorea">Readmore</a>');
    });
    //$(".bd-example-modal-lg").modal('show');
    $('.bd-example-modal-lg').on('hidden.bs.modal', function () {
      location.reload();
    });
    console.log( "ready!" );

    $(document).on("click",".close", function () {
      $(".bd-example-modal-lg").modal('hide');
    });
    $(document).on("click",".payment", function () {
      //console.log($(this).attr('price'));
      if ($(this).attr('price') === undefined) {
      }else {
        $(".payment").removeClass("text-dark");
      $(this).addClass("text-dark");

$(".payment").css("background-color","#ffc107");
      $(this).css("background-color","#e8f953");
        $(".buy").attr('price',$(this).attr('price'));
        $(".buy").attr('userid',$(".userid").val());
        $(".buy").attr('payment',$(this).attr('id'));
      }
    });
    //=====================================================
    $(document).on("click",".buy", function () {
      var cekurl = '<?php echo $gameCekId; ?>';
      var token = $("#g-recaptcha-response").val();
      var SendEmail = $('.sendemail').val();
      <?php if (!$this->ion_auth->logged_in()) {?>
        if  (SendEmail == ''){
          Swal.fire({
                      icon: 'error',
                      title: 'Failed',
                      html: 'Silahakan masukan Email terlebih dahulu.',
                      // footer: '<a href="">Why do I have this issue?</a>'
                    });
          return false;
        }
      <?php } ?>
      if (cekurl != '') {
        if ($(this).attr('userids') == 'false') {
          Swal.fire({
                        icon: 'error',
                        title: 'Failed',
                        html: 'Silahakan masukan id yang benar.',
                        // footer: '<a href="">Why do I have this issue?</a>'
                      });
          return false;
        }
      }

      if ($(this).attr('price') === "") {
        Swal.fire({
                  icon: 'error',
                  title: 'Failed',
                  html: 'Silahakan pilih metode pembayaran dulu.',
                  // footer: '<a href="">Why do I have this issue?</a>'
                });
        return false;
      }
      if ($(".userid").val() === "") {
        Swal.fire({
                  background : '#ffffff',
                  color: 'black',
                  icon: 'error',
                  title: 'Failed',
                  html: 'Silahkan isi id terlebih dahulu.',
                  // footer: '<a href="">Why do I have this issue?</a>'
                });
        return false;
      }
      Swal.fire({
                title: 'Anda yakin ingin melanjutkan pembelian? Pastikan user id benar!.',
                showCancelButton: true,
                confirmButtonText: 'Ok',
              }).then((result) => {
                if (result.isConfirmed) {
                    if ($(this).attr('payment') == 'BALANCE') {
                      <?php if ($this->ion_auth->logged_in()){ ?>
                        if ($(this).attr('price') > <?php echo $this->ion_auth->user()->row()->Balance; ?>) {
                          Swal.fire({
                                background : '#212529',
                                color: 'white',
                                icon: 'error',
                                title: 'Failed',
                                html: 'Saldo tidak cukup.',
                                // footer: '<a href="">Why do I have this issue?</a>'
                              });
                          return false;
                        }
                      <?php } ?>
                    }
                    $.LoadingOverlay("show");
                     var price = $(this).attr('price');
                     var userid = $(".userid").val();
                     var payment = $(this).attr('payment');
                     var itemid = $(this).attr('itemid');
                     var nickname = $(this).attr('nickname');
                     var itemname = $(this).attr('itemname');
                    $.ajax({
                        url: "<?php echo base_url('prosess') ?>",
                        cache: false,
                        type: "post",
                        dataType: "json",
                        async: true,
                        data: {
                          "price": price,
              "userid": userid,
              "payment": payment,
              "itemid":itemid,
              "game" : "<?php echo $gameCode; ?>",
              "token" : token,
              "nickName" : nickname,
              "itemName" : itemname,
              "SendEmail" : SendEmail,

                        },
                        success: function (data) {
                          if (data === null) {
                            Swal.fire({
                                  icon: 'error',
                                  title: 'Failed',
                                  html: '<p> Pembelian gagal harap ulangi beberapa saat lagi, Atau pilih item lain. </p>',
                                  // footer: '<a href="">Why do I have this issue?</a>'
                                });
                          } else {
                            if (data.status === "FAILED") {
                              Swal.fire({
                                    background : '#ffffff',
                                    color: 'black',
                                    icon: 'error',
                                    title: 'Failed',
                                    html: '<p> Pembelian gagal harap ulangi beberapa saat lagi, Atau pilih item lain. </p>'
                                    +'<p> Error : '+data.message+' </p>',
                                    // footer: '<a href="">Why do I have this issue?</a>'
                                  });
                            }else
                            if (data.status === "BALANCE") {
                              Swal.fire({

                                icon: 'success',
                                title: 'Sukses',
                                html: '<p> Metode pembayaran : Balance </p>'
                                +'<p> User id : '+data.NickName+' </p>'
                                +'<p> Invoice : '+data.InvoiceId+' (Simpan untuk cek status pesanan)</p>'
                                +'<p> Terimakasih telah melakukan pembelian, pesanan akan segera di proses.</p>',
                                // footer: '<a href="">Why do I have this issue?</a>'
                              }).then((result) => {
                                  if (result.isConfirmed) {
                                    window.location.href = '<?php echo base_url('pesanan'); ?>?inv='+data.InvoiceId;
                                  }
                                });
                                cektransaksi(data.InvoiceId);
                            }else {
                              if (data.success) {
                                if (data.data.payment_method === "OVO") {
                                  window.location.replace(data.data.checkout_url);
                                }else {
                                  var qq = '';
                                  for (var i = 0; i < data.data.instructions.length; i++) {
                                    qq += "<p class='text-warning'>"+(i+1)+" : "+data.data.instructions[i].title+"</p>";
                                    for (var j = 0; j < data.data.instructions[i].steps.length; j++) {
                                      qq += "<p> - "+data.data.instructions[i].steps[j]+"</p>";
                                    }
                                  }

                                  if (data.data.qr_url != undefined) {
                                    Swal.fire({
                                      imageUrl: data.data.qr_url != undefined ? data.data.qr_url : ' ',
                                      imageWidth: 200,
                                      imageHeight: 200,
                                      icon: 'success',
                                      title: 'Sukses',
                                      html: '<p> Metode pembayaran : '+data.data.payment_name+'</p>'
                                      +'<p> Username : '+data.data.customer_name+'</p>'
                                      +'<p> Invoice : '+data.data.merchant_ref+' (Simpan untuk cek status pesanan)</p>'
                                      +'<p> Total : '+formatRupiah(data.data.amount.toString(), 'Rp. ')+'</p>'
                                      +'<p> Item : '+data.data.order_items[0].name+'</p>'
                                      // + data.data.qr_url != undefined ? '<img class="mx-auto" style="display:block;margin-bottom:10px;" src="'+data.data.qr_url+'" alt="">' : ' '
                                      +'<p> Cara Pembayaran </p>'
                                      +qq
                                    }).then((result) => {
                                      if (result.isConfirmed) {
                                        window.location.href = '<?php echo base_url('pesanan'); ?>?inv='+data.data.merchant_ref;
                                      }
                                    });
                                    cektransaksi(data.data.merchant_ref);
                                  }else {
                                    Swal.fire({
                                      icon: 'success',
                                      title: 'Sukses',
                                      html: '<p> Metode pembayaran : '+data.data.payment_name+'</p>'
                                      +'<p> Username : '+data.data.customer_name+'</p>'
                                      +'<p> Invoice : '+data.data.merchant_ref+' (Simpan untuk cek status pesanan)</p>'
                                      +'<p> Total : '+formatRupiah(data.data.amount.toString(), 'Rp. ')+'</p>'
                                      +'<p> Item : '+data.data.order_items[0].name+'</p>'
                                      // + data.data.qr_url != undefined ? '<img class="mx-auto" style="display:block;margin-bottom:10px;" src="'+data.data.qr_url+'" alt="">' : ' '
                                      +'<p> Cara Pembayaran </p>'
                                      +qq

                                    }).then((result) => {
                                      if (result.isConfirmed) {
                                        window.location.href = '<?php echo base_url('pesanan'); ?>?inv='+data.data.merchant_ref;
                                      }
                                    });
                                    cektransaksi(data.data.merchant_ref);
                                  }

                                }
                              }
                            }
                          }
                          $.LoadingOverlay("hide");
                        },
                        error: function () {
                          Swal.fire({
                            icon: 'error',
                            title: 'Failed',
                            text: 'Pembelian gagal harap ulangi beberapa saat lagi.',
                          })
                          $.LoadingOverlay("hide");
                          // $.ajax(this);
                          // return;
                        }
                    });

                }
              })
    });
    //=====================================================
    $(document).on("click",".item", function () {
      $(".item").removeClass("text-dark");
      $(this).addClass("text-dark");
      $(".item").css("background-color","#ffffff");
      $(this).css("background-color","#e8f953");
      var itemId = $(this).attr('id');
      var price = $(this).attr('price');
      $(".buy").attr('itemid',itemId);
      //$(".buy").attr('price',price);
      $(".buy").attr('itemname',$(this).text());
      var clickedBtnID = $(this).attr('id'); // or var clickedBtnID = this.id
      // alert('MANTAP AJG #' + clickedBtnID);
      $.ajax({
          url: "<?php echo base_url('prosess/getdata') ?>",
          cache: false,
          type: "post",
          dataType: "json",
          async: true,
          data: {
              "itemId": itemId,
              "price": price,
          },
          success: function (data) {
            csrfName = data.csrfName;
            csrfHash = data.csrfHash;
            if (data === null) {
              alert('TERJADI KESALAHAN SILAHKAN COBA KEMBALI.');
              $.LoadingOverlay("hide");
            } else {

              console.log(data.csrfHash);
              // console.log(data.price);
              // console.log(data.data.length);
              $(".listpayment").empty();
              for (var i = 0; i < data.data.length; i++) {

                if (data.data[i].code != "BALANCE") {
                  $(".listpayment").append('<div class="row  p-1 mt-2 rounded mx-0 bg-kuning" style="height:60px;">'
                    +'<div class="col-md-4 col-4" style="height:100%;">'
                      +'<img style="height:40px;max-width:100%;" src="'+data.data[i].image+'" alt="">'
                    +'</div>'
                    +'<div class="col-md-8 col-8">'
                      +'<p style="width:100%;"><button price="'+data.data[i].price+'" style="width:100%;margin-top:2px;" id="'+data.data[i].code+'" class="readmore text-center align-middle payment rounded '+data.data[i].code+'">'+formatRupiah(data.data[i].price.toString(), 'Rp. ')+'</button></p>'
                    +'</div>'
                  +'</div>');
                }else {
                  <?php if ($this->ion_auth->logged_in()){ ?>
                  $(".listpayment").append('<div class="row  p-1 mt-2 rounded mx-0 bg-kuning" style="height:50px;">'
                    +'<div class="col-md-4 col-4" style="height:100%;">'
                      +'<h4 class="h4 text-dark" style="margin-top:10px;">'+data.data[i].code+'</h4>'
                    +'</div>'
                    +'<?php if ($this->ion_auth->logged_in()){ ?>'
                      +'<div class="col-md-8 col-8">'
                        +'<p style="width:100%;"><button price="'+data.data[i].price+'" style="width:100%;" id="'+data.data[i].code+'"  class="readmore text-center align-middle payment rounded '+data.data[i].code+'">'+formatRupiah(data.data[i].price.toString(), 'Rp. ')+'</button></p>'
                      +'</div>'
                    +'<?php }else{ ?>'
                      +'<div class="col-md-8 col-8">'
                        +'<p style="width:100%;" class="readmore text-center align-middle payment rounded '+data.data[i].code+'">Rp.0</p>'
                      +'</div>'
                    +'<?php } ?>'
                  +'</div>');
                  <?php } ?>
                }
              }
              if (data.price < 10000) {
                $('.BCAVA').attr('hidden', true);
                $('.BNIVA').attr('hidden', true);
                $('.BRIVA').attr('hidden', true);
                $('.INDOMARET').attr('hidden', true);
              }
              if (data.price < 5000) {
                $('.MANDIRIVA').attr('hidden', true);
                $('.ALFAMART').attr('hidden', true);
                $('.ALFAMIDI').attr('hidden', true);
              }
              if (data.price < 1000) {
                $('.QRISC').attr('hidden', true);
                $('.OVO').attr('hidden', true);
            }
            }
          },
          error: function () {
            $.ajax(this);
            return false;
          }
      });
    });
    function cektransaksi(invoiceid){
            setInterval(function(){
              if (invoiceid != '') {
                $.ajax({
                  url: "<?php echo base_url('pesanan/getdata'); ?>",
                  cache: false,
                  type: "post",
                  dataType: "json",
                  async: true,
                  data:{
                    'invoiceid' : invoiceid
                  },
                  success: function(data){
                    if (data.data.StatusOrder == 1) {
                      window.location.href = '<?php echo base_url('pesanan'); ?>?inv='+invoiceid;
                    }else if (data.data.StatusOrder == 5) {
                      window.location.href = '<?php echo base_url('pesanan'); ?>?inv='+invoiceid;
                    }
                    // console.log(data);
                  },
                  error: function(){


                  }
                });
              }
            }, 2000);

          }
    //=====================================================
    function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
  });
  </script>

</body>

</html>

