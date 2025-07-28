<body id="services">

<div class="inner-banner" style="background-image: url(/assets/images/ser-banner.jpg);">
    <div class="container">
        <div class="content">
            <div class="head"><h1>Services</h1></div>
            <div class="bridcrum"><a href="/">Home</a> | Services</div>
        </div>
    </div>
</div>
    <div class="our-service">
      <div class="container">
        <div class="heading"><h2>What We Offer</h2></div>
         <div class="row g-4">
           <div class="col-lg-6 col-md-6 col-xl-3">
            <div class="mnbox wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
                <div class="top-box gre"><strong><?=$events->name?></strong></div>
                <div class="botm-box gre">
                  <?=$events->description?>
                </div>
            </div>
           </div>
           
           <div class="col-lg-6 col-md-6 col-xl-3">
            <div class="mnbox wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="700ms">
                <div class="top-box ble"><strong><?=$promotion->name?></strong></div>
                <div class="botm-box ble">
                 <?=$promotion->description?>
                </div>
            </div>
           </div>
           <div class="col-lg-6 col-md-6 col-xl-3">
            <div class="mnbox wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="900ms">
                <div class="top-box ore"><strong><?=$exhibition->name?></strong></div>
                <div class="botm-box ore">
                  <?=$exhibition->description?>
                </div>
            </div>
           </div>
           <div class="col-lg-6 col-md-6 col-xl-3">
            <div class="mnbox wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="1100ms">
                <div class="top-box pnk"><strong><?=$signages->name?></strong></div>
                <div class="botm-box pnk">
                  <?=$signages->description?>
                </div>
            </div>
           </div>
         </div>
    </div>
</div>
<div class="our-client">
  <div class="container">
      <div class="head">
          <h3>Our Clients</h3>
      </div>
      <div class="row">
          <div class="owl-carousel client-slider">
               <?php foreach ($client as $c): ?>
                <div class="item">
                    <img src="/upload/client/<?= $c->image ?>" alt="pic">
                </div>
                <?php endforeach; ?>
          </div>
      </div>
  </div>
</div>

 
