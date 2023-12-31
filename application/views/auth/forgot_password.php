<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('_layout/HeaderNew');
?>
<body class="bg-dark">
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>sb2.png" alt="logo" width="100" class="shadow-light rounded-circle"></a>
            </div>
            <div class="card card-warning">
              <?php
              if($this->session->flashdata('message') || $message){
              ?>
              <div class="alert alert-warning m-1 alert-has-icon">
                <div class="alert-icon">
                  <i class="far fa-lightbulb"></i>
                </div>
                <div class="alert-body">
                  <div class="alert-title"></div>
                  <?php echo $message; ?>
                </div>
              </div>
              <?php
              unset($_SESSION['message']);
              }
              ?>
              <div class="card-header">
                <h4 class="text-warning"><?php echo lang('forgot_password_heading');?></h4>
              </div>
              <div class="card-body">
                <?php echo form_open("dashboard/auth/forgot_password");?>
                  <div class="form-group">
                    <label for="identity"><?php echo (($type=='email') ? sprintf(lang('forgot_password_email_label'), $identity_label) : sprintf(lang('forgot_password_identity_label'), $identity_label));?></label>
                    <?php echo form_input($identity);?>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>
                  <div class="form-group">
                    <?php echo form_submit('submit', lang('forgot_password_submit_btn'), 'class="btn btn-primary btn-lg btn-block"');?>
                  </div>
                <?php echo form_close();?>
              </div>
            </div>
            <div class="mt-5 text-muted text-center">
              Don't have an account? <a href="<?php echo base_url(); ?>register" class="text-warning">Create One</a>
            </div>
            <div class="simple-footer">
              Copyright &copy; <?php echo $this->db->get('data_setting')->row()->SiteName; ?> 2021
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <?php $this->load->view('_layout/js'); ?>
