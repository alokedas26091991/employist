<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-site-verification" content="1EKgFy0MVtcT7RbeNTLykDke83u1mRTdwLhAr9yyDPs" />
  <title>EMPLOYIST</title>
  <link href="<?php echo $this->Url->image("assets/img/Employist Partnership Logo.png", ['pathPrefix' => '']) ?>" rel="icon">
  <link href="https://fonts.googleapis.com/css2?family=Jost&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

  <?= $this->Html->css(['/assets/css/bootstrap.min.css', '/assets/css/global.css', '/assets/css/index.css', '/assets/css/animated-bg.css', '/assets/css/hero-animations.css'], ['pathPrefix' => '']); ?>
  <?php echo $this->fetch('cssTop') ?>
</head>

<body>
  <?= $this->Flash->render() ?>
  <?= $this->element('site/header'); ?>
  <?= $this->fetch('content') ?>
  <?php echo $this->element('site/footer'); ?>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <?= $this->Html->script(['/assets/js/bootstrap.bundle.min.js', '/assets/js/hero-animations.js']); ?>

  <script>
    window.onscroll = function() {
      myFunction();

    };
    var navbar_sticky = document.getElementById("navbar_sticky");
    var sticky = navbar_sticky.offsetTop;
    var navbar_height = document.querySelector(".navbar").offsetHeight;
    function myFunction() {
      if (window.pageYOffset >= sticky + navbar_height) {
        navbar_sticky.classList.add("sticky");
        document.body.style.paddingTop = navbar_height + "px";
      } else {
        navbar_sticky.classList.remove("sticky");
        document.body.style.paddingTop = "0";
      }
    }
  </script>
  <?= $this->fetch('scriptBottom') ?>
</body>
</html>