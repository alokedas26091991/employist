<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finmocktest order table</title>
   <style>
    * {
		
	
    margin: 00;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}

#customers {
    border-collapse: collapse;
    width: 90%;
    max-width: 1000px;
    margin: 0 auto;
}

#customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

#customers tr:nth-child(even) {
    background-color: #f2f2f2;
}
#customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #d9dddc;
    color: rgb(5, 0, 0);
}
/* Target the <td> element with the class "Sub-Total" */



   </style>
</head>
<body>

	<center><img src="https://www.finmocktest.com/assets/img/logo_main.png"/></center>
    <table id="customers" style="margin-top: 50px;">
        <tr>
            <th>Order Details</th>
            <th></th>
        </tr>
        <tr>
            <td style="line-height: 1.7;">
                <span style="font-weight: 700;">Order ID: </span> <?=$invoice->invoice_no?> <br>
                <span style="font-weight: 700;">Date Added:</span> <?=date("d-m-Y", strtotime($invoice->create_date))?> <br>
                <span style="font-weight: 700;">Payment Method: </span> Razorpay <br>
               
            </td>
            <td style="line-height: 1.7;">
                <span style="font-weight: 700;">Email: </span>
                <span style="color: blue; text-decoration: underline;"><?=$invoice->user->email?></span><br>
                <span style="font-weight: 700;">Telephone:</span> <?=$invoice->user->phone_no?> <br>
               
                <span style="font-weight: 700;">Order Status: </span>Completed
            </td>
        </tr>
    </table>

    <table id="customers" style="margin-top: 50px;">
        <tr>
            <th>Payment Address</th>
           
        </tr>
        <tr>
            <td style="line-height: 1.7; width: 120%;">
                <span style="font-weight: 500; border: none;"><?=$invoice->user->name?> </span><br>
               
                <span style="font-weight: 500;"><?=$invoice->user_delivery_detail->address?></span><br>
                <span style="font-weight: 500;"><?=$invoice->user_delivery_detail->state?></span><br>
                <span style="font-weight: 500;"><?=$invoice->user_delivery_detail->city?></span><br>
                <span style="font-weight: 500;"><?=$invoice->user_delivery_detail->pin?></span><br>
				<?php
				if($invoice->user_delivery_detail->gst)
				{
				?>
				 <span style="font-weight: 500;">GST No: <?=$invoice->user_delivery_detail->gst?></span><br>
				 <?php
				}
				?>
            </td>
         
           
           
        </tr>
    </table>

    <table id="customers" style="margin-top: 50px; margin-bottom: 50px;">
        <tr>
            <th>Product</th>
            <th>Model</th>
           
            
            <th style="text-align: right;">Total</th>
        </tr>
		<?php
		foreach($invoice->invoice_items as $paper)
		{
		?>
        <tr>
            <td style="line-height: 1.7;">
                <span style="font-weight: 700;"><?=$paper->examination->name?></span><br>
                <span style="font-weight: 500; font-size: small; margin-left: 15px;"><?=$paper->product->name?></span>
            </td>
            <td style="line-height: 1.7;">
                <span style="font-weight: 500;"><?=$paper->examination->model?></span>
            </td>
           
            <td style="line-height: 1.7; text-align: right;" >
                <span style="font-weight: 500;">Rs. <?=$paper->product->price?></span>
            </td>
            
        </tr>
		<?php
		}
		?>
        <tr>
            <!-- Use colspan="3" to span across Product, Model, and Quantity columns -->
            <td colspan="2" class="subtotal" style="line-height: 1.7; text-align: right;">
                <span style="font-weight: 700;">Sub-Total(Rs.):</span>
            </td>
            <!-- Use colspan="2" to span across Price and Total columns -->
            <td colspan="1" style="line-height: 1.7; text-align: right;">
                <span style="font-weight: 500;"><?=$invoice->gross_amount?></span>
            </td>
        </tr>
		<tr>
            <!-- Use colspan="3" to span across Product, Model, and Quantity columns -->
            <td colspan="2" class="subtotal" style="line-height: 1.7; text-align: right;">
                <span style="font-weight: 700;">Discount(Rs.):</span>
            </td>
            <!-- Use colspan="2" to span across Price and Total columns -->
            <td colspan="1" style="line-height: 1.7; text-align: right;">
                <span style="font-weight: 500;"><?=$invoice->discount_amount?></span>
            </td>
        </tr>
		<?php
		if($invoice->user_delivery_detail->state!="West Bengal")
		{
		?>
        <tr  style="background-color: #fff;">
            <!-- Use colspan="3" to span across Product, Model, and Quantity columns -->
            <td colspan="2" class="subtotal" style="line-height: 1.7; text-align: right;">
                <span style="font-weight: 700;">IGST(18%):</span>
            </td>
            <!-- Use colspan="2" to span across Price and Total columns -->
            <td colspan="1" style="line-height: 1.7; text-align: right;">
                <span style="font-weight: 500;"><?=$invoice->tax_amount?></span>
            </td>
        </tr>
		<?php
		}
		else
		{
		?>
        <tr>
            <!-- Use colspan="3" to span across Product, Model, and Quantity columns -->
            <td colspan="2" class="subtotal" style="line-height: 1.7; text-align: right;">
                <span style="font-weight: 700;">SGST + CGST(9%+9%):</span>
            </td>
            <!-- Use colspan="2" to span across Price and Total columns -->
            <td colspan="1" style="line-height: 1.7; text-align: right;">
                <span style="font-weight: 500;"><?=$invoice->tax_amount?></span>
            </td>
        </tr>
		<?php 
		}
		?>
        <tr style="background-color: #fff;">
            <!-- Use colspan="3" to span across Product, Model, and Quantity columns -->
            <td colspan="2" class="subtotal" style="line-height: 1.7; text-align: right;">
                <span style="font-weight: 700;">Total(Rs.):</span>
            </td>
            <!-- Use colspan="2" to span across Price and Total columns -->
            <td colspan="1" style="line-height: 1.7; text-align: right;">
                <span style="font-weight: 500;"><?=$invoice->gross_amount+$invoice->tax_amount?></span>
            </td>
        </tr>
    </table>
</body>
</html>
