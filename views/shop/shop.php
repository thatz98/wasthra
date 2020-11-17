<?php require 'views/header.php'; ?>
<?php require 'views/shop/add_to_cart_index.php';?>

<link rel="stylesheet" href="<?php echo URL; ?>public/css/shop-filters.css">
<?php $this->itemCount =count($this->qtyList);
    if(isset($_GET['page'])){
    $this->page=$_GET['page'];
    $this->start = ($this->page-1)*9;
    if($this->itemCount<$this->page*9){
        $this->end = $this->itemCount;
    } else{
        $this->end = $this->page*9;
    }
        
} else{
    $this->page=1;
    $this->start = ($this->page-1)*9;
    $this->end = $this->page*9;
}?>
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
                        <a href="<?php echo URL;?>shop"><h3>Show All Products</h3></a><br>
                    </div>
                    <div class="filter-catergories">
                        <h3>Categories</h3>
                        <div class="filter-category-list">
                        <?php
                    foreach($this->categoryList as $category){?>
                        <label class="size-container">
                        <input type="radio" name="filter-category" <?php if(isset($this->selected) && $this->selected==$category['name']){echo 'checked';}?>>
                            <span class="checkbox" onclick="categoryFilter('<?php echo $category['name'];?>')"><?php echo $category['name']?></span>
                            </label>
                            <?php }?>
                        </div>
                    </div>
                    <div class="filter-sizes">
                    <h3>Sizes</h3>
                        <div class="filter-size-list">
                        <?php $filter_sizes = array();
                    foreach($this->sizeList as $size){
                        if(strpos($size['sizes'],'-G')!=false){
                            $size['sizes']=rtrim($size['sizes'],'-G');
                        } else if(strpos($size['sizes'],'-W')!=false){
                            $size['sizes']=rtrim($size['sizes'],'-W');
                        }
                        
                        if(in_array($size['sizes'],$filter_sizes)){
                            continue;
                        }else{
                            $filter_sizes[] .= $size['sizes'];?>
                        <label class="size-container">
                            <input type="radio" name="filter-size" <?php if(isset($this->selected) && $this->selected==$size['sizes']){echo 'checked';}?>>
                            <span class="checkbox" onclick="sizeFilter('<?php echo $size['sizes'];?>')"><?php echo $size['sizes']?></span>
                            </label>
                            <?php }}?>
                        </div>
                    </div>
                    <div class="filter-colors">
                    <h3>Colors</h3>
                    <div class="filter-color-list">
                    <?php $filter_colors = array();
                    foreach($this->colorList as $color){
                        if(in_array($color['colors'],$filter_colors)){
                            continue;
                        }else{
                            $filter_colors[] .= $color['colors'];?>
                    <label class="color-container">
                        <input type="radio" name="filter-color" <?php if(isset($this->selected) && $this->selected==$color['colors']){echo 'checked';}?>>
                        <span class="checkmark" onclick="colorFilter('<?php echo $color['colors'];?>')" style="background-color:<?php echo $color['colors']?>"></span>
                        </label>
                        <?php }}?>
                    </div>
                    </div>
                </div>
            </div>
            <div class="product-col">
                <div class="row">

                
            <?php if($this->itemCount<=9){
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
                <?php }} else{
                    for($i=$this->start; $i<$this->end;$i++){?>
                        <div class="col-3">
                        <div class="content">
                            <div class="content-overlay"></div>
                        <?php foreach ($this->imageList as $image){
                            if($this->qtyList[$i]['product_id']==$image['product_id']){?>
                                <img src="<?php echo URL.$image['image']?>">
                                <?php break;
                            }
                        }?>
                        <div class="content-details fadeIn-bottom"> 
                            <div class="options">
                                <div class="text">
                                    <a href="<?php echo URL; ?>shop/productDetails/<?php echo $this->qtyList[$i]['product_id']?>">View</a><br><br>
                                </div>
                                    <a href="#"><i class="fa fa-2x fa-heart-o"></i></a><a href="<?php echo '?id='.$this->qtyList[$i]['product_id']?>#addToCartPopupIndex"><i class="fa fa-2x fa-cart-plus"></i></a>
                        </div>
                                </div>
                        <div>
                        <h4><?php echo $this->qtyList[$i]['product_name'];?></h4>
                        <div class="ratings">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star-o"></i>
                        </div>
                        <p>LKR <?php echo $this->qtyList[$i]['product_price'];?></p>
                        </div>
                        
                    </div>
                        
                        
                    </div>
                    <?php }}
                ?>
                </div>    
            
                <div class="row">
            <div class="page-btn">
                <?php $pageCount=intval($this->itemCount/9)+1;
                for($i=1;$i<=$pageCount;$i++){?>
                <a href="?page=<?php echo $i;?>"><span <?php if($this->page==$i){echo 'class="visited"';}?>><?php echo $i?></span></a><?php }?>
                <span>&#8594;</span>
            </div>
        </div>
            </div>
            
            </div>
                

                </div>
<script>
    function colorFilter(color){
        color = color.substring(1);
        location.replace("http://localhost/wasthra/shop/byColor/"+color);
    }

    function sizeFilter(size){
        location.replace("http://localhost/wasthra/shop/bySize/"+size);
    }

    function categoryFilter(category){
        location.replace("http://localhost/wasthra/shop/byCategory/"+category);
    }
</script>
<?php require 'views/footer.php'; ?>