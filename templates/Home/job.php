<section id="center2" class="center_o bg_blueto pt-5 pb-5">
    <div class="container">
        <div class="row center_o1">
            <div class="col-md-12">
                <h1 class="text-white">Jobs Listing</h1>
                <h5 class="col_oran mb-0 mt-3"><a class="text-white" href="#">Home</a> <span class="mx-2 text-white-50">/</span> Jobs Listing </h5>
            </div>
        </div>
    </div>
</section>
<section id="feat" class="bg_light p_3">
    <div class="container">
        <div class="row feat_1 text-center mb-4">
            <div class="col-md-12">
                <h2 class="fs-1">All Jobs</h2>
            </div>
        </div>
        <div class="row feat_2 mb-4">
            <?php foreach ($jobs as $j): ?>
                <div class="col-md-6 col-lg-4 mb-2">
                    <div class="feat_2i border_1 rounded-3 bg-white pt-3 pb-3">
                        <div class="feat_2i1 p-3 text-center">
                            <div class="listing-com">
                                <img src="/upload/allfile/<?= $j->image ?>" alt="">
                            </div>
                            <h6 class="fw-bold mt-3"><a href="#"><?= $j->title ?></a></h6>
                            <h6 class="font_14"><?= $j->description ?></h6>
                        </div>
                        <div class="feat_2i2 row mx-0">
                            <div class="col-md-6 col-6">
                                <div class="feat_2i2l">
                                    <h5 class="mb-0 col_oran"><?= $j->amount ?></h5>
                                </div>
                            </div>
                            <div class="col-md-6 col-6">
                                <div class="feat_2i2r text-end">
                                    <h6
                                        class="d-inline-block bg_blueto rounded_30 p-2 px-3 font_13 text-white mb-0">
                                        <?= $j->open ?> Open
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="feat_2i3 text-center mt-3">
                            <button
                                type="button"
                                class="btn btn-primary apply-btn"
                                data-bs-toggle="modal"
                                data-bs-target="#applyModal"
                                data-job-id="<?= $j->id ?>">
                                <i class="fa fa-paper-plane me-2"></i>Apply Now
                            </button>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- Application Modal -->
<div
    class="modal fade"
    id="applyModal"
    tabindex="-1"
    aria-labelledby="applyModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header border-0 bg-primary text-white">
                <h5 class="modal-title" id="applyModalLabel">
                    <i class="fa fa-briefcase me-2"></i>Job Application
                </h5>
                <button
                    type="button"
                    class="btn-close btn-close-white"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-md-7">
                        <form id="applicationForm" method="post" enctype="multipart/form-data" action="<?= $this->Url->build(['controller' => 'Home', 'action' => 'submitCareer']) ?>">
                        <input type="hidden" name="job_id" id="job_id">
                            <div class="mb-3">
                                <label for="name" class="form-label"><i class="fa fa-user col_green me-2"></i>Full Name</label>
                                <input
                                    name="name"
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    placeholder="Enter your full name"
                                    required />
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label"><i class="fa fa-envelope col_green me-2"></i>Email
                                    Address</label>
                                <input
                                    name="email"
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    placeholder="Enter your email address"
                                    required />
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label"><i class="fa fa-phone col_green me-2"></i>Phone
                                    Number</label>
                                <input
                                    name="phone"
                                    type="tel"
                                    class="form-control"
                                    id="phone"
                                    placeholder="Enter your phone number"
                                    required />
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label"><i class="fa fa-map-marker col_green me-2"></i>Address</label>
                                <textarea
                                    name="message"
                                    class="form-control"
                                    id="message"
                                    rows="3"
                                    placeholder="Enter your address"
                                    required></textarea>
                            </div>
                            <div class="mb-4">
                                <label for="resume" class="form-label"><i class="fa fa-file-pdf-o col_green me-2"></i>Upload
                                    CV/Resume</label>
                                <input
                                    name="resume"
                                    type="file"
                                    class="form-control"
                                    id="resume"
                                    accept=".pdf,.doc,.docx"
                                    required />
                                <div class="form-text text-muted">
                                    Accepted formats: PDF, DOC, DOCX (Max size: 2MB)
                                </div>
                            </div>
                            <div class="mb-3 form-check">
                                <input
                                    type="checkbox"
                                    class="form-check-input"
                                    id="termsCheck"
                                    required />
                                <label class="form-check-label" for="termsCheck">I agree to the terms and conditions</label>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5 d-none d-md-block">
                        <div class="application-info p-3 bg-light rounded-3 h-100">
                            <h5 class="mb-3 col_green">Application Tips</h5>
                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    <i class="fa fa-check-circle col_green me-2"></i>Complete
                                    all fields accurately
                                </li>
                                <li class="mb-2">
                                    <i class="fa fa-check-circle col_green me-2"></i>Upload an
                                    updated resume
                                </li>
                                <li class="mb-2">
                                    <i class="fa fa-check-circle col_green me-2"></i>Highlight
                                    relevant skills
                                </li>
                                <li class="mb-2">
                                    <i class="fa fa-check-circle col_green me-2"></i>Double-check contact information
                                </li>
                            </ul>
                            <hr />
                            <div class="text-center mt-4">
                                <img
                                    src="/assets/img/about-us.png"
                                    alt="Application Process"
                                    class="img-fluid rounded-3 mb-3"
                                    style="max-height: 150px" />
                                <p class="small">
                                    Our team will review your application and get back to you
                                    within 3-5 business days.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer border-0 justify-content-between">
                <button
                    type="button"
                    class="btn btn-outline-secondary"
                    data-bs-dismiss="modal">
                    <i class="fa fa-times me-2"></i>Cancel
                </button>
                <button
                    type="submit"
                    form="applicationForm"
                    class="btn btn-primary">
                    <i class="fa fa-paper-plane me-2"></i>Submit Application
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.apply-btn').forEach(button => {
    button.addEventListener('click', function () {
        const jobId = this.getAttribute('data-job-id');
        document.getElementById('job_id').value = jobId;
    });
});

</script>