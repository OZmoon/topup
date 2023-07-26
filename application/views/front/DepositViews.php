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
    color: white;
  }
    a.readmore{
      cursor: pointer;
      color: black;
      border-color: black;
    }
    .readmorea{
      cursor: pointer;
    }
    .readmore:hover {
      color: red;

    }
    
.button-50 {
  appearance: button;
  background-color: #000;
  background-image: none;
  border: 1px solid #000;
  border-radius: 4px;
  box-shadow: #fff 4px 4px 0 0,#000 4px 4px 0 1px;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  font-family: ITCAvantGardeStd-Bk,Arial,sans-serif;
  overflow: visible;
  text-align: center;
  text-transform: none;
  touch-action: manipulation;
  user-select: none;
  -webkit-user-select: none;
  vertical-align: middle;
  white-space: nowrap;
}

.button-50:focus {
  text-decoration: none;
}

.button-50:hover {
  text-decoration: none;
}

.button-50:active {
  box-shadow: rgba(0, 0, 0, .125) 0 3px 5px inset;
  outline: 0;
}

.button-50:not([disabled]):active {
  box-shadow: #fff 2px 2px 0 0, #000 2px 2px 0 1px;
  transform: translate(2px, 2px);
}

@media (min-width: 768px) {
  .button-50 {
    padding: 12px 50px;
  }
}
/* CSS */
.button-51 {
  background-color: #FFFFFF;
  border: 1px solid #222222;
  border-radius: 8px;
  box-sizing: border-box;
  color: #222222;
  font-family: Circular,-apple-system,BlinkMacSystemFont,Roboto,"Helvetica Neue",sans-serif;
  outline: none;
  text-align: center;
  text-decoration: none;
  touch-action: manipulation;
  transition: box-shadow .2s,-ms-transform .1s,-webkit-transform .1s,transform .1s;
  user-select: none;
  -webkit-user-select: none;
}

.button-51:focus-visible {
  box-shadow: #222222 0 0 0 2px, rgba(255, 255, 255, 0.8) 0 0 0 4px;
  transition: box-shadow .2s;
}

.button-51:active {
  background-color: #F7F7F7;
  border-color: #000000;
  transform: scale(.96);
}

.button-51:disabled {
  border-color: #DDDDDD;
  color: #DDDDDD;
  cursor: not-allowed;
  opacity: 1;
}
  </style>
</head>

<body class="bg-white text-white">

  <!-- ======= Navbar ======= -->
  <?php $this->load->view('front/_layout/Navbar'); ?>

  <main id="main" class="mvstyle">

    <section class="section pt-4">

      <div class="site-section pb-0">
        <div class="container">
          <div class="row align-items-stretch">
            <div class="col-md-4" data-aos="fade-up">
              <img src="<?php echo base_url() ?>sb2.png" alt="Image" class="img-fluid">
              <br><br>
              <h3 class="h3 text-white">DEPOSIT</h3>
              <p class="mb-4 readmorep"><span class="text-muted deskpro"></span>
              </p>
            </div>
            <div class="col-md-7 ml-auto">
              <div class="sticky-content">
                <div class="bg-white rounded p-1">
                  <h3 class="h3 text-dark">1. Masukan Nominal Deposit.</h3>
                  <div class="row rounded mx-1" style="padding-top:10px;">
                    <label for="id" class="text-dark">Nominal Deposit</label>
                    <div class="col-md-12 col-12 form-group ">
                      <input value="Rp. 1.000" style="" type="TEXT" placeholder="Masukkan jumlah deposit." name="nominal" class="form-control  text-dark nominal rounded" id="nominal" required min="1000">
                    </div>
                  </div>
                </div>

                <br>
                <div class="bg-white rounded p-1">
                  <h3 class="h3 text-dark">2. Pilih Pembayaran</h3>
                  <div class="listpayment">

                  </div>
                </div>

                <br>
                <div class="bg-white rounded p-1">
                  <h3 class="h3 mt-3 text-dark">4. Deposit</h3>
                  <div class="row rounded mx-1" style="padding-top:10px;">
                    <!-- <label for="id" class="text-dark">Beli sekarang</label> -->

                    <div class="col-lg-12 clearfix">
                      <p style="width:100%;"><a payment=""   style="width:100%;"  class="readmore text-center buy button-50">Deposit Sekarang</a></p>
                    </div>
                  </div>
                </div>



              </div>
            </div>
          </div>
        </div>
    </section>
  </main>
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content mvstyle">
      <div class="modal-header" style="border-bottom: 1px solid #ffc107;">
        <h5 class="modal-title">Detail pembayaran</h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body payment-detail">

      </div>
      <div class="modal-footer" style="border-top: 1px solid #ffc107;">
        <p><?php echo $title ?></p>
        <!-- <button type="button" class="btn btn-warning">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
      </div>
    </div>
  </div>
