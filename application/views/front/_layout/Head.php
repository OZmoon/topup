
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title><?php echo $title ?></title>
<meta name="title" content="<?php $WebsiteSetting = $this->db->get('data_setting')->row(); echo $WebsiteSetting->SiteName; ?>">
<meta name="description" content="<?php echo $WebsiteSetting->SiteName; ?> Cara tercepat dan termudah untuk TOP UP.">
<meta name="keywords" content="unipay,top up,top up game,prabayar,unipay,unipay official">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="author" content="unipay">
<!-- Favicons -->
<link href="<?php echo base_url(); ?>sb2.png" rel="icon">
<link href="<?php echo base_url(); ?>sb2.png" rel="apple-touch-icon">
<link rel="manifest" href="<?php echo base_url(); ?>manifest.json">
<!-- Google Fonts -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=https://fonts.googleapis.com/css?family=Inconsolata:400,500,600,700|Raleway:400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
<!-- Vendor CSS Files -->

<link href="<?php echo base_url() ?>assets/assets/vendor/aos/aos.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
<link href="<?php echo base_url() ?>assets/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/themes/prism.css" integrity="sha512-jtWR3pdYjGwfw9df601YF6uGrKdhXV37c+/6VNzNctmrXoO0nkgHcS03BFxfkWycOa2P2Nw9Y9PCT9vjG9jkVg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!-- Template Main CSS File -->
<link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/css/sb2.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/css/navbar.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/assets/css/loader.css">


<!-- Vendor CSS Files -->
<link href="<?php echo base_url() ?>assets/assets/css/app.css" rel="stylesheet">
<link rel="stylesheet" href="https://www.nevipedia.com/assets/modules/fontawesome/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">


<!-- Vendor CSS Files -->
<!-- <link href="https://www.nevipedia.com/assets/assets/vendor/aos/aos.css" rel="stylesheet"> -->
<!-- <link href="https://www.nevipedia.com/assets/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet"> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.26.0/components/prism-css.min.js" integrity="sha512-Jv/EO8zjSyqIDa2S0YjCGFY+mEROxud6g7AhfA0KcggjdzhPBhoRyetxV7G7/dnfBdZBzcOvpRn1K+J6sn3jyw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/themes/prism.css" integrity="sha512-jtWR3pdYjGwfw9df601YF6uGrKdhXV37c+/6VNzNctmrXoO0nkgHcS03BFxfkWycOa2P2Nw9Y9PCT9vjG9jkVg==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<style>
    .wave {
        min-height: 100%;
        background-attachment: scroll;
        background-image: url("https://www.nevipedia.com/assets/main/img/wave4.svg");
        background-repeat: no-repeat;
        background-position: bottom left, bottom right;
    }

    .wave2 {
        min-height: 100%;
        background-attachment: fixed;
        background-image: url("https://www.nevipedia.com/assets/main/img/wave4.svg");
        background-repeat: no-repeat;
        background-position: top left, top right;
    }
</style>