<div class="video-banner">
    <?php foreach ($page as $p): ?>
        <video autoplay loop muted>
            <source src="/upload/slider/<?= $p->photo ?>" type="video/mp4">
        </video>
    <?php endforeach; ?>
</div>
<div class="we-sec">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-12 col-xl-6">
                <div class="leftbtn">
                    <div class="row g-4">
                        <div class="col-lg-12">
                            <div class="vbyk grn wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
                                <div class="rwq"><img src="/assets/images/analysis.png" alt="pic"></div>
                                <div class="mkio"><strong>Strategic Planning</strong></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="vbyk blu wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="700ms">
                                <div class="rwq"><img src="/assets/images/evaluate.png" alt="pic"></div>
                                <div class="mkio"><strong>Seamless Execution</strong></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="vbyk orn wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="900ms">
                                <div class="rwq"><img src="/assets/images/calculator.png" alt="pic"></div>
                                <div class="mkio"><strong>Flexible Budgeting</strong></div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="vbyk pnk wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="1100ms">
                                <div class="rwq"><img src="/assets/images/customer-service.png" alt="pic"></div>
                                <div class="mkio"><strong>Exceptional Client Service</strong></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xl-6 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="500ms">
                <div class="head">
                    <h3><?=$pdfpagecontent1->title?></h3>
                </div>
                <div class="text">
                    <p><?=$pdfpagecontent1->description?></p>
                    <div class="sub-head"><strong class="klp"><?=$pdfpagecontent2->title?></strong></div>
                    <p><?=$pdfpagecontent2->description?></p>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="our-port">
    <div class="container">
        <div class="row g-3">
            <div class="col-lg-4 col-lg-4 col-md-4 col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                <div class="main-box">
                    <div class="top-icon">
                        <img src="/assets/images/happiness.png" alt="icon">
                    </div>
                    <div class="rez">
                        <h3 class="count" data-target="200">0</h3>
                        <span>+</span>
                    </div>
                    <h5>Happy Clients</h5>
                </div>
            </div>
            <div class="col-lg-4 col-lg-4 col-md-4 col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="700ms">
                <div class="main-box">
                    <div class="top-icon">
                        <img src="/assets/images/closure.png" alt="icon">
                    </div>
                    <div class="rez">
                        <h3 class="count" data-target="5000">0</h3>
                        <span>+</span>
                    </div>
                    <h5>Projects</h5>
                </div>
            </div>
            <div class="col-lg-4 col-lg-4 col-md-4 col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="700ms">
                <div class="main-box">
                    <div class="top-icon">
                        <img src="/assets/images/location-pin.png" alt="icon">
                    </div>
                    <div class="rez">
                        <h3 class="count" data-target="100">0</h3>
                        <span>+</span>
                    </div>
                    <h5>Cities</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="our-services">
    <div class="container">
        <div class="os-data">
            <div class="heading">
                <h3>Our Services</h3>
            </div>
            <div class="row g-4">
                <div class="col-lg-8">
                    <?php foreach ($events as $e): ?>
                        <div class="our-box" style="background-image: url(/upload/service/<?= $e->image ?>);">
                            <div class="bottom-con">
                                <div class="sr-head"><strong><?= $e->name ?></strong></div>
                                <ul class="rgtab">
                                    <?php if (!empty($e->title_1)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_1 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($e->title_2)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_2 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($e->title_3)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_3 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($e->title_4)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_4 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($e->title_5)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_5 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($e->title_6)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_6 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($e->title_7)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_7 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($e->title_8)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_8 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($e->title_9)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_9 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($e->title_10)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_10 ?></div>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>
                <div class="col-lg-4">
                    <?php foreach ($promotions as $p): ?>
                        <div class="our-box" style="background-image: url(/upload/service/<?= $p->image ?>);">
                            <div class="bottom-con">
                                <div class="sr-head"><strong><?= $p->name ?></strong></div>
                                <ul class="rgtab">
                                    <?php if (!empty($p->title_1)): ?>
                                        <li>
                                            <div class="srbtn"><?= $p->title_1 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($p->title_2)): ?>
                                        <li>
                                            <div class="srbtn"><?= $p->title_2 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($p->title_3)): ?>
                                        <li>
                                            <div class="srbtn"><?= $p->title_3 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($p->title_4)): ?>
                                        <li>
                                            <div class="srbtn"><?= $p->title_4 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($p->title_5)): ?>
                                        <li>
                                            <div class="srbtn"><?= $p->title_5 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($p->title_6)): ?>
                                        <li>
                                            <div class="srbtn"><?= $p->title_6 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($p->title_7)): ?>
                                        <li>
                                            <div class="srbtn"><?= $p->title_7 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($p->title_8)): ?>
                                        <li>
                                            <div class="srbtn"><?= $p->title_8 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($p->title_9)): ?>
                                        <li>
                                            <div class="srbtn"><?= $p->title_9 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($p->title_10)): ?>
                                        <li>
                                            <div class="srbtn"><?= $p->title_10 ?></div>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-lg-5">
                    <?php foreach ($exhibitions as $e): ?>
                        <div class="our-box" style="background-image: url(/upload/service/<?= $e->image ?>);">
                            <div class="bottom-con">
                                <div class="sr-head"><strong><?= $e->name ?></strong></div>
                                <ul class="rgtab">
                                    <?php if (!empty($e->title_1)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_1 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($e->title_2)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_2 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($e->title_3)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_3 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($e->title_4)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_4 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($e->title_5)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_5 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($e->title_6)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_6 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($e->title_7)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_7 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($e->title_8)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_8 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($e->title_9)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_9 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($e->title_10)): ?>
                                        <li>
                                            <div class="srbtn"><?= $e->title_10 ?></div>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-lg-7">
                    <?php foreach ($signages as $s): ?>
                        <div class="our-box" style="background-image: url(/upload/service/<?= $s->image ?>);">
                            <div class="bottom-con">
                                <div class="sr-head"><strong><?= $s->name ?></strong></div>
                                <ul class="rgtab">
                                    <?php if (!empty($s->title_1)): ?>
                                        <li>
                                            <div class="srbtn"><?= $s->title_1 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($s->title_2)): ?>
                                        <li>
                                            <div class="srbtn"><?= $s->title_2 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($s->title_3)): ?>
                                        <li>
                                            <div class="srbtn"><?= $s->title_3 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($s->title_4)): ?>
                                        <li>
                                            <div class="srbtn"><?= $s->title_4 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($s->title_5)): ?>
                                        <li>
                                            <div class="srbtn"><?= $s->title_5 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($s->title_6)): ?>
                                        <li>
                                            <div class="srbtn"><?= $s->title_6 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($s->title_7)): ?>
                                        <li>
                                            <div class="srbtn"><?= $s->title_7 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($s->title_8)): ?>
                                        <li>
                                            <div class="srbtn"><?= $s->title_8 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($s->title_9)): ?>
                                        <li>
                                            <div class="srbtn"><?= $s->title_9 ?></div>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (!empty($s->title_10)): ?>
                                        <li>
                                            <div class="srbtn"><?= $s->title_10 ?></div>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endforeach; ?>
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