</div>

  <!-- ======= Footer ======= -->

  <!-- Vendor JS Files -->
  <?php $this->load->view('front/_layout/Footer'); ?>
  <script type="text/javascript">
  $( document ).ready(function() {
    getPayment();
    $('.nominal').keyup(function() {
      var nominal = $(this).val();
      $(this).val(formatRupiah(nominal.toString(), 'Rp. '));
      var orinominal = $(this).val();
      var orinominal1 = orinominal.replace("Rp. ", "");
      var orinominal2 = orinominal1.replace(".", "");
      var orinominal2 = orinominal2.replace(".", "");
      console.log('KEYUP : '+parseInt(orinominal2));
      if (orinominal2 < 1000) {
        //$(this).val(formatRupiah("1000", 'Rp. '));
      }
    });
//=====================================================
    $(document).on("focusout",".nominal", function () {
      //$(".item").removeClass("bg-dark text-white");
      //$(this).addClass("bg-dark text-white");
      var orinominal = $('.nominal').val();
      var orinominal1 = orinominal.replace("Rp. ", "");
      var orinominal2 = orinominal1.replace(".", "");
      var orinominal2 = orinominal2.replace(".", "");
      console.log('item : '+parseInt(orinominal2));
      if (orinominal2 < 1000) {
        //$(this).val(formatRupiah("1000", 'Rp. '));
      }
      var price = parseInt(orinominal2) + 1100;
      var clickedBtnID = $(this).attr('id'); // or var clickedBtnID = this.id
      // alert('MANTAP AJG #' + clickedBtnID);
      $.ajax({
          url: "<?php echo base_url('deposit/getdata') ?>",
          cache: false,
          type: "post",
          dataType: "json",
          async: true,
          data: {
              "price": price,
          },
          success: function (data) {
            if (data === null) {
              alert('TERJADI KESALAHAN SILAHKAN COBA KEMBALI.');
              $.LoadingOverlay("hide");
            } else {
              // console.log(data.price);
              // console.log(data.data.length);
              $(".listpayment").empty();
              for (var i = 0; i < data.data.length; i++) {

                if (data.data[i].code != "BALANCE") {
                  $(".listpayment").append('<div class="row p-1 mt-2 rounded mx-0 button-51" style="height:50px;">'
                    +'<div class="col-md-4 col-4" style="height:100%;">'
                      +'<img style="height:40px;max-width:100%;" src="'+data.data[i].image+'" alt="">'
                    +'</div>'
                    +'<div class="col-md-8 col-8">'
                      +'<p style="width:100%;"><button mode="otomatis" price="'+data.data[i].price+'" style="width:100%;margin-top:2px;" id="'+data.data[i].code+'" class="readmore text-center payment '+data.data[i].code+'">'+formatRupiah(data.data[i].price.toString(), 'Rp. ')+'</button></p>'
                    +'</div>'
                  +'</div>');
                }else {
                  <?php if ($this->ion_auth->logged_in()){ ?>
                  $(".listpayment").append('<div class="row p-1 mt-2 rounded mx-0 button-51" style="height:50px;">'
                    +'<div class="col-md-4 col-4" style="height:100%;">'
                      +'<h3 class="h3 text-white" style="margin-top:10px;">'+data.data[i].code+'</h3>'
                    +'</div>'
                    +'<?php if ($this->ion_auth->logged_in()){ ?>'
                      +'<div class="col-md-8 col-8">'
                        +'<p style="width:100%;"><button mode="otomatis" price="'+data.data[i].price+'" style="width:100%;" id="'+data.data[i].code+'"  class="readmore text-center payment '+data.data[i].code+'">'+formatRupiah(data.data[i].price.toString(), 'Rp. ')+'</button></p>'
                      +'</div>'
                    +'<?php }else{ ?>'
                      +'<div class="col-md-8 col-8">'
                        +'<p style="width:100%;" class="readmore text-center '+data.data[i].code+'">Rp.0</p>'
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
//=====================================================
    if ($(window).width() < 960) {
       $(".deskpro").text('PERINGATAN : Mohon transfer dengan tepat dan simpan bukti...');
       $(".readmorep").append('<a style="color:white;" class="readmorea">Readmore</a>');
    }
    else {
     $(".deskpro").text('PERINGATAN : Mohon transfer dengan tepat dan simpan bukti transfer untuk menghindari hal yang tidak diinginkan terjadi. Pastian transfer sesuai nominal dan kode unit yang diberikan, jangan lupa cek nama penerima transfer.');
    }
    $('.readmorep').on('click','.readmorea',function() {
      $(".deskpro").text('PERINGATAN : Mohon transfer dengan tepat dan simpan bukti transfer untuk menghindari hal yang tidak diinginkan terjadi. Pastian transfer sesuai nominal dan kode unit yang diberikan, jangan lupa cek nama penerima transfer.');
      $(".readmorea").remove();
      $(".readmorep").append('<a style="color:white;" class="readmorem">Hide</a>');
    });
    $('.readmorep').on('click','.readmorem',function() {
      $(".deskpro").text('PERINGATAN : Mohon transfer dengan tepat dan simpan bukti...');
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
//=====================================================
    function getPayment(){
      $.ajax({
          url: "<?php echo base_url('prosess/getPayment') ?>",
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
                  $(".listpayment").append('<div class="row p-1 mt-2 rounded mx-0 button-51" style="height:50px;">'
                    +'<div class="col-md-4 col-4" style="height:100%;">'
                      +'<img style="height:40px;max-width:100%;" src="'+data.data[i].image+'" alt="">'
                    +'</div>'
                    +'<div class="col-md-8 col-8">'
                      +'<p style="width:100%;"><button disabled style="width:100%;margin-top:2px;" id="'+data.data[i].code+'" class="readmore text-center payment '+data.data[i].code+'">'+formatRupiah(data.data[i].price.toString(), 'Rp. ')+'</button></p>'
                    +'</div>'
                  +'</div>');
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
    //==============================================================================
    $(document).on("click",".payment", function () {
      $(".payment").removeClass("text-dark");
    $(this).addClass("text-dark");

$(".payment").css("background-color","#22002a");
    $(this).css("background-color","#e8f953");

        $(".buy").attr('payment',$(this).attr('id'));
        $(".buy").attr('mode',$(this).attr('mode'));
        console.log('PAYMENT : '+$(this).attr('id'));
        console.log('METODE : '+$(this).attr('mode'));
    });
        //==============================================================================
    $(document).on("click",".buy", function () {
      if ($(this).attr('price') === "") {
        Swal.fire({
                    icon: 'error',
                    title: 'Failed',
                    html: 'Silahakan pilih metode pembayaran dulu.',
                    // footer: '<a href="">Why do I have this issue?</a>'
                  });
        return false;
      } else {
        if ($(this).attr('payment') === "") {
          Swal.fire({
                      icon: 'error',
                      title: 'Failed',
                      html: 'Silahkan pilih metode pembayaran terlebih dahulu.',
                      // footer: '<a href="">Why do I have this issue?</a>'
                    });
          return false;
        }else {
          Swal.fire({

                title: 'Anda yakin ingin melanjutkan pembelian? ',
                showCancelButton: true,
                confirmButtonText: 'Ok',
              }).then((result) => {
                if (result.isConfirmed) {
                  var orinominal = $('.nominal').val();
                  var orinominal1 = orinominal.replace("Rp. ", "");
                  var orinominal2 = orinominal1.replace(".", "");
                  var orinominal2 = orinominal2.replace(".", "");
                    if (orinominal2 < 1000) {
                      Swal.fire({

                            icon: 'error',
                            title: 'Failed',
                            html: 'Minimal deposit Rp. 1000',
                            // footer: '<a href="">Why do I have this issue?</a>'
                          });
                      return false;
                    }
                    $.LoadingOverlay("show");
                    var payment = $(this).attr('payment');
                    var mode = $(this).attr('mode');
                    $.ajax({
                        url: "<?php echo base_url('Deposit/pro') ?>",
                        cache: false,
                        type: "post",
                        dataType: "json",
                        async: true,
                        data: {
                          "price": orinominal,
                    "payment": payment,
                    "mode" : mode
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

                              if (data.Respone.success) {
                                if (data.Respone.data.payment_method === "OVO") {
                                  window.location.replace(data.Respone.data.checkout_url);
                                }else {
                                  var qq = '';
                                  for (var i = 0; i < data.Respone.data.instructions.length; i++) {
                                    qq += "<p class='text-warning'>"+(i+1)+" : "+data.Respone.data.instructions[i].title+"</p>";
                                    for (var j = 0; j < data.Respone.data.instructions[i].steps.length; j++) {
                                      qq += "<p> - "+data.Respone.data.instructions[i].steps[j]+"</p>";
                                    }
                                  }
                                  if (data.Respone.data.qr_url != undefined) {
                                    Swal.fire({
                                      imageUrl: data.Respone.data.qr_url != undefined ? data.Respone.data.qr_url : ' ',
                                      imageWidth: 200,
                                      imageHeight: 200,
                                      icon: 'success',
                                      title: 'Sukses',
                                      html: '<p> Metode pembayaran : '+data.Respone.data.payment_name+'</p>'
                                      +'<p> Username : '+data.Respone.data.customer_name+'</p>'
                                      +'<p> Invoice : '+data.Respone.data.merchant_ref+' (Simpan untuk cek status pesanan)</p>'
                                      +'<p> Total : '+formatRupiah(data.Respone.data.amount.toString(), 'Rp. ')+'</p>'
                                      +'<p> Item : '+data.Respone.data.order_items[0].name+'</p>'
                                      // + data.data.qr_url != undefined ? '<img class="mx-auto" style="display:block;margin-bottom:10px;" src="'+data.data.qr_url+'" alt="">' : ' '
                                      +'<p> Cara Pembayaran </p>'
                                      +qq
                                    }).then((result) => {
                                      if (result.isConfirmed) {
                                        location.reload();
                                      }
                                    });
                                  }else {
                                    Swal.fire({

                                      icon: 'success',
                                      title: 'Sukses',
                                      html: '<p> Metode pembayaran : '+data.Respone.data.payment_name+'</p>'
                                      +'<p> Username : '+data.Respone.data.customer_name+'</p>'
                                      +'<p> Invoice : '+data.Respone.data.merchant_ref+' (Simpan untuk cek status pesanan)</p>'
                                      +'<p> Total : '+formatRupiah(data.Respone.data.amount.toString(), 'Rp. ')+'</p>'
                                      +'<p> Item : '+data.Respone.data.order_items[0].name+'</p>'
                                      // + data.data.qr_url != undefined ? '<img class="mx-auto" style="display:block;margin-bottom:10px;" src="'+data.data.qr_url+'" alt="">' : ' '
                                      +'<p> Cara Pembayaran </p>'
                                      +qq
                                    }).then((result) => {
                                      if (result.isConfirmed) {
                                        location.reload();
                                      }
                                    });
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
          });
      }
    }
  });
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
