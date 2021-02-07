
<?php require 'views/header.php'; ?>

<div class="small-container single-product">
    <div class="row">
        <div class="col-2 right-align-wide">
            <img src="<?php echo URL . $this->product[0]['product_images'][0]; ?>" id="view-product-img">
            <div class="gallery-row">
                <?php
                $id = 0;
                foreach ($this->product[0]['product_images'] as $image) {
                    $id += 1; ?>
                    <div class="gallery-col">
                        <img src="<?php echo URL . $image; ?>" id="<?php echo $id ?>" onclick="swapViewImage('<?php echo $id ?>')" width="100%" class="view-gallery-img">
                    </div>
                <?php
                }
                if ($this->product[0]['name'] == 'Gents') : ?>
                    <div class="gallery-col">
                        <img src="<?php echo URL; ?>public/images/size_charts/gents.png" id="sizeC" onclick="swapViewImage('sizeC')" width="100%" class="view-gallery-img">
                    </div>
                    <?php else : if ($this->product[0]['name'] == 'Ladies') : ?>
                        <div class="gallery-col">
                            <img src="<?php echo URL; ?>public/images/size_charts/ladies.png" id="sizeCL" onclick="swapViewImage('sizeCL')" width="100%" class="view-gallery-img">
                        </div>
                    <?php else : ?>
                        <div class="gallery-col">
                            <img src="<?php echo URL; ?>public/images/size_charts/gents.png" id="sizeC" onclick="swapViewImage('sizeC')" width="100%" class="view-gallery-img">
                        </div>
                        <div class="gallery-col">
                            <img src="<?php echo URL; ?>public/images/size_charts/ladies.png" id="sizeCL" onclick="swapViewImage('sizeCL')" width="100%" class="view-gallery-img">
                        </div>
                <?php endif;
                endif; ?>
            </div>
        </div>
        <div class="col-2">
            <h2><?php echo $this->product[0]['product_id'] . ' - ' . $this->product[0]['product_name'] ?></h2>
            <h4>LKR <?php echo $this->product[0]['product_price'] ?></h4>
            <div class="product-tags">
                <?php if ($this->product[0]['is_published'] == "yes") {
                    echo '<div class="product-tag"><p>published</p></div>';
                }
                if ($this->product[0]['is_new'] == "yes") {
                    echo '<div class="product-tag"><p>new</p></div>';
                }
                if ($this->product[0]['is_featured'] == "yes") {
                    echo '<div class="product-tag"><p>featured</p></div>';
                }
                ?>
            </div>

            <label class="text-label bold">Available Colors</label>
            <div class="product-colors">
                <?php 
                if(empty($this->product[0]['product_colors'][0])){ ?>
                    <label class="text-label">No varients to display</label><br>
               <?php } else{
                foreach ($this->product[0]['product_colors'] as $color) { ?>
                    <span class="color-dot" style="background-color: <?php echo $color ?>"></span><?php
                                                                                                } }?>
            </div>
            <label class="text-label bold">Available Sizes</label>
            <div class="product-sizes">
                <?php
                $catName = $this->product[0]['name'];
                $single_sizes = array();
                $single_sizes_gents = array('XS-G', 'S-G', 'M-G', 'L-G', 'XL-G');
                $single_sizes_ladies = array('XS-W', 'S-W', 'M-W', 'L-W', 'XL-W');
                if(empty($this->product[0]['product_sizes'][0])){ ?>
                    <label class="text-label">No varients to display</label><br>
               <?php } else if ($catName != "Couple") {

                    foreach ($this->product[0]['product_sizes'] as $size) { ?>
                        <span class="size-box"><?php echo $size ?></span><?php
                                                                        }
                                                                    } else { ?>
                    <label class="text-label">Gents</label><br>
                    <?php
                                                                        foreach ($this->product[0]['product_sizes'] as $size) {
                                                                            if (in_array($size, $single_sizes_gents)) {
                                                                                continue;
                                                                            } else {
                                                                                $single_sizes_gents[] .= $size;
                    ?>
                            <span class="size-box" style="margin-top: 7px; margin-bottom: 8px;"><?php echo rtrim($size, "-W") ?></span><?php
                                                                                                                                    }
                                                                                                                                }
                                                                                                                                        ?>
                    <br>
                    <label class="text-label">Ladies</label>
                    <br>
                    <?php
                                                                        foreach ($this->product[0]['product_sizes'] as $size) {
                                                                            if (in_array($size, $single_sizes_ladies)) {
                                                                                continue;
                                                                            } else {
                                                                                $single_sizes_ladies[] .= $size;
                    ?>
                            <span class="size-box" style="margin-top: 7px;"><?php echo rtrim($size, "-G") ?></span><?php
                                                                                                                }
                                                                                                            }
                                                                                                        }
                                                                                                                    ?>
            </div>

            <label class="text-label bold">Total Product Quantity</label>
            <br>
            <?php
            if(empty($this->product[0]['qty'])){ ?><br>
                    <label class="text-label">No varients added</label><br>
               <?php } else{?>
            <p class="text-value"><?php echo $this->product[0]['qty'] ?></p>
            <?php }?>
            <br>
            <label class="text-label bold">Product Description</label>
            <br>
            <p class="text-value"><?php echo $this->product[0]['product_description'] ?></p>
            <br>
            <a href="<?php echo URL ?>products/edit/<?php echo $this->product[0]['product_id'] ?>" class="btn btn-blue">Edit</a>
            <a href="#buyNowPopup" class="btn btn-red">Delete</a>
            <br>
        </div>


    </div>
</div>

