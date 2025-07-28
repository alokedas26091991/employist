
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 py-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown">My Account</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>

   
                    <li class="breadcrumb-item text-white active" aria-current="page">Address Book  </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="tab-container">
                <div class="tabs">
                     <a class="tablinks" href="/home/myaccount">
                      <img src="/assets/img/edit.png" alt="" height="30" class="image-my mx-2">  Edit Your information</a>
                    <a class="tablinks" href="/home/changepassword"> <img src="/assets/img/password.png" alt="" height="30" class="image-my mx-2"> Change Your Password</a>
                    <a class="tablinks active" href="/home/addressbook"> <img src="/assets/img/address1.png" alt="" height="30" class="image-my mx-2"> My Addresses</a>
                    <a class="tablinks" href="/home/myorders"> <img src="/assets/img/shopping-cart.png" alt="" height="30" class="image-my mx-2"> Purchased History</a>
					 <a class="tablinks" href="/home/mymocktest"> <img src="/assets/img/purchase.png" alt="" height="30" class="image-my mx-2">My Mocktest</a>
					 <a class="tablinks" href="/home/deleteaccount"> <img src="/assets/img/delete-acc.png" alt="" height="30" class="image-my mx-2">Delete My Account</a>
					<a class="tablinks" href="/login/logout"> <img src="/assets/img/logout.jpg" alt="" height="30" class="image-my">Logout</a>
                </div>
         
            </div>
        </div>
        <div class="col-lg-9">
<div class="main-content">
   
    
    <div id="tab3" class="tabcontent active">
        <h3>Address List</h3>
		<?php 
		$c=1;
		if($address->count()>0)
		{
		foreach ($address as $pro1):
		?>
       <div class="address-info">
        <div>Name: <b><?= $pro1->name ?></b></div>
        <div>Mobile: <b><?= $pro1->mobile ?></b> </div>
		<div>Email: <b><?= $pro1->email ?></b></div>
        <div>Address : <b><?= $pro1->address ?></b></div>
        
		<div>GST: <b><?= $pro1->gst ?></b></div>
		<div>State: <b><?= $pro1->state ?></b></div>
		<div>City: <b><?= $pro1->city ?></b></div>
		<div>Pin: <b><?= $pro1->pin ?></b></div>
       </div>

       <div class="buttons-admin">
        <?= $this->Html->link('<span class="btn btn-outline-primary btnsize"><span class=" icon-edit-1"></span>' . __('Edit') . '</span>', ['controller'=>'Home','action' => 'editaddress', $pro1->id],['escape' => false, 'class' => 'btn-default', 'title' => __('Edit address')]) ?>

		<?= $this->Form->postLink('<span class="btn btn-outline-danger btnsize"><span class="icon-garbage"></span>' . __('Delete') . '</span>', ['controller'=>'Home','action' => 'deleteaddress', $pro1->id], ['confirm' => __('Are you sure you want to Delete Address ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete Review')]) ?>
       </div>
	   <?php 
		endforeach; ?>
		<?php
		}
		else
		{
		 ?>
		 <div class="data-not-found"><i class="icon-warning"></i> No Address Found</div>
		<?php
		}
		?>
    </div>
    
</div>
        </div>
    </div>

</div>
