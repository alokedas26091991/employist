 <!-- Booking Start -->
    <div class="container-fluid px-0" style="margin: 2rem 0;">
  
        <div class="container position-relative wow fadeInUp" data-wow-delay="0.1s" >
            <h3 class="mb-2 text-center text-uppercase fs-1">Register</h3>
            <p class="text-center text-custom fw-bold fs-3">Nice to See You For the First Time!</p>
            <div class="row justify-content-center  p-4">
                <div class="col-lg-4 ">
                    <div class="login-image">
                        <img src="<?php echo $this->Url->image("assets/img/register.jpg", ['pathPrefix' => '']) ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-8 bg-light">
                    <div class=" text-center p-5">
                      <?= $this->Form->create(null,['class'=>'form form-horizontal']); ?>
                            <div class="row g-3">
                            
                                <div class="col-12 col-sm-6">
                             
									<?php 
									echo $this->Form->control('name',['required','class'=>'form-control border-0','placeholder' => 'Your Name','label' => false,'div'=>false]);
									?>
                                </div>
                       
                                <div class="col-12 col-sm-6">
                                    
									<?php 
									echo $this->Form->control('email',['required','class'=>'form-control border-0','placeholder' => 'Your Email','label' => false,'div'=>false]);
									?>
                                </div>
                                <div class="col-12 col-sm-6">
                                    
									<?php 
									echo $this->Form->control('phone_no',['required','class'=>'form-control border-0','placeholder' => 'Your Mobile No','label' => false,'div'=>false]);
									?>
                                </div>
                       
                                <div class="col-12 col-sm-6">
                                    <?php 
									echo $this->Form->control('password',['type'=>'password','required','class'=>'form-control border-0','placeholder' => 'Password','label' => false,'div'=>false]);
								?>
                                </div>
                                <div class="col-12 col-sm-12">
                                    <?php 
									echo $this->Form->control('confirm_password',['type'=>'password','required','class'=>'form-control border-0','placeholder' => 'Confirm Password','label' => false,'div'=>false]);
								?>
                                </div>
                       
                                <div class="col-12 ">
                                   <?= $this->Form->button(__('Register'), ['class' => 'btn btn-primary w-100 py-3']) ?>
                                </div>
                            </div>
                        </form>

                        <div class="other mt-3">
                        
                            <div class="row">
                                <div class="col-12 text-blue fw-bold">
                                    Did you already have an account?
                                    <a href="/login" class=" w-100 py-3">Login</a>
                                    yourself here
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->