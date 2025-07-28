<style>
body {
    background-color: #f8f8f8 !important;
}
.right-side-redblock {
	position: sticky;
	display: block;
	top: 0;
	z-index: 5;
}
.malert {
  position: relative;
  padding: 10px 15px;
  margin-bottom: 10px;
  border: 1px solid transparent;
  border-radius: .25rem
}	
</style>
<main class="main mb-5" ng-app="cart" ng-controller="cartCrt" id="app6">

    <div class="container-fluid page-header mb-5 py-5">
      <div class="container">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Checkout</h1>
        <nav aria-label="breadcrumb animated slideInDown">
          <ol class="breadcrumb text-uppercase">
            <li class="breadcrumb-item">
              <a class="text-white" href="/">Home</a>
            </li>

            <li class="breadcrumb-item text-white active" aria-current="page">
              Checkout
            </li>
          </ol>
        </nav>
      </div>
    </div>

    
    <div class="container">
        <!--<div class="py-5 text-center">-->
        <!--    <h2>Checkout form</h2>-->
        <!--</div>-->

      <div class="row" ng-cloak>
         
        <div class="col-md-4 order-md-2">
    		<div class="right-side-redblock">
    		    <div class="bill-header-block">
    		        <h4>Your cart</h4>
                </h4>
    		    </div>
			<div class="checkout-section">
                <div class="block-content" id="style-7">
                <ul class="gst-dis">
                    <li ng-repeat="cartitem in cartitems">
						
					<div class="cname"><strong>{{cartitem.Examinations.name}} ({{cartitem.Products.name}})</strong>
						<div class="clr height10"></div>
				 &nbsp; &nbsp;
					<span class="cvalue">Price(₹) {{cartitem.CartItems.gross_amount}}</span> &nbsp; &nbsp;
				    	
					</div>
					
                        
                    </li>
                 </ul>
	<div class="clr height5"></div>
					
				 <ul class="gst-dis">
                   
                    <li class="list-group-item d-flex justify-content-between lh-condensed" >
                        <div>
                            <h6 class="my-0">Total Discount</h6>
                            <small class="text-muted"></small>
                        </div>
                        <span class="text-muted">₹ {{ cartitems[0].discount_amount | currency:''}}</span>
                    </li>
                       
                      <li class="list-group-item d-flex justify-content-between lh-condensed" >
                        <div>
                            <h6 class="my-0">Total Tax</h6>
                            <small class="text-muted"></small>
                        </div>
                        <span class="text-muted">₹ {{ cartitems[0].tax_amount | currency:''}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between ">
						<div>
                            <h6 class="my-0">Total (₹)</h6>
                            <small class="text-muted"></small>
                        </div>
						<strong class="text-primary">₹ {{ (cartitems[0].net_amount+cartitems[0].tax_amount) | currency:''}}</strong>
                    </li>
				</ul>
			    </div>  
			</div>
                <!--<form class="p-2 cuop-back">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-reedm">Redeem</button>
                        </div>
                    </div>
                </form>-->
    		</div>
        </div>
        
        <div class="col-md-8 order-md-1">
		     
            <div ng-hide="loadcartdata" class="text-center"><i class="fa fa-refresh fa-spin"></i></div>
            <div class="bill-header-block">
                <h4>Select Delivery address</h4>
            </div>
            <div class="blockcheckout dashboard-content pad0">
				
            <div data-ng-show="showError" class="malert alert-danger"><strong><i class="icon-warning"></i> Error:</strong> {{errorMsg}}</div>
            <div data-ng-show="showSuccess" class="malert alert-success"><strong><i class="icon-tick-inside-circle"></i> Success:</strong> {{successMsg}}</div>
				
      <div class="checkout-section">
	
	<div class="block-content" ng-show="step==1" >
	<div class="chekout-section">
            <div class="block-content">
		<ul class="addresslist">
		    <li ng-repeat="d in delivary">
            			<div class="addressblock">
            			<label class="check-style">
            			<input type="radio" id="deli{{d.id}}" name="delivaryaddress" ng-model="delivaryaddress" ng-value="d.id" type="radio" class="custom-control-input" ng-click="setDelivaryadd(d.id,d.pin)" required>
            			<div class="b-check"></div>
                      <span class="checkblock"></span>
            			</label>	
            			<a href="javascript:void(0)"  ng-click="editAddress(d.id,$index)" class="edit-address"><i class="fa fa-edit"></i></a>	
            			<div class="c-name"><i class="fa fa-user" for="deli{{d.id}}"></i> {{d.name}}</div>
            			<div class="c-name"><i class="fa fa-envelope-open"></i>{{d.email}}</div>
            			<div class="c-name"><i class="fa fa-phone-alt"></i> {{d.mobile}}</div>
            			<div class="c-name"><i class="fa fa-map-marker-alt me-3"></i> {{d.address}}-{{d.pin}}</div>
            			</div>
            			</li>
			
			
		</ul>
		<a href="javascript:void(0)" class="btn btn-primary left5" ng-click="editAddress(0,-1)">Add New Address</a>
		</div>
		</div>

		
	</div>
	</div>
                
                
		   
            
            <form class="needs-validation checkout-section"   ng-submit="addDelivaryAddress($event)" ng-show="step==2">
				<div class="block-content">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="firstName">Name</label>
                    <input type="text" class="form-control" ng-model="postData.name" id="firstName" placeholder="" value="" required>
                    <div class="invalid-feedback">
                     Valid first name is required.
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="firstName">Mobile</label>
                    <input type="text" class="form-control" ng-model="postData.mobile" id="mobile" placeholder="" value="" required>
                    <div class="invalid-feedback">
                        Valid first mobile is required.
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" ng-model="postData.email" id="email" placeholder="you@example.com" >
                <div class="invalid-feedback">
                    Please enter a valid email address for shipping updates.
                </div>
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="gst">GST NO</label>
                <input type="text" class="form-control" ng-model="postData.gst" id="gst" placeholder="GST(Not Mandatory)">
                <div class="invalid-feedback">
                    Please enter a valid GST No for shipping updates.
                </div>
            </div>
            </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" ng-model="postData.address" id="address" placeholder="1234 Main St" required>
          <div class="invalid-feedback" >
            Please enter your shipping address.
          </div>
        </div>

        <div class="row">
         
		  <div class="col-md-6 mb-3">
            <label for="country">State</label>
            <!--<input type="text" class="form-control" ng-model="postData.state" id="state" placeholder="State" required >-->
            
            <select name="state" class="form-control" ng-model="postData.state" id="state" placeholder="State" required>
            <option value="Andhra Pradesh">Andhra Pradesh</option>
            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
            <option value="Assam">Assam</option>
            <option value="Bihar">Bihar</option>
            <option value="Chandigarh">Chandigarh</option>
            <option value="Chhattisgarh">Chhattisgarh</option>
            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
            <option value="Daman and Diu">Daman and Diu</option>
            <option value="Delhi">Delhi</option>
            <option value="Lakshadweep">Lakshadweep</option>
            <option value="Puducherry">Puducherry</option>
            <option value="Goa">Goa</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Haryana">Haryana</option>
            <option value="Himachal Pradesh">Himachal Pradesh</option>
            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Kerala">Kerala</option>
            <option value="Madhya Pradesh">Madhya Pradesh</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Manipur">Manipur</option>
            <option value="Meghalaya">Meghalaya</option>
            <option value="Mizoram">Mizoram</option>
            <option value="Nagaland">Nagaland</option>
            <option value="Odisha">Odisha</option>
            <option value="Punjab">Punjab</option>
            <option value="Rajasthan">Rajasthan</option>
            <option value="Sikkim">Sikkim</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Telangana">Telangana</option>
            <option value="Tripura">Tripura</option>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="Uttarakhand">Uttarakhand</option>
            <option value="West Bengal">West Bengal</option>
            </select>
            
          <div class="invalid-feedback">
            <div class="invalid-feedback">
              Please select a valid State.
            </div>
          </div>
		   </div>
  

		 <div class="col-md-3 mb-3">
            <label for="country">City</label>
            <input type="text" class="form-control" ng-model="postData.city" id="city" placeholder="City" required>
          <div class="invalid-feedback">
            <div class="invalid-feedback">
              Please select a valid City.
            </div>
          </div>
		   </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Pincode</label>
            <input type="number" minlength="6" maxlength="6" class="form-control" id="zip" ng-model="postData.pin" placeholder="" required >
            <div class="invalid-feedback">
              Zip code required.
            </div>
          </div>
        </div>

<button class="btn btn-success" type="submit"><span>Save</span></button>
<button class="btn btn-danger" type="button" ng-click="canceladd()"><span>cancel</span></button>
      
  </div> 
  </form>
 </div> 


			

<div class="blockcheckout pad0">
	<div class="checkout-section">

	<div class="block-content">

		<div class="clr height10"></div>
        <div ng-show="setAdd && step==1">
		<span ng-show="paymentMethod==1"> 
	
                    <button type="button" ng-click="checkout(cartitems[0].id)" class="btn btn-primary left5">Order Place{{cartitems.id}}</button>
                        
	   </span>
	   <span ng-show="paymentMethod==2">  <?= $this->Html->link('Order Place', ['controller' => 'Products', 'action' => 'freePayment'], ['class' => 'btn btn-primary left5', 'escape' => false]); ?>
	  </span>
    </div>
	</div>

 <div class="block-content" ng-show="!setAdd">
	 <button type="button" class="btn btn-primary left5" ng-click="setaddress()">Order Place</button>
 </div>

	</div>

</div>
          
        </div><!-- End .container -->
</div>
</div>
</main><!-- End .main -->
<script>
    var ajxUrl = '<?php echo $this->Url->build('/ViewCarts') ?>';
    //var productLink = '<?php echo $this->Url->build('/products') ?>';
   

</script>
 <script>
    var ajxPaymentUrl = '<?php echo $this->Url->build('/payments') ?>';
    var productLink = '<?php echo $this->Url->build('/payments') ?>';
    var cartUrl=productLink+"/razorpay";
    
    
		
		
	var vendor_pin=700030;
var token = "<?= $this->request->getAttribute('csrfToken') ?>";
</script>
 <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<form name='donation_razorpayform' action="<?=$this->Url->build('/payments/razorpayOrderSuccess/')?>" method="POST">
    <input type="hidden" name="razorpay_payment_id" id="donation_razorpay_payment_id">
    <input type="hidden" name="razorpay_signature"  id="donation_razorpay_signature">
    <input type="hidden" name="razorpay_order_id"  id="donation_razorpay_order_id">
</form>
<?= $this->Html->script(['/admin_template/js/angular-1.8.2/angular.min.js', '/admin_template/js/angular-1.8.2/angular-sanitize.min', '/admin_template/js/angular-1.8.2/angular-animate.min', '/admin_template/js/angular-1.8.2/ui-bootstrap-tpls-2.5.0.min.js', '/admin_template/js/angular/dirPagination', '/admin_template/js/angular-1.8.2/angular-ui-bootstrap-modal.js', '/admin_template/bootstrap-multiselect-master/dist/js/bootstrap-multiselect.min', '/admin_template/js/angular/option_category.js?v=1'], ['block' => 'scriptBottom']); ?>

<?php echo $this->Html->script(['/admin_template/js/angular-1.8.2/angular.min.js', '/admin_template/js/angular-1.8.2/angular-sanitize.min', '/admin_template/js/angular-1.8.2/angular-animate.min', '/admin_template/js/angular-1.8.2/ui-bootstrap-tpls-2.5.0.min.js', '/admin_template/js/angular/dirPagination', '/admin_template/js/angular-1.8.2/angular-ui-bootstrap-modal.js', '/admin_template/js/angular/cart_site_checkout.js?v=5'], ['block' => 'scriptBottom']) ?>