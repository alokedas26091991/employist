<body id="port">

  <?php foreach ($page as $p): ?>
    <div class="inner-banner" style="background-image: url(/upload/slider/<?= $p->photo ?>);">
    <?php endforeach; ?>
    <div class="container">
      <div class="content">
        <div class="head">
          <h1>Gallery</h1>
        </div>
        <div class="bridcrum"><a href="/">Home</a> | Gallery</div>
      </div>
    </div>
    </div>
    <div class="our-service">
      <div class="container">
        <div class="row g-4">

          <?php foreach ($gallery as $g): ?>
            <div class="col-lg-6 col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="500ms">
              <a class="pic-box" href="<?php echo $this->Url->build(["controller" => "Home", "action" => "details",$g->slug]); ?>">
                <img src="/upload/gallery/<?= $g->image ?>" alt="pic">
              </a>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
    