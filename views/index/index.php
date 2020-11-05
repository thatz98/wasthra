<?php require 'views/header_index.php'; ?>


<?php require 'views/shop/add_to_cart_index.php'; ?>

<!-------- featered categories -------->
    <div class="categories">
        <div class="small-container">
            <div class="row">
                <div class="col-3">
                    <div class="content">
                        <a href="">
                            <div class="content-overlay"></div>
                            
                            <img class="content-image" src="<?php echo URL; ?>public/images/category-1.jpg">
                            <div class="content-details fadeIn-bottom">
                                <p>Gents</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="content">
                        <a href="">
                            <div class="content-overlay"></div>
                
                            <img class="content-image" src="<?php echo URL; ?>public/images/category-3.jpg">
                            <div class="content-details fadeIn-bottom">
                                <p>Ladies</p>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-3">
                    <div class="content">
                        <a href="">
                            <div class="content-overlay"></div>
                            
                            <img class="content-image" src="<?php echo URL; ?>public/images/category-2.jpg">
                            <div class="content-details fadeIn-bottom">
                                <p>Couples</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-------- featered products -------->
        <div class="small-container">
            <h2 class="title">Featured Products</h2>
            <div class="row">
                <?php $featured_count=0;
                foreach($this->qtyList as $qty){
                    if($qty['is_featured']=='yes'){
                        $featured_count++;?>
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
                                <a href="#"><i class="fa fa-2x fa-heart-o"></i></a><a href="<?php echo '?id='.$qty['product_id']?>#addToCartPopup"><i class="fa fa-2x fa-cart-plus"></i></a>
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
                if($featured_count>=4){
                    break;
                }} ?>
                
            </div>
        </div>

        <!-------- latest products -------->
        <div class="small-container">
            <h2 class="title">Latest Products</h2>
            <div class="row">
                <?php $new_count=0;
                foreach($this->qtyList as $qty){
                    if($qty['is_new']=='yes'){
                        $new_count++;?>
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
                                <a href="#"><i class="fa fa-2x fa-heart-o"></i></a><a href="#"><i class="fa fa-2x fa-cart-plus"></i></a>
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
                if($new_count>=8){
                    break;
                }} ?>
                
            </div>
        </div>

        <!-------- exclusive offers -------->
        <div class="offer-bag"></div>
        <div class="offer">
            <div class="small-container">
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-2">
                        <p>Exclusive offer for</p>
                        <h1>White & Black Couple T-Shirts</h1>
                        <small>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae amet voluptate error sit ea obcaecati illo corrupti deserunt, fugiat atque dolor molestias? Magni corporis consectetur ad aut voluptatum vitae nihil!</small><br>
                        <a href="" class="btn">Buy Now &#8594</a>
                    </div>
                </div>
            </div>
        </div>

        <!-------- customer comments -------->
        <div class="comments">
            <div class="small-container">
                <div class="row">
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque debitis a quibusdam consequatur quidem nisi ea distinctio non dolore suscipit voluptate, nesciunt, nobis ipsa, consectetur assumenda asperiores quam. Quisquam, cumque.</p>
                        <div class="ratings">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <img src="<?php echo URL; ?>public/images/user-1.png">
                        <h3>First Last</h3>
                    </div>
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque debitis a quibusdam consequatur quidem nisi ea distinctio non dolore suscipit voluptate, nesciunt, nobis ipsa, consectetur assumenda asperiores quam. Quisquam, cumque.</p>
                        <div class="ratings">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <img src="<?php echo URL; ?>public/images/user-2.png">
                        <h3>First Last</h3>
                    </div>
                    <div class="col-3">
                        <i class="fa fa-quote-left"></i>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque debitis a quibusdam consequatur quidem nisi ea distinctio non dolore suscipit voluptate, nesciunt, nobis ipsa, consectetur assumenda asperiores quam. Quisquam, cumque.</p>
                        <div class="ratings">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <img src="<?php echo URL; ?>public/images/user-3.png">
                        <h3>First Last</h3>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="<?php echo URL ?>public/js/product_gallery.js"></script>
<?php require 'views/footer.php'; ?>