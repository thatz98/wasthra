<?php require 'views/header_index.php'; ?>
<?php require 'views/shop/add_to_cart_index.php'; ?>

<!-------- featered categories -------->
<div class="categories">
    <div class="small-container">
        <div class="row">
            <div class="col-3">
                <div class="content">
                    <a href="<?php echo URL;?>shop/byCategory/Gents">
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
                    <a href="<?php echo URL;?>shop/byCategory/Ladies">
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
                    <a href="<?php echo URL;?>shop/byCategory/Couple">
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
                            <a
                                href="<?php echo URL; ?>shop/productDetails/<?php echo $qty['product_id']?>">View</a><br><br>
                        </div>
                        <a href="<?php echo URL; ?>wishlist/addToWishlist/<?php echo $qty['product_id']?>"><i
                                class="fa fa-2x fa-heart-o"></i></a><a
                            href="<?php echo '?id='.$qty['product_id']?>#addToCartPopupIndex"><i
                                class="fa fa-2x fa-cart-plus"></i></a>
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

<!-------- exclusive offers -------->
<div class="offer-bag"></div>
<div class="offer">
    <div class="small-container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-2">
                <p>Exclusive offer for</p>
                <h1>Couple T-Shirts</h1>
                <small>What is better than a couple in which both the people stay by each other’s side no matter what the scenario is. That is what true love is all about, right? Enjoying their life with them and sharing their happiness when the times are good and becoming their pillar to stand on when they get under the cloud. Wearing these tees will not only show the pure side of your love to the world but will also make you two fall in love a little harder all over again.</small><br>
                <a href="<?php echo URL;?>shop/byCategory/Couple" class="btn">Shop Now &#8594</a>
            </div>
        </div>
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
                            <a
                                href="<?php echo URL; ?>shop/productDetails/<?php echo $qty['product_id']?>">View</a><br><br>
                        </div>
                        <a href="<?php echo URL; ?>wishlist/addToWishlist/<?php echo $qty['product_id']?>"><i
                                class="fa fa-2x fa-heart-o"></i></a><a
                            href="<?php echo '?id='.$qty['product_id']?>#addToCartPopupIndex"><i
                                class="fa fa-2x fa-cart-plus"></i></a>
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
<div class="offer offer-2">
    <div class="small-container">
        <div class="row">
        <div class="col-2"></div>
            <div class="col-2">
                <p>Exclusive offer for</p>
                <h1>Gents' T-Shirts</h1>
                <small>The worst is when men try too hard, because it's not very masculine. Your outfit has to look like 'Oh, I just grabbed that.' Not too calculated. Jeans, a t-shirt: the simpler the better.<br>
                Why are you waiting for checkout our latest gents collection...
                </small><br>
                <a href="<?php echo URL;?>shop/byCategory/Gents" class="btn">Shop Now &#8594</a>
            </div>
            
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo URL ?>public/js/product_gallery.js"></script>
<?php require 'views/footer.php'; ?>