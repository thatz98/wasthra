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
                            <div class="helper-text">
                                <label>First Name</label><br>
                                <input type="text" id="first_name_checkout" name="first_name" value="<?php echo Session::get('userData')['first_name'] ?>" data-helper="First Name" onfocusout="validateFirstName()">
                                <span class="popuptext"></span>
                                <br>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="helper-text">
                                <label>Last Name</label><br>
                                <input type="text" id="last_name_checkout" name="last_name" value="<?php echo Session::get('userData')['last_name'] ?>" data-helper="Last Name" onfocusout="validateLastName()">
                                <span class="popuptext"></span>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="helper-text">
                                <label>Address Line 1</label><br>
                                <input type="text" id="address_line_1_checkout" name="address_line_1" value="<?php if (isset(Session::get('addressData')['address_line_1'])) echo Session::get('addressData')['address_line_1'] ?>" data-helper="Address Line 1" onfocusout="validateAddressLine1()">
                                <span class="popuptext"></span>
                                <br>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="helper-text">
                                <label>Address Line 2</label><br>
                                <input type="text" id="address_line_2_checkout" name="address_line_2" value="<?php if (isset(Session::get('addressData')['address_line_2'])) echo Session::get('addressData')['address_line_2'] ?>" data-helper="Address Line 2" onfocusout="validateAddressLine2()">
                                <span class="popuptext"></span>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="helper-text">
                                <label>Address Line 3</label><br>
                                <input type="text" id="address_line_3_checkout" name="address_line_3" value="<?php if (isset(Session::get('addressData')['address_line_3'])) echo Session::get('addressData')['address_line_3'] ?>" data-helper="Address Line 3" onfocusout="validateAddressLine3()">
                                <span class="popuptext"></span>
                                <br>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="helper-text">
                                <label>City</label><br>
                                <select name='city' id="city_checkout" style="padding: 5px;font-size:12px;background:transparent;" onchange="document.getElementById('dCharges').innerHTML=this.value.split(' ')[1];calculateDelivery();">
                                    <option value="0">Select</option>
                                    <?php foreach ($this->deliveryCharges as $deliveryCharges) { ?>
                                        <option value="<?php echo $deliveryCharges['city'] . " " . $deliveryCharges['delivery_fee']; ?>" data-fee="<?php echo $deliveryCharges['delivery_fee']; ?>" <?php if (Session::get('addressData')['city'] == $deliveryCharges['city']) echo "selected=\"selected\""; ?>>
                                            <?php echo $deliveryCharges['city']; ?>
                                        </option>
                                    <?php  } ?>
                                </select>
                                <span class="popuptext"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="helper-text">
                                <label>Postal Code</label><br>
                                <input type="text" id="postal_code_checkout" name="postal_code" value="<?php if (isset(Session::get('addressData')['postal_code'])) echo Session::get('addressData')['postal_code'] ?>" data-helper="Posal Code" onfocusout="validatePostalCode()">
                                <span class="popuptext"></span>
                                <br>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="helper-text">
                                <label>Contact Number</label><br>
                                <input type="text" id="contact_no_checkout" name="contact_no" value="<?php echo Session::get('userData')['contact_no'] ?>" data-helper="contact Number" onfocusout="validateContactNoM()">
                                <span class="popuptext"></span>
                                <br>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col" style="min-width: unset;">
                            <label>Location</label><br>
                            <div id="map" style="width: 90%; height: 300px; margin: 0px auto;">
                            </div><br>
                            <input type="text" id="longtitude" name="longtitude" value="" hidden>
                            <input type="text" id="latitude" name="latitude" value="" hidden>
                        </div>
                    </div>




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
                                <td>LKR <span id="subtotal"><?php if ($this->flag == 'false') {
                                                                $this->subtotal = 0;
                                                                foreach (Session::get('cartData') as $cartItem) {
                                                                    $this->subtotal += $cartItem['product_price'] * $cartItem['item_qty'];
                                                                }
                                                            } else {
                                                                $this->subtotal = 0;
                                                                $this->subtotal += Session::get('buyNowData')['product_price'] * Session::get('buyNowData')['item_qty'];
                                                            }
                                                            echo number_format($this->subtotal, 2, '.', ''); ?></span></td>
                                <div id="sub-display">
                                </div>
                            </tr>
                            <tr>
                                <td>Delivery charges</td>
                                <?php if (isset(Session::get('addressData')['city'])) {
                                    foreach ($this->deliveryCharges as $deliveryCharges) {
                                        if (Session::get('addressData')['city'] == $deliveryCharges['city']) { ?>
                                            <td>LKR <span id="dCharges"><?php echo $deliveryCharges['delivery_fee']; ?></span></td>
                                    <?php   }
                                    }
                                } else { ?>
                                    <td>LKR <span id="dCharges">-</span></td>
                                <?php  }
                                ?>
                            </tr>
                            <tr>
                                <td>Total Price</td>
                                <td>LKR <span id="totalPrice"><?php echo number_format($this->subtotal, 2, '.', ''); ?></span></td>
                            </tr>
                            <?php if ($this->flag == 'false') { ?><input type="text" name="buyNow" value="false" hidden><?php } else { ?><input type="text" name="buyNow" value="buyNow" hidden> <?php  }  ?>
                        </table>
                    </div>

                    <div class="row">
                        <h3 class="mar-b-20 mar-t-50">Payment Method</h3>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <div class="radio-container" id="gender-radio-m">


                                <input type="radio" id="online" name="payment_method" value="online payment" required>
                                <label for="online">Online</label>
                                <input type="radio" id="cash-on-delivery" name="payment_method" value="cashOnDelivery">
                                <label for="cash-on-delivery">Cash on Delivery</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mar-t-50">
                        <div class="col-2" style="min-width: unset;">
                            <div class="helper-text">
                                <label>Delivery Comments</label><br>
                                <textarea rows="5" cols="22" id="delivery_comment_checkout" name="delivery_comments" data-helper="Delivery Comments" onfocusout="validateDeliveryComment()">
                                </textarea>
                                <span class="popuptext"></span>
                                <br>
                            </div>
                        </div>
                    </div>


                    <div class="center-content">
                        <button type="submit" class="btn">Continue</button>
                        <a href="<?php echo URL ?>cart" class="btn btn-grey">Return</a>
                    </div>
                </div>
            </div>

        </div>
        </form>
    </div>

