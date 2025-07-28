<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="1EKgFy0MVtcT7RbeNTLykDke83u1mRTdwLhAr9yyDPs" />
<?php 
	echo $this->element('site_meta');
 ?>
 
     <!-- Favicon -->
    <link href="<?php echo $this->Url->image("assets/img/logo_main.png", ['pathPrefix' => '']) ?>" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="alternate" href="https://www.finmocktest.com/" hreflang="en-in" />


 <?=$this->Html->css(['/assets/lib/animate/animate.min.css', '/assets/lib/owlcarousel/assets/owl.carousel.min.css', '/assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css','/assets/css/bootstrap.min.css','/assets/css/style.css'], ['pathPrefix' => '']);?>  

<?php echo $this->fetch('cssTop') ?> 

<script>
        // Disable right-click
        document.addEventListener('contextmenu', function(event) {
            event.preventDefault();
        });

        // Disable copy
        document.addEventListener('copy', function(event) {
            event.preventDefault();
        });
    </script>

</head>
<body>
  <?= $this->Flash->render() ?>
  



  <?=$this->element('site/header');?>

 

  
  <?= $this->fetch('content') ?>
   
<?php echo $this->element('site/footer');?> 
<a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i class="bi bi-arrow-up"></i></a>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<?=$this->Html->script(['/assets/lib/wow/wow.min.js','/assets/lib/easing/easing.min.js','/assets/lib/waypoints/waypoints.min.js','/assets/lib/counterup/counterup.min.js','/assets/lib/owlcarousel/owl.carousel.min.js','/assets/lib/tempusdominus/js/moment.min.js','/assets/lib/tempusdominus/js/moment-timezone.min.js','/assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js','/assets/js/main.js']);?>
<?= $this->fetch('scriptBottom')?>	
<script>
            var csrf_token = '<?= $this->request->getAttribute('csrfToken') ?>';
</script>
</body>

</html>
