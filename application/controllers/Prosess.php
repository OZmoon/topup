<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Prosess extends CI_Controller
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
        $WebsiteSetting = $this->db->get('data_setting')->row();
        $token = $this->input->post('token');
        if ($this->ion_auth->logged_in()) {
          $user_groups = $this->ion_auth->get_users_groups($this->ion_auth->user()->row()->id)->row()->name;
        }else {
          $user_groups = 'members';
        }
        $dataHarga = $this->db->where(['GroupName' => $user_groups,'Status' => 1])->get('data_harga')->result();
        if (!$this->ion_auth->logged_in()) {
          $SendEmail = $this->input->post('SendEmail');
          if (!filter_var($SendEmail, FILTER_VALIDATE_EMAIL)) {
            $dataRespone = [
              'status' => 'FAILED',
              'message' => 'Enter Valid Email.'
            ];
            echo json_encode($dataRespone);
            exit();
          }
        }
        $keySecret = GOOGLEKEY;
        // if ($token != '') {
        //     $check = [
        //               'secret' => $keySecret,
        //               'response' => $token
        //             ];
        //     $ch = curl_init();
        //     curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
        //     curl_setopt($ch, CURLOPT_POST, true);
        //     curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($check));
        //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //     $receiveData = curl_exec($ch);
        //     $finalResponse = json_decode($receiveData);
        //     // print_r($finalResponse->success);
        //     // exit();
        //     if ($finalResponse->success) {
        //         //RESPONE SUKSES
        //     } else {
        //         $dataRespone = [
        //           'status' => 'FAILED',
        //           'message' => 'Validation Fail Try Again'
        //         ];
        //         echo json_encode($dataRespone);
        //         exit();
        //     }
        // } else {
        //     $dataRespone = [
        //       'status' => 'FAILED',
        //       'message' => 'Validation Fail Try Again'
        //     ];
        //     echo json_encode($dataRespone);
        //     exit();
        // }
        $game = $this->input->post('game');
        $productCode = $this->input->post('productCode');
        $userId = $this->input->post('userid');
        $payment = $this->input->post('payment');
        $itemId = $this->input->post('itemid');
        $itemName= $this->input->post('itemName');
        $nickName = $this->input->post('nickName');
        $data['price'] = $this->input->post('price');
        $dataRow = $this->db->where('TanggalOrder', date('Y-m-d'))->get('data_order')->num_rows() + 1;
        $refid = REF.date("md").date("hsi").$dataRow;
        $dataPro = $this->db->where('ProductCode',$game)->get('data_product')->row();
        $TrxId = '';
        $ProductApi = $dataPro->ProductApi;
        if ($dataPro->ProductType == 0) {
          $itemDb = $this->db->where('ItemSku',$itemId)->get('data_item')->row();
          $itemPrice = $itemDb->ItemPrice;
          $ProductType = 0;

        }elseif ($dataPro->ProductType == 1) {
          if ($ProductApi == 1) {
            $itemPrice = $this->cekharga($itemId);
          }elseif ($ProductApi == 2) {
            $itemDb = $this->db->where('ItemSku',$itemId)->get('data_item')->row();
            $itemPrice = $itemDb->ItemPrice;
          }

          $ProductType = 1;
        }
        $feeMv = 0;
        if ($dataHarga) {
          foreach ($dataHarga as $dhm) {
              if ($itemPrice >= $dhm->Price && $itemPrice <= $dhm->Price2) {
                $feeMv = $dhm->MarkUp;
              }else if($feeMv == 0) {
                $feeMv = 1.01;
              }
          }
        }else {
          $feeMv = 1.01;
        }

        $amount = ceil($itemPrice * $feeMv);
        $untung = $amount - $itemPrice;
        // $prosessC =  $this->cekqty($itemId,$userId,$refid);
        if ($ProductType == 0) {
            if ($dataPro->ProductApi == 1) {
            }elseif ($dataPro->ProductApi == 2) {
            }
        }else {
          if ($ProductApi == 1) {
            if ($this->ceksaldo() < $itemPrice) {
                $dataRespone = [
                  'status' => 'FAILED',
                  'message' => 'Item sedang tidak tersedia, silahkan pilih item lain.',
                ];
                echo json_encode($dataRespone);
                exit();
            }
          }elseif ($ProductApi == 2) {}
        }
        // $dataRespone = [
        //   'status' => 'FAILED',
        //   'message' => $qty,
        // ];
        // echo json_encode($dataRespone);
        // exit();
        if ($payment != "BALANCE") {
            $privateKey = PRIVATE_KEY;
            $apiKey = API_KEY;
            $merchantCode = MERCHANT_CODE;
            $merchantRef = $refid;

            $signature = hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey);
            if ($payment == 'OVO') {
              $data = [
                'method'            => $payment,
                'merchant_ref'      => $merchantRef,
                'amount'            => $amount,
                'customer_name'     => $nickName,
                'customer_email'    => ($this->ion_auth->logged_in()) ? $this->ion_auth->user()->row()->email : $SendEmail,
                'customer_phone'    => '081111111',
                'order_items'       => [
                  [
                    'sku'       => 'HD',
                    'name'      => $itemName,
                    'price'     => $amount,
                    'quantity'  => 1
                  ]
                ],
                'callback_url'      => base_url('callback'),
                'return_url'        => base_url('redirect'),
                'expired_time'      => (time()+(24*60*60)), // 24 jam
                'signature'         => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey)
              ];
            }else {
              $data = [
                'method'            => $payment,
                'merchant_ref'      => $merchantRef,
                'amount'            => $amount,
                'customer_name'     => $nickName,
                'customer_email'    => ($this->ion_auth->logged_in()) ? $this->ion_auth->user()->row()->email : $SendEmail,
                'customer_phone'    => '085717073836',
                'order_items'       => [
                  [
                    'sku'       => 'HD',
                    'name'      => $itemName,
                    'price'     => $amount,
                    'quantity'  => 1
                  ]
                ],
                'callback_url'      => base_url('callback'),
                'return_url'        => base_url('redirect'),
                'expired_time'      => (time()+(24*60*60)), // 24 jam
                'signature'         => hash_hmac('sha256', $merchantCode.$merchantRef.$amount, $privateKey)
              ];
            }
            $curl = curl_init();
            curl_setopt_array($curl, array(
              CURLOPT_FRESH_CONNECT     => true,
              CURLOPT_URL               => URL_TRANSAKSI,
              CURLOPT_RETURNTRANSFER    => true,
              CURLOPT_HEADER            => false,
              CURLOPT_HTTPHEADER        => array(
                "Authorization: Bearer ".$apiKey
              ),
              CURLOPT_FAILONERROR       => false,
              CURLOPT_POST              => true,
              CURLOPT_POSTFIELDS        => http_build_query($data)
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            $newResponse = json_decode($response);
            $TrxId = $newResponse->data->reference;
            $dataInput = [
              'UserId' => ($this->ion_auth->logged_in()) ? $this->ion_auth->user()->row()->id : 0,
              'Email' => ($this->ion_auth->logged_in()) ? $this->ion_auth->user()->row()->email : $SendEmail,
              'Payment' => $payment,
              'ItemId' => $itemId,
              'ItemName' => $itemName,
              'NickName' => $nickName,
              'InvoiceId' => $refid,
              'StatusOrder' => 0,
              'TanggalOrder' => date('Y-m-d'),
              'TanggalUpdate' => date('Y-m-d H:i:s'),
              'Game' => $game,
              'TrxId' => $TrxId,
              'Amount' => $newResponse->data->amount,
              'Note' => $userId
            ];
            $insert = $this->db->insert('data_order', $dataInput);
            $dataInputUntung = [
              'InvoiceId' => $refid,
              'Untung' => $untung,
              'Tanggal' => date('Y-m-d'),
              'Status' => 0,
            ];
            $this->db->insert('data_untung',$dataInputUntung);
            if ($insert) {
                echo !empty($err) ? $err : $response;
            }
        } else {
          //saldo
            if ($this->ion_auth->user()->row()->Balance < $amount) {
                $dataRespone = [
                  'status' => 'FAILED',
                  'message' => 'Saldo tidak cukup.',
                ];
                echo json_encode($dataRespone);
                exit();
            }
            $saldo = $this->ion_auth->user()->row()->Balance - $amount;
            $updateProfil = [
              'Balance' => $saldo
            ];
            $this->db->where('id', $this->ion_auth->user()->row()->id);
            $this->db->update('users', $updateProfil);
            $dataInput = [
              'UserId' => $this->ion_auth->user()->row()->id,
              'Email' => $this->ion_auth->user()->row()->email,
              'Payment' => $payment,
              'ItemId' => $itemId,
              'ItemName' => $itemName,
              'NickName' => $nickName,
              'InvoiceId' => $refid,
              'TanggalOrder' => date('Y-m-d'),
              'TanggalUpdate' => date('Y-m-d H:i:s'),
              'Game' => $game,
              'TrxId' => '',
              'Amount' => $amount,
              'Note' => $userId
            ];

            $dataInputUntung = [
              'InvoiceId' => $refid,
              'Untung' => $untung,
              'Tanggal' => date('Y-m-d'),
              'Status' => 1,
            ];
            $this->db->insert('data_untung',$dataInputUntung);
            if ($ProductType == 0) {
              if ($ProductApi == 0) {
                $dataInput['StatusOrder'] = 1;
                $dataInput['Ket'] = '';
                $insert = $this->db->insert('data_order', $dataInput);
                $dataRespone = [
                  'status' => 'BALANCE',
                  'InvoiceId' => $refid,
                  'NickName' => $nickName
                ];
                $dataDb = $this->db->where('InvoiceId',$dataInput['InvoiceId'])->get('data_order')->row();
                $this->load->library('phpmailer_lib');
                $mail = $this->phpmailer_lib->load();
                $mail->isSMTP();
                $mail->Host     = SMTPHOST;
                $mail->SMTPAuth = true;
                $mail->Username = SMTPUSER;
                $mail->Password = SMTPPASS;
                $mail->SMTPSecure = SMTPCRYPTO;
                $mail->Port     = SMTPPORT;
                $mail->setFrom(SMTPUSER, SITE_NAME);
                $mail->addAddress(EMAIL_ADMIN);
                $mail->Subject = 'NEW ORDER | '.$dataDb->InvoiceId.' | '.$WebsiteSetting->SiteName;
                $mail->isHTML(true);
                $mail->Body = $this->load->view('email/EmailTransaksiUser',$dataDb,TRUE);
                $mail->send();
                echo json_encode($dataRespone);
              }elseif ($dataPro->ProductApi == 1) {
              }elseif ($dataPro->ProductApi == 2) {
              }
            } elseif ($ProductType == 1) {
              if ($ProductApi == 1) {
                $prosessC =  $this->prosess($itemId, $userId, $refid);
                if ($prosessC->rc == 00) {
                    $dataInput['StatusOrder'] = 5;
                    $dataInput['Ket'] = $prosessC->sn;
                    $insert = $this->db->insert('data_order', $dataInput);
                    $dataDb = $this->db->where('InvoiceId',$dataInput['InvoiceId'])->get('data_order')->row();
                    $this->load->library('phpmailer_lib');
                    $mail = $this->phpmailer_lib->load();
                    $mail->isSMTP();
                    $mail->Host     = SMTPHOST;
                    $mail->SMTPAuth = true;
                    $mail->Username = SMTPUSER;
                    $mail->Password = SMTPPASS;
                    $mail->SMTPSecure = SMTPCRYPTO;
                    $mail->Port     = SMTPPORT;
                    $mail->setFrom(SMTPUSER, SITE_NAME);
                    $mail->addAddress($dataDb->Email);
                    $mail->Subject = 'TRANSAKSI SUKSES | '.$dataDb->InvoiceId.' | '.$WebsiteSetting->SiteName;
                    $mail->isHTML(true);
                    $mail->Body = $this->load->view('email/EmailTransaksiUser',$dataDb,TRUE);
                    $mail->send();
                    $dataRespone = [
                     'status' => 'BALANCE',
                     'InvoiceId' => $refid,
                     'NickName' => $nickName
                    ];
                    echo json_encode($dataRespone);
                } elseif ($prosessC->rc == 03) {
                    $dataInput['StatusOrder'] = 6;
                    $dataInput['Ket'] = $prosessC->sn;
                    $insert = $this->db->insert('data_order', $dataInput);
                    $dataRespone = [
                      'status' => 'BALANCE',
                      'InvoiceId' => $refid,
                      'NickName' => $nickName
                    ];
                    echo json_encode($dataRespone);
                } else {
                  //refund jika error
                  $inputUserRef['Balance'] = $this->ion_auth->user()->row()->Balance + $amount;
                  $this->db->where('id', $this->ion_auth->user()->row()->id)->update('users', $inputUserRef);

                  $dataInput['StatusOrder'] = 4;
                  $insert = $this->db->insert('data_order', $dataInput);
                  //send email

                  $dataRespone = [
                    'status' => 'BALANCE',
                    'InvoiceId' => $refid,
                    'NickName' => $nickName
                  ];
                  echo json_encode($dataRespone);
                }
              }elseif ($ProductApi == 2) {

                  $dataInput['StatusOrder'] = 5;
                  $dataInput['Ket'] = '';
                  $insert = $this->db->insert('data_order', $dataInput);
                  $dataDb = $this->db->where('InvoiceId',$dataInput['InvoiceId'])->get('data_order')->row();
                  $this->progame($userId,$itemInputId);

                  $this->load->library('phpmailer_lib');
                  $mail = $this->phpmailer_lib->load();
                  $mail->isSMTP();
                  $mail->Host     = SMTPHOST;
                  $mail->SMTPAuth = true;
                  $mail->Username = SMTPUSER;
                  $mail->Password = SMTPPASS;
                  $mail->SMTPSecure = SMTPCRYPTO;
                  $mail->Port     = SMTPPORT;
                  $mail->setFrom(SMTPUSER, SITE_NAME);
                  $mail->addAddress($dataDb->Email);
                  $mail->Subject = 'TRANSAKSI SUKSES | '.$dataDb->InvoiceId.' | '.$WebsiteSetting->SiteName;
                  $mail->isHTML(true);
                  $mail->Body = $this->load->view('email/EmailTransaksiUser',$dataDb,TRUE);
                  $mail->send();

                  $dataRespone = [
                    'status' => 'BALANCE',
                    'InvoiceId' => $refid,
                    'NickName' => $nickName
                  ];
                  echo json_encode($dataRespone);
              }

            }

        }
    }


    public function getdata()
    {
      if ($this->ion_auth->logged_in()) {
        $user_groups = $this->ion_auth->get_users_groups($this->ion_auth->user()->row()->id)->row()->name;
      }else {
        $user_groups = 'members';
      }
      $dataHarga = $this->db->where(['GroupName' => $user_groups,'Status' => 1])->get('data_harga')->result();
      $WebsiteSetting = $this->db->get('data_setting')->row();
      $itemid = $this->input->post('itemId');
      $priceInput = $this->input->post('price');
      $itemDb = $this->db->where('ItemSku',$itemid)->get('data_item')->row();
      if ($itemDb) {
        $price = $itemDb->ItemPrice;
      }else {
        $price = $this->cekharga($itemid);
      }
      $feeMv = 0;
      if ($dataHarga) {
        foreach ($dataHarga as $dhm) {
            if ($price >= $dhm->Price && $price <= $dhm->Price2) {
              $feeMv = $dhm->MarkUp;
            }else if($feeMv == 0) {
              $feeMv = 1.01;
            }
        }
      }else {
        $feeMv = 1.01;
      }
      $price = ceil($price * $feeMv);
      if ($priceInput != $price) {
        $dataRespone = [
          'status' => 'FAILED',
          'message' => 'Ban',
          'priceInput' => $priceInput,
          'price' => $price
        ];
        echo json_encode($dataRespone);
        exit();
      }
      $chanelPembayaran = $this->chanelPembayaran();
      $feeTotal = $this->chanelCalculator($price);
      $group = 'resseler';
      $c = 0;
      foreach ($chanelPembayaran->data as $r) {
        $data['data'][$c]['code'] = $r->code;
        $data['data'][$c]['image'] = $r->icon_url;
        foreach ($feeTotal as $f) {
          if ($f->code == $r->code) {
            $data['data'][$c]['price'] = $f->total_fee->customer + $price;
          }
        }
        $c++;
      }
      $data['data'][$c]['code'] = 'BALANCE';
      $data['data'][$c]['price'] = $price;
      $data['price'] = $price;
      echo json_encode($data);
    }
    private function prosess($buyerSku, $customer_no, $refid)
    {
        $curl = curl_init();
        $sign = md5(USERNAME_DIGI.KEY_GIDI.$refid);
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.digiflazz.com/v1/transaction',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'
        {
            "username": "'.USERNAME_DIGI.'",
            "buyer_sku_code": "'.$buyerSku.'",
            "customer_no": "'.$customer_no.'",
            "ref_id": "'.$refid.'",
            "testing": false,
            "sign": "'.$sign.'"
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: text/plain'
          ),
        ));
        $response = json_decode(curl_exec($curl));
        $dataJson = $response->data;
        return $dataJson;
    }
    public function ceksaldo()
    {
        $curl = curl_init();
        $sign = md5(USERNAME_DIGI.KEY_GIDI.'depo');
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.digiflazz.com/v1/cek-saldo',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'
      {
          "cmd": "deposit",
          "username": "'.USERNAME_DIGI.'",
          "sign": "'.$sign.'"
      }',
        CURLOPT_HTTPHEADER => array(
          'Content-Type: text/plain'
        ),
      ));

        $response = json_decode(curl_exec($curl));
        $dataJson = $response->data;
        return $dataJson->deposit;
    }
    public function cekharga($skuCode)
    {
        $curl = curl_init();
        $sign = md5(USERNAME_DIGI.KEY_GIDI.'pricelist');
          curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://api.digiflazz.com/v1/price-list',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'
        {
            "cmd": "prepaid",
            "code": "'.$skuCode.'",
            "username": "'.USERNAME_DIGI.'",
            "sign": "'.$sign.'"
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: text/plain'
          ),
        ));
        $response = json_decode(curl_exec($curl));
        $dataJson = $response->data;
        return $dataJson[0]->price;
    }
    public function webhooks($d){
      if ($d == 1) {
        echo USERNAME_DIGI.KEY_GIDI.'pricelist <br>';
      }elseif ($d == 2) {
        $itemId = $this->input->post('itemId');
        $userId = $this->input->post('userId');
        if ($itemId == null) {
          echo "ERROR";
        }else {
          $refid = $this->generateid();
          $prosessC =  $this->prosess($itemId, $userId, $refid);
          print_r($prosessC);
        }
      }elseif ($d == 3) {
        $refid = $this->generateid();
        echo $refid;
      }elseif ($d ==4) {
        $refid = $this->ceksaldo();
        echo $refid;
      }elseif ($d ==5) {
        $url = urlencode('Higgs Domino');
        echo $url.'<br>';
        echo urldecode($url).'<br>';
      }elseif ($d ==6) {
        print_r(getallheaders());
      }
      else {
        echo "ERROR";
      }

    }
    public function chanelPembayaran(){
      $apiKey = API_KEY;
      $payload = [];
      $curl = curl_init();
      curl_setopt_array($curl, array(
      CURLOPT_FRESH_CONNECT     => true,
      CURLOPT_URL               => "https://tripay.co.id/api/merchant/payment-channel?".http_build_query($payload),
      CURLOPT_RETURNTRANSFER    => true,
      CURLOPT_HEADER            => false,
      CURLOPT_HTTPHEADER        => array(
        "Authorization: Bearer ".$apiKey
      ),
      CURLOPT_FAILONERROR       => false
      ));
      $response = curl_exec($curl);
      $response = json_decode($response);
      $err = curl_error($curl);
      curl_close($curl);
      return $response;
    }
    public function chanelCalculator($price = null){
      $apiKey = API_KEY;
      $payload = [
        'amount'	=> $price,
        'code' => ''
      ];
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_FRESH_CONNECT     => true,
        CURLOPT_URL               => "https://tripay.co.id/api/merchant/fee-calculator?".http_build_query($payload),
        CURLOPT_RETURNTRANSFER    => true,
        CURLOPT_HEADER            => false,
        CURLOPT_HTTPHEADER        => array(
          "Authorization: Bearer ".$apiKey
        ),
        CURLOPT_FAILONERROR       => false
      ));
      $response = curl_exec($curl);
      $response = json_decode($response);
      $err = curl_error($curl);
      curl_close($curl);
      return $response->data;
    }
    public function getPayment(){
      $chanelPembayaran = $this->chanelPembayaran();
      $c = 0;
      foreach ($chanelPembayaran->data as $r) {
        $data['data'][$c]['code'] = $r->code;
        $data['data'][$c]['image'] = $r->icon_url;
        $data['data'][$c]['price'] = 0;
        $c++;
      }
      $data['data'][$c]['code'] = 'BALANCE';
      $data['data'][$c]['price'] = 0;
      echo json_encode($data);
    }

}
