<?php require 'views/header.php'; ?>
<?php require 'views/cart/editCart.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title">Cart</h2><br>
    </div>
    <div class="row-top">
        <div class="col-60p">
            <div class="box-container" >
                <table class="order-list">

                    <?php foreach ($this->cartList as $cartDetails ): ?>
                    <tr>
                      <td><?php foreach ($this->imageList as $image){
                        if($cartDetails['product_id']==$image['product_id']){?>
                            <img src="<?php echo $image['image']?>" width="50px" height="50px">
                            <?php 
                            break;
                        }
                        }?></td>
                       <td class="order-details">
                            <h4><?php 
                                $this->productPrice='';
                                foreach ($this->qtyList as $qty){
                                    if($qty['product_id']==$cartDetails['product_id']){
                                        $this->productPrice=$qty['product_price'];
                                        echo $qty['product_name'];
                                    }
                                } 

                                // foreach ($this->qtyList as $qty){
                                //     if($priceCategoryID==$catName['price_category_id']){
                                //         $this->productPrice=$catName['product_price'];
                                //     }
                                // }
                            ?>
                            </h4>  
                            <h5><?php echo $this->productPrice;?></h5>     
                            <div class="item-input">
                                <label>Color:</label><span class="color-dot" style="background-color: <?php echo $cartDetails['item_color']; ?>"></span>
                                <label class="input-data">Size: <?php echo $cartDetails['item_size']; ?></label>
                                <label class="input-data">Qty: <?php echo $cartDetails['item_qty']; ?></label>
                            </div>
                        </td>

                        <td>
                            <a href="<?php echo '?id='.$cartDetails['product_id']?>#updateCartPopup" class="btn table-btn">Update</a>
                            <a href="<?php echo URL ?>cart/delete/<?php echo $cartDetails['product_id'] ?>" class="btn table-btn">Remove</a>
                        </td>
                    </tr>
                    
                    <?php endforeach;?>
                </table>     
            </div>
        </div>
        <div class="col-40p">
            <div class="row">
            <div class="box-container" >
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
        <div class="row">
            <a href="<?php echo URL;?>checkout" class="btn">Proceed to Checkout >></a>
        </div>
        </div>
    </div>
</div>


<?php require 'views/footer.php'; ?>

<script type="text/javascript">

function calculateSub(){
    document.getElementById('sub-display').innerHTML = parseInt(document.getElementById('qty').value) * parseFloat(document.getElementById('').value);
}

function calculateDelivery(){

}

function calculateTotal(){
     document.getElementById('').innerHTML = ;
}
</script>   