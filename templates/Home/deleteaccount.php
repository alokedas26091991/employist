
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 py-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown">My Account</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>

   
                    <li class="breadcrumb-item text-white active" aria-current="page">My Account  </li>
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
                     <a class="tablinks active" href="/home/myaccount">
                      <img src="/assets/img/edit.png" alt="" height="30" class="image-my mx-2">  Edit Your information</a>
                    <a class="tablinks" href="/home/changepassword"> <img src="/assets/img/password.png" alt="" height="30" class="image-my mx-2"> Change Your Password</a>
                    <a class="tablinks" href="/home/addressbook"> <img src="/assets/img/address1.png" alt="" height="30" class="image-my mx-2"> My Addresses</a>
                    <a class="tablinks" href="/home/myorders"> <img src="/assets/img/shopping-cart.png" alt="" height="30" class="image-my mx-2"> Purchased History</a>
					 <a class="tablinks" href="/home/mymocktest"> <img src="/assets/img/purchase.png" alt="" height="30" class="image-my mx-2">My Mocktest</a>
		            <a class="tablinks" href="/home/deleteaccount"> <img src="/assets/img/delete-acc.png" alt="" height="30" class="image-my mx-2">Delete My Account</a>
					<a class="tablinks" href="/login/logout"> <img src="/assets/img/logout.jpg" alt="" height="30" class="image-my mx-2">Logout</a>
                </div>
         
            </div>
        </div>
        <div class="col-lg-9">
<div class="main-content">
    <div id="tab1" class="tabcontent active">
        <h3 >Account Delete</h3>
  
            <div class="row g-3">
                
               
       
                <div class="col-12">
                    <?= $this->Form->postLink('<span class=""></span><span class="btn btn-primary w-25">' . __('Delete My Account') . '</span>', ['controller'=>'Home','action' => 'deleteaccount1'], ['confirm' => __('Are you sure you want to delete your account ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?>
                </div>
            </div>
     
        
    </div>
  

</div>
        </div>
    </div>




</div>




