<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, OPTIONS");
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
    }

    public function index()
    {
      $WebsiteSetting = $this->db->get('data_setting')->row();
      $users = $this->ion_auth->user()->row();
      $data = [
          'title' => $WebsiteSetting->SiteName.' | API',
          'data' => $users
      ];
      $this->load->view('front/ApiViews', $data);
    }
    //get user profile
    public function profile(){
      //
      $apiKey = $this->input->post('apiKey');
      if ($apiKey != null) {
        $userId = $this->db->where('ApiKey',$apiKey)->get('users')->row()->id;
        if ($userId) {
          $user = $this->ion_auth->user($userId)->row();
          $user_groups = $this->ion_auth->get_users_groups($userId)->row()->name;
          $data = [
            'data' => $user,
            'level' => $user_groups,
            'apiKey' => $apiKey,
            'message' => 'success',
            'status' => true
          ];
        }else {
          $data = [
            'apiKey' => $apiKey,
            'message' => 'Api key tidak valid.',
            'status' => false
          ];
        }

      }else {
        $data = [
          'apiKey' => $apiKey,
          'message' => 'Api key tidak valid.',
          'status' => false
        ];
      }
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
        //
    }
    //get product
    public function getproduct(){
        $apiKey = $this->input->post('apiKey');
        if ($apiKey != null) {
          $cekApi = $this->db->where('ApiKey',$apiKey)->get('users')->row();
          if ($cekApi) {
            $userId = $this->db->where('ApiKey',$apiKey)->get('users')->row()->id;
            $user = $this->ion_auth->user($userId)->row();
            $user_groups = $this->ion_auth->get_users_groups($userId)->row()->name;
            $dataProduct = $this->db->where(['ProductStatus' => 1, 'ProductType' => 1])->get('data_product')->result();
            $data = [
              'data' => $dataProduct,
              'level' => $user_groups,
              'apiKey' => $apiKey,
              'message' => 'success',
              'status' => true
            ];
          }else {
            $data = [
              'apiKey' => $apiKey,
              'message' => 'Api key tidak valid.',
              'status' => false
            ];
          }

        }else {
          $data = [
            'apiKey' => $apiKey,
            'message' => 'Api key tidak valid.',
            'status' => false
          ];
        }
        $this->output
          ->set_content_type('application/json')
          ->set_output(json_encode($data));
    }

    //get item product
    public function getitem(){
      $apiKey = $this->input->post('apiKey');
      $productCode = $this->input->post('productCode');
      if ($apiKey != null) {
        $cekApi = $this->db->where('ApiKey',$apiKey)->get('users')->row();
        if ($cekApi) {
            $userId = $this->db->where('ApiKey',$apiKey)->get('users')->row()->id;
            $user = $this->ion_auth->user($userId)->row();
            $user_groups = $this->ion_auth->get_users_groups($userId)->row()->name;
            $dataProduct = $this->db->where('ProductCode',$productCode)->get('data_product')->row();
            if ($dataProduct) {
              if ($dataProduct->ProductApi == 0 ) {
                // code...
              }elseif ($dataProduct->ProductApi == 1) {
                  $listItem = $this->getitemlist($productCode,$userId);
                  if ($listItem['dataItem'] == null) {
                    $dataListDb[0]['price'] = 0;
                    $dataListDb[0]['product_name'] = 'Produk sedang gangguan';
                    $dataListDb[0]['sku_code'] = 'ERROR';
                    $dataListDb[0]['Brand'] = $dataProduct->ProductName;
                    $listItem2 = [
                      'dataItem' =>
                      $dataListDb
                    ];
                    $data = [
                      'data' => $listItem2,
                      'level' => $user_groups,
                      'apiKey' => $apiKey,
                      'message' => 'success',
                      'status' => true
                    ];
                  }else {
                    $data = [
                      'data' => $listItem,
                      'level' => $user_groups,
                      'apiKey' => $apiKey,
                      'message' => 'success',
                      'status' => true
                    ];
                  }
                  // print_r();
                  // exit();

              }elseif ($dataProduct->ProductApi == 2) {
                $dataItem = $this->db->where('ProductCode',$productCode)->get('data_item')->result();
                if ($productCode == 'HD') {
                  $dataListDb = [];
                  $ix = 0;
                  foreach ($dataItem as $d) {
                    $dataListDb[$ix]['price'] = $d->ItemPrice;
                    $dataListDb[$ix]['product_name'] = $d->ItemName;
                    $dataListDb[$ix]['sku_code'] = $d->ItemSku;
                    $dataListDb[$ix]['Brand'] = 'HD';
                    $ix++;
                  }
                  $listItem = [
                    'dataItem' =>
                    $dataListDb
                  ];

                  $data = [
                    'data' => $listItem,
                    'level' => $user_groups,
                    'apiKey' => $apiKey,
                    'message' => 'success',
                    'status' => true
                  ];
                }
              }



            }else {
              $data = [
                'apiKey' => $apiKey,
                'message' => 'Product Code tidak valid.',
                'status' => false
              ];
            }


        }else {
          $data = [
            'apiKey' => $apiKey,
            'message' => 'Api key tidak valid.',
            'status' => false
          ];
        }

      }else {
        $data = [
          'apiKey' => $apiKey,
          'message' => 'Api key tidak valid.',
          'status' => false
        ];
      }
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
        //
    }
    public function getitemdetail(){
      $apiKey = $this->input->post('apiKey');
      $skuCode = $this->input->post('skuCode');
      $dataHarga = $this->db->where(['GroupName' => 'VIP','Status' => 1])->get('data_harga')->result();
      if ($apiKey != null) {
        $cekApi = $this->db->where('ApiKey',$apiKey)->get('users')->row();
        if ($cekApi) {
          if ($skuCode != null) {
            $userId = $this->db->where('ApiKey',$apiKey)->get('users')->row()->id;
            $user = $this->ion_auth->user($userId)->row();
            $user_groups = $this->ion_auth->get_users_groups($userId)->row()->name;
            $WebsiteSetting = $this->db->get('data_setting')->row();
            $detailItem = $this->cekharga($skuCode);

            if ($detailItem) {
              $feeMv = 0;
              if ($dataHarga) {
                foreach ($dataHarga as $dhm) {
                    if ($detailItem->price >= $dhm->Price && $detailItem->price <= $dhm->Price2) {
                      $feeMv = $dhm->MarkUp;
                    }else if($feeMv == 0) {
                      $feeMv = 1.01;
                    }
                }
              }else {
                $feeMv = 1.01;
              }
              $newPrice = ceil($detailItem->price * $feeMv);
              $newDetailItem = [
                'dataItem' => [
                  'price' => $newPrice,
                  'product_name' => $detailItem->product_name,
                  'sku_code' => $detailItem->buyer_sku_code,
                ],
              ];
              $data = [
                'data' => $newDetailItem,
                'level' => $user_groups,
                'apiKey' => $apiKey,
                'message' => 'success',
                'status' => true
              ];
            }else {
              $dataItem = $this->db->where('ItemSku',$skuCode)->get('data_item')->row();
              $dataPro = $this->db->where('ProductCode',$dataItem->ProductCode)->get('data_product')->row();
              if ($dataPro->ProductApi == 0) {
                // code...
              }elseif ($dataPro->ProductApi == 1) {
                // code...
              }elseif ($dataPro->ProductApi == 2) {

              }
              $newDetailItem = [
                'dataItem' => [
                  'price' => $data['price'],
                  'product_name' => $itemName,
                  'sku_code' => $skuCode,
                ],
              ];
              $data = [
                'data' => $newDetailItem,
                'level' => $user_groups,
                'apiKey' => $apiKey,
                'message' => 'success',
                'status' => true
              ];
            }

          }else {
            $data = [
              'apiKey' => $apiKey,
              'message' => 'Data tidak valid.',
              'status' => false
            ];
          }

        }else {
          $data = [
            'apiKey' => $apiKey,
            'message' => 'Api key tidak valid.',
            'status' => false
          ];
        }

      }else {
        $data = [
          'apiKey' => $apiKey,
          'message' => 'Api key tidak valid.',
          'status' => false
        ];
      }
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
        //
    }
    //getitemlist
    public function getitemlist($code,$userId){
      $sign = md5(USERNAME_DIGI.KEY_GIDI.'pricelist');
      $dataHarga = $this->db->where(['GroupName' => 'VIP','Status' => 1])->get('data_harga')->result();
      $WebsiteSetting = $this->db->get('data_setting')->row();
      $game = $code;
      if ($game == '') {
          show_error('No direct script access allowed | '.SITE_NAME);
      } else {
          $game = strtoupper($game);
          $dataDb = $this->db->where('ProductCode',$game)->get('data_product')->row();
          if ($dataDb) {
            $gameName = $dataDb->ProductName;
            $gameCode = $dataDb->ProductCode;
            $gamePic = $dataDb->ProductImage;
            $gameId = $dataDb->ProductTutor;
          }else {
            show_error('No direct script access allowed | '.$WebsiteSetting->SiteName);
          }
          $curl = curl_init();
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
              "cmd" : "prepaid",
              "username": "'.USERNAME_DIGI.'",
              "sign": "'.$sign.'"
            }',
            CURLOPT_HTTPHEADER => array(
              'Content-Type: text/plain'
            ),
          ));

          $response = json_decode(curl_exec($curl));
          $dataJson = $response->data;
          usort($dataJson, function ($a, $b) {
              return $a->price < $b->price ? -1 : 1 ;
          });
          curl_close($curl);
          $newData = [];
          $v = 0;
          $jams = strtotime(date('H:i'));
          foreach ($dataJson as $k => $value) {
              if ($dataDb->ProductName == $value->brand && $value->buyer_product_status == true && $value->seller_product_status == true) {
                if ($jams > strtotime($value->start_cut_off) || $jams < strtotime($value->end_cut_off)) {
                }else {
                }
                $feeMv = 0;
                if ($dataHarga) {
                  foreach ($dataHarga as $dhm) {
                      if ($value->price >= $dhm->Price && $value->price <= $dhm->Price2) {
                        $feeMv = $dhm->MarkUp;
                      }else if($feeMv == 0) {
                        $feeMv = 1.01;
                      }
                  }
                }else {
                  $feeMv = 1.01;
                }
                $dataJson[$k]->newprice = ceil($value->price * $feeMv);
                $newData[$v]['price'] = ceil($value->price * $feeMv);
                $newData[$v]['product_name'] = $value->product_name;
                $newData[$v]['jam1'] = $value->start_cut_off;
                $newData[$v]['jam2'] = $value->end_cut_off;
                $newData[$v]['sku_code'] = $value->buyer_sku_code;
                $newData[$v]['Brand'] = $value->brand;
                $v++;
              }elseif ($dataDb->ProductCode == 'PULSA' && 'Pulsa' == $value->category  && $value->buyer_product_status == true && $value->seller_product_status == true) {
                $feeMv = 0;
                if ($dataHarga) {
                  foreach ($dataHarga as $dhm) {
                      if ($value->price >= $dhm->Price && $value->price <= $dhm->Price2) {
                        $feeMv = $dhm->MarkUp;
                      }else if($feeMv == 0) {
                        $feeMv = 1.01;
                      }
                  }
                }else {
                  $feeMv = 1.01;
                }
                $dataJson[$k]->newprice = ceil($value->price * $feeMv);
                $newData[$v]['price'] = ceil($value->price * $feeMv);
                $newData[$v]['product_name'] = $value->product_name;
                $newData[$v]['sku_code'] = $value->buyer_sku_code;
                $newData[$v]['Brand'] = $value->brand;
                $v++;
                // code...
              }elseif ($dataDb->ProductCode == 'DATA' && 'Data' == $value->category  && $value->buyer_product_status == true && $value->seller_product_status == true) {
                $feeMv = 0;
                if ($dataHarga) {
                  foreach ($dataHarga as $dhm) {
                      if ($value->price >= $dhm->Price && $value->price <= $dhm->Price2) {
                        $feeMv = $dhm->MarkUp;
                      }else if($feeMv == 0) {
                        $feeMv = 1.01;
                      }
                  }
                }else {
                  $feeMv = 1.01;
                }
                $dataJson[$k]->newprice = ceil($value->price * $feeMv);
                $newData[$v]['price'] = ceil($value->price * $feeMv);
                $newData[$v]['product_name'] = $value->product_name;
                $newData[$v]['sku_code'] = $value->buyer_sku_code;
                $newData[$v]['Brand'] = $value->brand;
                $v++;
              }
          }
          // print_r($newData);
          if ($newData) {
            $data = [
            'dataItem' => $newData,
            'gameName' => $gameName,
            'gameCode' => $gameCode,
            'gamePic' => $gamePic,
            'gameId' => $gameId,
            'ServerTime' => date('H:i')
            ];
          }else {
            $dataListDb[0]['price'] = 0;
            $dataListDb[0]['product_name'] = 'Produk sedang gangguan';
            $dataListDb[0]['sku_code'] = 'ERROR';
            $dataListDb[0]['Brand'] = $dataDb->ProductName;
            $data = [
            'dataItem' => $dataListDb,
            'gameName' => $gameName,
            'gameCode' => $gameCode,
            'gamePic' => $gamePic,
            'gameId' => $gameId,
            'ServerTime' => date('H:i')
            ];
          }

          return $data;
    }}
    //order
    public function order(){
      $dataHarga = $this->db->where(['GroupName' => 'VIP','Status' => 1])->get('data_harga')->result();
      $apiKey = $this->input->post('apiKey');
      $skuCode = $this->input->post('skuCode');
      $nickName = $this->input->post('idNo');
      $testing = $this->input->post('testing');
      $ApiId = $this->input->post('invoiceId');
      $url = $this->input->post('url');
      $WebsiteSetting = $this->db->get('data_setting')->row();
      if ($apiKey != null && $skuCode != null && $nickName != null && $url != null && $ApiId != null) {
        if ($testing == 1) {
              $cekApi = $this->db->where('ApiKey',$apiKey)->get('users')->row();
              if ($cekApi) {
                $userId = $this->db->where('ApiKey',$apiKey)->get('users')->row()->id;
                $user = $this->ion_auth->user($userId)->row();
                $user_groups = $this->ion_auth->get_users_groups($userId)->row()->name;
                $gameCek = 'TESTING';
                // $productDb = $this->db->where('ProductName',$gameCek)->get('data_product')->row();
                $userId2 = $this->input->post('idNo'); //id tujuan
                $payment = 'BALANCE';
                $itemId = $skuCode;
                $itemName= 'TESTING';
                $dataRow = $this->db->where('TanggalOrder', date('Y-m-d'))->get('data_order')->num_rows() + 1;
                $refid = $ApiId;
                $amountFinal = 100;
                $amount = $amountFinal;
                $dataInput = [
                  'UserId' => $user->id,
                  'Email' => $user->email,
                  'Payment' => $payment,
                  'ItemId' => $itemId,
                  'ItemName' => $itemName,
                  'NickName' => $nickName,
                  'InvoiceId' => $refid,
                  'TanggalOrder' => date('Y-m-d'),
                  'TanggalUpdate' => date('Y-m-d H:i:s'),
                  'Game' => $gameCek,
                  'Amount' => $amount,
                  'Note' => $userId2,
                  'url' => $url
                ];
                $prosessC =  $this->prosess($itemId, $userId2, $refid,$testing);
                //$prosessC =  $this->prosess('xld10','087800001234',$refid);
                if ($prosessC->rc == 00) {
                    $dataInput['StatusOrder'] = 5;
                    $dataInput['Ket'] = $prosessC->sn;
                    $insert = $this->db->insert('data_order', $dataInput);
                    //send email
                    $dataRespone = [
                      'apiKey' => $apiKey,
                      'InvoiceId' => $refid,
                      'message' => $prosessC->status,
                      'balance' => $user->Balance,
                      'respone' => $prosessC->rc,
                      'ket' => $prosessC->sn,
                      'status' => true
                    ];
                } elseif ($prosessC->rc == 03) {
                    $dataInput['StatusOrder'] = 6;
                    $dataInput['Ket'] = $prosessC->sn;
                    $insert = $this->db->insert('data_order', $dataInput);
                    $dataRespone = [
                      'apiKey' => $apiKey,
                      'InvoiceId' => $refid,
                      'message' => $prosessC->status,
                      'balance' => 'TEST',
                      'respone' => $prosessC->rc,
                      'ket' => $prosessC->sn,
                      'status' => true
                    ];
                } else {
                    $dataInput['StatusOrder'] = 4;
                    $insert = $this->db->insert('data_order', $dataInput);
                    $dataRespone = [
                      'apiKey' => $apiKey,
                      'InvoiceId' => $refid,
                      'message' => $prosessC->status,
                      'balance' => $saldo,
                      'respone' => $prosessC->rc,
                      'ket' => $prosessC->sn,
                      'status' => true
                    ];
                }
              }else {
                $dataRespone = [
                  'apiKey' => $apiKey,
                  'message' => 'Api key tidak valid.',
                  'status' => false
                ];
              }
        }elseif($testing == 0) {
          //REAL
          $dataItem = $this->db->where('ItemSku',$skuCode)->get('data_item')->row();
          if ($dataItem) {
              $dataPro = $this->db->where('ProductCode',$dataItem->ProductCode)->get('data_product')->row();
              if ($dataPro->ProductApi == 0) {
              }elseif ($dataPro->ProductApi == 1) {
              }elseif ($dataPro->ProductApi == 2) {}
          }else {
            if ($this->cekharga($skuCode)) {
                  $cekApi = $this->db->where('ApiKey',$apiKey)->get('users')->row();
                  if ($cekApi) {
                  $userId = $this->db->where('ApiKey',$apiKey)->get('users')->row()->id;
                  $user = $this->ion_auth->user($userId)->row();
                  if ($this->cekharga($skuCode)->category == 'Pulsa') {
                    $gameCek = 'PULSA ALL OPERATOR';
                  }else {
                    $gameCek = $this->cekharga($skuCode)->brand;
                  }
                  $productDb = $this->db->where('ProductName',$gameCek)->get('data_product')->row();
                  $userId2 = $this->input->post('idNo'); //id tujuan
                  $payment = 'BALANCE/API';
                  $itemId = $skuCode;
                  $dataRow = $this->db->where('TanggalOrder', date('Y-m-d'))->get('data_order')->num_rows() + 1;
                  $refid = $ApiId;
                  $itemName= $this->cekharga($itemId)->product_name;
                  $priceCek = $this->cekharga($itemId)->price;
                  $feeMv = 0;
                  if ($dataHarga) {
                    foreach ($dataHarga as $dhm) {
                        if ($priceCek >= $dhm->Price && $priceCek <= $dhm->Price2) {
                          $feeMv = $dhm->MarkUp;
                        }else if($feeMv == 0) {
                          $feeMv = 1.01;
                        }
                    }
                  }else {
                    $feeMv = 1.01;
                  }
                  $amountFinal = ceil($priceCek * $feeMv);
                  $amount = $amountFinal;
                  if ($this->ceksaldo() < $amount) {
                      $dataRespone = [
                        'apiKey' => $apiKey,
                        'message' => 'Item tidak tersedia.',
                        'status' => false
                      ];
                  }else {
                    if ($user->Balance < $amount) {
                      $dataRespone = [
                        'apiKey' => $apiKey,
                        'message' => 'Saldo Tidak Cukup.',
                        'status' => false
                      ];
                    }else {
                      $saldo = $user->Balance - $amount;
                      $updateProfil = [
                        'Balance' => $saldo
                      ];
                      $this->db->where('id', $user->id);
                      $this->db->update('users', $updateProfil);
                      $dataInput = [
                        'UserId' => $user->id,
                        'Email' => $user->email,
                        'Payment' => $payment,
                        'ItemId' => $itemId,
                        'ItemName' => $itemName,
                        'NickName' => $nickName,
                        'InvoiceId' => $refid,
                        'TanggalOrder' => date('Y-m-d'),
                        'TanggalUpdate' => date('Y-m-d H:i:s'),
                        'Game' => $productDb->ProductCode,
                        'Amount' => $amount,
                        'Note' => $userId2,
                        'url' => $url
                      ];
                      $prosessC =  $this->prosess($itemId, $userId2, $refid,$testing);
                      if ($prosessC->rc == 00) {
                          $dataInput['StatusOrder'] = 5;
                          $dataInput['Ket'] = $prosessC->sn;
                          $insert = $this->db->insert('data_order', $dataInput);
                          $dataRespone = [
                            'apiKey' => $apiKey,
                            'InvoiceId' => $refid,
                            'message' => $prosessC->status,
                            'balance' => $saldo,
                            'respone' => $prosessC->rc,
                            'ket' => $prosessC->sn,
                            'status' => true
                          ];
                      } elseif ($prosessC->rc == 03) {
                          $dataInput['StatusOrder'] = 6;
                          $dataInput['Ket'] = $prosessC->sn;
                          $insert = $this->db->insert('data_order', $dataInput);
                          $dataRespone = [
                            'apiKey' => $apiKey,
                            'InvoiceId' => $refid,
                            'message' => $prosessC->status,
                            'balance' => $saldo,
                            'respone' => $prosessC->rc,
                            'ket' => $prosessC->sn,
                            'status' => true
                          ];
                      } else {
                          $dataInput['StatusOrder'] = 4;
                          $insert = $this->db->insert('data_order', $dataInput);
                          //refund jika error
                          $inputUserRef['Balance'] = $user->Balance + $amount;
                          $this->db->where('id', $user->id)->update('users', $inputUserRef);

                          $this->load->library('phpmailer_lib');
                          $mail = $this->phpmailer_lib->load();
                          $mail->isSMTP();
                          $mail->Host     = SMTPHOST;
                          $mail->SMTPAuth = true;
                          $mail->Username = SMTPUSER;
                          $mail->Password = SMTPPASS;
                          $mail->SMTPSecure = 'ssl';
                          $mail->Port     = SMTPPORT;
                          $mail->setFrom(SMTPUSER, SITE_NAME);
                          $mail->addAddress(EMAIL_ADMIN);
                          $mail->Subject = 'TRANSAKSI '.$prosessC->status.' | '.$dataInput['InvoiceId'].'  | '.SITE_NAME;
                          $mail->isHTML(true);
                          $mail->Body = $this->load->view('email/EmailTransaksi', $dataInput, true);
                          $mail->send();
                          //send email
                          $dataRespone = [
                            'apiKey' => $apiKey,
                            'InvoiceId' => $refid,
                            'message' => $prosessC->status,
                            'balance' => $saldo,
                            'respone' => $prosessC->rc,
                            'ket' => $prosessC->sn,
                            'status' => true
                          ];
                      }
                    }
                  }
                }else {
                  $dataRespone = [
                    'apiKey' => $apiKey,
                    'message' => 'Api key tidak valid.',
                    'status' => false
                  ];
                }

            }else {
              $dataRespone = [
                      'apiKey' => $apiKey,
                      'message' => 'SKU CODE tidak valid.',
                      'status' => false
                    ];
            }
          }
        }else {
          $dataRespone = [
                  'apiKey' => $apiKey,
                  'message' => 'Perintah tidak valid.',
                  'status' => false
                ];
        }

      }else {
        $dataRespone = [
          'apiKey' => $apiKey,
          'message' => 'Api key tidak valid.',
          'status' => false
        ];
      }
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($dataRespone));


    }
    //=========================================================================
    public function prosess($buyerSku, $customer_no, $refid,$testing){
      if ($testing == 1) {
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
            "testing": true,
            "sign": "'.$sign.'"
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: text/plain'
          ),
        ));
        $response = json_decode(curl_exec($curl));
        $dataJson = $response->data;
        return $dataJson;
      }elseif($testing == 0){
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

    }
    //========================================================================
    public function ceksaldo(){
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
    //=========================================================
    public function cekharga($skuCode){
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
        if ($dataJson) {
          return $dataJson[0];
        }else {
          return null;
        }

    }
    //=========================================================

    //===========================CEK ID
    public function hdcek(){
      $buyerId = $this->input->post('UserId');

        // $buyerId = '858102842170';
         // $buyerId = '1274102582645'; //ajil
        $buyerId = $this->input->post('UserId');

        $curl = curl_init();
        $postData = [
          'UserId' => $buyerId,
        ];
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://kaneki-pedia.site/api/hdcek",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => $postData ,
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
          ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
          echo "cURL Error #:" . $err;
        } else {
          echo $response;
        }
    }

    public function mlcek(){
      // $buyerId = '858102842170';
       // $buyerId = '1274102582645'; //ajil
      $buyerId = $this->input->post('UserId');

      $curl = curl_init();
      $postData = [
        'UserId' => $buyerId,
      ];
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://kaneki-pedia/api/mlcek",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => $postData ,
        CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache",
        ),
      ));
      $response = curl_exec($curl);
      $err = curl_error($curl);
      curl_close($curl);
      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        echo $response;
      }
    }

    public function plncek() {
      $buyerId = $this->input->post('UserId');
      // $buyerId = '86010399466';
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.digiflazz.com/v1/transaction",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\r\n    \"commands\": \"pln-subscribe\",\r\n    \"customer_no\": \"".$buyerId."\"\r\n}",
        CURLOPT_HTTPHEADER => array(
          "cache-control: no-cache",
          "content-type: application/json",
          "postman-token: f992c131-68ff-eac0-283b-d4d6bf0e2075"
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);
      // echo $response;
      curl_close($curl);
      $dataJson = json_decode($response);
      if ($dataJson->data->name == '') {
        $dataRespone = [
            'NickName' => '',
            'UserId' => $buyerId,
            'Status' => false,
          ];
      }else {
        $dataRespone = [
            'NickName' => $dataJson->data->name.' | '.$dataJson->data->segment_power,
            'UserId' => $buyerId,
            'Status' => true,
          ];
      }
      $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($dataRespone));
    }
    public function ffcek() {
          $buyerId = $this->input->post('UserId');
          $curl = curl_init();
          $postData = [
            'UserId' => $buyerId,
          ];
          curl_setopt_array($curl, array(
            CURLOPT_URL => "https://kaneki-pedia.site/api/ffcek",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $postData ,
            CURLOPT_HTTPHEADER => array(
              "cache-control: no-cache",
            ),
          ));
          $response = curl_exec($curl);
          $err = curl_error($curl);
          curl_close($curl);
          if ($err) {
            echo "cURL Error #:" . $err;
          } else {
            echo $response;
          }

    }
    public function gak($id){
      if (!$this->ion_auth->is_admin())
      {
        $this->session->set_flashdata('message', 'You must be an admin to view this page');
        redirect('/login');
      }
      $data = $this->db->where('id',$id)->get('users')->row();
      if ($data->ApiKey != null) {
        $this->session->set_flashdata('message', 'Data Tidak bisa di ubah.');
    		redirect('dashboard/auth');
      };
      $apiKey =  md5($data->email.date("md").date("hsi").$data->id.'ApiKey');
      $privateKey = md5($data->email.'privateKey');
      $dataInput = [
        'ApiKey' => $apiKey,
        'PrivateKey' => $privateKey
      ];
      $this->db->where('id',$id)->update('users',$dataInput);
      $this->session->set_flashdata('message', 'Data berhasil di ubah.');
      redirect('dashboard/auth');
    }


}
