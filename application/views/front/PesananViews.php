<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('front/_layout/Head'); ?>
  <style media="screen">
  .input-group-sm>.input-group-append>select.btn:not([size]):not([multiple]), .input-group-sm>.input-group-append>select.input-group-text:not([size]):not([multiple]), .input-group-sm>.input-group-prepend>select.btn:not([size]):not([multiple]), .input-group-sm>.input-group-prepend>select.input-group-text:not([size]):not([multiple]), .input-group-sm>select.form-control:not([size]):not([multiple]), select.form-control-sm:not([size]):not([multiple]){
    height: calc(2.25rem + 2px);
  }
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
      color: white;
      border-color: white;
    }
    .readmorea{
      cursor: pointer;
    }
    .readmore:hover {
      color: red;

    }
  </style>
</head>

<body class="bg-dark text-white">

  <!-- ======= Navbar ======= -->
  <?php $this->load->view('front/_layout/Navbar'); ?>
  
  <main id="main">

    <section class="section pt-4">

        <div class="container">
          <div class="p-1">
            <div class="mvstyle row rounded cekinput">
              <div class="col-md-8 col-8 mt-1 mb-1">
                <!-- 60002123 -->
                <input value=""  type="text" value="<?php echo $this->input->get('inv') ? $this->input->get('inv') : ''; ?>" placeholder="Masukan id pesanan" name="id" class="form-control text-dark cekid" id="id" required>
              </div>
              <div class="col-md-4 col-4 mt-1 mb-1">
                <p style="width:100%;margin:0px;height:46px;" class="text-center">
                  <button type="button" class="btn btn-warning cek">CEK PESANAN</button>
                </p>
              </div>
            </div>

            <div class="col-md-12 col-12 mt-4 mvstyle rounded data-pesanan" style="margin-bottom:10px;padding-top:10px;padding-bottom:10px;">
              <h3 class="h3 invoiceid ">-</h3>
              <div class="status ">
              </div>
              <div class="game " style="display: -webkit-box;">
              </div>
              <hr>
              <p class="payment text-white"></p>
              <hr>
              <p class="itemname text-white"></p>
              <hr>
              <p class="id text-white"></p>
              <hr>
              <div class="total text-white" style="display: -webkit-box;"></div>
              <hr>
              <p class="tanggal text-white"></p>
              <hr>
              <p class="ket bg-primary text-white rounded"></p> <br>
            </div>
            <div class="col-md-12 col-12 intruksi-p mvstyle text-white rounded" style="padding-top:10px;padding-bottom:10px;">

            </div>
          </div>
          </div>


        </div>
    </section>
  
  <!-- <div class="main">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="bg-white rounded" style="padding:10px;">
                        <div class="img-cek">
                        </div>
                        <hr>
                        <h5 class="title-game" style="color:black;">Lacak Pesanan | SukaBli</h5>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="bg-white rounded" style="padding:10px;">
                        <div class="row">
                            <div class="col-md-7 col-7">
                <!-- 60002123 
                                <input class="form-control cekid" type="text " name="id" value="<?php echo $this->input->get('inv') ? $this->input->get('inv') : ''; ?>" placeholder="Invoice pesanan" required>
                            </div>
                            <div class="col-md-5 col-5">
                                <button type="button" class="btn btn-warning cek">CEK PESANAN</button>
                            </div>
                            <div class="col-md-12 detail-pesanan" style="margin-top:20px;">
                            </div>
                            <div class="col-md-12 intruksi-p" id="infoPembayaran" style="margin-top:20px;">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
 
  

  <!-- <main id="main">

    <section class="section pt-4">

        <div class="container">
          <div class="p-1">
            <div class="mvstyle row rounded cekinput">
              <div class="col-md-8 col-8 mt-1 mb-1">
                <input value="<?php echo $this->input->get('inv') ? $this->input->get('inv') : ''; ?>"  type="text" placeholder="Masukan id pesanan" name="id" class="form-control text-dark cekid" id="id" required>
              </div>
              <div class="col-md-4 col-4 mt-1 mb-1">
                <p style="width:100%;margin:0px;height:46px;" class="text-center">
                  <a  style="width:100%;height:46px;padding-top:15px;"  class="readmore text-center cek">CEK</a>
                </p>
              </div>
            </div>

            <div class="col-md-12 col-12 mt-4 mvstyle rounded data-pesanan" style="margin-bottom:10px;padding-top:10px;padding-bottom:10px;">
              <h3 class="h3 invoiceid ">-</h3>
              <div class="status ">
              </div>
              <div class="game " style="display: -webkit-box;">
              </div>
              <hr>
              <p class="payment text-white"></p>
              <hr>
              <p class="itemname text-white"></p>
              <hr>
              <p class="id text-white"></p>
              <hr>
              <div class="total text-white" style="display: -webkit-box;"></div>
              <hr>
              <p class="tanggal text-white"></p>
              <hr>
              <p class="ket bg-primary text-white rounded"></p> <br>
            </div>
            <div class="col-md-12 col-12 intruksi-p mvstyle text-white rounded" style="padding-top:10px;padding-bottom:10px;">

            </div>
          </div>
          </div>


        </div>
    </section> -->
 
  </main>



  <!-- ======= Footer ======= -->

  <!-- Vendor JS Files -->
  <?php $this->load->view('front/_layout/Footer'); ?>
  <!-- Template Main JS File -->
