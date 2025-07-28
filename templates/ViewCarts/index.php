<style>
body {
	background-color: #f8f8f8 !important;
}
.qty .count {
    color: #000;
    display: inline-block;
    vertical-align: top;
    font-size: 14px;
    /* font-weight: 700; */
    font-family: 'Montserrat', sans-serif;
    line-height: 30px;
    padding: 0 2px;
    min-width: 25px;
    text-align: center;
    font-weight: 500;
    line-height: 1.5;
}
.qty
{
    width:103px;
}
.qty .plus {
    cursor: pointer;
    display: inline-block;
    vertical-align: top;
    color: white;
    width: 24px;
    height: 24px;
    /* font: 18px/1 Arial,sans-serif; */
    text-align: center;
    font-weight: 600;
    border-radius: 50%;
    line-height: 24px;
}
.qty .minus {
    cursor: pointer;
    display: inline-block;
    vertical-align: top;
    color: white;
    width: 24px;
    height: 24px;
    /*font: 22px/1 Arial,sans-serif;*/
    line-height: 1.6;
    font-weight: 600;
    text-align: center;
    border-radius: 50%;
    background-clip: padding-box;
}
.bg-gr{
    background: #4a9005;
}
.bg-rd{
    background: #d70000;
}
/*.minus:hover{*/
/*    background-color: #717fe0 !important;*/
/*}*/
/*.plus:hover{*/
/*    background-color: #717fe0 !important;*/
/*}*/
.width-100{
    width:100px;
}
/*Prevent text selection*/
span{
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
}
input{  
    border: 0;
    width: 2%;
}
nput::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
input:disabled{
    background-color:white;
}

.spinner1 {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}

</style>
<div ng-app="cart" ng-controller="cartCrt" id="app5">


<!-- =============== Tool Box Area =============== -->
<section class="container" ng-cloak>
<div data-ng-show="showError" ng-class="{fade:doFade}" class="alert-danger"><strong>Error:</strong> {{ErrorMassage}}</div>
<div data-ng-show="showSuccess" ng-class="{fade:doFade}" class="message alert alert-error"><strong>Success:</strong> {{SussessMassage}}</div>
<div ng-hide="loadcartdata" class="text-center"><p style="color:black;font-size:15px; padding: 100px 0 50px;">Loading...</p></div>    
<div class="clr height20"></div>
<div class="row">
<div class="col-lg-8">
<div class="cart-table-container">
<ul class="mycart-list">
<li ng-repeat="cartitem in cartitems">

<a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"details/{{cartitem.Products.slug}}"]); ?>" class="imgblock"><img src="<?=UPLOAD_PRODUCT_IMAGE?>{{cartitem.Products.photo}}" alt="" class="imgfixdwidth" ></a>    
<div class="contentblock">
<a href="<?php echo $this->Url->build(["controller"=>"Products","action"=>"details/{{cartitem.Products.slug}}"]); ?>" class="t-heading">{{cartitem.Products.name}}</a>
<div class="p-get">Sub Total: &#8377 {{cartitem.CartItems.item_gross_amount|currency:''}}</div>    
<div class="p-get">Delivery: &#8377 {{cartitem.CartItems.delivery_charge|currency:''}}</div>  
<div class="p-get" ng-show=cartitem.CartItems.discount_amt >Discount: &#8377 {{cartitem.CartItems.discount_amt|currency:''}}</div>  
<div class="p-get" ng-show=!cartitem.CartItems.discount_amt>Discount: &#8377 0.00</div> 
</div>


<div class="valueblock">

<div class="price">&#8377 {{cartitem.Products.offer_price}}</div>   
<div class="clr height10"></div>

<!--<div class="spinner">-->
<!--    <div class="product-quantity">-->
<!--    <input type="number" value="1" min="0" max="10">-->
<!--    </div>-->
<!--</div> -->

<div class="qty select select-width">

<a href="javascript:void(0)" ng-click="updateQuentity($event,$index,1)"><span class="minus bg-rd">-</span></a>
<input type="number" class="count" name="qty" value="{{cartitem.CartItems.quantity}}">
<a href="javascript:void(0)" ng-click="updateQuentity($event,$index,2)"> <span class="plus bg-gr">+</span></a>
</div>
    
<div class="clr height10"></div> 
<?php if($this->request->getSession()->read('Auth.User.id'))
{?> 
    <a href="<?php echo $this->Url->build(["controller"=>"view_carts","action"=>"wishlist/{{cartitem.Products.slug}}"]); ?>" class="btn btn-sm"><i class="icon-heart1"></i> Save for later</a>
    
<?php
}
else
{
?>  
<a href=""  class="without-login btn btn-sm"><i class="icon-heart1"></i> Save for later</a>

<?php
}
?>

<a href="javascript:void(0)" title="Remove product" class="btn btn-sm btn-outline-danger" ng-click="deleteItem($event, $index)"><i class="icon-garbage"></i> Remove</a>

