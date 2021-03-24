
<?php require 'views/header.php'; ?>
<?php require 'views/shop/add_to_cart_index.php'; ?>

<link rel="stylesheet" href="/wasthra/public/css/shop-filters.css">
<?php $this->itemCount = count($this->products);
$this->url = "?";
if (isset($this->selectedCategory)){
    $this->url .= "search_category=".$this->selectedCategory."&";
}
if (isset($this->selectedColor)){
    $this->url .= "search_color=".$this->selectedColor."&";
}
if (isset($this->selectedSize)){
    $this->url .= "search_size=".$this->selectedSize."&";
}
if (isset($this->selectedKeyword)){
    $this->url .= "keyword=".$this->selectedKeyword."&";
}

$this->url = rtrim($this->url,'&');

if (isset($_GET['page'])) {
    $this->page = $_GET['page'];
    $this->start = ($this->page - 1) * 8;
    if ($this->itemCount < $this->page * 8) {
        $this->end = $this->itemCount;
    } else {
        $this->end = $this->page * 8;
    }
} else {
    $this->page = 1;
    $this->start = ($this->page - 1) * 8;
    $this->end = $this->page * 8;
} ?>
<div class="small-container">

    <!---  <div class="row row-2">
                <h2>Shop</h2>
                <select>
                    <option>Default Sorting</option>
                    <option>Sort by price</option>
                    <option>Sort by popularity</option>
                    <option>Sort by rating</option>
                    <option>Sort by sale</option>
                </select>
            </div> ----->

    <div class="filter-card box-container" style="margin-top: 40px;">
        <form action="<?php echo URL; ?>search/byMultiFilter" method="get" id="searchFilterForm">
            <div class="row-top">
                <div class="col-3">
                    <div class="filter-catergories">
                        <h4>Select Category</h4>
                        <div class="filter-category-list">
                            <?php
                            foreach ($this->categoryList as $category) { ?>
                                <label class="size-container">
                                    <input type="radio" name="search_category" value="<?php echo $category['name']; ?>" <?php if (isset($this->selectedCategory) && $this->selectedCategory == $category['name']) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                                    <span class="checkbox"><?php echo $category['name'] ?></span>
                                </label>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="filter-sizes">
                        <h4>Select Size</h4>
                        <div class="filter-size-list">
                            <?php $filter_sizes = array();
                            foreach ($this->sizeList as $size) {
                                if (strpos($size['sizes'], '-G') != false) {
                                    $size['sizes'] = rtrim($size['sizes'], '-G');
                                } else if (strpos($size['sizes'], '-W') != false) {
                                    $size['sizes'] = rtrim($size['sizes'], '-W');
                                }

                                if (in_array($size['sizes'], $filter_sizes)) {
                                    continue;
                                } else {
                                    $filter_sizes[] .= $size['sizes']; ?>
                                    <label class="size-container">
                                        <input type="radio" name="search_size" value="<?php echo $size['sizes']; ?>" <?php if (isset($this->selectedSize) && $this->selectedSize == $size['sizes']) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                                        <span class="checkbox"><?php echo $size['sizes'] ?></span>
                                    </label>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="filter-colors">
                        <h4>Select Color</h4>
                        <div class="filter-color-list">
                            <?php $filter_colors = array();
                            foreach ($this->colorList as $color) {
                                if (in_array($color['colors'], $filter_colors)) {
                                    continue;
                                } else {
                                    $filter_colors[] .= $color['colors']; ?>
                                    <label class="color-container">
                                        <input type="radio" name="search_color" value="<?php echo $color['colors'] ?>" <?php if (isset($this->selectedColor) && $this->selectedColor == $color['colors']) {
                                                                                                                            echo 'checked';
                                                                                                                        } ?>>
                                        <span class="checkmark" style="background-color:<?php echo $color['colors'] ?>"></span>
                                    </label>
                            <?php }
                            } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <span class="search-reset" onclick="$('input[name=search_color]').attr('checked',false);$('input[name=search_category]').attr('checked',false);$('input[name=search_size]').attr('checked',false);">Clear Search Filters</span>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <h4>Enter Keyword</h4><input type="search" name="keyword" value="<?php if (isset($this->selectedKeyword)) {
                                                                                            echo $this->selectedKeyword;
                                                                                        } ?>">
                </div>
            </div>
            <div class="row" style="margin-bottom: 10px;">
                <button type="submit" class="btn"><i class="fa fa-search"></i> Search</button>
            </div>
        </form>
    </div>



    <div class="row" style="margin: 30px 0 15px 0;">
        <?php if (!empty($this->products)) { ?>
            <h4><?php echo count($this->products); ?> results were found based on your search...</h4> <?php } else { ?>
            <h4>No results were found based on your search...</h4> <?php } ?>
    </div>

    <div class="row">



<?php if ($this->itemCount <= 8) {
    foreach ($this->products as $product) { ?>
        <div class="col-4">
            <div class="content">
                <div class="content-overlay"></div>
                <img src="<?php echo URL . $product['product_images'][0]; ?>">
                <?php if ($product['qty'] == 0) { ?>
                                    <img class="out-of-stock" src="/wasthra/public/images/outstock.png">
                                <?php } ?>
                <div class="content-details fadeIn-bottom">
                    <div class="options">
                        <div class="text">
                            <a href="<?php echo URL; ?>shop/productDetails/<?php echo $product['product_id'] ?>">View</a><br><br>
                        </div>
                        <a href="#"><i class="fa fa-2x fa-heart-o"></i></a><a href="<?php echo '?id=' . $product['product_id'] ?>#addToCartPopupIndex"><i class="fa fa-2x fa-cart-plus"></i></a>
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
        <div class="col-4">
            <div class="content">
                <div class="content-overlay"></div>
                <img src="<?php echo URL . $this->products[$i]['product_images'][0]; ?>">
                <?php if ($product['qty'] == 0) { ?>
                                    <img class="out-of-stock" src="/wasthra/public/images/outstock.png">
                                <?php } ?>
                <div class="content-details fadeIn-bottom">
                    <div class="options">
                        <div class="text">
                            <a href="<?php echo URL; ?>shop/productDetails/<?php echo $this->products[$i]['product_id'] ?>">View</a><br><br>
                        </div>
                        <a href="#"><i class="fa fa-2x fa-heart-o"></i></a><a href="<?php echo '?id=' . $this->products[$i]['product_id'] ?>#addToCartPopupIndex"><i class="fa fa-2x fa-cart-plus"></i></a>
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
            <?php $pageCount = intval($this->itemCount / 8) + 1;
            for ($i = 1; $i <= $pageCount; $i++) { ?>
                <a href="<?php echo $this->url; ?>&page=<?php echo $i; ?>"><span <?php if ($this->page == $i) {
                                                            echo 'class="visited"';
                                                        } ?>><?php echo $i ?></span></a><?php } ?>
            <span>&#8594;</span>
        </div>
    </div>
</div>




</div>

<?php require 'views/footer.php'; ?>