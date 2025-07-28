<!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 py-5">
        <div class="container">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Order Overview</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a class="text-white" href="/">Home</a></li>
                
   
                    <li class="breadcrumb-item text-white active" aria-current="page">Order Overview </li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

        <div class="container">
            <h3 class="text-center text-uppercase">Order Overview</h3>

            <div class="row">
                <div class="col-lg-12">
              
                    <table class="table table-striped">
                        <thead class="paper-name">
                          <tr >
                            <th colspan="2">Paper name</th>
                            <th  colspan="2">Price</th>
                            <th  colspan="2">Discount</th>
							<th  colspan="2">Discount for Repeat Customer</th>
                            <th  colspan="2">Net Amount</th>
							<th  colspan="2">GST(18%)</th>
							<th  colspan="2">Total amount</th>
							<th  colspan="2">Action</th>
                          </tr>
                        </thead>
                        <tbody >
						<?php
						foreach($cart_list->cart_items as $cart)
						{
						?>
                          <tr style="color:black;">
                            <th colspan="2"><?=$cart->examination->name?></th>
                
                            <td  colspan="2"><?=$cart->gross_amount?></td>
							<td  colspan="2">
							<?=$cart->discount;?>
							
							</td>
							<td  colspan="2"><?=$cart->discount_again??0?></td>
                                                        <td  colspan="2"><?=$cart->net_amount?></td>
							<td  colspan="2"><?=$cart->tax_amount?></td>
                            <td  colspan="2"><?=$cart->tax_amount+$cart->net_amount?></td>
							<td><?= $this->Form->postLink('<span class="fa fa-times"></span><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'cartdelete', $cart->id], ['confirm' => __('Are you sure you want to delete ?'), 'escape' => false, 'class' => 'btn-default', 'title' => __('Delete')]) ?></td>
                          </tr>
						<?php
						}
						?>
                          
                          <tr style="color:black;">
                            <th colspan="2">Total</th>
                
                            <td  colspan="2"><?=$cart_list->gross_amount?></td>
							<td  colspan="4">
							<?=$cart_list->discount_amount;?>
							
							</td>
                                                        <td  colspan="2"><?=$cart_list->net_amount?></td>
							<td  colspan="2"><?=$cart_list->tax_amount?></td>
                                                        <td  colspan="4"><?=$cart_list->tax_amount+$cart_list->net_amount?></td>
                          </tr>
                      
                        </tbody>
                      </table>
                </div>
                <div class="col-lg-12">
				
                 
					
					<a href="/view-carts/checkout" class="coupon-code-buttton">Proceed to Checkout</a>
             
                </div>
            </div>
          
        </div>
     <script>
    var ajxUrl = '<?php echo $this->Url->build('/payments') ?>';
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
     <script>
     function rayzorpaypayment(){
         const name = document.getElementById('d_name').value;
         const email = document.getElementById('d_email').value;
         const mobile = document.getElementById('d_mobile').value;
          const amount = document.getElementById('d_amount').value;
         
     checkout(dataPost);
    e.preventDefault();
    return false;
}
function openLogin(){
    const mainModal = document.getElementById('mainModal');
    mainModal.style.display = 'block';
}
function checkout(slug){
     var dataPost = {"slug":slug};
    $.ajax({
    url: cartUrl,
    type: "POST",
    data: dataPost,
    headers: {
        
        'X-CSRF-TOKEN':token,
    },
    success: function(data, textStatus, jqXHR) {
         var options =$.parseJSON(data);
         console.log(options.key);
         console.log(options);
options.handler = function (response){
   
    document.getElementById('donation_razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('donation_razorpay_signature').value = response.razorpay_signature;
    document.getElementById('donation_razorpay_order_id').value = response.razorpay_order_id;
    document.donation_razorpayform.submit();
};
//options.theme.image_padding = false;

var rzp = new Razorpay(options);
     rzp.open();
    },
    error: function(jqXHR, textStatus, errorThrown) {
        alert('Error occurred!');
    }

});

}
     </script>