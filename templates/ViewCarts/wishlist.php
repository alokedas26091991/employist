<main class="main">
<section class="breadcrumb-section">
<div class="container">
<div class="breadcrumb-section-inner">

</div>
</div>
</section>

<div class="clr height10"></div>
<div class="container">
<div class="row">
			
 <div class="col-lg-12">
	 
<div class="account-section">
<div class="name-heading">My Wishlist</div>
<div class="block-content">

 <ul class="list-Wishlist">
<?php
foreach($pro as $key=>$pro1)
{
?> 
	 <li>
	 <a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"details",$pro1->product->slug]); ?>" class="w-proimg">
	 <img src="<?php echo $this->Url->image(UPLOAD_PRODUCT_IMAGE.$pro1->product->photo) ?>" alt="" class="imgsize" >
	 </a>
	 <div class="w-procontent">
	 <p><?=$pro1->product->name?></p>

	<?php
	if($pro1->product->offer_price==$pro1->product->actual_price)
	{
	?>
	<div class="price-box">
	<span class="product-price">₹ <?=$pro1->product->actual_price?></span> 
	</div><!-- End .price-box -->
	<?php
	}
	else
	{
	?>

	<div class="price-box">
	
	<span class="product-price">₹ <?=$pro1->product->offer_price?></span> &nbsp; &nbsp;
		<del class="text-black-50">₹ <?=$pro1->product->actual_price?></del>
	</div><!-- End .price-box -->
	<?php
	}
	?>
     <div class="clr height10"></div>
	 <a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"details",$pro1->product->slug]); ?>" class="btn btn-primary btn-sm"><span> Product Details</span></a>
	 </div>
	 <div class="w-buttonblock">
	 </div>
	  <a href="<?php echo $this->Url->build(["controller"=>"ViewCarts","action"=>"wishlistdelete",$pro1->id]); ?>" class="btn w-remove"><i class="icon-garbage"></i> Remove</a>
	 </li>
 
<?php
}
?> 
 </ul>

</div>
</div>


</div>



</div><!-- End .row -->
</div><!-- End .container -->
<div class="clr height20"></div>
<div class="mb-6"></div><!-- margin -->
</main><!-- End .main -->