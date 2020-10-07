<?php require 'views/header.php'; ?>

<div class="small-container">
    <div class="row row-2">
        <h2>Cart</h2>
    </div>
    <table>
        <tr>
            <th>Product</th>
            <th>Quntity</th>
            <th>Subtotal</th>
        </tr>
        <tr>
            <td>
                <div class="cart-item">
                    <img src="public/images/buy-1.jpg">
                    <div>
                        <p>Red Printed T-Shirt</p>
                        <small>Price: LKR 800.00</small>
                        <br>
                        <a href="">Remove</a>
                    </div>
                </div>
            </td>
            <td><input type="number" value="1"></td>
            <td>Subtotal</td>
        </tr>
        <tr>
            <td>
                <div class="cart-item">
                    <img src="public/images/buy-2.jpg">
                    <div>
                        <p>Red Printed T-Shirt</p>
                        <small>Price: LKR 800.00</small>
                        <br>
                        <a href="">Remove</a>
                    </div>
                </div>
            </td>
            <td><input type="number" value="1"></td>
            <td>Subtotal</td>
        </tr>
        <tr>
            <td>
                <div class="cart-item">
                    <img src="public/images/buy-3.jpg">
                    <div>
                        <p>Red Printed T-Shirt</p>
                        <small>Price: LKR 800.00</small>
                        <br>
                        <a href="">Remove</a>
                    </div>
                </div>
            </td>
            <td><input type="number" value="1"></td>
            <td>Subtotal</td>
        </tr>
    </table>

    <div class="total-price">
        <table>
            <tr>
                <td>Subtotal</td>
                <td>LKR 2400.00</td>
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

<?php require 'views/footer.php'; ?>