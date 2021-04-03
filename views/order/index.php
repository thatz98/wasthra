<?php require 'views/header.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title">My Orders</h2><br>
    </div>
    <div class="row">
        <div class="table-search">
            <input type="text" id="keyword-input" onkeyup="filterByKeyword('order_list',3)" placeholder="Search for myorders..">
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <span id="start"></span><span> - </span><span id="end"></span> <span> of <?php echo count($this->orderList); ?> results...</span>
        </div>
        <div class="col-2">


            <div class="per-page" style="float: right;">
                <span>Orders per page: </span><select name="per-page" id="per-page">
                    <?php foreach (range(10, 100, 10) as $i) { ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="row-top">
        <div class="order-container">
            <table class="order-list" id="order_list" style="min-width: 70%">
                <?php if (!empty($this->orderList)) {
                    foreach ($this->orderList as $order) {
                ?>
                        <tr>
                            <td class="order-details">
                                <h4><?php echo $order['order_id'] ?></h4>
                                <h5>Date: <?php echo $order['date'] ?></h5>
                                <h5>Total Price: <?php echo number_format($order['total_amount'], 2, '.', ''); ?></h5>
                            </td>
                            <td>
                                <div class="oder-status">

                                    <?php $status = $order['order_status'];
                                    $color = '';
                                    switch ($status) {
                                        case 'New':
                                            $color = '04CBE0';
                                            $status = 'New';
                                            break;
                                        case 'In Transit':
                                            $color = '18ea32';
                                            $status = 'In Transit';
                                            break;
                                        case 'Delivered':
                                            $color = 'd1af15';
                                            $status = 'Delivered';
                                            break;
                                        case 'Delivery Failed':
                                            $color = '31d115';
                                            $status = 'Delivery Failed';
                                            break;
                                        case 'Completed':
                                            $color = 'd115cb';
                                            $status = 'Completed';
                                            break;
                                        case 'Cancelled':
                                            $color = 'e22525';
                                            $status = 'Cancelled';
                                            break;
                                        case 'Returned':
                                            $color = '0710de';
                                            $status = 'Returned';
                                            break;
                                        case 'Requested to Return':
                                            $color = 'de7207';
                                            $status = 'Requested to Return';
                                            break;
                                        case 'Requested to Cancel':
                                            $color = '999b4f';
                                            $status = 'Requested to Cancel';
                                            break;
                                        case 'Processing':
                                            $color = 'b79ce7';
                                            $status = 'Processing';
                                            break;
                                        case 'Out for Delivery':
                                            $color = '45d2b4';
                                            $status = 'Out for Delivery';
                                            break;
                                    } ?>

                                    <h5>Order Status: <span style="color: #<?php echo $color ?>"><?php echo $status ?></span></h5>
                                </div>
                            </td>

                            <td><a href="<?php echo URL; ?>orders/myOrderDetails/<?php echo $order['order_id'] ?>" class="btn table-btn">View Order</a></td>
                        </tr>
                <?php }
                } else {
                    echo "No orders placed yet";
                } ?>

                </tr>
            </table>
        </div>

    </div>
    <div class="pagination">
        <ol id="numbers"></ol>
    </div>
</div>

<script type="text/javascript" src="/public/js/table_filter.js"></script>
<script type="text/javascript" src="/public/js/table_pagination.js"></script>



<script>
    $(pagination(10, 'order_list'));

    $('#per-page').on('change', function() {
        var rowsPerPage = parseInt($('#per-page').val());
        pagination(rowsPerPage, 'order_list');
    });
</script>
<?php require 'views/footer.php'; ?>