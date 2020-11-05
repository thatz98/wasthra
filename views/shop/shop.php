<?php require 'views/header.php'; ?>
<?php require 'views/shop/add_to_cart.php';?>
<link rel="stylesheet" href="<?php echo URL; ?>public/css/shop-filters.css">
<!-------- featered products -------->
        <div class="small-container">
            
            <div class="row row-2">
                <h2>All Products</h2>
                <select>
                    <option>Default Sorting</option>
                    <option>Sort by price</option>
                    <option>Sort by popularity</option>
                    <option>Sort by rating</option>
                    <option>Sort by sale</option>
                </select>
            </div>
            
            <div class="row-top">
            <div class="filter-col">
                <div class="filter-card">
                    <div class="filter-catergories">
                        <h3>Categories</h3>
                        <div class="filter-category-list">
                        <label class="size-container">
                        <input type="radio" name="filter-category">
                            <span class="checkbox">Gents</span>
                            </label>
                            
                        </div>
                    </div>
                    <div class="filter-sizes">
                    <h3>Sizes</h3>
                        <div class="filter-size-list">
                        <label class="size-container">
                            <input type="radio" name="filter-size">
                            <span class="checkbox">Small</span>
                            </label>
                            <label class="size-container">
                            <input type="radio" name="filter-size">
                            <span class="checkbox">Large</span>
                            </label>
                            <label class="size-container">
                            <input type="radio" name="filter-size">
                            <span class="checkbox">Medium</span>
                            </label>
                        </div>
                    </div>
                    <div class="filter-colors">
                    <h3>Colors</h3>
                    <div class="filter-color-list">
                    <label class="color-container">
                        <input type="radio" name="filter-color">
                        <a href="#"><span class="checkmark" style="background-color:#ff5647"></span></a>
                        </label>
                        <label class="color-container">
                        <input type="radio" name="filter-color">
                        <a href="#"><span class="checkmark" style="background-color:#facb47"></span></a>
                        </label>
                    </div>
                    </div>
                </div>
            </div>
            <div class="product-col">
                <div class="row">

                
            <?php
                foreach($this->qtyList as $qty){?>
                    <div class="col-3">
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
                <?php }?>
                </div>    
            </div>
            </div>
                
<div class="row">
            <div class="page-btn">
                <span>1</span>
                <span>2</span>
                <span>3</span>
                <span>4</span>
                <span>&#8594;</span>
            </div>
        </div>

<?php require 'views/footer.php'; ?>