<div class="contac-sec">
    <div class="container">
        <div class="head">
            <h3>Get In Touch</h3>
        </div>
        <div class="row g-4">
            <div class="col-lg-12">
                <div class="row g-3">
                    <div class="col-lg-12 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="500ms">

                        <?= $this->Form->create(null, [
                            'url' => ['controller' => 'Home', 'action' => 'enquiry']
                        ]); ?>
                        <div class="right-form">
                            <div class="c-form">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="formGroupExampleInput">Company Name</label>
                                        <input type="text" class="form-control" name="company_name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="formGroupExampleInput">Contact Person Name</label>
                                        <input type="text" class="form-control" name="contact_person_name">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="formGroupExampleInput">Contact Person Number</label>
                                        <input type="text" class="form-control" name="contact_person_phone">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="formGroupExampleInput">Email</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Purpose</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="purpose" required>
                                                <option value="">Please Select Your Query</option>
                                                <option value="Conference">Conference</option>
                                                <option value="Product Launches">Product Launches</option>
                                                <option value="Dealer Meets">Dealer Meets</option>
                                                <option value="Award Functions">Award Functions</option>
                                                <option value="Media / Press Meets">Media / Press Meets</option>
                                                <option value="Mall Activation">Mall Activation</option>
                                                <option value="Roadshows & Product Sampling">Roadshows & Product Sampling</option>
                                                <option value="Apartment Activition">Apartment Activition</option>
                                                <option value="Retail & Brand Activation">Retail & Brand Activation</option>
                                                <option value="Exhibition & Melas Stall">Exhibition & Melas Stall</option>
                                                <option value="Concept Brandings & Designing">Concept Brandings & Designing</option>
                                                <option value="Furniture & Fixtures Making">Furniture & Fixtures Making</option>
                                                <option value="Festive Brandings">Festive Brandings</option>
                                                <option value="FSU Making & Designing">FSU Making & Designing</option>
                                                <option value="NLB, GSB & ACP">NLB, GSB & ACP</option>
                                                <option value="In-shop Brandings">In-shop Brandings</option>
                                                <option value="Standy, Canopy & Cut-outs">Standy, Canopy & Cut-outs</option>
                                                <option value="Flex & Latex Printing">Flex & Latex Printing</option>
                                                <option value="POP Materials Printings">POP Materials Printings</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="exampleFormControlTextarea1">How May We Help You?</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                                    </div>
                                </div>
                                <div class="cr-bttn"><input class="btn btn-primary" type="submit" value="Submit"></div>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>


                    </div>
                </div>
            </div>
            <div class="col-lg-12 map wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="700ms">
                <div style="width: 100%; height: 300px;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d632.5384233564158!2d88.41137164781102!3d22.61548917826479!2m3!1f0!2f0!3f0! 3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f89f1f9a00971b%3A0xc0903aa8c134d177!2sThe%20Aryans%20Group!5e0!3m2!1sen!2sin!4v1730707353729!5m2!1sen!2sin" width="100%" height="100%" frameborder="0" style="border-radius: 30px;"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="customersec">
    <div class="container">
        <div class="head">
            <h3>Why People Love Us</h3>
        </div>
        <div class="row">
            <div class="owl-carousel test-slider">
                <?php foreach ($testimonial as $t): ?>
                    <div class="item">

                        <div class="main-content">
                            <div class="col-lg-12 stl">
                                <div class="right-img">
                                    <img src="/testimonial/<?= $t->photo ?>" alt="pic">
                                </div>
                            </div>
                            <div class="left-sec col-lg-12">
                                <div class="name">
                                    <h4><?= $t->name ?></h4>
                                    <strong class="bvd">(<?= $t->designation ?>)</strong>
                                    <p>"<?= $t->details ?>"</p>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php if ($this->request->getQuery('submitted') === 'true'): ?>
    <script>
        alert('We have received your enquiry.');
    </script>
<?php endif; ?>