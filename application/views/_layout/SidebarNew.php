<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
    body {
        background-color: #18191a;
    }
    .bg-ko {
         background-color: #ffffff;
         border-radius: 17px;
    }
    .bg-ol {
         background-color: #18191a;
         border-radius: 17px;
    }
</style>
<div class="main-sidebar sidebar-style-2 bg-ko">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a class="card bg-ol" href="<?php echo base_url(); ?>" style="color:white;"><?php echo $this->db->get('data_setting')->row()->SiteName; ?></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url(); ?>" class="bg-ko">SBLI</a>
    </div>
    <ul class="sidebar-menu card">
      <li class="<?php echo $this->uri->segment(2) == 'home' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/home">
          <i class="bi bi-house"></i>
          <font color="black"><span>Home</span></font>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'setting' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/setting">
          <i class="bi bi-gear"></i>
          <font color="black"><span>Website Setting</span></font>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'price' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/price">
          <i class="bi bi-tags"></i>
          <font color="black"><span>Price Setting</span></font>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'auth' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/auth">
          <i class="bi bi-person-circle"></i>
          <font color="black"><span>User Management</span></font>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'Emailuser' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/Emailuser">
          <i class="bi bi-envelope-open"></i>
          <font color="black"><span>Send Email</span></font>
        </a>
      </li>
      <li class="menu-header">Home Setting</li>
      <li class="<?php echo $this->uri->segment(2) == 'slide' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/slide">
          <i class="bi bi-sliders"></i>
          <font color="black"><span>Slide</span></font>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'product' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/product">
          <i class="bi bi-basket"></i>
          <font color="black"><span>Product</span></font>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'item' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/item">
          <i class="bi bi-bag-check"></i>
          <font color="black"><span>Item</span></font>
        </a>
      </li>
      <li class="menu-header">Transaksi Setting</li></font>
      <li class="<?php echo $this->uri->segment(2) == 'transaksi' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/transaksi">
          <i class="bi bi-hourglass-bottom"></i>
          <font color="black"><span>Transaksi</span></font>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'deposit' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/deposit">
          <i class="bi bi-cash-stack"></i>
          <font color="black"><span>Deposit</span></font>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'payment' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/payment">
          <i class="bi bi-wallet"></i>
          <font color="black"><span>Payment Gateway</span></font>
        </a>
      </li>
      <!-- <li class="<?php echo $this->uri->segment(2) == 'deposit/list' ? 'active' : ''; ?>">
        <a class="nav-link" href="<?php echo base_url(); ?>dashboard/deposit/list">
          <i class="far fa-square"></i>
          <span>Acc Deposit</span>
        </a>
      </li> -->
    </ul>

    <!-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="<?php echo base_url('example/index_0'); ?>" target="_blank" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Documentation
      </a>
      -->
    </div>
  </aside>
</div>
