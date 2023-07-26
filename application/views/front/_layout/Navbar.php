<style>
    /* CSS */
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
</style>

<!-- ======= Navbar ======= -->
<div class="nav">
<div class="nav__content">
<ul class="nav__list">
<li class="nav__list-item">
<a href="<?php echo base_url(); ?>">
<img src="<?php echo base_url(); ?>sb2.png" alt="" class="d-inline-block align-text-top" style="max-width:100%;height:40px;">
</a>
</li>
            <li class="nav__list-item"><a href="<?php echo base_url(); ?>" class="nav-a">Home</a></li>
            <?php if (!$this->ion_auth->logged_in()): ?>
            <li class="nav__list-item"><a href="<?php echo base_url(); ?>login" class="nav-a">Login</a></li>
            <li class="nav__list-item"><a href="<?php echo base_url(); ?>register" class="nav-a">Register</a></li>
            <?php endif; ?>
            <?php if ($this->ion_auth->logged_in()): ?>
            <li class="nav__list-item"><a href="<?php echo base_url('profile'); ?>" class="nav-a">Profile</a></li>
            <li class="nav__list-item"><a href="<?php echo base_url('deposit'); ?>" class="nav-a">Deposite</a></li>
            <li class="nav__list-item"><a href="<?php echo base_url('transaksi'); ?>" class="nav-a">Riwayat Transaksi</a></li>
            <?php endif; ?>
            <?php if ($this->ion_auth->is_admin()): ?>
            <li class="nav__list-item"><a href="<?php echo base_url('dashboard/home'); ?>" class="nav-a">Dashboard Admin</a></li>
            <?php endif; ?>
            <li class="nav__list-item"><a href="<?php echo base_url('pesanan'); ?>" class="nav-a">Cek Order</a></li>
            <li class="nav__list-item"><a href="<?php echo base_url('listharga'); ?>" class="nav-a">Daftar Harga</a></li>
            <?php if ($this->ion_auth->logged_in()): ?>
            <li class="nav__list-item"><a href="<?php echo base_url('dashboard/auth/logout'); ?>" class="nav-a">Logout</a></li>
            <li class="nav__list-item"><a href="<?php echo base_url(); ?>api" class="nav-a">API</a></li>
            <?php endif; ?>
                    </ul>
</ul>
</div>
</div>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light" aria-label="Eighth navbar example">
<div class="container">
<a class="navbar-brand" href="<?php echo base_url(); ?>">
<div style="">
<img src="<?php echo base_url(); ?>sb2.png" alt="" class=" d-inline-block align-text-top logoku" style="height: 37px;">
</div>
</a>
<div class="menu-icon">
<span class="menu-icon__line menu-icon__line-left"></span>
<span class="menu-icon__line"></span>
<span class="menu-icon__line menu-icon__line-right"></span>
</div>
</div>
</nav>
<div class="container" style="margin-top: 10px;">
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
<symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
</symbol>
<symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
</symbol>
<symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
<path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
</symbol>
</svg>
</div>


<?php if ($this->ion_auth->logged_in()): ?>
  <div class="container ">
    <div class="row mb-2 align-items-center p-1">
      <div class="col-md-12 col-lg-12 text-dark bg-kuning rounded" style="padding:10px;margin-top:20px;">
        <?php if ($this->ion_auth->logged_in()): ?>
          <p class="mb-0">Nama : <strong><?php echo $this->ion_auth->user()->row()->first_name ?> | <a href="<?php echo base_url('profile'); ?>" class="button-50">Edit Profile</a></strong> | <?php if ($this->ion_auth->is_admin()): ?> <strong><a href="<?php echo base_url('dashboard/home'); ?>" class="button-50">Dashboard Admin</a></strong> 
            <?php endif; ?> <br> Saldo : <strong><?php echo "Rp " . number_format($this->ion_auth->user()->row()->Balance, 2, ',', '.'); ?> </strong>| <?php $group = 'resseler'; echo($this->ion_auth->get_users_groups($this->ion_auth->user()->row()->id)->row()->name); ?> <br><a href="<?php echo base_url('deposit'); ?>" class="button-50"><b>Topup Saldo<b></a> </p>
        <?php endif; ?>
      </div>
    </div>
    <div class="row align-items-center p-1">
      <div class="col-md-12 col-lg-12 text-dark rounded m-0 p-0">
        <?php
        if ($this->session->flashdata('message')) {
            ?>
        <div class="alert alert-danger alert-has-icon  flash m-0">
          <div class="alert-icon">
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
      </div>
    </div>
  </div>
<?php endif; ?>

<script>
    console.clear();const app=(()=>{let body;let menu;let menuItems;const init=()=>{body=document.querySelector('body');menu=document.querySelector('.menu-icon');menuItems=document.querySelectorAll('.nav__list-item');applyListeners();}
const applyListeners=()=>{menu.addEventListener('click',()=>toggleClass(body,'nav-active'));}
const toggleClass=(element,stringClass)=>{if(element.classList.contains(stringClass)){element.classList.remove(stringClass);console.log('close');$('.carousel-control-prev').show();$('.carousel-control-next').show();$('.nav__content').hide('fade',500);$('.logoku').show('fade',500);$('.logoku').addClass('d-inline-block');}else{element.classList.add(stringClass);console.log('open');$('.carousel-control-prev').hide();$('.carousel-control-next').hide();$('.logoku').removeClass('d-inline-block');$('.logoku').hide('fade',500);setTimeout(function(){$('.nav__content').show('fade',500);},500);}}
init();})();
</script>