</div>
<script type="text/javascript" src="/wasthra/public/js/form_validation.js"></script>
<script type="text/javascript" src="/wasthra/util/form/checkout_form_validation.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzSnah4pBNvwR3PN53ZaezSBUmNGNuf3U"></script>
<script src="https://unpkg.com/location-picker/dist/location-picker.min.js"></script>
<script>
    $(document).ready(function() {
        document.getElementById('dCharges').innerHTML = document.getElementById("city_checkout").value.split(' ')[1];
        calculateDelivery();
    });

    function calculateDelivery() {

        var dCharges = parseFloat(document.getElementById('dCharges').innerHTML);
        var subtotal = parseFloat(document.getElementById('subtotal').innerHTML);
        document.getElementById('totalPrice').innerHTML = (dCharges + subtotal).toFixed(2);
    }
</script>
<script>
    var longt = document.getElementById('longtitude');
    var latt = document.getElementById('latitude');

    // Initialize locationPicker plugin
    var lp = new locationPicker('map', {
        setCurrentPosition: true,
    }, {
        zoom: 15
    });

    // Listen to map idle event, listening to idle event more accurate than listening to ondrag event
    google.maps.event.addListener(lp.map, 'idle', function(event) {

        var location = lp.getMarkerPosition();
        longt.value = location.lng;
        latt.value = location.lat;
    });
</script>
<?php require 'views/footer.php'; ?>