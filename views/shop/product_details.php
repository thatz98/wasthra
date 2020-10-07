<?php require 'views/header.php'; ?>

<div class="small-container single-product">
            <div class="breadcum">
                <p>Home / T-Shirt</p>
            </div>
        <div class="row">
            <div class="col-2">
                <img src="<?php echo URL; ?>public/images/gallery-1.jpg" width="100%" id="product-img">
                <div class="gallery-row">
                    <div class="gallery-col">
                        <img src="<?php echo URL; ?>public/images/gallery-1.jpg" width="100%" class="gallery-img">
                    </div>
                    <div class="gallery-col">
                        <img src="<?php echo URL; ?>public/images/gallery-2.jpg" width="100%" class="gallery-img">
                    </div>
                    <div class="gallery-col">
                        <img src="<?php echo URL; ?>public/images/gallery-3.jpg" width="100%" class="gallery-img">
                    </div>
                    <div class="gallery-col">
                        <img src="<?php echo URL; ?>public/images/gallery-4.jpg" width="100%" class="gallery-img">
                    </div>
                </div>
            </div>
            <div class="col-2">
                
                <h1>Red Printed T-Shirt by HRX </h1>
                <h4>LKR 800.00</h4>
                <select>
                    <option>Select Size</option>
                    <option>S</option>
                    <option>M</option>
                    <option>L</option>
                    <option>XL</option>
                </select>
                <input type="number" value="1">
                <a href="" class="btn">Add to Cart</a>
                <h3>Product Details <i class="fa fa-indent"></i></h3>
                <br>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Vero eius nam minus culpa ipsa saepe facere, explicabo a! Repellat velit provident porro quis. Voluptate ea cupiditate perspiciatis provident officia ullam.</p>
            
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
                <div class="col-4">
                    <img src="<?php echo URL; ?>public/images/product-9.jpg">
                    <h4>Product 1</h4>
                    <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p>LKR 800.00</p>
                </div>
                <div class="col-4">
                    <img src="<?php echo URL; ?>public/images/product-10.jpg">
                    <h4>Product 1</h4>
                    <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p>LKR 800.00</p>
                </div>
                <div class="col-4">
                    <img src="<?php echo URL; ?>public/images/product-11.jpg">
                    <h4>Product 1</h4>
                    <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p>LKR 800.00</p>
                </div>
                <div class="col-4">
                    <img src="<?php echo URL; ?>public/images/product-12.jpg">
                    <h4>Product 1</h4>
                    <div class="ratings">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <p>LKR 800.00</p>
                </div>
            </div>

            <div class="page-btn">
                <span>1</span>
                <span>2</span>
                <span>3</span>
                <span>4</span>
                <span>&#8594;</span>
            </div>
        </div>


        <?php require '<?php echo URL; ?>public/js/product_gallery.js'; ?>
        <?php require 'views/footer.php'; ?>