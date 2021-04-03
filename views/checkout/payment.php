<?php require 'views/header.php'; ?>
<div class="small-container">
<div class="row" style="margin-top: 100px;">
    <div class="col-2">
        <p>We don't save any of your payment information in our databases. You may proceed with PayHere by clicking below link. Thank your for the business!
    </div>
</div>
<div class="row">
    <div class="col-2">

<form method="post" action="https://sandbox.payhere.lk/pay/checkout">   
    <input type="hidden" name="merchant_id" value="1216021" hidden>    <!-- Replace your Merchant ID -->
    <input type="hidden" name="return_url" value="http://wasthra.me/orders/myOrderDetails/<?php echo $this->orderDetails[0]['order_id']; ?>" hidden>
    <input type="hidden" name="cancel_url" value="http://wasthra.me/orders/myOrderDetails/<?php echo $this->orderDetails[0]['order_id']; ?>" hidden>
    <input type="hidden" name="notify_url" value="http://wasthra.me/orders/updatePayementStatus/<?php echo $this->orderDetails[0]['order_id']; ?>" hidden>  
   
    <input type="text" name="order_id" value="<?php echo $this->orderDetails[0]['order_id']; ?>" hidden>
    <input type="text" name="items" value="<?php echo $this->orderDetails[0]['product_name']; ?>" hidden><br>
    <input type="text" name="currency" value="LKR" hidden>
    <input type="text" name="amount" value="<?php echo $this->orderDetails[0]['total_amount']; ?>" hidden>  
  
    <input type="text" name="first_name" value="<?php echo $this->orderDetails[0]['customer_first_name']; ?>" hidden>
    <input type="text" name="last_name" value="<?php echo $this->orderDetails[0]['customer_last_name']; ?>" hidden><br>
    <input type="text" name="email" value="<?php echo $this->orderDetails[0]['customer_email']; ?>" hidden>
    <input type="text" name="phone" value="<?php echo $this->orderDetails[0]['customer_phone']; ?>" hidden><br>
    <input type="text" name="address" value="<?php echo($this->orderDetails[0]['address_line_1']); echo ',';
    echo($this->orderDetails[0]['address_line_2']); echo ','; echo($this->orderDetails[0]['address_line_3']);?>" hidden>
    <input type="text" name="city" value="<?php echo $this->orderDetails[0]['city']; ?>" hidden>
    <input type="hidden" name="country" value="Sri Lanka" hidden><br><br> 
    <button type="submit" style="width:250px;" value="Buy Now" class="btn">Proceed to Payement >></button>  
</form> 



    </div>
</div>
</div>


<?php require 'views/footer.php'; ?>