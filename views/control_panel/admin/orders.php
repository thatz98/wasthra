<?php require 'views/header_dashboard.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title title-min">Orders</h2><br>
    </div>
    <div class="row-right">
        <a href="<?php echo URL ?>report" class="btn">Generate Report</a>
    </div>
    <div class="row">
        <div class="col-3 fit-size">
            <div class="min-card">
                <div class="row">
                    <h3>New Orders</h3>
                </div>
                <div class="row">
                    <h1>3420</h1>
                </div>
            </div>
        </div>
        <div class="col-3 fit-size">
            <div class="min-card">
                <div class="row">
                    <h3>Pending Deliveries</h3>
                </div>
                <div class="row">
                    <h1>3420</h1>
                </div>
            </div>
        </div>
        <div class="col-3 fit-size">
            <div class="min-card">
                <div class="row">
                    <h3>Pending Returns</h3>
                </div>
                <div class="row">
                    <h1>3420</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="row-top">
        <div class="order-container" style="min-width: 70%">
            <table class="order-list">
               
            <?php foreach ($this->orderList as $order_list ): ?>
                <tr>

                    <td class="order-details">
                        <h4>ORDER ID:<?php echo $order_list['order_id']; ?></h4>
                        <h5>Date: <?php echo $order_list['date']; ?></h5>
                        <h5>Total Price: LKR 2400.00</h5>
                    </td>
                    <td class="order-messages">
                        <div class="oder-status">
                            <h5>Order Status: </h5>
                            <h5 style="color: #04CBE0"> <?php echo $order_list['order_status']; ?></h5>
                        </div>
                        <div class="order-note">
                            <li style="color: red;">No delivery is set</li>
                        </div>
                    </td>
                    <td><a href="<?php echo URL ?>orders/orderDetails/<?php echo $order_list['order_id']; ?>" class="btn table-btn">View Order</a></td>
                </tr>
            
            <?php endforeach; ?>

            </table>
        </div>

    </div>

</div>

<?php require 'views/footer_dashboard.php'; ?>




