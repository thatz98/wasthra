<?php require 'views/header.php'; ?>
<script src="<?php echo URL ?>public/js/libs/maps.js"></script>
<div class="small-container">
    <div class="row">
        <h2 class="title">Checkout</h2><br>
        <p></p>
    </div>
    <div class="row-top">
        <div class="col-60p">
            <div class="box-container">
                <form action="<?php echo URL; ?>/checkout/create" id="editFrom" method="post">
                    <div class="row">
                        <h3 class="mar-b-20">Delivery Details</h3>
                    </div>
                    <div class="row">
                    <div class="col-3">
                    <label>First Name : </label><br><input type="text" name="first_name" value="<?php echo Session::get('userData')['first_name']?>"><br>
                    </div>
                    <div class="col-3">
                    <label>Last Name : </label><br><input type="text" name="last_name" value="<?php echo Session::get('userData')['last_name']?>"><br>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-3">
                    <label>Address Line 1 : </label><br><input type="text" name="address_line_1" value="<?php echo Session::get('addressData')['address_line_1']?>"><br>
                    </div>
                    <div class="col-3">
                    <label>Address Line 2 : </label><br><input type="text" name="address_line_2" value="<?php echo Session::get('addressData')['address_line_2']?>"><br>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-3">
                    <label>Address Line 3 : </label><br><input type="text" name="address_line_3" value="<?php echo Session::get('addressData')['address_line_3']?>"><br>
                    </div>
                    <div class="col-3">
                    <label>City : </label><br><input type="text" name="city" value="<?php echo Session::get('addressData')['city']?>"><br>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-3">
                    <label>Postal Code : </label><br><input type="text" name="postal_code" value="<?php echo Session::get('addressData')['postal_code']?>"><br>
                    </div>
                    <div class="col-3">
                    <label>Contact Number : </label><br><input type="text" name="contact_no" value="<?php echo Session::get('userData')['contact_no']?>"><br>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-3">
                    <label>Location : </label><br>
                            <div id="map" name="location"></div><br>
                        </div>
                    
                    <div class="col-3">
                    <label>Delivery Comments : </label><br><textarea rows="5" cols="22"
                                name="delivery_comments">
         </textarea><br>
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
                                <td>LKR </td>
                                <div id="sub-display">
                                </div>
                            </tr>
                            <tr>
                                <td>Delivery chargers</td>
                                <td>LKR 2400.00</td>
                            </tr>
                            <tr>
                                <td>Total Price</td>
                                <td>LKR 2400.00</td>
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



<script type="text/javascript">
let map;

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: {
            lat: -34.397,
            lng: 150.644
        },
        zoom: 8,
    });
}
</script>

<?php require 'views/footer.php'; ?>