<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('front/_layout/Head'); ?>
  <style media="screen">
  .input-group-sm>.input-group-append>select.btn:not([size]):not([multiple]), .input-group-sm>.input-group-append>select.input-group-text:not([size]):not([multiple]), .input-group-sm>.input-group-prepend>select.btn:not([size]):not([multiple]), .input-group-sm>.input-group-prepend>select.input-group-text:not([size]):not([multiple]), .input-group-sm>select.form-control:not([size]):not([multiple]), select.form-control-sm:not([size]):not([multiple]){
    height: calc(2.25rem + 2px);
  }
  /* Chrome, Safari, Edge, Opera */
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }
  a:not([href]):not([tabindex]){
    color: white;
  }
    a.readmore{
      cursor: pointer;
      color: white;
      border-color: white;
    }
    .readmorea{
      cursor: pointer;
    }
    .readmore:hover {
      color: red;

    }
  </style>
</head>

<body class="bg-white text-white">

  <!-- ======= Navbar ======= -->
  <?php $this->load->view('front/_layout/Navbar'); ?>

  <main id="main">

    <section class="section pt-4 mvstyle">
      <section class="game-features-area game-features-bg pt-170 pb-90">
              <div class="container">
                <div class="p-1">
                  <?php if ($this->ion_auth->logged_in()): ?>
                    <?php if ($this->ion_auth->get_users_groups($data->id)->row()->name == 'VIP'){ ?>
                      <div class="bg-warning row rounded mb-2">
                        <div class="col-md-12 col-12 mt-1 mb-1">
                          <p class="mb-0 text-dark">apiKey Anda : <code><?php echo $data->ApiKey; ?></code> privateKey Anda : <code><?php echo $data->PrivateKey; ?></code></p>
                        </div>
                      </div>
                    <?php }else { ?>
                      <div class="bg-warning row rounded mb-2">
                        <div class="col-md-12 col-12 mt-1 mb-1">
                          <p class="mb-0 text-dark">apiKey Anda : <code>Perlu Level VIP !!!</code> privateKey Anda : <code>Perlu Level VIP !!!</code></p>
                        </div>
                      </div>
                  <?php  }; ?>
                  <?php endif; ?>

                  <div class="bg-warning row rounded ">
                    <div class="col-md-12 col-12 mt-1 mb-1">
                      <p class="mb-0 text-dark">Detail Akun <code>[POST]</code> https://kaneki-pedia.site/api/profile</p>
                    </div>
                  </div>
                  <div class="">
                    <table class="table table-striped table-borderless mb-0">
                          <thead>
                              <tr>
                                  <th class="text-white">Parameter</th>
                                  <th class="text-white">Type</th>
                                  <th class="text-white">Value</th>
                                  <th class="text-white">Req.</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="text-white">
                                  <td>apiKey</td>
                                  <td><code>string</code></td>
                                  <td>berisi apikey anda.</td>
                                  <td>Yes</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <pre><code class="language-json">{
          "data": {
              "id": "xxx",
              "ip_address": "xxxx.xxx",
              "username": null,
              "password": "password",
              "email": "xxx",
              "activation_selector": null,
              "activation_code": null,
              "forgotten_password_selector": null,
              "forgotten_password_code": null,
              "forgotten_password_time": null,
              "remember_selector": null,
              "remember_code": null,
              "created_on": "xxx",
              "last_login": "xxx",
              "active": "1",
              "first_name": "xxx",
              "last_name": "xxxxxx",
              "company": "",
              "phone": "",
              "Balance": "xxx",
              "ApiKey": "xxx",
              "PrivateKey": "xxx",
              "user_id": "xxx"
          },
          "level": "resseler",
          "apiKey": "xxx",
          "message": "success",
          "status": true
      }</code></pre>
                </div>
                <div class="p-1">
                  <div class="bg-warning row rounded ">
                    <div class="col-md-12 col-12 mt-1 mb-1">
                      <p class="mb-0 text-dark">Get List Product <code>[POST]</code> https://kaneki-pedia.site/api/getproduct</p>
                    </div>
                  </div>
                  <div class="">
                    <table class="table table-striped table-borderless mb-0">
                          <thead>
                              <tr>
                                  <th class="text-white">Parameter</th>
                                  <th class="text-white">Type</th>
                                  <th class="text-white">Value</th>
                                  <th class="text-white">Req.</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="text-white">
                                  <td>apiKey</td>
                                  <td><code>string</code></td>
                                  <td>berisi apikey anda.</td>
                                  <td>Yes</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <pre><code class="language-json">{
          "data": [
              {
                  "Id": "1",
                  "ProductName": "Higgs Domino",
                  "ProductCode": "HD",
                  "ProductImage": "https://kaneki-pedia.site/assets/upload/home/product/eaef88713f90ecdc7c5f43535db51fe9.png",
                  "ProductTutor": "Masukan user id higgs domino anda. Contoh : 60002112 ",
                  "ProductLink": "https://kaneki-pedia.site/higgsdomino",
                  "CreatedAt": "2021-10-04 17:23:02",
                  "ProductStatus": "1"
              },
          ],
          "level": "resseler",
          "apiKey": "xxxxxxxxxxxx",
          "message": "success",
          "status": true
      }</code></pre>
                </div>
                <div class="p-1">
                  <div class="bg-warning row rounded ">
                    <div class="col-md-12 col-12 mt-1 mb-1">
                      <p class="mb-0 text-dark">Get List Item Product <code>[POST]</code> https://kaneki-pedia.site/api/getitem</p>
                    </div>
                  </div>
                  <div class="">
                    <table class="table table-striped table-borderless mb-0">
                          <thead>
                              <tr>
                                  <th class="text-white">Parameter</th>
                                  <th class="text-white">Type</th>
                                  <th class="text-white">Value</th>
                                  <th class="text-white">Req.</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="text-white">
                                  <td>apiKey</td>
                                  <td><code>string</code></td>
                                  <td>berisi apikey anda.</td>
                                  <td>Yes</td>
                              </tr>
                              <tr class="text-white">
                                  <td>productCode</td>
                                  <td><code>string</code></td>
                                  <td>berisi ProductCode.</td>
                                  <td>Yes</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <pre><code class="language-json">{
          "data": {
              "dataItem": [
                  {
                      "price": 1672,
                      "product_name": "Free Fire 10 Diamond",
                      "sku_code": "FF10D"
                  },
                  {
                      "price": 1864,
                      "product_name": "Free Fire 12 Diamond",
                      "sku_code": "FF12D"
                  },
              ],
              "gameName": "FREE FIRE",
              "gameCode": "FF",
              "gamePic": "https://kaneki-pedia.site/assets/upload/home/product/3bef879a4bec132576a525970c9b54cc.png",
              "gameId": "Untuk menemukan ID Anda, klik pada ikon karakter. User ID tercantum di bawah nama karakter Anda. Contoh: <b>81237123</b>."
          },
          "level": "resseler",
          "apiKey": "xxxxxxxxxxxxxxx",
          "message": "success",
          "status": true
      }</code></pre>
                </div>
                <div class="p-1">
                  <div class="bg-warning row rounded ">
                    <div class="col-md-12 col-12 mt-1 mb-1">
                      <p class="mb-0 text-dark">Get Item Detail <code>[POST]</code> https://kaneki-pedia.site/api/getitemdetail</p>
                    </div>
                  </div>
                  <div class="">
                    <table class="table table-striped table-borderless mb-0">
                          <thead>
                              <tr>
                                  <th class="text-white">Parameter</th>
                                  <th class="text-white">Type</th>
                                  <th class="text-white">Value</th>
                                  <th class="text-white">Req.</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="text-white">
                                  <td>apiKey</td>
                                  <td><code>string</code></td>
                                  <td>berisi apikey anda.</td>
                                  <td>Yes</td>
                              </tr>
                              <tr class="text-white">
                                  <td>skuCode</td>
                                  <td><code>string</code></td>
                                  <td>berisi skuCode.</td>
                                  <td>Yes</td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                  <pre><code class="language-json">{
                    {
                    "data": {
                        "dataItem": {
                            "price": xxxxxxxxxxxx,
                            "product_name": "xxxxxxxxxxxxx",
                            "sku_code": "xx"
                        }
                    },
                    "level": x,
                    "apiKey": x,
                    "message": "success",
                    "status": true
                }
      }</code></pre>
                </div>
                <div class="p-1">
                  <div class="bg-warning row rounded ">
                    <div class="col-md-12 col-12 mt-1 mb-1">
                      <p class="mb-0 text-dark">Place Order <code>[POST]</code> https://kaneki-pedia.site/api/order</p>
                    </div>
                  </div>
                  <div class="">
                    <table class="table table-striped table-borderless mb-0">
                          <thead>
                              <tr>
                                  <th class="text-white">Parameter</th>
                                  <th class="text-white">Type</th>
                                  <th class="text-white">Value</th>
                                  <th class="text-white">Req.</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="text-white">
                                  <td>apiKey</td>
                                  <td><code>string</code></td>
                                  <td>berisi apikey anda.</td>
                                  <td>Yes</td>
                              </tr>
                              <tr class="text-white">
                                  <td>skuCode</td>
                                  <td><code>string</code></td>
                                  <td>berisi skuCode.</td>
                                  <td>Yes</td>
                              </tr>
                              <tr class="text-white">
                                  <td>idNo</td>
                                  <td><code>string</code></td>
                                  <td>berisi tujuan id / nomer tujuan.</td>
                                  <td>Yes</td>
                              </tr>
                              <tr class="text-white">
                                  <td>testing</td>
                                  <td><code>number</code></td>
                                  <td>berisi 1 untuk true / 0 false.</td>
                                  <td>Yes</td>
                              </tr>
                              <tr class="text-white">
                                  <td>url</td>
                                  <td><code>url</code></td>
                                  <td>berisi webhooks / url callback</td>
                                  <td>Yes</td>
                              </tr>
                          </tbody>
                      </table>
                      <h3 class="mt-1 mb-1">Test Case</h3>
                      <table class="table table-striped table-borderless mb-0">
                            <thead>
                                <tr>
                                    <th class="text-white">skuCode</th>
                                    <th class="text-white">idNo</th>
                                    <th class="text-white">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-white">
                                    <td>xld10</td>
                                    <td><code>087800001230</code></td>
                                    <td>Sukses</td>
                                </tr>
                                <tr class="text-white">
                                    <td>xld10</td>
                                    <td><code>087800001232</code></td>
                                    <td>Gagal</td>
                                </tr>
                                <tr class="text-white">
                                    <td>xld10</td>
                                    <td><code>087800001233</code></td>
                                    <td>Pending Kemudian Callback Sukses</td>
                                </tr>
                                <tr class="text-white">
                                    <td>xld10</td>
                                    <td><code>087800001234</code></td>
                                    <td>Pending Kemudian Callback Gagal</td>
                                </tr>
                            </tbody>
                        </table>
                  </div>
                  <pre><code class="language-json">{
          "apiKey": "xxxxxxxxx",
          "InvoiceId": "MVS113xxxxxxxxxxx",
          "message": "Sukses",
          "balance": null,
          "respone": "00",
          "ket": "1234567890",
          "status": true
      }</code></pre>
                </div>
                <div class="p-1">
                  <div class="bg-warning row rounded ">
                    <div class="col-md-12 col-12 mt-1 mb-1">
                      <p class="mb-0 text-dark">Webhooks <code>[POST]</code> urlanda/webhooks [JANGAN DI UBAH SELAIN INI]</p>
                    </div>
                  </div>
                  <pre><code class="language-json">{
                    {
                    "data": {
                        "ref_id": "XXXX",
                        "customer_no": "08XX5",
                        "buyer_sku_code": "ovo100",
                        "message": "Sukses",
                        "status": "Sukses",
                        "buyer_last_saldo": 326719460,
                        "sn": "XXXX",
                        "price": 199800,
                    }
                }</code></pre>
                </div>
              </div>
            </section>

    </section>
  </main>


  <!-- ======= Footer ======= -->

  <!-- Vendor JS Files -->
  <?php $this->load->view('front/_layout/Footer'); ?>


</body>

</html>
