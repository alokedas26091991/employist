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
			
<div class="col-lg-9 order-lg-last">
<div class="account-section">
<div class="name-heading">My Wishlist</div>
<div class="block-content">

 <ul class="list-Wishlist">
<?php
if($pro->count()>0)
{
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
<?php
}
else
{
 ?>
 <div class="data-not-found"><i class="icon-warning"></i> No Data Found</div>
<?php
}
?>
 </ul>

</div>
</div>
</div>
	
<div class="col-lg-3">
	<div class="account-section">
<div class="name-heading">
<div class="userblock">
<div class="usericon"><img src="/assets/images/user-icon.png" alt="" class="img-fluid" ></div>
<div class="username">
	<small>Hello</small><br>
	<b><?=$user1->first_name?></b>
	</div>	
</div>
</div>
	<ul class="accountlist">
	<li class="active"><a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"myaccount"]); ?>">Account Information</a></li>
	<li><a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"changepassword"]); ?>">Change Password</a></li>
	<li><a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"addressbook"]); ?>">Address Book</a></li>
	<li><a href="<?php echo $this->Url->build(["controller"=>"Home","action"=>"myorders"]); ?>">My Orders</a></li>

	<li><a href="<?php echo $this->Url->build(["controller"=>"Carts","action"=>"wishlist1"]); ?>">My Wishlist</a></li>
	<li><a href="<?php echo $this->Url->build("/Login/logout");?>" ONCLICK = "javascript: return confirm( ' Are you sure you want to Logout?');" class="logout">Logout</a></li>
	</ul>

	</div>
</div>


</div><!-- End .row -->
</div>
<!-- End .container -->
<div class="clr height20"></div>	
	
<div class="mb-6"></div>
<!-- margin -->
</main><!-- End .main -->