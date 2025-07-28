<body id="contact">
    <?php foreach ($page as $p): ?>
        <div class="inner-banner" style="background-image: url(/upload/slider/<?= $p->photo ?>);">
        <?php endforeach; ?>
        <div class="container">
            <div class="content">
                <div class="head">
                    <h1>Contact Us</h1>
                </div>
                <div class="bridcrum"><a href="/">Home</a> | Contact Us</div>
            </div>
        </div>
        </div>

        <div class="contact-details">
            <div class="container">
                <div class="row g-3">
                    <div class="col-lg-5">
                        <div class="sujay-k-marbo wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
                            <div class="head">
                                <h2>Let's Talk?</h2>
                            </div>
                            <div class="text">
                                <p>We value your feedback and are committed to providing excellent customer service. If you have any questions, concerns, or suggestions, please don't hesitate to get in touch with us. We're here to help!</p>
                            </div>
                            <ul class="rtz">
                                <li>
                                    <div class="c-text">Landline: <a href="tel: <?=$social->phone?>"><span class="rwn"> <?=$social->phone?></span></a></div>
                                    <div class="c-text">Email: <a href="mailto:<?=$social->email?>"><span class="rwn"> <?=$social->email?></span></a></div>
                                </li>
                                <li>
                                    <div class="c-text"><strong>Proprietor: Kaushik Dasgupta</strong></div>
                                    <div class="c-text">Phone No: <a href="tel:+91 9903061035"><span class="rwn"> +91 9903061035</span></a></div>
                                    <div class="c-text">Email: <a href="mailto:kaushik@thearyansgroup.com"><span class="rwn"> kaushik@thearyansgroup.com</span></a></div>
                                </li>
                                <li>
                                    <div class="c-text"><strong>Corporate Office & Workshop :</strong></div>
                                    <div class="c-text">548 Jessore Road, Opposite Diamond Plaza, Ground Floor, Kolkata – 700055</div>
                                </li>
                                <li>
                                    <div class="c-text"><strong>Registered Office :</strong></div>
                                    <div class="c-text">293/1 Dumdum Road, 21C, Kolkata – 700074</div>
                                </li>
                                <li>
                                    <div class="c-text"><strong>Guwahati Office :</strong></div>
                                    <div class="c-text">Seuji Path Lankeswar, Guwahati (Opposite Border Road Organisation) PIN - 781014</div>
                                    <div class="c-text"><strong>P. S -</strong> Jalukbari. Dist. Kamrup Metro</div>
                                    <div class="c-text"><strong>P. O -</strong> Guwahati University (Assam)</div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="right-form wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="700ms">
                                    <?= $this->Form->create(null, [
                                        'url' => ['controller' => 'Home', 'action' => 'enquiry']
                                    ]); ?>
                                    <div class="c-form">
                                        <div class="head">
                                            <h2>For Query</h2>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="Company Name" name="company_name">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="Contact Person Name" name="contact_person_name">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="tel" class="form-control" placeholder="Contact Person Number" name="contact_person_phone">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="email" class="form-control" placeholder="Email" name="email">
                                            </div>
                                            <div class="col-md-12">
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
                                            <div class="col-md-12">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="message" placeholder="How May We Help You?"></textarea>
                                            </div>
                                        </div>
                                        <div class="cr-bttn"><input class="btn btn-primary" type="submit" value="Submit"></div>
                                    </div>

                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="right-form wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="900ms">
                                    <?= $this->Form->create(null, [
                                        'url' => ['controller' => 'Home', 'action' => 'career'],
                                        'type' => 'file'
                                    ]); ?>

                                    <div class="c-form">
                                        <div class="head">
                                            <h2>For Career</h2>
                                        </div>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" placeholder="Name" name="name">
                                            </div>
                                            <div class="col-md-6">
                                                <input type="tel" class="form-control" placeholder="Phone Number" name="phone">
                                            </div>
                                            <div class="col-md-12">
                                                <input type="email" class="form-control" placeholder="Email" name="email">
                                            </div>
                                            <div class="col-md-12">
                                                <label for="formFileMultiple" class="form-label">Upload Resume</label>
                                                <input class="form-control czh" type="file" id="formFileMultiple" name="resume" multiple>
                                            </div>
                                            <div class="col-md-12">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Tell Us Something About Yourself" name="message"></textarea>
                                            </div>
                                        </div>
                                        <div class="cr-bttn"><input class="btn btn-primary" type="submit" value="Submit"></div>
                                    </div>
                                    <?= $this->Form->end() ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 map wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
                        <div style="width: 100%; height: 300px;">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d632.5384233564158!2d88.41137164781102!3d22.61548917826479!2m3!1f0!2f0!3f0!
3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39f89f1f9a00971b%3A0xc0903aa8c134d177!2sThe%20Aryans%20Group!5e0!3m2!1sen!2sin!4v1730707353729!5m2!1sen!2sin" width="100%" height="300" frameborder="0" style="border:0; border-radius: 12px;"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($this->request->getQuery('submitted') === 'true'): ?>
            <script>
                alert('We have received your career form.');
            </script>
        <?php endif; ?>
</body>