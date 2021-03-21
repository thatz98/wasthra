<?php require 'views/header.php'; ?>
<?php require 'views/shop/add_to_cart_index.php'; ?>

<link rel="stylesheet" href="/wasthra/public/css/shop-filters.css">
<?php $this->itemCount = count($this->products);
if (isset($_GET['page'])) {
    $this->page = $_GET['page'];
    $this->start = ($this->page - 1) * 9;
    if ($this->itemCount < $this->page * 9) {
        $this->end = $this->itemCount;
    } else {
        $this->end = $this->page * 9;
    }
} else {
    $this->page = 1;
    $this->start = ($this->page - 1) * 9;
    $this->end = $this->page * 9;
} ?>
<div class="small-container">

    <div class="row row-2">
        <h2>Shop</h2>
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
            <div class="filter-card" style="box-shadow: 0 0 20px 0 rgba(0,0,0,0.1);padding:30px 10px;margin-top: 10px;width:90%;">
                <div class="clear-filter">
                    <a href="<?php echo URL; ?>shop" class="link">
                        <h3>Show All Products</h3>
                    </a><br>
                </div>
                <div class="filter-catergories">
                    <h3>Categories</h3>
                    <div class="filter-category-list">
                        <?php
                        foreach ($this->categoryList as $category) { ?>
                            <label class="size-container">
                                <input type="radio" name="filter-category" <?php if (isset($this->selected) && $this->selected == $category['name']) {
                                                                                echo 'checked';
                                                                            } ?>>
                                <span class="checkbox" onclick="categoryFilter('<?php echo $category['name']; ?>')"><?php echo $category['name'] ?></span>
                            </label>
                        <?php } ?>
                    </div>
                </div>
                <div class="filter-sizes">
                    <h3>Sizes</h3>
                    <div class="filter-size-list">
                        <?php $filter_sizes = array();
                        foreach ($this->sizeList as $size) {
                            if (strpos($size['size'], '-G') != false) {
                                $size['size'] = rtrim($size['size'], '-G');
                            } else if (strpos($size['size'], '-W') != false) {
                                $size['size'] = rtrim($size['size'], '-W');
                            }

                            if (in_array($size['size'], $filter_sizes)) {
                                continue;
                            } else {
                                $filter_sizes[] .= $size['size']; ?>
                                <label class="size-container">
                                    <input type="radio" name="filter-size" <?php if (isset($this->selected) && $this->selected == $size['size']) {
                                                                                echo 'checked';
                                                                            } ?>>
                                    <span class="checkbox" onclick="sizeFilter('<?php echo $size['size']; ?>')"><?php echo $size['size'] ?></span>
                                </label>
                        <?php }
                        } ?>
                    </div>
                </div>
                <div class="filter-colors">
                    <h3>Colors</h3>
                    <div class="filter-color-list">
                        <?php $filter_colors = array();
                        foreach ($this->colorList as $color) {
                            if (in_array($color['color'], $filter_colors)) {
                                continue;
                            } else {
                                $filter_colors[] .= $color['color']; ?>
                                <label class="color-container">
                                    <input type="radio" name="filter-color" <?php if (isset($this->selected) && $this->selected == $color['color']) {
                                                                                echo 'checked';
                                                                            } ?>>
                                    <span class="checkmark" onclick="colorFilter('<?php echo $color['color']; ?>')" style="background-color:<?php echo $color['color'] ?>"></span>
                                </label>
                        <?php }
                        } ?>
                    </div>
                </div>
                <div class="row">
                <a href="<?php echo URL;?>search/advancedSearch" class="link" >Use multiple filters &#8594</a></div>
            </div>
        </div>
        <div class="product-col">
            <div class="row">


                <?php if ($this->itemCount <= 9) {
                    foreach ($this->products as $product) { ?>
                        <div class="col-3">
                            <div class="content">
                                <div class="content-overlay"></div>
                                <img src="<?php echo URL . $product['product_images'][0]; ?>">
                                <div class="content-details fadeIn-bottom">
                                    <div class="options">
                                        <div class="text">
                                            <a href="<?php echo URL; ?>shop/productDetails/<?php echo $product['product_id'] ?>">View</a><br><br>
                                        </div>
                                        <a href="<?php echo URL; ?>shop/addToWishlist/<?php echo $this->products[$i]['product_id'] ?>"><i class="fa fa-2x fa-heart-o"></i></a><a href="<?php echo '?id=' . $product['product_id'] ?>#addToCartPopupIndex"><i class="fa fa-2x fa-cart-plus"></i></a>
                                    </div>
                                </div>
                                <div>
                                    <h4><?php echo $product['product_name']; ?></h4>
                                    <div class="ratings">
                                        <?php
                                        for ($j = 0; $j < ceil($product['review_rate']); $j++) {
                                            echo '<i class="fa fa-star"></i>';
                                        }
                                        for ($j = 0; $j < (5 - ceil($product['review_rate'])); $j++) {
                                            echo '<i class="fa fa-star-o"></i>';
                                        } ?>
                                    </div>
                                    <p class="price">LKR <?php echo $product['product_price']; ?></p>
                                </div>

                            </div>


                        </div>
                    <?php }
                } else {
                    for ($i = $this->start; $i < $this->end; $i++) { ?>
                        <div class="col-3">
                            <div class="content">
                                <div class="content-overlay"></div>
                                <img src="<?php echo URL . $this->products[$i]['product_images'][0]; ?>">
                                <div class="content-details fadeIn-bottom">
                                    <div class="options">
                                        <div class="text">
                                            <a href="<?php echo URL; ?>shop/productDetails/<?php echo $this->products[$i]['product_id'] ?>">View</a><br><br>
                                        </div>
                                        <a href="<?php echo URL; ?>shop/addToWishlist/<?php echo $this->products[$i]['product_id'] ?>"><i class="fa fa-2x fa-heart-o"></i></a><a href="<?php echo '?id=' . $this->products[$i]['product_id'] ?>#addToCartPopupIndex"><i class="fa fa-2x fa-cart-plus"></i></a>
                                    </div>
                                </div>
                                <div>
                                    <h4><?php echo $this->products[$i]['product_name']; ?></h4>
                                    <div class="ratings">
                                        <?php
                                        for ($j = 0; $j < ceil($this->products[$i]['review_rate']); $j++) {
                                            echo '<i class="fa fa-star"></i>';
                                        }
                                        for ($j = 0; $j < (5 - ceil($this->products[$i]['review_rate'])); $j++) {
                                            echo '<i class="fa fa-star-o"></i>';
                                        } ?>
                                    </div>
                                    <p class="price">LKR <?php echo $this->products[$i]['product_price']; ?></p>
                                </div>

                            </div>


                        </div>
                <?php }
                }
                ?>
            </div>

            <div class="row">
                <div class="page-btn">
                    <?php $pageCount = intval($this->itemCount / 9) + 1;
                    for ($i = 1; $i <= $pageCount; $i++) { ?>
                        <a href="?page=<?php echo $i; ?>"><span <?php if ($this->page == $i) {
                                                                    echo 'class="visited"';
                                                                } ?>><?php echo $i ?></span></a><?php } ?>
                    <span>&#8594;</span>
                </div>
            </div>
        </div>

    </div>


</div>
<script>
    function colorFilter(color) {
        color = color.substring(1);
        location.replace("http://127.0.0.1/wasthra/shop/byColor/" + color);
    }

    function sizeFilter(size) {
        location.replace("http://127.0.0.1/wasthra/shop/bySize/" + size);
    }

    function categoryFilter(category) {
        location.replace("http://127.0.0.1/wasthra/shop/byCategory/" + category);
    }
    
</script>
<script type="text/javascript" src="/wasthra/public/js/product_gallery.js"></script>
<?php require 'views/footer.php'; ?>