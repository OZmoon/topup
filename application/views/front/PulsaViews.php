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
      border-color: #b9aec5;
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
            <div class="col-md-4" >
              <img src="<?php echo $dataProduct->ProductImage; ?>" alt="Image" class="img-fluid">
              <br><br>
              <h3 class="h3"><?php echo $dataProduct->ProductName; ?></h3>
              <p class="mb-4 readmorep"><span class="text-muted deskpro"></span></p>
            </div>
            <div class="col-md-7 ml-auto">
              <div class="sticky-content">
                <div class="bg-white rounded p-1">
                  <h3 class="h3 text-dark">1. Masukkan Nomer (081XXXXXXXXX)</h3>
                  <div class="row rounded mx-1 mt-3" style="padding-top:10px;">
                    <label for="id" class="text-dark">Nomer</label>
                    <div class="col-md-12 col-12 form-group ">
                      <input value="" nickname="" status="true" style="" type="number" placeholder="Masukkan nomer" name="id" class="form-control  text-dark userid rounded" id="id" required>
                    </div>
                  </div>
                </div>

                <br>
                <div class="bg-white rounded p-1">
                  <h3 class="h3 operator text-dark">2. Pilih Nominal Top Up</h3>
                  <div class="row rounded mx-1 mt-3 listpulsa" style="padding-top:46px;">

                  </div>
                </div>

                <br>
                <div class="bg-white rounded p-1">
                  <h3 class="h3 text-dark">3. Pilih Pembayaran (Login untuk harga lebih murah)</h3>
                  <div class="listpayment">

                  </div>
                </div>

                <br>
                <div class="bg-white rounded p-1">
                  <h3 class="h3 mt-3 text-dark">4. Beli</h3>
                  <div class="row rounded mx-1" style="padding-top:10px;">
                    <?php if (!$this->ion_auth->logged_in()) {?>
                      <div class="col-md-12 col-12 form-group ">
                        <!-- 60002123 -->
                        <label for="" class="text-dark">Email : </label>
                        <input value="" style="" type="email" placeholder="Masukkan Email" name="EmailSend" class="form-control text-dark sendemail rounded" id="SendEmail" required>
                      </div>
                      <?php } ?>
                    <div class="g-recaptcha" data-sitekey="<?php echo GOOGLESITE_KEY; ?>"></div><br>
                    <div class="col-md-5 col-5 mt-3">
                      <p style="width:100%;">
