
    <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 py-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown">My Account</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>

   
                    <li class="breadcrumb-item text-white active" aria-current="page">My Mocktest  </li>
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
                    <a class="tablinks" href="/home/addressbook"> <img src="/assets/img/address1.png" alt="" height="30" class="image-my mx-2"> My Addresses</a>
                    <a class="tablinks" href="/home/myorders"> <img src="/assets/img/shopping-cart.png" alt="" height="30" class="image-my mx-2"> Purchased History</a>
					 <a class="tablinks active" href="/home/mymocktest"> <img src="/assets/img/purchase.png" alt="" height="30" class="image-my mx-2">My Mocktest</a>
	<a class="tablinks" href="/home/deleteaccount"> <img src="/assets/img/delete-acc.png" alt="" height="30" class="image-my mx-2">Delete My Account</a>
					<a class="tablinks" href="/login/logout"> <img src="/assets/img/logout.jpg" alt="" height="30" class="image-my mx-2">Logout</a>
                </div>
         
            </div>
        </div>
        <div class="col-lg-9">
<div class="main-content">
    <div id="tab4" class="tabcontent active">
        <div class="row">
            <div class="col-lg-12">
          
                <table class="table table-striped">
                    <thead class="paper-name">
                      <tr >
                        <th colspan="2">Paper Name</th>
                        <th  colspan="2">Package Name</th>
						<th  colspan="2">Purchase Date</th>
                        <th  colspan="2">Expiry Date</th>
                        <th  colspan="2">Details</th>
                 
                      </tr>
                    </thead>
                    <tbody >
					<?php
					if($mytest->count()>0)
					{
						foreach($mytest as $mytest)
						{
							$today=date('Y-m-d');
							$end_date=date("Y-m-d", strtotime($mytest->end_date));
					?>
                      <tr style="color:black;">
                        <th colspan="2"><?=$mytest->examination->name?></th>
            
                        <td  colspan="2"><?=$mytest->product->name?></td>
						 <td  colspan="2"><?=date("d-m-Y", strtotime($mytest->create_date))?></td>
                        <td  colspan="2"><?=date("d-m-Y", strtotime($mytest->end_date))?></td>
                        <td  colspan="2">
                           <?php
						   if($end_date >= $today)
						   {
						   ?>
							<table>
							
							<tbody>
							<?php
							foreach($mytest->user_product_details as $p)
							{
							?>
							<tr style="color:black;">
							<td colspan="2"><?=$p->mock_test->name?></td>
							
            
							<td  colspan="2">
							
							<a href="<?php echo $this->Url->build(["controller"=>"Examinations","action"=>"test",$p->mock_test->slug]); ?>" target="_blank" style="background-color: orange; padding: 5px;display:flex">
                                <i class="fas fa-book-open text-white">&nbsp;Start Practice</i>
                            </a>
							</td>
						
							</tr>
							<?php
							}
							
							?>
							
							</tbody>
							</table>
							<?php
						   }
						   else{
								
								echo "Expired";
								
							}
						   ?>
                        </td>
                      </tr>
                  <?php
					}
					}
					else
					{
						echo "No Mocktest Package Found";
					}
					?>
                  
                    </tbody>
                  </table>
            </div>
        
        </div>
    </div>
  

</div>
        </div>
    </div>




</div>

