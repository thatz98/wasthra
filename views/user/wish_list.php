<?php require 'views/header.php'; ?>
<?php require 'views/user/add_to_cart_wishlist.php'; ?>

<div class="small-container">
    <h2 class="title">My Wishlist</h2>
    <div class="row">

        <?php if (empty($this->wishlist)) echo 'No items in the wishlist...<br><br><br><br><br><br>';
        foreach ($this->wishlist as $item) {
        ?>
            <div class="col-4">
                <div class="content">
                    <div class="content-overlay"></div>

                    <img src="<?php echo URL . $item['product_images'][0] ?>">


                    <div class="content-details fadeIn-bottom">
                        <div class="options">
                            <div class="text">
                                <a href="<?php echo URL; ?>shop/productDetails/<?php echo $item['product_id'] ?>">View</a><br><br>
                            </div>
                            <a href="<?php echo URL; ?>wishlist/removeFromWishlist/<?php echo $item['product_id'] ?>"><i class="fa fa-2x fa-heart"></i></a><a href="<?php echo '?id=' . $item['product_id'] ?>#addToCartWishlist"><i class="fa fa-2x fa-cart-plus"></i></a>
                        </div>
                    </div>

                    <div>
                        <h4><?php echo $item['product_name']; ?></h4>
                        <div class="ratings">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>LKR <?php echo $item['product_price']; ?></p>

                    </div>



                </div>
            </div>

        <?php } ?>



    </div>



</div>

<?php require 'views/footer.php'; ?>