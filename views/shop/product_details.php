<?php require 'views/header.php'; ?>
<?php require 'views/shop/add_to_cart.php';?>
<?php if (isset($_GET['id'])){require 'views/shop/add_to_cart_index.php';}?>

<div class="small-container single-product">
        <div class="row">
            <div class="col-2 right-align-wide">
                <img src="<?php echo URL.$this->product[0]['image']; ?>" id="view-product-img">
                <div class="gallery-row">
                    <?php $single_images = array();
                    $id=0;
                    foreach($this->product as $single){
                        if(in_array($single['image'],$single_images)){
                            continue;
                        }else{
                            $id += 1;
                            $single_images[] .= $single['image'];?>
                            <div class="gallery-col">
                        <img src="<?php echo URL.$single['image']; ?>" id="<?php echo $id?>" onclick="swapViewImage('<?php echo $id?>')" width="100%" class="view-gallery-img">
                    </div>
                            <?php
                        }
                    } ?>
                   
                </div>
            </div>
            <div class="col-2">
                
                <h1><?php echo $this->product[0]['product_name']?></h1>
                <h4>LKR <?php echo $this->product[0]['product_price']?></h4>
                <label class="text-label">Available Colors</label>
                <div class="product-colors">
                    <?php $single_colors = array();
                    foreach($this->product as $single){
                        if(in_array($single['colors'],$single_colors)){
                            continue;
                        }else{
                            $single_colors[] .= $single['colors'];?>
                             <span class="color-dot" style="background-color: <?php echo $single['colors']?>"></span><?php
                        }
                    } ?>
                </div>
                <label class="text-label">Available Sizes</label>
                <div class="product-sizes">
                    <?php $single_sizes = array();
                    foreach($this->product as $single){
                        if(in_array($single['sizes'],$single_sizes)){
                            continue;
                        }else{
                            $single_sizes[] .= $single['sizes'];?>
                             <span class="size-box"><?php echo $single['sizes']?></span><?php
                        }
                    } ?>
</div>

                <a href="#addToCartPopup" class="btn prd-btn">Add to Cart</a>
                <a href="#buyNowPopup" class="btn prd-btn">Buy Now</a>
            <br>
                <h3>Product Details <i class="fa fa-indent"></i></h3>
                <br>
                <p><?php echo $this->product[0]['product_description']?></p>
            
            </div>
        </div>
    </div>

    <div class="small-container">
        <div class="row row-2">
            <h2>Related Products</h2>
            <a href="" class="view-more">View more >></a>
        </div>
    </div>

    <!-------- featered products -------->
        <div class="small-container">
            
           
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
                                <a href="#"><i class="fa fa-2x fa-heart-o"></i></a><a href="<?php echo '?id='.$qty['product_id']?>#addToCartPopupIndex"><i class="fa fa-2x fa-cart-plus"></i></a>
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

            <div class="page-btn">
                <span>1</span>
                <span>2</span>
                <span>3</span>
                <span>4</span>
                <span>&#8594;</span>
            </div>
        </div>

        <script type="text/javascript" src="<?php echo URL ?>public/js/product_gallery.js"></script>
        
        <?php require 'views/footer.php'; ?>