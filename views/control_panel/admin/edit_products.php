<?php require 'views/header_dashboard.php'; ?>


<div class="row">
    <h2 class="title title-min">Edit Products</h2>
</div>
<div class="center-content">
    <div class="form-container" style="width:900px;">

        <form action="<?php echo URL; ?>products/editSave/<?php echo $this->product[0]['product_id'] ?>" enctype="multipart/form-data" id="editFrom" method="post">


            <div class="center-btn">
                <label allign="center">Product images : </label>
                <!-- <button type="file" class="btn">Add New image</button> -->
                <input type="file" accept="image/*" name="img[]" multiple><br>
            </div>

            <div class="center-content">
                <?php $this->oldImageList = '';

                foreach ($this->imageList as $image) {
                    if ($this->product[0]['product_id'] == $image['product_id']) { ?>
                        <div class="edit-image-row" id="<?php echo $image['image'] ?>">
                            <a style="float:right;" class="close-btn" onclick="deleteImage('<?php echo $image['image'] ?>')"><i class="fa fa-times-circle"></i></a>
                            <img style="float:left;" src="../../<?php echo $image['image'] ?>" width="100px" height="100px"><br>

                        </div>
                <?php
                        $this->oldImageList .= $image['image'] . ',';
                    }
                } ?>

                <input id="prev_images" type="text" name="prev_images" value="<?php echo $this->oldImageList ?>" style="display:none">
            </div>

            <div class="row">
                <div class="col-3">
                    <input type="text" name="prev_id" value="<?php echo $this->product[0]['product_id'] ?>" style="display:none">
                    <div class="helper-text">
                        <label>Product ID</label><br>
                        <input type="text" id="product_id" name="product_id" value="<?php echo $this->product[0]['product_id'] ?>" placeholder="PRDXXXX" data-helper="Product ID" onfocusout="validateProductId()">
                        <span class="popuptext"></span>
                        <br>

                    </div>
                </div>
                <div class="col-3">
                    <div class="helper-text">
                        <label>Product Name</label><br>
                        <input type="text" id="product_name" name="product_name" value="<?php echo $this->product[0]['product_name'] ?>" data-helper="Product Name" onfocusout="validateproductName()">
                        <span class="popuptext"></span>
                        <br>
                    </div>
                </div>
                <div class="col-3">
                    <div class="helper-text">
                        <label>Product Category</label><br><select id="category" name="category" >
                            <?php foreach ($this->product_category as $category) : ?><option value="<?php echo $category['name']; ?>" <?php if ($this->product[0]['name'] == $category['name']) {
                                                                                                                                            echo "selected=\"selected\"";
                                                                                                                                            //$this->selectedCat = $category['name'];
                                                                                                                                        } ?>>
                                    <?php echo $category['name']; ?></option> <?php endforeach; ?>

                        </select>
                        <span class="popuptext"></span>
                        <br>
                    </div>
                </div>
            </div>
            <div class="row-top">
                <div class="col-3">
                    <label>Published</label><br><select id="is_published" name="is_published">
                        <option value="yes" <?php if ($this->product[0]['is_published'] == 'yes') echo "selected=\"selected\""; ?>>YES</option>
                        <option value="no" <?php if ($this->product[0]['is_published'] == 'no') echo "selected=\"selected\""; ?>>NO</option>
                    </select><br>
                </div>

                <div class="col-3">

                    <label>Featured</label><br><select id="is_featured" name="is_featured">
                        <option value="yes" <?php if ($this->product[0]['is_featured'] == 'yes') echo "selected=\"selected\""; ?>>YES</option>
                        <option value="no" <?php if ($this->product[0]['is_featured'] == 'no') echo "selected=\"selected\""; ?>>NO</option>
                    </select><br>
                </div>
                <div class="col-3">
                    <label>New</label><br><select id="is_new" name="is_new">
                        <option value="yes" <?php if ($this->product[0]['is_new'] == 'yes') echo "selected=\"selected\""; ?>>YES</option>
                        <option value="no" <?php if ($this->product[0]['is_new'] == 'no') echo "selected=\"selected\""; ?>>NO</option>
                    </select><br>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <label>Price Category</label><br><select id="price_category" name="price_category">
                        <?php foreach ($this->price_category as $price) : ?><option value="<?php echo $this->product[0]['price_category_name']; ?>" <?php if ($this->product[0]['price_category_name'] == $price['price_category_name']) echo "selected=\"selected\""; ?>><?php echo $price['price_category_name']; ?></option> <?php endforeach; ?>
                    </select>
                </div>

                <br>
                <div class="col-3">
                    <div class="helper-text">
                        <label>Description</label><br>
                        <textarea rows="6" cols="20" id="description" name="product_description" style="width: 80%;" data-helper="Description" onfocusout="validateDescription()"><?php echo $this->product[0]['product_description'] ?></textarea>
                        <span class="popuptext"></span>
                        <br>
                    </div>

                </div>
            </div>

            <div class="center-content">

                <button type="submit" class="btn">Update</button>
                <a href="<?php echo URL ?>products" class="btn btn-grey">Cancel</a>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript" src="/wasthra/public/js/form_validation.js"></script>
<script type="text/javascript" src="/wasthra/util/form/edit_product_form_validation.js"></script>
<script>
    var imageList = document.getElementById('prev_images').value;
    console.log(imageList);

    function deleteImage(imageName) {
        imageList = imageList.replace(imageName + ',', '');
        document.getElementById('prev_images').value = imageList;
        document.getElementById(String(imageName)).style.display = "none";
    }
    // console.log(imageList);
</script>