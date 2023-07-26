<!doctype html>
<html class="no-js" lang="">

<!-- Mirrored from themebeyond.com/html/vinom/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Dec 2021 15:19:02 GMT -->
<head>
        <?php $this->load->view('front/_layout/Head'); ?>
    </head>
      <body style="background:#191c23;">

        <!-- header-area -->
        <header class="transparent-header">
            <?php $this->load->view('front/_layout/Navbar'); ?>
        </header>
        <main>

            <!-- section-wrap -->

            <!-- section-wrap-end -->

            <!-- game-features-area -->
            <section class=" game-features-area game-features-bg pt-170 pb-90">
                <div class="container">
                  <div class="p-1">
                    <div class="bg-mv1 row rounded p-3">
                      <h3 class="text-white m-0">Profile Setting</h3>
                    </div>
                    <form class="" action="<?php echo base_url('profile/update'); ?>" method="post">
                    <div class="col-md-12 col-12 mt-4 bg-mv1 p-2 rounded">
                      <p class="text-white">First Name</p>
                      <input value="<?php echo $this->ion_auth->user()->row()->first_name; ?>"  style="" type="text" placeholder="First Name" name="fname" class="inputnew" required>
                      <input value="<?php echo $this->ion_auth->user()->row()->id; ?>"  style="" type="hidden" placeholder="First Name" name="id" class="inputnew" required>
                    </div>
                    <div class="col-md-12 col-12 mt-4 bg-mv1 p-2 rounded">
                      <p class="text-white">Last Name</p>
                      <input value="<?php echo $this->ion_auth->user()->row()->last_name; ?>"   type="text" placeholder="Last Name" name="lname" class=" inputnew" required>
                    </div>
                    <div class="col-md-12 col-12 mt-4 bg-mv1 p-2 rounded">
                      <p class="text-white">Company Name</p>
                      <input value="<?php echo $this->ion_auth->user()->row()->company; ?>"  style="" type="text" placeholder="Company Name" name="companyname" class="inputnew" required>
                    </div>
                    <div class="col-md-12 col-12 mt-4 bg-mv1 p-2 rounded">
                      <p class="text-white">Phone</p>
                      <input value="<?php echo $this->ion_auth->user()->row()->phone; ?>"  style="" type="number" placeholder="Phone" name="phone" class="inputnew" required>
                    </div>
                    <div class="col-md-12 col-12 mt-4 bg-mv1 p-2 rounded">
                      <p class="text-white">Password: (if changing password)</p>
                      <input value="" minlength="8" style="" type="text" placeholder="Password" name="password1" class="inputnew">
                    </div>
                    <div class="col-md-12 col-12 mt-4 bg-mv1 p-2 rounded">
                      <p class="text-white">Confirm Password: (if changing password)</p>
                      <input value="" minlength="8" style="" type="text" placeholder="Repeat password" name="password2" class="inputnew">
                    </div>
                    <div class="col-md-12 col-12 mt-4 bg-mv1 p-2 rounded">
                      <p style="width:100%;margin:0px;" class="text-center p-0">
                        <button type="submit" class="btn-mv  col-md-12 m-0" name="button">UPDATE</button>
                      </p>
                    </div>
                  </form>
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