<div class="small-container">
    <div class="row-left row-2">
        <h2>Varients</h2>
    </div>
    <div class="">
        <button class="btn btn-square" onclick="formToggle()">+ Add New Varient</button>
        <form action="<?php echo URL; ?>products/addVarient" id="addFrom" class="hidden-form" enctype="multipart/form-data" method="post">

            <div class="row-top">
                <input type="text" id="product_id" name="product_id" hidden>
                <div class="col-3">
                    <div class="helper-text">
                        <label>Color</label><br>
                        <input id="color" type="text" name="color" placeholder="#12ab87" data-helper="Colors" onfocusout="validateColors()">
                        <span class="popuptext"></span>
                        <br>

                    </div>


                </div>
                <div class="col-3">
<?php if($this->product[0]['name']=='Couple'){
    ?>
                    <div class="helper-text">
                        <label>Size for Couple</label><br><select id="size-couple" name="size-couple">
                            <option value="0">Select</option>
                            <option value="XS-G">Gents-XS</option>
                            <option value="S-G">Gents-S</option>
                            <option value="M-G">Gents-M</option>
                            <option value="L-G">Gents-L</option>
                            <option value="XL-G">Gents-XL</option>
                            <option value="XXL-G">Gents-XXL</option>
                            <option value="XS-W">Ladies-XS</option>
                            <option value="S-W">Ladies-S</option>
                            <option value="M-W">Ladies-M</option>
                            <option value="L-W">Ladies-L</option>
                            <option value="XL-W">Ladies-XL</option>
                            <option value="XXL-W">Ladies-XXL</option>
                        </select>
                        <span class="popuptext"></span>
                        <br>

                    </div>
                    <!-- <div class="helper-text">
                        <label>Size for Ladies</label><br><select id="size-l" name="size-l">
                            <option value="0">Select</option>

                        </select>
                        <span class="popuptext"></span>
                        <br>

                    </div>--> <?php } else{ 
                        ?>
                        <div class="helper-text">
                        <label>Size</label><br><select id="size" name="size">
                            <option value="0">Select</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                        </select>
                        <span class="popuptext"></span>
                        <br>

                    </div>
                    <?php
                    }
?>
                </div>
                
                <div class="col-3">
                    <div class="helper-text">
                        <label>Quantity</label><br><input id="quantity" type="text" name="quantity" data-helper="Quantity" onfocusout="validateQuantity()">
                        <input name="product_id" value="<?php echo $this->product[0]['product_id'];?>" hidden>
                        <span class="popuptext"></span>
                        <br>
                    </div>
                </div>
            </div>

            <div class="center-btn">
                <button type="submit" class="btn">Add New Varient</button>
            </div>
        </form>
    </div>
    <div class="table-container">
        <table>
            <tr>
                <th>Color</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Options</th>

            </tr>
            <?php foreach ($this->varients as $product_varient) : ?>
                <tr>
                    <td><?php echo $product_varient['color']; ?></td>
                    <td><?php echo $product_varient['size']; ?></td>
                    <td><?php echo $product_varient['qty']; ?></td>
                    <td><a href="<?php echo URL ?>ProductCategories/edit/<?php echo $product_category['category_id'] ?>"><button class="table-btn btn-blue">Edit</button></a>
                        <a href="<?php echo URL ?>ProductCategories/delete/<?php echo $product_category['category_id'] ?>"><button class="table-btn btn-red">Delete</button></a>
                    </td>

                </tr>

            <?php endforeach; ?>




        </table>
    </div>
</div>

<!-------- product reviews -------->



<div class="small-container">
    <div class="row-left row-2">
        <h2>Reviews</h2>
    </div>

    <div class="row-left">


        <?php foreach ($this->reviews as $review) : ?>
            <div class="col-2" style="min-height: 100px;">
                <div class="product-review">
                    <div class="row-left">
                        <div class="col-2">
                            <div class="row-left">
                                <?php echo $review['first_name']; ?> <?php echo $review['last_name']; ?>
                                &nbsp&nbsp
                                <?php if ($review['user_id'] == Session::get('userId') || Session::get('userType') == 'admin' || Session::get('userType') == 'owner') { ?><small><a href="<?php echo URL . 'shop/deleteReview/' . $showreviews['review_id'] . '/' . $showreviews['product_id'] ?>">Remove</a></small><?php } ?>
                            </div>
                            <div class="row-left">
                                <small><?php echo $review['date']; ?> &nbsp&nbsp
                                    <?php echo $review['time']; ?></small>
                            </div>
                            <div class="row-left">
                                <?php for ($i = 0; $i < $review['rate']; $i++) { ?>
                                    <i class="fa fa-star"></i>
                                <?php } ?>
                                <?php for ($i = 0; $i < (5 - $review['rate']); $i++) { ?>
                                    <i class="fa fa-star-o"></i>
                                <?php } ?>
                            </div>

                            <div class="row-left">
                                <p><?php echo $review['review_text']; ?></p>
                            </div>
                        </div>
                        <div class="col-2" <?php if (empty($review['review_images'])) echo 'hidden'; ?>>
                            <div class="row-left">
                                <div class="col-images">
                                    <?php foreach ($review['review_images']  as $image) { ?>
                                        <img src="<?php echo URL . $image  ?>">
                                    <?php } ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

    </div>
</div>

<script type="text/javascript" src="<?php echo URL ?>public/js/product_gallery.js"></script>
<script>
    //  var addFrom = document.getElementByClassName("dash-form-container");
    var addFrom = document.getElementById("addFrom");
    addFrom.style.maxHeight = "0px";
    addFrom.style.overflow = "0px";

    function formToggle() {
        if (addFrom.style.maxHeight == "0px") {
            addFrom.style.maxHeight = "none";
        } else {
            addFrom.style.maxHeight = "0px";
        }
    }
</script>
<?php require 'views/footer.php'; ?>