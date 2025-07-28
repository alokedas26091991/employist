<body id="details">
   
        <div class="inner-banner" style="background-image: url(/assets/images/gallery-banner.jpg);">

            <div class="container">
                <div class="content">
                    <div class="head">
                        <h1><?= $gallery->name ?></h1>
                    </div>
                    <div class="bridcrum"><a href="/">Home</a> | <a href="/gallery">Gallary</a> | <?= $gallery->name ?></div>
                </div>
            </div>
        </div>

    <div class="img-sec">
        <div class="container">
            <div class="row g-3">

                <?php foreach ($images as $img): ?>
                    <div class="col-lg-4">
                        <div class="d-img wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
                            <img src="/upload/gallery/<?= h($img->image) ?>" alt="Gallery Image">
                        </div>
                    </div>
                <?php endforeach; ?>


                <div class="delbut"><a href="#" class="load-more">Load More</a></div>
            </div>
        </div>
    </div>

  
</body>