<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper(['url', 'language']);
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        if (!AVAIL) {
            if ($this->ion_auth->is_admin()) {
            } else {
                show_error('SEDANG DALAM PERBAIKAN. | ');
            }
        }
    }

    public function index()
    {
      redirect('/');
    }
    
    public function cek()
    {
        $b = $this->input->post('id');
        $id = explode('-',$b);
        
        // $a = $this->games->getUserNameMobileLegends('1130481733','13555');
        $a = $this->games->getUserNameMobileLegends($id[0],$id[1]);
        
        echo $a['status']['message'];
        
    }
    
    public function id($id){
        $sign = md5(USERNAME_DIGI.KEY_GIDI.'pricelist');
          if ($this->ion_auth->logged_in()) {
            $user_groups = $this->ion_auth->get_users_groups($this->ion_auth->user()->row()->id)->row()->name;
          }else {
            $user_groups = 'members';
          }
          $dataHarga = $this->db->where(['GroupName' => $user_groups,'Status' => 1])->get('data_harga')->result();
          $WebsiteSetting = $this->db->get('data_setting')->row();
          $game = $id ? $id : '';
          if ($game == '') {
              redirect('/');
          } else {
              $dataDb = $this->db->where('ProductSlug',$game)->get('data_product')->row();
              
              if ($dataDb->ProductStatus == 0) {
                redirect('/');
              }
              if ($dataDb) {
                $gameName = $dataDb->ProductName;
                $gameCode = $dataDb->ProductCode;
                $gamePic = $dataDb->ProductImage;
                $gameId = $dataDb->ProductTutor;
                $gameCekId = $dataDb->ProductCek;
                $ProductApi = $dataDb->ProductApi;
                
              }else {
                redirect('/');
              }
              if ($dataDb->ProductType == 0) {
                $itemDb = $this->db->where(['ProductCode'=>$gameCode,'ItemStatus' => 1])->get('data_item')->result();
                $x = 0;
                $dataJson = [];
                foreach ($itemDb as $i => $value) {
                  $feeMv = 0;
                  if ($dataHarga) {
                    foreach ($dataHarga as $dhm) {
                        if ($value->ItemPrice >= $dhm->Price && $value->ItemPrice <= $dhm->Price2) {
                          $feeMv = $dhm->MarkUp;
                        }else if($feeMv == 0) {
                          $feeMv = 1.01;
                        }
                    }
                  }else {
                    $feeMv = 1.01;
                  }
                  if ($ProductApi == 1) {
                    $dataJson[$x] = (object)[
                      'newprice' => ceil($value->ItemPrice * $feeMv),
                      'brand' =>$gameName,
                      'product_name' => $value->ItemName,
                      'buyer_sku_code' => $value->ItemSku,
                      'buyer_product_status' => true,
                      'seller_product_status' => true,
                    ];
                  }elseif ($ProductApi == 2) {
                    $dataJson[$x] = (object)[
                      'newprice' => ceil($value->ItemPrice * $feeMv),
                      'brand' =>$gameName,
                      'product_name' => $value->ItemName,
                      'buyer_sku_code' => $value->ItemSku,
                      'buyer_product_status' => $value->buyer_product_status,
                      'seller_product_status' => $value->seller_product_status,
                    ];
                  }elseif ($ProductApi == 3) {
                    $dataJson[$x] = (object)[
                      'newprice' => ceil($value->ItemPrice * $feeMv),
                      'brand' =>$gameName,
                      'product_name' => $value->ItemName,
                      'buyer_sku_code' => $value->ItemSku,
                      'buyer_product_status' => true,
                      'seller_product_status' => true,
                    ];
                  }
                  elseif ($ProductApi == 0) {
                    $dataJson[$x] = (object)[
                      'newprice' => ceil($value->ItemPrice * $feeMv),
                      'brand' =>$gameName,
                      'product_name' => $value->ItemName,
                      'buyer_sku_code' => $value->ItemSku,
                      'buyer_product_status' => true,
                      'seller_product_status' => true,
                    ];
                  }
                  $x++;
                }

              }else {

                //digiflazz
                if ($ProductApi == 1) {
                  $x = 0;
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
                  foreach ($dataJson as $k => $value) {
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
                  }
                }elseif ($ProductApi ==2) {
                  $itemDb = $this->db->where(['ProductCode'=>$gameCode,'ItemStatus' => 1])->get('data_item')->result();
                  $x = 0;
                  $dataJson = [];
                  foreach ($itemDb as $i => $value) {
                    $feeMv = 0;
                    if ($dataHarga) {
                      foreach ($dataHarga as $dhm) {
                          if ($value->ItemPrice >= $dhm->Price && $value->ItemPrice <= $dhm->Price2) {
                            $feeMv = $dhm->MarkUp;
                          }else if($feeMv == 0) {
                            $feeMv = 1.01;
                          }
                      }
                    }else {
                      $feeMv = 1.01;
                    }
                    $dataJson[$x] = (object)[
                      'newprice' => ceil($value->ItemPrice * $feeMv),
                      'brand' =>$gameName,
                      'product_name' => $value->ItemName,
                      'buyer_sku_code' => $value->ItemSku,
                      'buyer_product_status' => true,
                      'seller_product_status' => true,
                    ];
                    // $dataJson['newprice'] = ceil($value->ItemPrice * $feeMv);
                    // $dataJson['brand'][$x] = $gameName;
                    // $dataJson[$x]['buyer_product_status'] = 'true';
                    // $dataJson[$x]['seller_product_status'] = true;
                    $x++;
                  }
                }

                ///endd
              }

              $data = [
              'title' => $WebsiteSetting->SiteName.' | '.$gameName,
              'data' => $dataJson,
              'gameName' => $gameName,
              'gameCode' => $gameCode,
              'gamePic' => $gamePic,
              'gameId' => $gameId,
              'gameCekId' => $gameCekId,
              ];
              
              $this->load->view('front/GameViews', $data);
          }
    }
    
    public function getPayment(){
      $chanelPembayaran = $this->chanelPembayaran();

      $c = 0;
      if ($chanelPembayaran) {
        foreach ($chanelPembayaran->data as $r) {
          $data['data'][$c]['code'] = $r->code;
          $data['data'][$c]['image'] = $r->icon_url;
          $data['data'][$c]['price'] = 0;
          $c++;
        }
      }

      $data['data'][$c]['code'] = 'BALANCE';
      $data['data'][$c]['price'] = 0;
      echo json_encode($data);
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

}
