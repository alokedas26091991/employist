  <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 py-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown"><?=$paper->name?></h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="/"><?=$paper->name?></a></li>
              
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
<div class="container">
    <div class="text-center text-lg-start wow fadeInUp" data-wow-delay="0.1s">
      
        <h1 class="mb-5 text-center text-custom"><?=$paper->name?></h1>
    </div>
<div class="row wow fadeInUp" data-wow-delay="0.1s">
<div class="col-12 col-lg-6">
    <div class="test-image">
	<?php
	if($paper->pic)
	{
	?>
        <img src="/paper/<?=$paper->pic?>" alt="">
	<?php
	}
	else
	{
		
	}
?>	
    </div>
</div>

<div class="col-lg-6">
    <div class="test-admin text-center">
        <i class="fa fa-users-cog active"></i>
        By IPG Consultants
    </div>


<div class="test-Name">
    <h3 class="fs-2 mt-3"><?=$paper->name?></h3>
</div>
<h6 class="mb-3"><?=$paper->caption?></h6>
<div class="d-flex mt-3 ">
    <div class="rating" style="margin-top: 0;">
        <i class="fa fa-star active"></i>
        <i class="fa fa-star active"></i>
        <i class="fa fa-star active"></i>
        <i class="fa fa-star active"></i>
        <i class="fa fa-star active"></i>
    </div>
    <div class="reviews mx-3">
        <span><?=$mm?></span><a href="">reviews</a>
    </div>
</div>


<div class="try-demotest mt-2 mb-2">
<?php
if($this->request->getSession()->read('Auth.User.id'))
{
?>
    <a href="/examinations/test/<?=$demo_mock->slug?>" class="btn bg-custom text-light">
        <i class="fa fa-wrench"></i>
        Try Demo Test</a>
<?php
}
else
{
?>
 <a href="/login" class="btn bg-custom text-light">
        <i class="fa fa-wrench"></i>
        Try Demo Test</a>
<?php
}
?>	
</div>

<div class="overview mt-3">
    <div class="overview-main text-center">
<h3> Overview</h3>
    </div>

<div class="content">
   <?=$paper->description?>
</div>
</div>

</div>
</div>


<div class="row mt-5">
    <h3 class="text-center text-uppercase">Buy Now</h3>
    <div class="col-lg-12">
   <div class="row ">
   <?php
   foreach($package_list as $package)
   {
   ?>
    <div class="col-lg-3 col-6 mt-2">
        <div class="buy-now">
            <a href="<?=$this->Url->build('/examinations/itemaddtocart/'.$paper->slug.'/'.$package->id, ['fullBase' => true]);?>">
                <h4><?=$package->name?></h4>
                
                <div class="price">
                    ₹ <?=$package->price?>
                </div>
            </a>
        </div>
    </div>
	<?php
   }
   ?>
    
   </div>
    </div>
</div>



<div class="row">



	<?= $this->Form->create(null,['type' => 'file','class'=>'custom-form comment-form mt-4']); ?>
        <h6 class="mb-3 fs-2">Write a Review</h6>
  <div class="row">
    
    <div class="col-lg-8">
        <textarea name="comment" rows="4" class="form-control" id="comment-message" placeholder="Your comment here"></textarea>
    </div>
    <div class="col-lg-8">
 <div class="rating-add">
    <h4>
        Add a Review
    </h4>
<div>
    
    <i class="fa fa-star fa-2x star"  onclick="changeColor(1)"><input type="hidden" id="star1" name="rating" value="1" /></i>
    <i class="fa fa-star fa-2x star"  onclick="changeColor(2)"><input type="hidden" id="star1" name="rating" value="2" /></i>
    <i class="fa fa-star fa-2x star"  onclick="changeColor(3)"><input type="hidden" id="star1" name="rating" value="3" /></i>
    <i class="fa fa-star fa-2x star"  onclick="changeColor(4)"><input type="hidden" id="star1" name="rating" value="4" /></i>
    <i class="fa fa-star fa-2x star"  onclick="changeColor(5)"><input type="hidden" id="star1" name="rating" value="5" /></i>
</div>



 </div>
    </div>
</div>
<div class="col-lg-3 col-md-4 col-6 ">
    <button class="btn btn-primary w-100 py-3" type="submit">Post Review</button>
</div>

    </form>
    <div class="col-lg-12 add-a-review">
        <h4 class="mt-3">See All Reviews</h4>
    </div>
		<?php
foreach($reviewlist as $key=>$reviewlist1)
{
    
?>
    <div class="col-lg-8">

        <div class="author-comment d-flex mt-3 mb-4">
            <img src="/assets/img/testimonial-1.jpg" class=" avatar-image" alt="">
    
            <div class="author-comment-info ms-3">
                <h6 class="mb-1"><?=$reviewlist1->user->name?></h6>
    <span class="float-end"><i class="icon-edit2"></i> <small><?=date('j F, Y', strtotime($reviewlist1->dt));?></small></span>
<div class=" clr height5"></div>

                <p class="mb-0"><?=$reviewlist1->comment?></p>
    
                
            </div>
        </div>

	
    </div>
    
	<?php
}
?>	
    
</div>
</div>

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
                        <h6 class="text-secondary text-uppercase text-center">Let's Check</h6>
                        <h1 class="mb-5 text-center">Our Papers</h1>
                    </div>
                    <div class="owl-carousel service-carousel position-relative wow fadeInUp" data-wow-delay="0.1s">
					<?php
					foreach($paper_list as $paper)
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
                        <div class="bg-light p-4 he-course" style="border-radius: 20px;">
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
							<img src="/paper/<?=$paper->pic?>" alt="" >
							<?php
							}
							else
							{
								
							}
							?>
                           </div>
                       </div>
                            <a href="<?php echo $this->Url->build(["controller" => "Examinations", "action" => "details", $paper->slug]); ?>" class="course-name">
                                <h4 class="mb-3"><?=$paper->name?></h4>
                            
                            </a>
                            <div class="rating">
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                                <i class="fa fa-star active"></i>
                            </div>
                            <div class="reviews">
                                <span>5</span><a href="">reviews</a>
                            </div>
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