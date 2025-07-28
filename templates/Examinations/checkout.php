<div ng-app="cart" ng-controller="cartCrt" id="app6">   
   <!-- Page Header Start -->
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
    <!-- Page Header End -->

    <div class="container">
      <div class="row d-flex justify-content-center gap-3">
        <div class="col-lg-6 shadow p-4">
          <h4 class="text-center text-uppercase">Select Delivery Address</h4>
<div data-ng-show="showError" class="malert alert-danger"><strong><i class="icon-warning"></i> Error:</strong> {{errorMsg}}</div>
            <div data-ng-show="showSuccess" class="malert alert-success"><strong><i class="icon-tick-inside-circle"></i> Success:</strong> {{successMsg}}</div>
          <div class="chekout-section">
            <div class="block-content">
			
              <ul class="addresslist">
                <li ng-repeat="d in delivary">
                  <div class="addressblock">
                    <label class="check-style">
                      <input type="radio" id="deli443" name="delivaryaddress" id="deli{{d.id}}" name="delivaryaddress" ng-model="delivaryaddress" ng-value="d.id" type="radio" ng-click="setDelivaryadd(d.id,d.pin)" required/>
                      <div class="b-check"></div>
                      <span class="checkblock"></span>
                    </label>

                    <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModal" class="edit-address" ng-click="editAddress(d.id,$index)">
                      <i class="fa fa-edit"></i>
                    </a>
					


                    <div class="c-name">
                      <i class="fa fa-user"></i>
                      {{d.name}}
                    </div>

                    <div class="c-name">
                      <i class="fa fa-phone-alt"></i>
                      {{d.mobile}}
                    </div>
                    <div class="c-name">
                      <i class="fa fa-envelope-open"></i>
                      {{d.email}}
                    </div>
                    <div class="c-name">
                      <i class="fa fa-map-marker-alt me-3"></i>
                      {{d.address}}-{{d.pin}}
                    </div>
					
                  </div>
                </li>
                

                <!-- Button trigger modal -->
                <button
                  type="button"
                  class="btn btn-outline-primary"
                  data-bs-toggle="modal"
                  data-bs-target="#exampleModal"
				  ng-click="editAddress(0,-1)"
                >
                Add New Address
                </button>

                <!-- Modal -->
                <div
                  class="modal fade"
                  id="exampleModal"
                  tabindex="-1"
                  aria-labelledby="exampleModalLabel"
                  aria-hidden="true"
                >
                  <div class="modal-dialog custom-dia">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                         Add New Address
                        </h5>
                        <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                        ></button>
                      </div>
                      <div class="modal-body">
					   <form class="needs-validation checkout-section"   ng-submit="addDelivaryAddress($event)" ng-show="step==2">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                              
                                    <input type="text" ng-model="postData.name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Name" >
                                  </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                              
                                    <input type="number" ng-model="postData.mobile" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Mobile Number" >
                                  </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                              
                                    <input type="email" ng-model="postData.email" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Email Address" >
                                  </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="input-group mb-3">
                              
                                    <input type="text" ng-model="postData.gst" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="GST Number(Not Mandatory)" >
                                  </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                              
                                    <input type="text" ng-model="postData.address" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Address" >
                                  </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="input-group mb-3">
                              
                                    <select name="state" class="form-select" ng-model="postData.state" id="state" placeholder="State" required>
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
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                          
                                <input type="text" ng-model="postData.city" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="City" >
                              </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="input-group mb-3">
                          
                                <input type="number" ng-model="postData.pin" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Pincode" >
                              </div>
                        </div>


                        
                      </div>
                      <div class="modal-footer">
                       <button class="btn btn-success" type="submit"><span>Save</span></button>
<button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Close</button>

                      </div>
                    </div>
					 </form>
                  </div>
                </div>
              </ul>
            </div>
          </div>

          <button
     
          class="btn btn-outline-primary w-100 mt-5 fs-4"
     
        >
       Place Order
        </button>
        </div>

        <div class="col-lg-5 shadow p-4">
        
         

          <ul class="gst-dis">
		  
		  
		  
		  
            <li>
              <div>
                <h6 class="my-0">Amount</h6>
                <span class="text-muted">₹ {{cartitems[0].gross_amount}}</span>
              </div>
            </li>
			<li>
              <div>
                <h6 class="my-0">Discount Amount</h6>
                <span class="text-muted">₹ {{cartitems[0].discount_amount}}</span>
              </div>
            </li>
            <li>
              <div>
                <h6 class="my-0">GST(18%)</h6>
                <span class="text-muted">₹ {{cartitems[0].tax_amount}}</span>
              </div>
            </li>
			
            <li>
              <div>
                <h6 class="my-0">GRAND TOTAL(₹)</h6>
                <strong class="text-primary">₹ {{cartitems[0].gross_amount+cartitems[0].tax_amount}}</strong>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
</div>
</div>
<script>
    var ajxUrl = '<?php echo $this->Url->build('/ViewCarts') ?>';
   
   

</script>


<?= $this->Html->script(['/admin_template/js/angular-1.8.2/angular.min.js','/admin_template/js/angular-1.8.2/angular-sanitize.min','/admin_template/js/angular-1.8.2/angular-animate.min', '/admin_template/js/angular-1.8.2/ui-bootstrap-tpls-2.5.0.min.js', '/admin_template/js/angular/dirPagination', '/admin_template/js/angular-1.8.2/angular-ui-bootstrap-modal.js', '/admin_template/bootstrap-multiselect-master/dist/js/bootstrap-multiselect.min', '/admin_template/js/angular/cart_site_checkout.js?v=1'], ['block' => 'scriptBottom']); ?>