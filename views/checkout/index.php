<?php require 'views/header.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title">Checkout</h2><br>
        <p></p>
    </div>
    <div class="row-top">
        <div class="col-60p">
            <div class="box-container">
                <form action="<?php echo URL; ?>shop/pay" id="editFrom" method="post">
                    <div class="row">
                        <h3 class="mar-b-20">Delivery Details</h3>
                    </div>
                    <div class="row">
                    <div class="col-3">
                    <label>First Name</label><br><input type="text" name="first_name" value="<?php echo Session::get('userData')['first_name']?>"><br>
                    </div>
                    <div class="col-3">
                    <label>Last Name</label><br><input type="text" name="last_name" value="<?php echo Session::get('userData')['last_name']?>"><br>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-3">
                    <label>Address Line 1</label><br><input type="text" name="address_line_1" value="<?php if(isset(Session::get('addressData')['address_line_1'])) echo Session::get('addressData')['address_line_1']?>"><br>
                    </div>
                    <div class="col-3">
                    <label>Address Line 2</label><br><input type="text" name="address_line_2" value="<?php if(isset(Session::get('addressData')['address_line_2'])) echo Session::get('addressData')['address_line_2']?>"><br>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-3">
                    <label>Address Line 3</label><br><input type="text" name="address_line_3" value="<?php if(isset(Session::get('addressData')['address_line_3'])) echo Session::get('addressData')['address_line_3']?>"><br>
                    </div>
                    <div class="col-3">
                    <label>City</label><br>
                    <select style="padding: 5px;font-size:12px;background:transparent;" onchange="document.getElementById('dCharges').innerHTML=this.value;calculateDelivery();">
                        <option value="0">Select</option>
                    <?php foreach($this->deliveryCharges as $deliveryCharges){?>
                        <option value="<?php echo $deliveryCharges['delivery_fee'];?>"
                                        <?php if(Session::get('addressData')['city']==$deliveryCharges['city']) echo "selected=\"selected\"";?>>
                                        <?php echo $deliveryCharges['city'];?>
                                        </option>
                        <?php  }?>
                    </select>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-3">
                    <label>Postal Code</label><br><input type="text" name="postal_code" value="<?php if(isset(Session::get('addressData')['postal_code']))echo Session::get('addressData')['postal_code']?>"><br>
                    </div>
                    <div class="col-3">
                    <label>Contact Number</label><br><input type="text" name="contact_no" value="<?php echo Session::get('userData')['contact_no']?>"><br>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-3" style="min-width: unset;">
                    <label>Location</label><br>
                            <div id="map" name="location">
                            <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3962.4321638056863!2d80.06114251398914!3d6.716999922749031!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae24b2a184e0ac7%3A0x10a5ca84af51cc59!2sHORANA%20BUS%20STAND!5e0!3m2!1sen!2slk!4v1605302096473!5m2!1sen!2slk"
                        width="80%" height="150" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0"></iframe>
                            </div><br>
                        </div>
                    
                    <div class="col-3" style="min-width: unset;">
                    <label>Delivery Comments</label><br><textarea rows="5" cols="22"
                                name="delivery_comments">
         </textarea><br>
                    </div>
                    </div>
                    <div class="row">
                        <h3 class="mar-b-20">Payment Method</h3>
                    </div>
                    <div class="row">
                    <div class="col-2">
                        <div class="radio-container" id="gender-radio-m">
                            
                            
                            <input type="radio" id="online" name="payment_method" value="online" required>
                            <label for="online">Online</label>
                            <input type="radio" id="cash-on-delivery" name="payment_method" value="cashOnDelivery">
                            <label for="cash-on-delivery">Cash on Delivery</label>
                        </div>
                    </div>
                    </div>   
                    

                    <div class="center-content">
                        <button type="submit" class="btn">Continue</button>
                        <a href="<?php echo URL ?>cart" class="btn btn-grey">Return</a>
                    </div>
                    
                </form>
                </div>
                </div>
        <div class="col-40p">

            <div class="row">
                <div class="box-container">
                    <div class="row">
                        <h3>Summary</h3>
                    </div>
                    <div class="total-price">
                    <table>
                        <tr>
                            <td>Subtotal</td>
                            <td>LKR <span id="subtotal"><?php $this->subtotal=0; 
                            foreach ($this->qtyList as $qty){
                                foreach ($this->cartItems as $item){
                                    if($qty['product_id']==$item['product_id']){
                                        $this->subtotal+=$qty['product_price'];
                                    }
                                }
                            }
                            echo number_format($this->subtotal,2,'.','');?></span></td>  
                            <div id="sub-display">
                            </div>
                        </tr>
                        <tr>
                            <td>Delivery chargers</td>
                            <td>LKR <span id="dCharges">-</span></td>
                        </tr>
                        <tr>
                            <td>Total Price</td>
                            <td>LKR <span id="totalPrice"><?php echo number_format($this->subtotal,2,'.','');?></span></td>
                        </tr>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        </div>

</div>
    </div>
</div>
<script>
    function calculateDelivery(){
        
        var dCharges = parseFloat(document.getElementById('dCharges').innerHTML);
        var subtotal = parseFloat(document.getElementById('subtotal').innerHTML);
        document.getElementById('totalPrice').innerHTML=(dCharges+subtotal).toFixed(2);
    }
</script>
<?php require 'views/footer.php'; ?>