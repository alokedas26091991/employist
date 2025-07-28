<body id="about">
    <?php foreach ($page as $p): ?>
        <div class="inner-banner" style="background-image: url(/upload/slider/<?= $p->photo ?>);">
        <?php endforeach; ?>
        <div class="container">
            <div class="content">
                <div class="head">
                    <h1><?= $pdfpagecontent1->title ?></h1>
                </div>
                <div class="bridcrum"><a href="/">Home</a> | <?= $pdfpagecontent1->title ?></div>
            </div>
        </div>
        </div>
        <div class="about-us">
            <div class="container">
                <div class="row g-3">
                    <div class="col-lg-6 col-md-6">
                        <div class="left wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
                            <div class="abvideo-banner">
                                <video autoplay loop muted>
                                    <source src="/upload/page/<?= $pdfpagecontent1->image ?>" type="video/mp4">
                                </video>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="right wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="700ms">
                            <div class="head">
                                <h3><?= $pdfpagecontent1->title ?></h3>
                            </div>
                            <p><?= $pdfpagecontent1->description ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="missvis">
            <div class="container">
                <div class="row g-3">
                    <?php foreach ($pdfpagecontent2 as $p1): ?>
                        <div class="col-lg-6">
                            <div class="missbox wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
                                <div class="top">
                                    <div class="icon"><img src="/upload/page/<?= $p1->image ?>" alt="icon"></div>
                                    <div class="head"><strong><?= $p1->title ?></strong></div>
                                </div>
                                <div class="text">
                                    <p><?= $p1->description ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="how-work">
            <div class="container">
                <div class="head">
                    <h2>How It Works!</h2>
                </div>
                <div class="row g-3">
                    <?php $k = 1;
                    foreach ($pdfpagecontent3 as $p2): ?>
                        <div class="col-lg-4">
                            <div class="box" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
                                <div class="top">
                                    <div class="name">
                                        <span class="cma">0<?= $k++ ?></span>
                                        <h4><?= $p2->title ?></h4>
                                    </div>
                                </div>
                                <div class="text">
                                    <p><?= $p2->description ?></p>
                                    <p style="text-align: center; font-weight: 600;"><?= $p2->details ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="crv">
            <button class="download-btn" onclick="downloadFile()">Download Our Profile</button>
        </div>
        <script>
            function downloadFile() {
                const link = document.createElement('a');
                link.href = '/assets/images/The Aryans Group_Corporate Presentation 2024.pdf'; // Replace with your file URL
                link.download = '/assets/images/The Aryans Group_Corporate Presentation 2024.pdf'; // File name to download
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }
        </script>
</body>