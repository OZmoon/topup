<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_layout/HeaderNew'); ?>

<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
			<h1><?php echo $title; ?></h1>
    </div>
    <div class="section-body">
		<?php
    if ($this->session->flashdata('message')) {
        ?>
    <div class="alert alert-info alert-has-icon">
      <div class="alert-icon">
        <i class="far fa-lightbulb"></i>
      </div>
      <div class="alert-body">
        <div class="alert-title"></div>
        <?php echo $this->session->flashdata('message'); ?>
      </div>
    </div>
    <?php
    unset($_SESSION['message']); ?>
    <?php
    }
    ?>
      <div class="row">
        <div class="col-12">
          <div class="card">

            <div class="card-body">
                <form <?php if ($page == 'edit') { ?>
                   action="<?php echo base_url('dashboard/wallet/updateovo') ?>"
                <?php } else { ?> action="<?php echo base_url('dashboard/price/submit') ?>" <?php } ?> method="post" enctype="multipart/form-data">
              <div class="form-group row mb-4">
                <input type="hidden" name="Id" value="<?php if ($page == 'edit'): echo $data->Id; ?>

                <?php endif; ?>">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomer OVO</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control walletid" name="WalletId" required value="<?php if ($page == 'edit') {echo $data->WalletId;} ?>">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Ref ID</label>
                <div class="input-group col-sm-12 col-md-7 ">
                  <input type="text" class="form-control inputrefid" placeholder="" aria-label="">
                  <div class="input-group-append">
                    <button class="btn btn-primary getrefid" type="button">GET REF ID</button>
                  </div>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Otp Code / Otp Link</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control otpcode" name="OtpCode"  value="">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Otp TOKEN</label>
                <div class="input-group col-sm-12 col-md-7">
                  <input type="text" class="form-control inputotptoken" placeholder="" name="OtpToken" aria-label="">
                  <div class="input-group-append">
                    <button class="btn btn-primary getotptoken inputotp" type="button">GET OTP TOKEN</button>
                  </div>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Security Code</label>
                <div class="col-sm-12 col-md-7">
                  <input type="text" class="form-control securitycode" name="SecurityCode"  value="<?php if ($page == 'edit') {echo $data->WalletPassword;} ?>">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Auth TOKEN</label>
                <div class="input-group col-sm-12 col-md-7">
                  <input type="text" class="form-control inputauth" required placeholder="" aria-label="" name="AuthToken" value="<?php if ($page == 'edit') {echo $data->WalletToken;} ?>">
                  <div class="input-group-append">
                    <button class="btn btn-primary getauthtoken" type="button">GET AUTH TOKEN</button>
                  </div>
                </div>
              </div>


              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                <div class="col-sm-12 col-md-7">
                  <select class="form-control selectric" name="Status">
                    <option <?php if ($page == 'edit') {
        if ($data->WalletStatus == 1) {
            echo "selected";
        }
    } ?> value="1">Active</option>
                    <option <?php if ($page == 'edit') {
        if ($data->WalletStatus == 0) {
            echo "selected";
        }
    } ?> value="0">Non Active</option>
                  </select>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div></div>
    </div>
  </section>
</div>

<?php $this->load->view('_layout/footer'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$( document ).ready(function() {
  console.log( "ready!" );
  $('.getrefid').on('click',function(){
    var walletid = $('.walletid').val();
    if (walletid != '') {
      $.ajax({
          url: '<?php echo base_url('dashboard/wallet/getrefid') ?>',
          cache: false,
          type: "post",
          dataType: "json",
          async: true,
          data: {
              "walletid": walletid,
          },
          success: function (data) {
            if (data.data == null) {
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Data Tidak Ditemukan / '+data.response_message,
                // footer: '<a href="">Why do I have this issue?</a>'
              })
            }else {
              $('.inputrefid').val(data.data.otp.otp_ref_id);
            }
          },
          error: function () {
            // $.ajax(this);
            return false;
          }
      });
    }

  });

  ////////////////////////////////////////////////////
  $('.getotptoken').on('click',function(){
    var refid = $('.inputrefid').val();
    var walletid = $('.walletid').val();
    var otpcode = $('.otpcode').val();
    $.ajax({
        url: '<?php echo base_url('dashboard/wallet/getotptoken') ?>',
        cache: false,
        type: "post",
        dataType: "json",
        async: true,
        data: {
            "walletid": walletid,
            "refid" : refid,
            "otpcode" : otpcode
        },
        success: function (data) {
          if (data.data == null) {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Data Tidak Ditemukan / '+data.response_message,
              // footer: '<a href="">Why do I have this issue?</a>'
            })
          }else {
            $('.inputotptoken').val(data.data.otp.otp_token);
          }
          console.log(data);
        },
        error: function () {
          // $.ajax(this);
          return false;
        }
    });
  });
  //////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////
  $('.getauthtoken').on('click',function(){
    var refid = $('.inputrefid').val();
    var walletid = $('.walletid').val();
    var otptoken = $('.inputotptoken').val();
    var securitycode = $('.securitycode').val();
    $.ajax({
        url: '<?php echo base_url('dashboard/wallet/getauthtoken') ?>',
        cache: false,
        type: "post",
        dataType: "json",
        async: true,
        data: {
            "walletid": walletid,
            "refid" : refid,
            "otptoken" : otptoken,
            "sec" : securitycode
        },
        success: function (data) {
          if (data.data == null) {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Data Tidak Ditemukan / '+data.response_message,
              // footer: '<a href="">Why do I have this issue?</a>'
            })
          }else {
            $('.inputauth').val(data.data.auth.access_token);
          }
          console.log(data);
        },
        error: function () {
          // $.ajax(this);
          return false;
        }
    });
  });
});
</script>
