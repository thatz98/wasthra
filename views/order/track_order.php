<?php require 'views/header.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title">Track Order</h2><br>
    </div>
    <div class="row-top">
        <div class="box-container tracking-box">
            <div class="row mar-b-30">
                <div class="col">
                    <h2>Order ID: <?php echo $this->track[0]['order_id']; ?></h2>
                </div>
            </div>
            <div class="row-top">
                <div class="order-tracking <?php if ($this->track[0]['ordered']) echo 'completed'; ?>">
                    <span class="is-complete"></span>
                    <p>Ordered<br><span><?php if ($this->track[0]['ordered']) echo $this->track[0]['ordered'];
                                        else echo 'pending'; ?></span></p>
                </div>
                <div class="order-tracking <?php if ($this->track[0]['processed']) echo 'completed'; ?>">
                    <span class="is-complete"></span>
                    <p>Processed<br><span><?php if ($this->track[0]['processed']) echo $this->track[0]['processed'];
                                            else echo 'pending'; ?></span></p>
                </div>
                <div class="order-tracking <?php if ($this->track[0]['outForDelivery']) echo 'completed'; ?>">
                    <span class="is-complete"></span>
                    <p>Out for Delivery<br><span><?php if ($this->track[0]['outForDelivery']) echo $this->track[0]['outForDelivery'];
                                                    else echo 'pending'; ?></span></p>
                </div>
                <div class="order-tracking <?php if ($this->track[0]['inTransit']) echo 'completed'; ?>">
                    <span class="is-complete"></span>
                    <p>In Transit<br><span><?php if ($this->track[0]['inTransit']) echo $this->track[0]['inTransit'];
                                            else echo 'pending'; ?></span></p>
                </div>
                <div class="order-tracking <?php if ($this->track[0]['delivered']) echo 'completed'; ?>">
                    <span class="is-complete"></span>
                    <p>Delivered<br><span><?php if ($this->track[0]['delivered']) echo $this->track[0]['delivered'];
                                            else echo 'pending'; ?></span></p>
                </div>

            </div>
        </div>
    </div>
</div>


<?php require 'views/footer.php'; ?>