<script src="https://jizagaming.com/assets/assets/js/main.js"></script>
<script>
$(document).ready(function(){
  console.log('ready11');
  $('.tombol').click(function(e){
    e.stopPropagation();
    $('.menu').toggleClass("slide-menu-tampil");
  });
  $('.close-mv').click(function(e){
    $('.menu').toggleClass("slide-menu-tampil");
  });

  function handleMousePos(event) {
          var mouseClickWidth = event.clientX;
          console.log(mouseClickWidth);
          if(mouseClickWidth>=300){
                $('.menu').removeClass("slide-menu-tampil");
          }
}
document.addEventListener("click", handleMousePos);
});

</script>
<script type="text/javascript">
//Get the button:
mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}
/* Set the width of the sidebar to 250px and the left margin of the page content to 250px */
function openNav() {
  document.getElementById("mySidebar").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  $('.burger').hide();
}
/* Set the width of the sidebar to 0 and the left margin of the page content to 0 */
function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
  $('.burger').show();
}
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
  setTimeout(function() {
        $(".flash").hide();
    }, 2000);
  $.LoadingOverlaySetup({
    background      : "rgba(58,58,58,0.8)",
  });
</script>
  <script type="text/javascript">
  $( document ).ready(function() {
    var active = 0;
    $('.data-pesanan').hide();
    $('.intruksi-p').hide();
          function cektransaksi(){
            if (active == 0) {
              active = 1;
              setInterval(function(){
                var cekid = $('.cekid').val();
                if (cekid != '') {

                  getTrans();
                  getint();
                }
              }, 2000);
            }

          }
          $(document).on('click','.cek', function(){
            var cekid = $('.cekid').val();
            if (cekid != '') {
              cektransaksi();
            }
          });
          function getTrans(){

            var cekid = $('.cekid').val();
            if (cekid != '') {

              $.ajax({
                url: "<?php echo base_url('pesanan/getdata'); ?>",
                cache: false,
                type: "post",
                dataType: "json",
                async: true,
                data:{
                  'invoiceid' : cekid
                },
                success: function(data){
                  if (data.status) {
                    $('.status').empty();
                    $('.total').empty();
                    $('.data-pesanan').show();
                    $('.intruksi-p').show();
                    $('.game').empty();
                    $('.game').append('<img style="height:100px;width:100px;" src="'+data.dataP.ProductImage+'" alt=""><h5 class="text-white" style="padding-left:20px;padding-top:30px;">'+data.dataP.ProductName+'</h5>');
                    $('.invoiceid').text(data.InvoiceId);
                    $('.payment').text('Payment Method : '+data.data.Payment);
                    $('.itemname').text('Item Name : '+data.data.ItemName);
                    $('.id').text('Id : '+data.data.NickName+' | '+data.data.Note);
                    $('.total').append('Total pembayaran :  <div class="bg-info text-white rounded" style="padding-left:10px; padding-right:10px;">'+formatRupiah(data.data.Amount.toString(), 'Rp. ')+'</div>');
                    $('.tanggal').text('Tanggal : '+data.data.TanggalUpdate);
                    $('.ket').text('Keterangan / SN: '+data.data.Ket);
                    $('.status').append(data.dataStatus);
                  }else {
                    $('.data-pesanan').hide();
                    $('.intruksi-p').hide();
                    $('.status').empty();
                    $('.game').empty();
                    $('.invoiceid').text('');
                    $('.payment').text('');
                    $('.itemname').text('');
                    $('.id').text('');
                    $('.total').empty();
                    $('.tanggal').text('');
                    $('.ket').text('');
                    // Swal.fire({
                    //   background : '#212529',
                    //   color: 'white',
                    //   icon: 'error',
                    //   title: 'Oops...',
                    //   text: 'InvoiceId / Pesanan tidak ditemukan.',
                    // })
                    // return false;
                  }

                },
                error: function(){
                  // $('.status').empty();
                  // Swal.fire({
                  //   background : '#212529',
                  //   color: 'white',
                  //   icon: 'error',
                  //   title: 'Oops...',
                  //   text: 'InvoiceId / Pesanan tidak ditemukan.',
                  //   // footer: '<a href="">Why do I have this issue?</a>'
                  // })

                }
              });
            }
          }
          function getint(){
            var cekid = $('.cekid').val();
            if (cekid != '') {
              $.ajax({
                url: "<?php echo base_url('pesanan/getint'); ?>",
                cache: false,
                type: "post",
                dataType: "json",
                async: true,
                data:{
                  'invoiceid' : cekid
                },
                success: function(data){
                  if (data.success) {
                    $('.intruksi-p').empty();
                    $('.intruksi-p').append('<h3>Detail Pembayaran</h3>');
                    $('.intruksi-p').append('<hr>');
                    $('.intruksi-p').append('<h5>Total Pembayaran : '+formatRupiah(data.data.amount.toString(), 'Rp. ')+'</h5>');
                    $('.intruksi-p').append('<h5>Virtual Account : '+data.data.payment_name+'</h5>');
                    if (data.data.pay_code == null) {
                      $('.intruksi-p').append('<hr>');
                      $('.intruksi-p').append('<h3>QR CODE PEMBAYARAN</h3>');
                      $('.intruksi-p').append('<img src="'+data.data.qr_url+'" alt="">');
                      $('.intruksi-p').append('<hr>');

                    }else {
                      $('.intruksi-p').append('<h5>Nomor Virtual Account : '+data.data.pay_code+'</h5>');
                    }


                  }else {
                    $('.intruksi-p').empty();
                    // Swal.fire({
                    //   icon: 'error',
                    //   title: 'Oops...',
                    //   text: 'InvoiceId / Pesanan tidak ditemukan.',
                    // })
                  }

                },
                error: function(){
                  $('.status').empty();
                  // Swal.fire({
                  //   background : '#212529',
                  //   color: 'white',
                  //   icon: 'error',
                  //   title: 'Oops...',
                  //   text: 'InvoiceId / Pesanan tidak ditemukan.',
                  //   // footer: '<a href="">Why do I have this issue?</a>'
                  // })

                }
              });
            }
          }
          if ('' != '') {
            cektransaksi();
          }


  });
  </script>



</body>

</html>
