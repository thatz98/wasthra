<?php require 'views/header.php'; ?>


<div class="small-container">
    <div class="row">
        <h2 class="title">Cart</h2><br>
    </div>
    <div class="row-top">
        <div class="col-60p">
            <div class="box-container" >
                <table class="order-list">
                    <tr>
                        <td><img src="public/images/product-1.jpg"></td>
                        <td class="order-details">
                            <h4>Red Colored Curve Neck</h4>
                            <h5>LKR 800.00</h5>
                            <div class="item-input">
                                <label>Color:</label><span class="color-dot" style="background-color: #59FF37"></span>
                                <label class="input-data">Size: M</label>
                                <label class="input-data">Qty: 1</label>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="btn table-btn">Update</a>
                            <a href="#" class="btn table-btn">Remove</a>
                        </td>
                    </tr>

                    <?php foreach ($this->cartList as $cartDetails ): ?>
                    <tr>
                      <td><?php foreach ($this->imageList as $image){
                        if($cartDetails['product_id']==$image['product_id']){?>
                            <img src="<?php echo $image['image']?>" width="50px" height="50px">
                            <?php 
                        }
                        }?></td>
                       <td class="order-details">
                            <h4><?php 
                                $this->productPrice='';
                                $priceCategoryID='';
                                foreach ($this->priceCatID as $id){
                                    if($id['product_id']==$cartDetails['product_id']){
                                        $priceCategoryID=$id['price_category_id'];
                                        //echo $priceCategoryID;
                                    }
                                } 

                                foreach ($this->priceCatList as $catName){
                                    if($priceCategoryID==$catName['price_category_id']){
                                        echo $catName['price_category_name'];
                                        $this->productPrice=$catName['product_price'];
                                    }
                            }
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
                            <a href="#" class="btn table-btn">Update</a>
                            <a href="#" class="btn table-btn">Remove</a>
                        </td>

                        <!-- <td><img src="public/images/product-2.jpg"></td>
                        <td class="order-details">
                            <h4>Red Colored Curve Neck</h4>
                            <h5>LKR 800.00</h5>
                            <div class="item-input">
                                <label>Color:</label><span class="color-dot" style="background-color: #59FF37"></span>
                                <label class="input-data">Size: M</label>
                                <label class="input-data">Qty: 1</label>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="btn table-btn">Update</a>
                            <a href="#" class="btn table-btn">Remove</a>
                        </td> -->
                    </tr>
                    
                    <?php endforeach;?>
                    <!-- <tr>
                        <td><img src="public/images/product-3.jpg"></td>
                        <td class="order-details">
                            <h4>Red Colored Curve Neck</h4>
                            <h5>LKR 800.00</h5>
                            <div class="item-input">
                                <label>Color:</label><span class="color-dot" style="background-color: #59FF37"></span>
                                <label class="input-data">Size: M</label>
                                <label class="input-data">Qty: 1</label>
                            </div>
                        </td>
                        <td>
                            <a href="#" class="btn table-btn">Update</a>
                            <a href="#" class="btn table-btn">Remove</a>
                        </td>
                    </tr> -->
                </table>     
            </div>
        </div>
        <div class="col-40p">
            <div class="box-container" >
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
        </div>
    </div>
</div>


<?php require 'views/footer.php'; ?>