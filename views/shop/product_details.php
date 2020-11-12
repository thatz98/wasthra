<?php require 'views/header.php'; ?>
<?php require 'views/shop/add_to_cart.php';?>
<?php require 'views/shop/add_review.php';?>
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
                    <img src="<?php echo URL.$single['image']; ?>" id="<?php echo $id?>"
                        onclick="swapViewImage('<?php echo $id?>')" width="100%" class="view-gallery-img">
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
                <?php 
                    $catName = $this->product[0][1];
                    $single_sizes = array();
                    $single_sizes_gents = array('XS-G','S-G','M-G','L-G','XL-G');
                    $single_sizes_ladies = array('XS-W','S-W','M-W','L-W','XL-W');
                    if($catName!="Couple"){
                    
                    foreach($this->product as $single){
                        if(in_array($single['sizes'],$single_sizes)){
                            continue;
                        }else{
                            $single_sizes[] .= $single['sizes'];?>
                <span class="size-box"><?php echo $single['sizes']?></span><?php
                        }
                    } 
                    }
                    else{?>
                    <label class="text-label">Gents</label><br>
                        <?php  
                        foreach($this->product as $single){
                            //echo $single['sizes'][0];
                            if(in_array($single['sizes'],$single_sizes_ladies)){
                                continue;
                            }else{
                                $single_sizes_ladies[] .= $single['sizes'];?>
                    <span class="size-box" style="margin-top: 7px; margin-bottom: 8px;"><?php echo rtrim($single['sizes'],"-G")?></span><?php
                            }
                        }?>
                        <br>
                        <label class="text-label">Ladies</label>
                        <br>
                        <?php
                        foreach($this->product as $single){
                            //echo $single['sizes'][0];
                            if(in_array($single['sizes'],$single_sizes_gents)){
                                continue;
                            }else{
                                $single_sizes_gents[] .= $single['sizes'];?>
                    <span class="size-box" style="margin-top: 7px;"><?php echo rtrim($single['sizes'],"-W")?></span><?php
                            }

                    }
                }
                ?>
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


<!-------- product reviews -------->

    

    <div class="small-container">
        <div class="row-left row-2">
        <h2>Reviews</h2>
        <a href="#addReview" class="btn" style="float: right;">+ Add Review</a>
    </div>
        <div class="row row-2">


    <?php foreach ($this->reviews as $showreviews):?>
<div class="small-container product-review">

    
    <div class="row-left">
        <div class="col">
            <div class="row-left">
                 <?php echo $showreviews['first_name']; ?> <?php echo $showreviews['last_name']; ?>
                
                      
                   
            </div>
            <div class="row-left">
                <small><?php echo $showreviews['date']; ?> &nbsp&nbsp <?php echo $showreviews['time']; ?></small>
            </div>
            <div class="row-left">
            <?php for ($i=0; $i <$showreviews['rate'] ; $i++) {?>
                <i class="fa fa-star"></i>
            <?php } ?>
            <?php for ($i=0; $i <(5-$showreviews['rate']) ; $i++) {?>
                <i class="fa fa-star-o"></i>
            <?php } ?>
            
            <!-- <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-o"></i> -->
            </div>
        </div>
    </div>
    
    <div class="row-left">
        <div class="col-images">
           <?php foreach ($this->reviewImageList  as $images){
           if($showreviews['review_id']==$images['review_id'])
           { ?>



            <img src="<?php  echo URL.$images['image']  ?>">
            <?php }
        }?>

        </div>
    </div>
    <div class="row-left">
                    <p><?php echo $showreviews['review_text']; ?></p>
    </div>
</div>
<?php endforeach;?>
        </div>
    </div>
<!-------- related products -------->

<div class="small-container">
    <div class="row row-2">
        <h2>Related Products</h2>
    </div>
</div>


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
                            <a
                                href="<?php echo URL; ?>shop/productDetails/<?php echo $qty['product_id']?>">View</a><br><br>
                        </div>
                        <a href="#"><i class="fa fa-2x fa-heart-o"></i></a><a
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

<script type="text/javascript" src="<?php echo URL ?>public/js/product_gallery.js"></script>

<?php require 'views/footer.php'; ?>