<button itemid="" payment="" userids="true" userid="" price="" type="button" class="btn btn-primary buy" name="button"><i class="bi bi-bag-check"></i>Beli Sekarang</button>
</p>
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
                  $(".listpayment").append('<div class="row p-1 mt-2 rounded mx-1" style="height:50px;">'
                    +'<div class="col-md-4 col-4" style="height:100%;">'
                      +'<img style="height:40px;max-width:100%;" src="'+data.data[i].image+'" alt="">'
                    +'</div>'
                    +'<div class="col-md-8 col-8">'
                      +'<p style="width:100%;"><button disabled style="width:100%;margin-top:2px;" id="'+data.data[i].code+'" class="readmore text-center text-dark payment rounded '+data.data[i].code+'">'+formatRupiah(data.data[i].price.toString(), 'Rp. ')+'</button></p>'
                    +'</div>'
                  +'</div>');
                }else {
                  <?php if ($this->ion_auth->logged_in()){ ?>
                  $(".listpayment").append('<div class="row p-1 mt-2 rounded mx-1" style="height:50px;">'
                    +'<div class="col-md-4 col-4" style="height:100%;">'
                      +'<h3 class="h3 text-dark" style="margin-top:10px;">'+data.data[i].code+'</h3>'
                    +'</div>'
                    +'<?php if ($this->ion_auth->logged_in()){ ?>'
                      +'<div class="col-md-8 col-8">'
                        +'<p style="width:100%;"><button style="width:100%;" id="'+data.data[i].code+'"  class="readmore text-center text-dark payment rounded '+data.data[i].code+'">'+formatRupiah(data.data[i].price.toString(), 'Rp. ')+'</button></p>'
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

            }
            $.LoadingOverlay("hide");
          },
          error: function () {
            $.ajax(this);
            return false;
          }
      });
    }
    $(".userid").keyup(function(){
      var ops = parseOperator($(this).val());
      //console.log(ops['operator']+' '+ops['phone']);
      if (ops['operator'] != null) {
        $('.operator').text('2. Pilih Nominal Top Up | '+ops['operator']);
      }
    });
    $(".userid").focusout(function(){
      var ops = parseOperator($(this).val());

      //console.log(ops['operator']+' '+ops['phone']);
      if (ops['operator'] != null) {
        $.LoadingOverlay("show");
        $.ajax({
            url: "<?php echo base_url('pulsa/getdata') ?>",
            cache: false,
            type: "post",
            dataType: "json",
            async: true,
            data: {
                "operator": ops['operator'],
            },
            success: function (data) {
              if (data === null) {
                $.LoadingOverlay("hide");
                alert('TERJADI KESALAHAN SILAHKAN COBA KEMBALI.');
              } else {
                $.LoadingOverlay("hide");
                $(".listpulsa").empty();
                for (var i = 0; i < data.length; i++) {
                  console.log(data[i].price);
                  if (data[i].brand === ops['operator'] && data[i].category == 'Pulsa') {
                    $(".listpulsa").append('<div class="col-md-4 col-6">'
                      +'<p style="width:100%;"><button price="'+data[i].newprice+'" style="width:100%;" id="'+data[i].buyer_sku_code+'"  class="readmore text-center text-dark item rounded ">'+data[i].product_name+'</button></p>'
                      +'</div>');
                  }
                }
              }
            },
            error: function () {
              $.LoadingOverlay("hide");
              $.ajax(this);
              return false;
            }
        });
      }
    });
    function parseOperator(phone) {
    var OperatorPrefix = {
        TELKOMSEL: ["0811","0812","0813","0821","0822","0823","0851","0852","0853"],
        INDOSAT: ["0814","0815","0816","0855","0856","0857","0858"],
        TRI: ["0895","0896","0897","0898","0899"],
        SMART: ["0881","0882","0883","0884","0885","0886","0887","0888","0889"],
        XL: ["0817","0818","0819","0859","0877","0878"],
        AXIS: ["0838","0831","0832","0833"]
    }

    if (phone.length > 13) return {
        operator: null
    }
    for (var name in OperatorPrefix) {
        var _operator = OperatorPrefix[name];
        for (var index in _operator) {
            if (phone.startsWith(_operator[index])) return {
                operator: name,
                prefix: _operator[index],
                phone: phone
            }
        }
    }

    return {
        operator: null
    }
  }
    if ($(window).width() < 960) {
       $(".deskpro").text('PERINGATAN: Mohon untuk memasukan nomer ponsel dengan benar...');
       $(".readmorep").append('<a style="color:white;" class="readmorea">Readmore</a>');
    }
    else {
     $(".deskpro").text('Mohon untuk memasukan nomer ponsel dengan benar. kesalahan nomer ponsel bukan tanggung jawab pihak kami.');
    }
    $('.readmorep').on('click','.readmorea',function() {
      $(".deskpro").text('Mohon untuk memasukan nomer ponsel dengan benar. kesalahan nomer ponsel bukan tanggung jawab pihak kami.');
      $(".readmorea").remove();
      $(".readmorep").append('<a style="color:white;" class="readmorem">Hide</a>');
    });
    $('.readmorep').on('click','.readmorem',function() {
      $(".deskpro").text('Mohon untuk memasukan nomer ponsel dengan benar....');
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

$(".payment").css("background-color","#22002a");
      $(this).css("background-color","#e8f953");
        $(".buy").attr('price',$(this).attr('price'));
        $(".buy").attr('userid',$(".userid").val());
        $(".buy").attr('payment',$(this).attr('id'));
      }
    });
    $(document).on("click",".buy", function () {
      var SendEmail = $('.sendemail').val();
      var token = $("#g-recaptcha-response").val();
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
                    var nickname = $(".userid").val();
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
                          "game" : 'PULSA',
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
                                  console.log(qq);
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
    $(document).on("click",".item", function () {
      $(".item").removeClass("text-dark");
      $(this).addClass("text-dark");

$(".item").css("background-color","#22002a");
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
            if (data === null) {
              alert('TERJADI KESALAHAN SILAHKAN COBA KEMBALI.');
            } else {
              // console.log(data.price);
              // console.log(data.data.length);
              $(".listpayment").empty();
              for (var i = 0; i < data.data.length; i++) {

                if (data.data[i].code != "BALANCE") {
                  $(".listpayment").append('<div class="row p-1 mt-2 rounded mx-1" style="height:50px;">'
                    +'<div class="col-md-4 col-4" style="height:100%;">'
                      +'<img style="height:40px;max-width:100%;" src="'+data.data[i].image+'" alt="">'
                    +'</div>'
                    +'<div class="col-md-8 col-8">'
                      +'<p style="width:100%;"><button price="'+data.data[i].price+'" style="width:100%;margin-top:2px;" id="'+data.data[i].code+'" class="readmore text-center text-dark payment rounded '+data.data[i].code+'">'+formatRupiah(data.data[i].price.toString(), 'Rp. ')+'</button></p>'
                    +'</div>'
                  +'</div>');
                }else {
                  <?php if ($this->ion_auth->logged_in()){ ?>
                  $(".listpayment").append('<div class="row p-1 mt-2 rounded mx-1" style="height:50px;">'
                    +'<div class="col-md-4 col-4" style="height:100%;">'
                      +'<h3 class="h3 text-dark" style="margin-top:10px;">'+data.data[i].code+'</h3>'
                    +'</div>'
                    +'<?php if ($this->ion_auth->logged_in()){ ?>'
                      +'<div class="col-md-8 col-8">'
                        +'<p style="width:100%;"><button price="'+data.data[i].price+'" style="width:100%;" id="'+data.data[i].code+'"  class="readmore text-center text-dark payment rounded '+data.data[i].code+'">'+formatRupiah(data.data[i].price.toString(), 'Rp. ')+'</button></p>'
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
