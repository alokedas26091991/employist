<!-- Booking Start -->
    <div class="container-fluid px-0" style="margin: 2rem 0;">
  
        <div class="container position-relative wow fadeInUp" data-wow-delay="0.1s" >
            <h3 class="mb-2 text-center text-uppercase fs-1">Log in</h3>
            <p class="text-center text-custom fw-bold fs-3">Nice to See You Again!</p>
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
                       
                                <div class="col-12 col-sm-12">
                                   
                                <?php 
									echo $this->Form->control('password',['type'=>'password','required','class'=>'form-control border-0','placeholder' => 'Password','label' => false,'div'=>false]);
								?>
								
								
								</div>
                       
                                <!--<div class="col-12 text-lg-start">-->
                                <!--    <div class="custom-control custom-checkbox">-->
                                <!--        <input type="checkbox" class="custom-control-input" id="customCheck1">-->
                                <!--        <label class="custom-control-label " for="customCheck1">Remember me</label>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <div class="col-12 ">
                          
									<?= $this->Form->button(__('Log In'), ['class' => 'btn btn-primary w-100 py-3']) ?>
                                </div>
                            </div>
                         
						<?= $this->Form->end() ?>

                        <div class="other mt-3">
                            <div class="row">
                                <div class="col-12 text-blue fw-bold">
                                    
                                    <a href="login/forgetpassword" class=" w-100 py-3">Forget Password</a>
                                   
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="col-12 text-blue fw-bold">
                                    First time here please
                                    <a href="/login/register" class=" w-100 py-3">Register</a>
                                    yourself here
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 text-blue fw-bold">
                                    Are Your Employee?
                                    <a href="/login/employeelogin" class=" w-100 py-3">Click Here</a>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->