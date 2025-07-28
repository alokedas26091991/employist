<!-- Booking Start -->
    <div class="container-fluid px-0" style="margin: 2rem 0;">
  
        <div class="container position-relative wow fadeInUp" data-wow-delay="0.1s" >
            <h3 class="mb-2 text-center text-uppercase fs-1">Forget Password</h3>
          
            <div class="row justify-content-center  p-4">
                <div class="col-lg-6 ">
                    <div class="login-image">
                        <img src="<?php echo $this->Url->image("assets/img/login.jpg", ['pathPrefix' => '']) ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6 bg-light">
                    <div class=" text-center p-5">
                         <?= $this->Form->create(null,['class'=>'form form-horizontal']); ?>
						
                            <div class="row g-3">
                            
                                <div class="col-12 col-sm-12">
                                   
									
									<?php 
									echo $this->Form->control('email',['required','class'=>'form-control border-0','placeholder' => 'Email ID','label' => false,'div'=>false]);
									?>
                                </div>
                       
                               
                       
                               
                                <div class="col-12 ">
                          
									<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary w-100 py-3']) ?>
                                </div>
                            </div>
                         
						<?= $this->Form->end() ?>

                        <div class="other mt-3">
                           
                        
                            <div class="row">
                                <div class="col-12 text-blue fw-bold">
                                   
                                    <a href="/login" class=" w-100 py-3">Login</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->