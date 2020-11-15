<?php require 'views/header.php'; ?>
<?php require 'views/user/add_to_cart_wishlist.php'; ?>

<div class="small-container">
        <h2 class="title">My Wishlist</h2>
            <div class="row">

            <?php $count=0;
                foreach($this->qtyList as $qty){
                    if(Session::get('userId')==$qty['user_id']){
                    if($qty['is_featured']=='yes' || $qty['is_new']=='yes'){
                        $count++;?>
               
                <div class="col-4">
                <div class="content">
                        <div class="content-overlay"></div>

                        <?php foreach ($this->imageList as $image){
                        if($qty['product_id']==$image['product_id']){?>
                            <img src="<?php echo URL.$image['image']?>">
                            <?php break;
                        }
                    }?>
    
                        
                    <div class="content-details fadeIn-bottom"> 
                        <div class="options">
                            <div class="text">
                                <a href="<?php echo URL; ?>shop/productDetails/<?php echo $qty['product_id']?>">View</a><br><br>
                            </div>
                                <a href="<?php echo URL; ?>wishlist/removeFromWishlist/<?php echo $qty['product_id']?>"><i class="fa fa-2x fa-heart"></i></a><a href="<?php echo '?id='.$qty['product_id']?>#addToCartWishlist"><i class="fa fa-2x fa-cart-plus"></i></a>
                        </div>
                    </div>

                    <div>
                      <h4><?php echo $qty['product_name'];?></h4>
                      <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                      </div>
                    <p>LKR <?php echo $qty['product_price'];?></p>

                    </div>

               
                    
                </div>                
                </div>

                <?php }
                if($count>=4){
                    continue;
                }}} ?>
              
               
                
            </div>



 </div>

<?php require 'views/footer.php'; ?>




 <!-- <div class="col-4">
                <div class="content">
                        <div class="content-overlay"></div>
                        <img src="<?php ; ?>public/images/products/product_img_8.jpg" alt="item1" />
                        
                    <div class="content-details fadeIn-bottom"> 
                        <div class="options">
                            <div class="text">
                                <a href="#">View</a><br><br>
                            </div>
                                <a href="#"><i class="fa fa-2x fa-heart"></i></a><a href="#"><i class="fa fa-2x fa-cart-plus"></i></a>
                        </div>
                    </div>

                    <div>
                      <h4>Metro D-Mix</h4>
                      <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                        <i class="fa fa-star-o"></i>
                      </div>
                    <p>LKR 700.00 </p>

                    </div>
                    
                </div>                
                </div>


                <div class="col-4">
                <div class="content">
                        <div class="content-overlay"></div>
                        <img src="<?php ; ?>public/images/products/product_img_7.jpg" alt="item1" />
                        
                    <div class="content-details fadeIn-bottom"> 
                        <div class="options">
                            <div class="text">
                                <a href="#">View</a><br><br>
                            </div>
                                <a href="#"><i class="fa fa-2x fa-heart"></i></a><a href="#"><i class="fa fa-2x fa-cart-plus"></i></a>
                        </div>
                    </div>

                    <div>
                      <h4>Karma Recycle</h4>
                      <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                      </div>
                    <p>LKR 800.00 </p>

                    </div>
                    
                </div>                
                </div>


                <div class="col-4">
                <div class="content">
                        <div class="content-overlay"></div>
                        <img src="<?php ; ?>public/images/products/product_img_1.jpg" alt="item1" />
                        
                    <div class="content-details fadeIn-bottom"> 
                        <div class="options">
                            <div class="text">
                                <a href="#">View</a><br><br>
                            </div>
                                <a href="#"><i class="fa fa-2x fa-heart"></i></a><a href="#"><i class="fa fa-2x fa-cart-plus"></i></a>
                        </div>
                    </div>

                    <div>
                      <h4>Moving Units Soulcal</h4>
                      <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                      </div>
                    <p>LKR 900.00 </p>

                    </div>
                    
                </div>                
                </div-->