</div>
</li>


</ul>
</div>
</div>
<!-- End .col-lg-8 -->

<div class="col-lg-4" ng-show="cartitems.length>0">
<div class="cart-sticky-block">

<div class="cart-discount">
<h4 class="heading">Apply Discount Code</h4>
<form action="#" ng-if="coupon.coupon_id == 0">
<div class="input-group discountblock">
<input type="text" class="form-control" placeholder="Discount code" required ng-model="coupon.data">
<div class="input-group-append">
<button class="btn btn-style" type="button" ng-click="!applyCouponStatus && applyCoupon()"><span>Apply Discount</span></button>
</div>
</div>
<!-- End .input-group -->
</form>
<div class="col-lg-12 footer-promo-code display-none-pay-btn " ng-if="coupon.coupon_id > 0">
Used Coupon Code : <span class="color-info">{{coupon.data}}</span>  

<button class="btn btn-sm btn-outline-danger float-end"  ng-click="deleteCupon()"><i class="icon-garbage"></i> Remove</button>

</div>
</div>
<!-- End .cart-discount -->
<div class="cartbox" >
<ul class="cartlist">
<li>
<div class="cname">Subtotal:</div>
<div class="cvalue"> &#8377 {{ getSubtotal() | currency:''}}</div>
</li>   

<li>
<div class="cname">Total Delivery Charge:</div>
<div class="cvalue"> &#8377 {{ getDelivery() | currency:''}}</div>
</li>
<li ng-show=getDiscount()>
<div class="cname">Total Discount:</div>
<div class="cvalue"> &#8377 {{ getDiscount() | currency:''}}</div>
</li>

<li ng-show=!getDiscount()>
<div class="cname">Total Discount:</div>
<div class="cvalue"> &#8377 0.00</div>
</li>

</ul>
<hr>
<ul class="cartlist">
<li>
<div class="cname fontsize18"><strong>Total:</strong></div>
<div class="cvalue fontsize18"> <strong>&#8377 {{ getTotal() | currency:''}}</strong></div>
</li>
<li>

</li>
</ul>
<div class="clr height5"></div>
<div class="signblock d-grid">

<?php if($this->request->getSession()->read('Auth.User.id'))
{?>    
<a href="<?php echo $this->Url->build(["controller"=>"ViewCarts","action"=>"checkout"]); ?>" class="btn btn-style"><span><i class="icon-shopping-cart-2"></i> Proceed to Checkout</span></a>
<?php
}
else
{
?>
<a href="#" data-toggle="modal" class="without-login btn btn-style" data-target="#exampleModalCenter-login"><span><i class="icon-shopping-cart-2"></i> Proceed to Checkout</span></a>

<?php
}
?>
</div>  
<div class="clr"></div>

</div>  
</div>
</div>
<!-- End .col-lg-4 -->
<div class="clr height20"></div>
</div>
<!-- End .row -->
<div class="row" ng-show="!loadcartdata1 && cartitems.length===0" ng-cloak>
<div data-ng-show="showError" ng-class="{fade:doFade}" class="alert alert-danger"><strong>Error:</strong> {{errorMsg}}</div>
<div data-ng-show="showSuccess" ng-class="{fade:doFade}" class="alert alert-success"><strong>Success:</strong> {{successMsg}}</div>    
<div class="col-lg-12" >
<div class="clr height20"></div>
<div class="empty-card">
<img src="https://i.imgur.com/dCdflKN.png" width="130" height="130" class="img-fluid">
<h3><strong>Your Cart is Empty</strong></h3>
<h4>Add something to make me happy :)</h4> 
<a href="<?php echo $this->Url->build('/products') ?>" class="btn btn-style m-3"><span>Continue Shopping</span></a>
</div>
</div>
</div>
</section>


<div modal="showModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <p>Are you want to remove <b>{{deleteproductname}}</b> from cart?.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" ng-click="deleteItemSave($event,deleteProductPossion)">Yes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="showModal=false;">No</button>
      </div>
    </div>
  </div>
</div>

<div modal="productstockModal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <p><b>Product Stock is not Sufficient</b></p>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal" ng-click="productstockModal=false;">OK</button>
      </div>
    </div>
  </div>
</div>
</div>
<script>
    var ajxUrl = '<?php echo $this->Url->build('/ViewCarts') ?>';
     var productLink = '<?php echo $this->Url->build('/products') ?>';
    var prefix="<?=$prefix?>";
    var cartsurl='<?=$this->Url->build("/view_carts");?>';

</script>

<?php echo $this->Html->script(['/admin_template/js/angular-1.8.2/angular.min.js','/admin_template/js/angular-1.8.2/ui-bootstrap-tpls.min', '/admin_template/js/angular-1.8.2/angular-ui-bootstrap-modal',  '/admin_template/js/angular-1.8.2/angular-sanitize.min', '/admin_template/js/angular/cart_site.js?v=6'], ['block' => 'scriptBottom']) ?>