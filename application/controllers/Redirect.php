<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Redirect extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        // if ($this->ion_auth) {
        //   if (!$this->ion_auth->logged_in())
        // 	{
        // 		redirect('dashboard/login', 'refresh');
        // 	}
        // }
        if (!AVAIL) {
            if ($this->ion_auth->is_admin()) {
            } else {
                show_error('SEDANG DALAM PERBAIKAN. | ');
            }
        }
    }

    public function index()
    {
      // https://mvstore.id/redirect?tripay_reference=T62481597643DSAVG&tripay_merchant_ref=MVS0121930508054472&tripay_status=PAID&tripay_signature=6bf16d1241703544ce987f5a8fce3b36e7956ddfd87f543f9c60660fa5c14e95
      $invoiceid = $this->input->get('tripay_merchant_ref');
      redirect('/pesanan?inv='.$invoiceid);
      // echo "<h3> Terimakasih telah melakukan pembayaran di ".SITE_NAME." </h3>";
    }






}
