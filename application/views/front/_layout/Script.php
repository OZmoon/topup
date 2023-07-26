<script>
    // Description show more event listener
    if($('#product-description-showmore').length){
        $('#product-description-showmore').on('click',function(event){
        $('#product-description').addClass('expanded');
        $(this).hide();
        });
    }
</script>
<!-- nedipedia js -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script src="https://mvstore.id/assets/assetmv/js/navbar.js"></script>
<?php if ($this->uri->segment(1) != null): ?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php endif; ?>
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/components/prism-core.min.js" integrity="sha512-TbHaMJHEmRBDf9W3P7VcRGwEmVEJu7MO6roAE0C4yqoNHeIVo3otIX3zj1DOLtn7YCD+U8Oy1T9eMtG/M9lxRw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/plugins/autoloader/prism-autoloader.min.js" integrity="sha512-sv0slik/5O0JIPdLBCR2A3XDg/1U3WuDEheZfI/DI5n8Yqc3h5kjrnr46FGBNiUAJF7rE4LHKwQ/SoSLRKAxEA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    // Register the service worker
    if ('serviceWorker' in navigator) {
    	navigator.serviceWorker.register('/sw.js').then(function(registration) {
        // Registration was successful
        console.log('ServiceWorker registration successful with scope: ', registration.scope);
    }).catch(function(err) {
        // registration failed :(
        	console.log('ServiceWorker registration failed: ', err);
        });
    }
</script>
<script>
    $(document).ready(function() {
        $(".fa-search").click(function() {
            $(".icon").toggleClass("active");
            $("input[type='text']").toggleClass("active");
        });
    });
</script>
<script>
    //Get the button
    var mybutton = document.getElementById("myBtn");
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
<script>
    function loadinghide() {
        $('.loader').hide('fade', 500);
    }

    function loadingshow() {
        $('.loader').show('fade', 500);
    }
    loadinghide();
</script>
<script>
    function formatRupiah(angka, prefix) {

        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>

<!-- end nevipedia js -->

<script src="<?php echo base_url() ?>assets/newassets/js/popper.min.js"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/isotope.pkgd.min.js"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/imagesloaded.pkgd.min.js"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/jquery.magnific-popup.min.js"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/jquery.odometer.min.js"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/jquery.appear.js"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/slick.min.js"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/ajax-form.js"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/wow.min.js"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/aos.js"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/plugins.js"></script>
<script src="<?php echo base_url() ?>assets/newassets/js/main.js"></script>

