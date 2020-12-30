<?php require 'views/header.php'; ?>
<?php require 'views/order/cancel_order_popup.php'; ?>
<?php require 'views/order/request_return_popup.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title">Track Order</h2><br>
    </div>
    <div class="row-top">
        <div class="box-container tracking-box">
            <div class="row-top">
                        <div class="order-tracking completed">
                            <span class="is-complete"></span>
                            <p>Ordered<br><span>Mon, June 24</span></p>
                        </div>
                        <div class="order-tracking completed">
                            <span class="is-complete"></span>
                            <p>Processed<br><span>Mon, June 24</span></p>
                        </div>
                        <div class="order-tracking completed">
                            <span class="is-complete"></span>
                            <p>Out for Delivery<br><span>Mon, June 24</span></p>
                        </div>
                        <div class="order-tracking completed">
                            <span class="is-complete"></span>
                            <p>In Transit<br><span>Tue, June 25</span></p>
                        </div>
                        <div class="order-tracking">
                            <span class="is-complete"></span>
                            <p>Delivered<br><span>Fri, June 28</span></p>
                        </div>

            </div>
        </div>
    </div>
</div>


<?php require 'views/footer.php'; ?>