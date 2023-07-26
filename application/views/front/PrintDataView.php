<style>
table, th, td {
border: 1px solid black;
border-collapse: collapse;
padding:10px;

}
</style>
<table id="example" style="width:100%;" >
  <!-- <thead class="text-white">
      <tr>
          <th>Nama Layanan</th>
          <th>Harga</th>
          <th>Status</th>
      </tr>
  </thead> -->
  <tbody class="text-white">
    <?php foreach ($dataCat as $c):
      if ($c->ProductName == 'PAKET DATA') {
        // code...
      }elseif ($c->ProductName == 'PULSA ALL OPERATOR') {
        // code...
      }else {


      ?>
      <tr style="background:#ffc107;">
        <th class="bg-mv1 text-white"><?php echo $c->ProductName ?></th>



        <th class="bg-mv1 text-white">Harga</th>
        <th>Status</th>
      </tr>
      <?php $i=0; foreach ($data as $d): $i++?>
        <?php if ($d->brand == $c->ProductName): ?>
          <?php if ($d->buyer_product_status == true && $d->seller_product_status == true): ?>
            <tr>

              <td><?php echo $d->product_name; ?></td>


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
    <?php } endforeach; ?>



      <tr style="background:#ffc107;">
        <th class="bg-mv1 text-white">INDOSAT DATA</th>



        <th class="bg-mv1 text-white">Harga</th>
        <th>Status</th>

      </tr>
      <?php $i=0; foreach ($data as $d): $i++?>
        <?php if ($d->brand == 'INDOSAT' && $d->category == 'Data'): ?>
          <?php if ($d->buyer_product_status == true && $d->seller_product_status == true): ?>
            <tr>

              <td><?php echo $d->product_name; ?></td>


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

      <tr style="background:#ffc107;">
        <th class="bg-mv1 text-white">TELKOMSEL DATA</th>



        <th class="bg-mv1 text-white">Harga</th>
        <th>Status</th>

      </tr>
      <?php $i=0; foreach ($data as $d): $i++?>
        <?php if ($d->brand == 'TELKOMSEL' && $d->category == 'Data'): ?>
          <?php if ($d->buyer_product_status == true && $d->seller_product_status == true): ?>
            <tr>

              <td><?php echo $d->product_name; ?></td>


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

      <tr style="background:#ffc107;">
        <th class="bg-mv1 text-white">AXIS DATA</th>



        <th class="bg-mv1 text-white">Harga</th>
        <th>Status</th>

      </tr>
      <?php $i=0; foreach ($data as $d): $i++?>
        <?php if ($d->brand == 'AXIS' && $d->category == 'Data'): ?>
          <?php if ($d->buyer_product_status == true && $d->seller_product_status == true): ?>
            <tr>

              <td><?php echo $d->product_name; ?></td>


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

      <!-- <tr>
        <th class="bg-mv1 text-white">by.U DATA</th>



        <th class="bg-mv1 text-white">Harga</th>

      </tr>
      <?php $i=0; foreach ($data as $d): $i++?>
        <?php if ($d->brand == 'by.U' && $d->category == 'Data'): ?>
          <?php if ($d->buyer_product_status == true && $d->seller_product_status == true): ?>
            <tr>

              <td><?php echo $d->product_name; ?></td>


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

      <?php endforeach; ?> -->


      <tr style="background:#ffc107;">
        <th class="bg-mv1 text-white">XL DATA</th>

        <th class="bg-mv1 text-white">Harga</th>
        <th>Status</th>

      </tr>
      <?php $i=0; foreach ($data as $d): $i++?>
        <?php if ($d->brand == 'XL' && $d->category == 'Data'): ?>
          <?php if ($d->buyer_product_status == true && $d->seller_product_status == true): ?>
            <tr>

              <td><?php echo $d->product_name; ?></td>
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

      <tr style="background:#ffc107;">
        <th class="bg-mv1 text-white">TRI DATA</th>



        <th class="bg-mv1 text-white">Harga</th>
        <th>Status</th>
      </tr>
      <?php $i=0; foreach ($data as $d): $i++?>
        <?php if ($d->brand == 'TRI' && $d->category == 'Data'): ?>
          <?php if ($d->buyer_product_status == true && $d->seller_product_status == true): ?>
            <tr>

              <td><?php echo $d->product_name; ?></td>


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

      <tr style="background:#ffc107;">
        <th class="bg-mv1 text-white">SMART DATA</th>



        <th class="bg-mv1 text-white">Harga</th>
        <th>Status</th>
      </tr>
      <?php $i=0; foreach ($data as $d): $i++?>
        <?php if ($d->brand == 'SMART' && $d->category == 'Data'): ?>
          <?php if ($d->buyer_product_status == true && $d->seller_product_status == true): ?>
            <tr>

              <td><?php echo $d->product_name; ?></td>


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
<script type="text/javascript">
  window.print()
</script>
