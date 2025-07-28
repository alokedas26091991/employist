

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
                      <img src="/assets/img/edit.png" alt="" height="30" class="image-my">  Edit Your information</a>
                    <a class="tablinks" href="/home/changepassword"> <img src="/assets/img/password.png" alt="" height="30" class="image-my"> Change Your Password</a>
                    <a class="tablinks active" href="/home/addressbook"> <img src="/assets/img/address1.png" alt="" height="30" class="image-my"> My Addresses</a>
                    <a class="tablinks" href="/home/myorders"> <img src="/assets/img/purchase.png" alt="" height="30" class="image-my"> Purchased History</a>
					 <a class="tablinks" href="/home/mymocktest"> <img src="/assets/img/purchase.png" alt="" height="30" class="image-my">My Mocktest</a>
	
					<a class="tablinks" href="/login/logout"> <img src="/assets/img/logout.jpg" alt="" height="30" class="image-my">Logout</a>
                </div>
         
            </div>
        </div>
        <div class="col-lg-9">
<div class="main-content">
   
    
    <div id="tab3" class="tabcontent active">
        <h3>Edit Address</h3>
		        <?= $this->Form->create($user2,['type' => 'file','class'=>'form form-horizontal']); ?>
            <div class="row g-3">
                <div class="col-md-6">
                    <div class="form-floating">
                        <?= $this->Form->control('name', [
            "required"=>"required","class" =>"form-control",'id'=>'first_name'
            ]);?>
                       
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating">
                        <?= $this->Form->control('mobile', [
           "required"=>"required","class" =>"form-control",'id'=>'mobile'
            ]);?>
                        
                    </div>
                </div>
				 <div class="col-md-6">
                    <div class="form-floating">
                        <?= $this->Form->control('email', [
           "required"=>"required","class" =>"form-control",'id'=>'email'
            ]);?>
                        
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                         <?= $this->Form->control('address', [
            "required"=>"required","class" =>"form-control",'id'=>'phone_no'
            ]);?>
                     
                    </div>
                </div>
				
				<div class="col-12">
                    <div class="form-floating">
                         <?= $this->Form->control('gst', [
            "required"=>"required","class" =>"form-control",'id'=>'gst'
            ]);?>
                     
                    </div>
                </div>
				<div class="col-12">
                    <div class="form-floating">
                       
			
			<select name="state" class="form-control" required>
            <option value="Andhra Pradesh" <?=$user2->state == 'Andhra Pradesh' ? ' selected="selected"' : '';?>>Andhra Pradesh</option>
            <option value="Andaman and Nicobar Islands" <?=$user2->state == 'Andaman and Nicobar Islands' ? ' selected="selected"' : '';?>>Andaman and Nicobar Islands</option>
            <option value="Arunachal Pradesh" <?=$user2->state == 'Arunachal Pradesh' ? ' selected="selected"' : '';?>>Arunachal Pradesh</option>
            <option value="Assam" <?=$user2->state == 'Assam' ? ' selected="selected"' : '';?>>Assam</option>
            <option value="Bihar" <?=$user2->state == 'Bihar' ? ' selected="selected"' : '';?>>Bihar</option>
            <option value="Chandigarh" <?=$user2->state == 'Chandigarh' ? ' selected="selected"' : '';?>>Chandigarh</option>
            <option value="Chhattisgarh" <?=$user2->state == 'Chhattisgarh' ? ' selected="selected"' : '';?>>Chhattisgarh</option>
            <option value="Dadar and Nagar Haveli" <?=$user2->state == 'Dadar and Nagar Haveli' ? ' selected="selected"' : '';?>>Dadar and Nagar Haveli</option>
            <option value="Daman and Diu" <?=$user2->state == 'Daman and Diu' ? ' selected="selected"' : '';?>>Daman and Diu</option>
            <option value="Delhi" <?=$user2->state == 'Delhi' ? ' selected="selected"' : '';?>>Delhi</option>
            <option value="Lakshadweep" <?=$user2->state == 'Lakshadweep' ? ' selected="selected"' : '';?>>Lakshadweep</option>
            <option value="Puducherry" <?=$user2->state == 'Puducherry' ? ' selected="selected"' : '';?>>Puducherry</option>
            <option value="Goa" <?=$user2->state == 'Goa' ? ' selected="selected"' : '';?>>Goa</option>
            <option value="Gujarat" <?=$user2->state == 'Gujarat' ? ' selected="selected"' : '';?>>Gujarat</option>
            <option value="Haryana" <?=$user2->state == 'Haryana' ? ' selected="selected"' : '';?>>Haryana</option>
            <option value="Himachal Pradesh" <?=$user2->state == 'Himachal Pradesh' ? ' selected="selected"' : '';?>>Himachal Pradesh</option>
            <option value="Jammu and Kashmir" <?=$user2->state == 'Jammu and Kashmir' ? ' selected="selected"' : '';?>>Jammu and Kashmir</option>
            <option value="Jharkhand" <?=$user2->state == 'Jharkhand' ? ' selected="selected"' : '';?>>Jharkhand</option>
            <option value="Karnataka" <?=$user2->state == 'Karnataka' ? ' selected="selected"' : '';?>>Karnataka</option>
            <option value="Kerala" <?=$user2->state == 'Kerala' ? ' selected="selected"' : '';?>>Kerala</option>
            <option value="Madhya Pradesh" <?=$user2->state == 'Madhya Pradesh' ? ' selected="selected"' : '';?>>Madhya Pradesh</option>
            <option value="Maharashtra" <?=$user2->state == 'Maharashtra' ? ' selected="selected"' : '';?>>Maharashtra</option>
            <option value="Manipur" <?=$user2->state == 'Manipur' ? ' selected="selected"' : '';?>>Manipur</option>
            <option value="Meghalaya" <?=$user2->state == 'Meghalaya' ? ' selected="selected"' : '';?>>Meghalaya</option>
            <option value="Mizoram" <?=$user2->state == 'Mizoram' ? ' selected="selected"' : '';?>>Mizoram</option>
            <option value="Nagaland" <?=$user2->state == 'Nagaland' ? ' selected="selected"' : '';?>>Nagaland</option>
            <option value="Odisha" <?=$user2->state == 'Odisha' ? ' selected="selected"' : '';?>>Odisha</option>
            <option value="Punjab" <?=$user2->state == 'Punjab' ? ' selected="selected"' : '';?>>Punjab</option>
            <option value="Rajasthan" <?=$user2->state == 'Rajasthan' ? ' selected="selected"' : '';?>>Rajasthan</option>
            <option value="Sikkim" <?=$user2->state == 'Sikkim' ? ' selected="selected"' : '';?>>Sikkim</option>
            <option value="Tamil Nadu" <?=$user2->state == 'Tamil Nadu' ? ' selected="selected"' : '';?>>Tamil Nadu</option>
            <option value="Telangana" <?=$user2->state == 'Telangana' ? ' selected="selected"' : '';?>>Telangana</option>
            <option value="Tripura" <?=$user2->state == 'Tripura' ? ' selected="selected"' : '';?>>Tripura</option>
            <option value="Uttar Pradesh" <?=$user2->state == 'Uttar Pradesh' ? ' selected="selected"' : '';?>>Uttar Pradesh</option>
            <option value="Uttarakhand" <?=$user2->state == 'Uttarakhand' ? ' selected="selected"' : '';?>>Uttarakhand</option>
            <option value="West Bengal" <?=$user2->state == 'West Bengal' ? ' selected="selected"' : '';?>>West Bengal</option>
            </select>
                     
                    </div>
                </div>
				<div class="col-12">
                    <div class="form-floating">
                         <?= $this->Form->control('city', [
            "required"=>"required","class" =>"form-control",'id'=>'phone_no'
            ]);?>
                     
                    </div>
                </div>
				<div class="col-12">
                    <div class="form-floating">
                         <?= $this->Form->control('pin', [
            "required"=>"required","class" =>"form-control",'id'=>'phone_no'
            ]);?>
                     
                    </div>
                </div>
       
                <div class="col-12">
                    <button class="btn btn-primary w-25" type="submit">Update</button>
                </div>
            </div>
        <?=$this->Form->end();?>
    </div>
    
</div>
        </div>
    </div>

</div>
