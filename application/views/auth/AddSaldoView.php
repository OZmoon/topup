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
                   action="<?php echo base_url('dashboard/auth/update') ?>"
                <?php } else { ?> action="<?php echo base_url('dashboard/item/submit') ?>" <?php } ?> method="post" enctype="multipart/form-data">
              <div class="form-group row mb-4">
                <input type="hidden" name="id" value="<?php if ($page == 'edit'): echo $data->id; ?>

                <?php endif; ?>">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">User Name</label>
                <div class="col-sm-12 col-md-7">
                  <input readonly type="text" class="form-control" name="Name"  value="<?php if ($page == 'edit') {echo $data->first_name.' '.$data->last_name;} ?>">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">User Email</label>
                <div class="col-sm-12 col-md-7">
                  <input readonly type="text" class="form-control" name="Email" required value="<?php if ($page == 'edit') {echo $data->email;} ?>">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Last Balance</label>
                <div class="col-sm-12 col-md-7">
                  <input readonly type="text" class="form-control" name="BalanceOld" required value="<?php if ($page == 'edit') {echo $data->Balance;} ?>">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Add Balance</label>
                <div class="col-sm-12 col-md-7">
                  <input type="number" class="form-control" name="Balance" required value="<?php if ($page == 'edit') {echo '';} ?>">
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
