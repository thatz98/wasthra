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
    <input type="hidden" name="return_url" value="http://127.0.0.1/orders/myOrderDetails" hidden>
    <input type="hidden" name="cancel_url" value="http://127.0.0.1/cart" hidden>
    <input type="hidden" name="notify_url" value="http://sample.com/notify" hidden>  
   
    <input type="text" name="order_id" value="ItemNo12345" hidden>
    <input type="text" name="items" value="Curve Neck T-Shirt" hidden><br>
    <input type="text" name="currency" value="LKR" hidden>
    <input type="text" name="amount" value="950" hidden>  
  
    <input type="text" name="first_name" value="Saman" hidden>
    <input type="text" name="last_name" value="Perera" hidden><br>
    <input type="text" name="email" value="samanp@gmail.com" hidden>
    <input type="text" name="phone" value="0771234567" hidden><br>
    <input type="text" name="address" value="No.1, Galle Road" hidden>
    <input type="text" name="city" value="Colombo" hidden>
    <input type="hidden" name="country" value="Sri Lanka" hidden><br><br> 
    <button type="submit" style="width:250px;" value="Buy Now" class="btn">Proceed to Payement >></button>  
</form> 



    </div>
</div>
</div>


<?php require 'views/footer.php'; ?>