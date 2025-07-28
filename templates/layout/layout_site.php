<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-site-verification" content="1EKgFy0MVtcT7RbeNTLykDke83u1mRTdwLhAr9yyDPs" />
  <title>The Aryan Group</title>

  <link href="<?php echo $this->Url->image("assets/img/logo_main.png", ['pathPrefix' => '']) ?>" rel="icon">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="icon" href="/assets/images/favicon.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <?= $this->Html->css(['/assets/css/owl.carousel.min.css', '/assets/css/owl.theme.default.css', '/assets/css/animate.css', '/assets/css/style.css', '/assets/css/media-responsive.css'], ['pathPrefix' => '']); ?>
  <?php echo $this->fetch('cssTop') ?>


</head>
<body style="overflow-x: hidden;">
  <?= $this->Flash->render() ?>
  <?= $this->element('site/header'); ?>
  <?= $this->fetch('content') ?>
  <?php echo $this->element('site/footer'); ?>
  <?= $this->Html->script(['/assets/js/jquery.min.js', '/assets/js/owl.carousel.min.js', '/assets/js/jquery.fancybox.min.js', '/assets/js/wow.min.js']); ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  <script>
    jQuery(document).ready(function($) {
      $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        if (scroll >= 300) {
          var $myHeader = $('.header').not('.cloned').clone().height(0).attr('id', 'sticky-header').attr('class', 'sticky-header sticky-top');
          $('.header').addClass('cloned');
          $($myHeader).insertAfter('.header').animate({
            height: 60
          }, 300, 'linear');
        } else {
          $('#sticky-header').remove();
          $('.header').removeClass('cloned');
        }
      });

      $('.abslider').owlCarousel({
        items: 1,
        loop: true,
        margin: 10,
        autoplay: true,
        lazyLoad: true,
        animateOut: 'fadeOut',
        autoplayTimeout: 2000,
        smartSpeed: 3000,
        slideTransition: 'linear',
      });
      $('.client-slider').owlCarousel({
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 4000,
        smartSpeed: 2000,
        autoplayHoverPause: true,
        slideTransition: 'linear',
        responsive: {
          0: {
            items: 1
          },
          480: {
            items: 1
          },
          767: {
            items: 1
          },
          1000: {
            items: 1
          },
        }
      });
      $('.test-slider').owlCarousel({
        items: 2,
        loop: true,
        margin: 10,
        autoplay: true,
        autoplayTimeout: 4000,
        smartSpeed: 3000,
        autoplayHoverPause: true,
        slideTransition: 'linear',
        responsive: {
          0: {
            items: 1
          },
          992: {
            items: 2
          },

        }
      });
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
          rect.top >= 0 &&
          rect.left >= 0 &&
          rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
          rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
      }

      function countUp(el) {
        const target = +el.getAttribute("data-target");
        const speed = 500;
        let current = 0;
        function updateCount() {
          const increment = target / speed;
          current += increment;
          if (current < target) {
            el.innerText = Math.ceil(current);
            requestAnimationFrame(updateCount);
          } else {
            el.innerText = target;
          }
        }
        updateCount();
      }

      function handleScroll() {
        document.querySelectorAll(".count").forEach(el => {
          if (isInViewport(el) && el.dataset.counting !== "true") {
            el.dataset.counting = "true";
            countUp(el);
          }
        });
      }
      window.addEventListener("scroll", handleScroll);
      handleScroll();
    });
  </script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      AOS.init({
        offset: 120,
        delay: 0,
        duration: 1000,
        easing: 'ease',
        once: true,
        mirror: false, 
        anchorPlacement: 'top-bottom',
      });
    });
  </script>
  <script>
    var wow = new WOW({
      boxClass: 'wow',
      animateClass: 'animated',
      offset: 0,
      mobile: true,
      live: true,
      callback: function(box) {
      },
      scrollContainer: null,
      resetAnimation: true,
    });
    wow.init();
  </script>
  <script>
    new WOW().init();
  </script>
  <script>
    const cursor = document.querySelector('.cursor');
    document.addEventListener('mousemove', e => {
      cursor.setAttribute("style", "top: " + (e.pageY - 10) + "px; left: " + (e.pageX - 10) + "px;")
    });
    document.addEventListener('click', e => {
      cursor.classList.add("expand");
      setTimeout(() => {
        cursor.classList.remove("expand");
      }, 500);
    });
  </script>
  <script>
    window.addEventListener('load', function() {
      document.querySelector('body').classList.add("loaded")
    });
  </script>
   <script>
    $(function () {
		$(".col-lg-4").slice(0, 6).show();
		$("body").on('click touchstart', '.load-more', function (e) {
			e.preventDefault();
			$(".col-lg-4:hidden").slice(0, 3).slideDown();
			if ($(".col-lg-4:hidden").length == 0) {
				$(".load-more").css('visibility', 'hidden');
			}
			
		});
	});
  </script>
  <!-- <script>
    document.addEventListener('contextmenu', function(event) {
      event.preventDefault();
    });
  </script> -->
  <?= $this->fetch('scriptBottom') ?>
</body>
</html>