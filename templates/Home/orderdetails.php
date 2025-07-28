
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
                    <a class="tablinks" href="/home/myaccount">
                      <img src="/assets/img/edit.png" alt="" height="30" class="image-my">  Edit Your information</a>
                    <a class="tablinks" href="/home/changepassword"> <img src="/assets/img/password.png" alt="" height="30" class="image-my"> Change Your Password</a>
                    <a class="tablinks" href="/home/addressbook"> <img src="/assets/img/address1.png" alt="" height="30" class="image-my"> My Addresses</a>
                    <a class="tablinks active" href="/home/myorders"> <img src="/assets/img/purchase.png" alt="" height="30" class="image-my"> Purchased History</a>
					<a class="tablinks" href="/login/logout"> <img src="/assets/img/logout.jpg" alt="" height="30" class="image-my">Logout</a>
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
						<th colspan="2">Order ID</th>
                        <th  colspan="2">Payment Method</th>
                        <th  colspan="2">Date</th>
                        <th  colspan="2">Address</th>
						<th  colspan="2">Total Amount</th>
                 
                      </tr>
                    </thead>
                    <tbody >
					<?php
					if($invoice)
					{
						
					?>
                      <tr style="color:black;">
                        <th colspan="2"><?=$invoice->examination->name?></th>
						<td  colspan="2"><?=$invoice->invoice_no?></td>
						<td  colspan="2"><?=$invoice->purchase_type?></td>
                        
                        <td  colspan="2"><?=$invoice->create_date?></td>
						<td  colspan="2"><?=$invoice->user_delivery_detail->id?></td>
						<td  colspan="2"><?=$invoice->gross_amount?></td>
                       
                      </tr>
                  <?php
					
					}
					else
					{
						echo "No Order Found";
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

