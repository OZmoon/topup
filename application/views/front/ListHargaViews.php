<!doctype html>
<html class="no-js" lang="">

<!-- Mirrored from themebeyond.com/html/vinom/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 15:19:02 GMT -->
<head>
        <?php $this->load->view('front/_layout/Head'); ?>
    </head>
      <body style="background:#191c23;">

        <!-- preloader -->
        <div class="preloader">
            <div class="loading">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
        </div>
        <!-- preloader-end -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- header-area -->
        <header class="transparent-header">
            <?php $this->load->view('front/_layout/Navbar'); ?>
        </header>
        <main>

            <!-- section-wrap -->

            <!-- section-wrap-end -->

            <!-- game-features-area -->
            <section class="game-features-area game-features-bg pt-170 pb-90">
                <div class="container">
                  <div class="row align-items-stretch">
                    <div class="col-md-12 ml-auto text-white " data-aos="fade-up" data-aos-delay="100">
                      <div class="sticky-content table-responsive">
                        <table id="example" class="table col-12 col-md-12">
                          <thead class="text-white">
                              <tr>
                                  <th>Id</th>
                                  <th>Nama Layanan</th>
                                  <th>Harga VIP</th>
                                  <th>Harga Resseler</th>
                                  <th>Harga Member</th>
                                  <th>Status</th>
                              </tr>
                          </thead>
                          <tbody class="text-white">
                            <tr>
                              <th class="bg-mv1 text-white">Higgs Domino</th>
                              <th class="bg-mv1 text-white"></th>
                              <th class="bg-mv1 text-white"></th>
                              <th class="bg-mv1 text-white"></th>
                              <th class="bg-mv1 text-white"></th>
                              <th class="bg-mv1 text-white"></th>
                            </tr>
                            <tr>
                              <td>HD1M</td>
                              <td>Voucher koin emas 1M</td>
                              <td><?php echo "Rp " . number_format(1000 + 200,2,',','.'); ?></td>
                              <td><?php echo "Rp " . number_format(1000 + 200,2,',','.'); ?></td>
                              <td><?php echo "Rp " . number_format(1000 + 200,2,',','.'); ?></td>
                              <td><?php if (100 < 1) {
                                echo '<div class="bg-mv1 text-center rounded" style="widht:100%;">
                                  <p class="text-white">Tidak Tersedia</p>
                                </div>';
                              }else {
                                echo '<div class="bg-success text-center rounded" style="widht:100%;">
                                  <p class="text-white">Tersedia</p>
                                </div>';
                              } ?>

                            </td>
                          </tr>
                          <tr>
                            <td>HD60M</td>
                            <td>Voucher koin emas 60M</td>
                            <td><?php echo "Rp " . number_format(5500 + VIP,2,',','.'); ?></td>
                            <td><?php echo "Rp " . number_format(5500 + RESSELER,2,',','.'); ?></td>
                            <td><?php echo "Rp " . number_format(5500 + MEMBERS,2,',','.'); ?></td>
                            <td><?php if (100 < 1) {
                              echo '<div class="bg-mv1 text-center rounded" style="widht:100%;">
                                <p class="text-white">Tidak Tersedia</p>
                              </div>';
                            }else {
                              echo '<div class="bg-success text-center rounded" style="widht:100%;">
                                <p class="text-white">Tersedia</p>
                              </div>';
                            } ?>

                            </td>
                          </tr>
                          <tr>
                            <td>HD200M</td>
                            <td>Voucher koin emas 200M</td>
                            <td><?php echo "Rp " . number_format(17000 + VIP,2,',','.'); ?></td>
                            <td><?php echo "Rp " . number_format(17000 + RESSELER,2,',','.'); ?></td>
                            <td><?php echo "Rp " . number_format(17000 + MEMBERS,2,',','.'); ?></td>
                            <td><?php if (100 < 1) {
                              echo '<div class="bg-mv1 text-center rounded" style="widht:100%;">
                                <p class="text-white">Tidak Tersedia</p>
                              </div>';
                            }else {
                              echo '<div class="bg-success text-center rounded" style="widht:100%;">
                                <p class="text-white">Tersedia</p>
                              </div>';
                            } ?>

                            </td>
                          </tr>
                          <tr>
                            <td>HD400M</td>
                            <td>Voucher koin emas 400M</td>
                            <td><?php echo "Rp " . number_format(34000 + VIP,2,',','.'); ?></td>
                            <td><?php echo "Rp " . number_format(34000 + RESSELER,2,',','.'); ?></td>
                            <td><?php echo "Rp " . number_format(34000 + MEMBERS,2,',','.'); ?></td>
                            <td><?php if (100 < 1) {
                              echo '<div class="bg-mv1 text-center rounded" style="widht:100%;">
                                <p class="text-white">Tidak Tersedia</p>
                              </div>';
                            }else {
                              echo '<div class="bg-success text-center rounded" style="widht:100%;">
                                <p class="text-white">Tersedia</p>
                              </div>';
                            } ?>

                            </td>
                          </tr>
                          <tr>
                            <td>HD1B</td>
                            <td>Voucher koin emas 1B</td>
                            <td><?php echo "Rp " . number_format(65000 + VIP,2,',','.'); ?></td>
                            <td><?php echo "Rp " . number_format(65000 + RESSELER,2,',','.'); ?></td>
                            <td><?php echo "Rp " . number_format(65000 + MEMBERS,2,',','.'); ?></td>
                            <td><?php if (100 < 1) {
                              echo '<div class="bg-mv1 text-center rounded" style="widht:100%;">
                                <p class="text-white">Tidak Tersedia</p>
                              </div>';
                            }else {
                              echo '<div class="bg-success text-center rounded" style="widht:100%;">
                                <p class="text-white">Tersedia</p>
                              </div>';
                            } ?>

                            </td>
                          </tr>
                            <?php foreach ($dataCat as $c): ?>
                              <tr>
                                <th class="bg-mv1 text-white"><?php echo $c ?></th>
                                <th class="bg-mv1 text-white"></th>
                                <th class="bg-mv1 text-white">Harga VIP</th>
                                <th class="bg-mv1 text-white">Harga Resseler</th>
                                <th class="bg-mv1 text-white">Harga Member</th>
                                <th class="bg-mv1 text-white"></th>
                              </tr>
                              <?php $i=0; foreach ($data as $d): $i++?>
                                <?php if ($d->brand == $c): ?>
                                  <?php if ($d->buyer_product_status == true): ?>
                                    <tr>
                                      <td><?php echo $d->buyer_sku_code; ?></td>
                                      <td><?php echo $d->product_name; ?></td>
                                      <td><?php echo "Rp " . number_format($d->price_vip,2,',','.'); ?></td>
                                      <td><?php echo "Rp " . number_format($d->price_seller,2,',','.'); ?></td>
                                      <td><?php echo "Rp " . number_format($d->price_member,2,',','.'); ?></td>
                                      <td><?php if ($d->seller_product_status == false) {
                                        echo '<div class="bg-mv1 text-center rounded" style="widht:100%;">
                                          <p class="text-white">Tidak Tersedia</p>
                                        </div>';
                                      }else {
                                        echo '<div class="bg-success text-center rounded" style="widht:100%;">
                                          <p class="text-white">Tersedia</p>
                                        </div>';
                                      } ?>

                                    </td>

                                  </tr>
                                  <?php endif; ?>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            <?php endforeach; ?>


                          </tbody>
                <!-- <tfoot class="text-white">
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </tfoot> -->
            </table>
                      </div>
                    </div>
                  </div>
                </div>
            </section>


        </main>
        <!-- main-area-end -->

        <!-- footer-area -->
        <?php $this->load->view('front/_layout/Footer'); ?>
        <!-- footer-area-end -->





		<!-- JS here -->
        <?php $this->load->view('front/_layout/Script'); ?>
        <script type="text/javascript">
        $( document ).ready(function() {


        })

        </script>
    </body>

<!-- Mirrored from themebeyond.com/html/vinom/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 15:19:02 GMT -->
</html>
