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
<form action="<?php echo URL;?>search/byMultiFilter" method="post">
                <div class="row-top">
                <div class="col-3">
                    <div class="filter-catergories">
                        <h4>Select Category</h4>
                        <div class="filter-category-list">
                        <?php
                    foreach($this->categoryList as $category){?>
                        <label class="size-container">
                        <input type="radio" name="search_category" value="<?php echo $category['name'];?>" <?php if(isset($this->selectedCategory) && $this->selectedCategory==$category['name']){echo 'checked';}?>>
                            <span class="checkbox" ><?php echo $category['name']?></span>
                            </label>
                            <?php }?>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="filter-sizes">
                    <h4>Select Size</h4>
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
                            <input type="radio" name="search_size" value="<?php echo $size['sizes'];?>" <?php if(isset($this->selectedSize) && $this->selectedSize==$size['sizes']){echo 'checked';}?>>
                            <span class="checkbox"><?php echo $size['sizes']?></span>
                            </label>
                            <?php }}?>
                        </div>
                    </div>
                </div>
                    <div class="col-3">
                    <div class="filter-colors">
                    <h4>Select Color</h4>
                    <div class="filter-color-list">
                    <?php $filter_colors = array();
                    foreach($this->colorList as $color){
                        if(in_array($color['colors'],$filter_colors)){
                            continue;
                        }else{
                            $filter_colors[] .= $color['colors'];?>
                    <label class="color-container">
                        <input type="radio" name="search_color" value="<?php echo $color['colors']?>" <?php if(isset($this->selectedColor) && $this->selectedColor==$color['colors']){echo 'checked';}?>>
                        <span class="checkmark" style="background-color:<?php echo $color['colors']?>"></span>
                        </label>
                        <?php }}?>
                    </div>
                    </div>
                    </div>
                </div>
                <div class="row">
    <div class="col-2">
    <h4>Enter Keyword</h4><input type="search" name="keyword" value="<?php if(isset($this->selectedKeyword)){ echo $this->selectedKeyword;}?>">
    </div>
</div>
<div class="row" style="margin-bottom: 10px;">
    <button type="submit" class="btn"><i class="fa fa-search"></i> Search</button>
</div>
                </form>
            </div>



            <div class="row" style="margin: 30px 0 15px 0;">
                <?php if(!empty($this->qtyList)){?>
                <h4><?php echo count($this->qtyList);?> results were found based on your search...</h4> <?php }
                else{?>
                <h4>No results were found based on your search...</h4> <?php }?>
            </div>
            
                <div class="row">

                
            <?php if($this->itemCount<=9){
                foreach($this->qtyList as $qty){?>
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
                    <div class="item-details">
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
                        <div class="col-4">
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
                        <div class="item-details">
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
            <div class="page-btn" <?=empty($this->qtyList)?'hidden':'';?>>
                <?php $pageCount=intval($this->itemCount/9)+1;
                for($i=1;$i<=$pageCount;$i++){?>
                <a href="?page=<?php echo $i;?>"><span <?php if($this->page==$i){echo 'class="visited"';}?>><?php echo $i?></span></a><?php }?>
                <span>&#8594;</span>
            </div>
        </div>
            </div>
            
           
                

                </div>

<?php require 'views/footer.php'; ?>