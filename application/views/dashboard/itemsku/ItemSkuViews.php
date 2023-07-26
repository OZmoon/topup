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

    <div class="alert alert-primary alert-has-icon" style="display:none;">
      <div class="alert-icon">
        <i class="far fa-lightbulb"></i>
      </div>
      <div class="alert-body">
        <div class="alert-title"></div>
        Success menyimpan data.
      </div>
    </div>
			<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <a href="<?php echo base_url('dashboard/item/create'); ?>" style="border-radius:5px;" class="btn btn-info">Add Item</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="table-sku">
                  <thead>
                    <tr>
                    <th>Sku Code</th>
                    <th>Sku Name</th>
                    <th>Sku Brand | Sku Category | Sku Type</th>
                    <th>Sku Price</th>
                    <th>Status Seller</th>
                    <th>Vip Price</th>
                    <th>Resseler Price</th>
                    <th>Members Price</th>
                    <th>Avail</th>
                    <th>Update Time</th>
                    <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                <?php $i =0; ?>
                <?php foreach ($data as $d):?>
                    <?php $i++ ?>
                    <tr>
                      <td><?php echo $d->SkuCode; ?></td>
                      <td><?php echo $d->SkuName; ?></td>
                      <td><?php echo $d->SkuBrand.' | '.$d->SkuCategory.' | '.$d->SkuType; ?></td>
                      <td><?php echo $d->SkuPrice; ?></td>
                      <td><?php if ($d->SkuSellerStatus == 0) {
                            echo '<div class="bg-danger text-center text-white rounded" style="widht:100%;">
                                                  <p>Non Aktif</p>
                                                </div>';
                        } else {
                            echo '<div class="bg-success text-center text-white rounded" style="widht:100%;">
                                                  <p>Aktif</p>
                                                </div>';
                        } ?>
                      </td>

                      <td><input type="number" class="<?php if($d->VipPrice < $d->SkuPrice){echo "bg-danger";} ?>  form-control vip-<?php echo $d->SkuCode; ?>" name="vip-<?php echo $d->SkuCode; ?>" required value="<?php echo $d->VipPrice; ?>"></td>
                      <td><input type="number" class="<?php if($d->ResselerPrice < $d->VipPrice){echo "bg-danger";} ?>  form-control resseler-<?php echo $d->SkuCode; ?>" name="resseler-<?php echo $d->SkuCode; ?>" required value="<?php echo $d->ResselerPrice; ?>"></td>
                      <td><input type="number" class="<?php if($d->MembersPrice < $d->ResselerPrice){echo "bg-danger";} ?> form-control members-<?php echo $d->SkuCode; ?>" name="members-<?php echo $d->SkuCode; ?>" required value="<?php echo $d->MembersPrice; ?>"></td>
                      <td><?php if ($d->VipPrice < $d->SkuPrice && $d->ResselerPrice < $d->VipPrice && $d->MembersPrice < $d->ResselerPrice) {
                            echo '<div class="bg-danger text-center text-white rounded" style="widht:100%;">
                                                  <p>Gangguan</p>
                                                </div>';
                        } else {
                            echo '<div class="bg-success text-center text-white rounded" style="widht:100%;">
                                                  <p>Normal</p>
                                                </div>';
                        } ?>
                      </td>
                      <td><?php echo $d->UpdateAt; ?></td>
                      <td><button type="button" class="btn btn-info btn-acc" sku="<?php echo $d->SkuCode; ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                  <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"></path>
                  <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"></path>
                </svg>
                Simpan
              </button>
                  <a href="<?php echo base_url('dashboard/itemsku/delete/'.$d->SkuCode.''); ?>" class="btn btn-danger mt-1">Delete</a>
            </td>
                      <!-- <td> <?php if ($d->ItemStatus == 0) { ?>
                      <a href="<?php echo base_url('dashboard/item/active/'.$d->Id.''); ?>" class="btn btn-success">Aktifkan</a>
                    <?php } else {
        ?>
                      <a href="<?php echo base_url('dashboard/item/active/'.$d->Id.''); ?>" class="btn btn-danger">Non Aktifkan</a>
                    <?php
    } ?>
                    <a href="<?php echo base_url('dashboard/item/edit/'.$d->Id.''); ?>" class="btn btn-primary">Edit</a> -->

                    </tr>
				<?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- <td><?php if ($d->ItemStatus == 0) {
              echo '<div class="bg-danger text-center text-white rounded" style="widht:100%;">
                                    <p>Non Aktif</p>
                                  </div>';
          } else {
              echo '<div class="bg-success text-center text-white rounded" style="widht:100%;">
                                    <p>Aktif</p>
                                  </div>';
          } ?></td> -->
        </div>
      </div>
			  </div>
  </section>
</div>

<?php $this->load->view('_layout/footer'); ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
$( document ).ready(function() {
    console.log( "ready!" );
    $("#table-sku").dataTable({
      "aLengthMenu": [
        [1000, 2000, 3000, 5000, -1],
        [1000, 2000, 3000, 5000, "All"]
    ],
      "order": [[ 0, "desc" ]]
    });

    $('.btn-acc').on('click',function(){
      var SkuCode = $(this).attr('sku');
      var vip = $('.vip-'+SkuCode).val();
      var resseler = $('.resseler-'+SkuCode).val();
      var members = $('.members-'+SkuCode).val();
      if (vip == '') {
        vip = 0;
      }
      if (resseler == '') {
        resseler = 0;
      }
      if (members == '') {
        members = 0;
      }
      $.ajax({
          url: '<?php echo base_url('dashboard/itemsku/update'); ?>',
          cache: false,
          type: "post",
          dataType: "json",
          async: true,
          data: {
              "sku": SkuCode,
              "vip": vip,
              "resseler" : resseler,
              "members" : members,
          },
          success: function (data) {
            if (data.Status) {
              Swal.fire({
                title: 'Success',
                html: 'Data Berhasil Dirubah.',
                timer: 500,
                timerProgressBar: true,
                didOpen: () => {
                  Swal.showLoading()
                  const b = Swal.getHtmlContainer().querySelector('b')
                  timerInterval = setInterval(() => {
                    b.textContent = Swal.getTimerLeft()
                  }, 100)
                },
                willClose: () => {
                  clearInterval(timerInterval)
                }
              }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                  // console.log('I was closed by the timer')
                }
              })
            }else {
              Swal.fire({
                icon: 'error',
                title: 'Data gagal di update.',
                text: 'Silahkan masukan data yang benar.',
              })
            }
            console.log(data);


          },
          error: function () {
            $.ajax(this);
            return false;
          }
      });
    });
});



</script>
