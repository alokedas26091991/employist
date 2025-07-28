 <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 py-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown"><?=$exam_cat_id->name?></h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
   
                    <li class="breadcrumb-item text-white active" aria-current="page"><?=$exam_cat_id->name?></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
     <!-- Insurance Start -->
     <div class="container-fluid py-5 px-4 px-lg-0">
        <div class="row g-0">
            <!-- <div class="col-lg-3 d-none d-lg-flex">
                <div class="d-flex align-items-center justify-content-center bg-primary w-100 h-100">
                    <h1 class="display-3 text-white m-0" style="transform: rotate(-deg);">15 Years Experience</h1>
                </div>
            </div> -->
            <div class="col-md-12 col-lg-12">
                <div class="p-4">
                    <div class="text-center text-lg-start wow fadeInUp" data-wow-delay="0.1s">
                        <p class="text-secondary text-uppercase text-center"></p>
                        <h2 class="mb-5 text-center">Explore Our <?=$exam_cat_id->name?> Papers</h2>
                    </div>
                    <div class="row d-flex justify-content-center" style="gap: 40px;">
					<?php
					foreach($paper as $paper)
					{
						$r=0;
						$k=0;
						foreach($paper->reviews as $re)
						{
							 $r=$r+$re->rating;
							 $k++;
						}
						if($k>0)
						{
							$m=round($r/$k);
						}
						else
						{
							$m=0;
						}
						
					?>
                        <div class="bg-light p-4 he-course2 col-lg-3" style="border-radius: 20px;">
                            <div class="admin">
                                <i class="fa fa-users-cog active"></i>
                                By IPG Consultants
                            </div>
                       <div class="text-center d-flex align-items-center justify-content-center">
                        <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4 text-center" style="width: 75px; height: 75px;">
                            <?php
							if($paper->pic)
							{
								?>
							<img src="/paper/<?=$paper->pic?>" alt="" style="width: 75px; height: 75px;">
							<?php
							}
							else
							{
								
							}
							?>
                           </div>
                       </div>
                            <a href="<?php echo $this->Url->build(["controller" => "Examinations", "action" => "details", $paper->slug]); ?>" class="course-name">
                                <h3 class="mb-3"><?=$paper->name?></h3>
                            
                            </a>
                            <!--<div class="rating">-->
                            <!--    <i class="fa fa-star active"></i>-->
                            <!--    <i class="fa fa-star active"></i>-->
                            <!--    <i class="fa fa-star active"></i>-->
                            <!--    <i class="fa fa-star active"></i>-->
                            <!--    <i class="fa fa-star active"></i>-->
                            <!--</div>-->
                            <!--<div class="reviews">-->
                            <!--    <span><?=$m?></span><a href="">reviews</a>-->
                            <!--</div>-->
                            <h6 class="mb-3"><?=$paper->caption?></h6>
                            <p class="text-left fw-bold">This Course Includes</p>
                            
							<?=$paper->short_description?>
                   
                        <div class="course-see-more">
                            <a href="<?php echo $this->Url->build(["controller" => "Examinations", "action" => "details", $paper->slug]); ?>" class="btn  w-100 mt-2">See paper<i class="fa fa-arrow-right text-secondary ms-2"></i></a>
                        </div>
                        </div>
					<?php
					
					}
					?>					
                       
                    
                </div>
          
                </div>
            </div>
        </div>
    </div>