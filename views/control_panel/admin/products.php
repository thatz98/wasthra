<?php require 'views/header_dashboard.php'; ?>

<div class="container">
    <div class="row">
        <h2 class="title title-min">Products</h2>
        </div>
        <div class="row-right">
        <a href="<?php echo URL ?>inventory" class="btn">Manage Inventory</a><a href="<?php echo URL ?>inventory" class="btn">Generate Report</a>
    </div>
    <div class="row">
                <div class="col-3 fit-size">
                    <div class="min-card primary">
                        <div class="row">
                        <h3>Published Products</h3>
                        </div>
                        <div class="row">
                            <h1><?php echo $this->publishedCount;?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-3 fit-size">
                    <div class="min-card <?php if($this->reorderCount) echo 'notify';?>">
                        <div class="row">
                        <h3>Reordering Required</h3>
                        </div>
                        <div class="row">
                            <h1><?php echo $this->reorderCount;?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-3 fit-size">
                    <div class="min-card <?php if($this->outStockCount) echo 'warning';?>" >
                        <div class="row">
                        <h3>Out of Stock</h3>
                        </div>
                        <div class="row">
                            <h1><?php echo $this->outStockCount;?></h1>
                        </div>
                    </div>
                </div>
            </div>
        <div class="" >
            <button class="btn btn-square" onclick="formToggle()">+ Add New Product</button>
            <form action="<?php echo URL; ?>products/create" id="addFrom" class="hidden-form" enctype="multipart/form-data" method="post">

                    <div class="row" style="margin-top:30px;">
                        <div class="center-btn">
                            <div class="helper-text">
                                <label>Product images : </label>
                                <input id="image" type="file" accept="image/*" name="img[]"  data-helper="Image" onfocusout="validateImage()" multiple>
                                <span class="popuptext"></span>
                                <br>
                                
                            </div>
                        </div>
                    </div>  
                        <div class="row-top">
                            <div class="col-3">
                            <div class="helper-text">
                                <label>Product ID</label><br><input type="text" id="product_id" name="product_id" placeholder="PRDXXXX"
                                data-helper="Product ID" onfocusout="validateProductId()">
                                <span class="popuptext"></span>
                                <br>
                                
                            </div>
                            <div class="helper-text">
                                <label>Product Name</label><br><input type="text" id="product_name" name="product_name" 
                                data-helper="Product Name" onfocusout="validateproductName()">
                                <span class="popuptext"></span>
                                <br>

                            </div>
                            
                            <div class="helper-text">
                                <label>Product Category</label>
                                <br>
                                <select id="category" name="category" onchange="if(this.value=='Couple'){$('#size-field').hide();$('#size-field-couple').show();} else{$('#size-field').show();$('#size-field-couple').hide();}">
                                <option value="0">Select</option>
                                <?php foreach ($this->categoryList as $category): ?><option value="<?php echo $category['name']; ?>">
                                <?php echo $category['name']; ?></option> <?php endforeach;?>
                                </select>
                                <span class="popuptext"></span>
                                <br>
                            </div>

                        <div class="helper-text">
                            <label>Quantity</label><br><input id="quantity" type="text" name="quantity" data-helper="Quantity" onfocusout="validateQuantity()">
                            <span class="popuptext"></span>
                            <br>
                        </div>
                        </div>
                        <div class="col-3">
                            <div class="helper-text">
                            <div id="size-field">
                            <label>Available Sizes</label><br>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="XS" value="XS"><span>XS</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="S" value="S"><span>S</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="M" value="M"><span>M</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="L" value="L"><span>L</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="XL" value="XL"><span>XL</span>
                            </div>
                            <br>
                            </div>
                            <span class="popuptext"></span>
                            </div>
                            <div class="helper-text">
                            <div id="size-field-couple" hidden>
                            <label>Available Sizes for Couple Gents</label><br>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="XS-G" value="XS-G"><span>XS</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="S-G" value="S-G"><span>S</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="M-G" value="M-G"><span>M</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="L-G" value="L-G"><span>L</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="XL-G" value="XL-G"><span>XL</span>
                            </div>
                            <br>
                            
                            <label>Available Sizes for Couple Ladies</label><br>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="XS-W" value="XS-W"><span>XS</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="S-W" value="S-W"><span>S</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="M-W" value="M-W"><span>M</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="L-W" value="L-W"><span>L</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" id="XL-W" value="XL-W"><span>XL</span>
                            </div>
                            
                            <br>
                            </div>
                            </div>
                            
                            <div class="helper-text">
                                <label>Published</label><br><select id="is_published" name="is_published">
                                    <option value="0">Select</option>
                                    <option value="yes">YES</option>
                                    <option value="no">NO</option>
                                </select>
                                <span class="popuptext"></span>
                                <br>
                                
                            </div>
                        
                            <div class="helper-text">
                                <label>Featured</label><br><select id="is_featured" name="is_featured">
                                    <option value="0">Select</option>
                                    <option value="yes">YES</option>
                                    <option value="no">NO</option>
                                </select>
                                <span class="popuptext"></span>
                                <br>
                                
                            </div>

                            <div class="helper-text">
                                <label>New</label><br><select id="is_new" name="is_new">
                                    <option value="0">Select</option>
                                    <option value="yes">YES</option>
                                    <option value="no">NO</option>
                                </select>
                                <span class="popuptext"></span>
                                <br>

                            </div>
                        
                        </div>
                        <div class="col-3">
                            <div class="helper-text">
                                <label>Colors</label><br>
                                <input id="color" type="text" name="colors" placeholder="#12ab87,#abc123" data-helper="Colors" onfocusout="validateColors()">
                                <span class="popuptext"></span>
                                <br>
                                    
                            </div>

                            <div class="helper-text">
                                <label>Price Category</label><br>
                                <select id="price_category" name="price_category">
                                <option value="0">Select</option>
                                <?php foreach ($this->pricecategoryList as $priceCategory): ?>
                                <option value="<?php echo $priceCategory['price_category_name']; ?>">
                                <?php echo $priceCategory['price_category_name']; ?>
                                </option> <?php endforeach;?>
                                </select>
                                <span class="popuptext"></span>
                                <br>
                            </div>

                            <div class="helper-text">
                                <label>Description</label><br>
                                <textarea id="description" rows="6" cols="30" name="product_description" data-helper="Description" onfocusout="validateDescription()"></textarea>
                                <span class="popuptext"></span>
                                <br>
                            </div>
                        </div>
                    </div>
                        
                        <div class="center-btn">
                            <button type="submit" class="btn">Add New Product</button>
                        </div>
                    </form>
                    </div>
    <span id="start"></span><span> - </span><span id="end"></span> <span> of <?php echo count($this->qtyList);?> results...</span>
    <div class="per-page" style="float: right;">
        <span>Rows per page: </span><select name="per-page" id="per-page">
            <?php foreach(range(10,100,10) as $i){?>
                <option value="<?php echo $i;?>"><?php echo $i;?></option>
            <?php }?>
        </select>
    </div>   
    <div class="table-container">
    <table id="product-table">
        <thead>
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Product Category</th>
            <th>Qty</th>
            <th>Colors</th>
            <th>Sizes</th>
            <th>Images</th>
            <th>Price</th>
            <th>Published</th>
            <th>New</th>
            <th>Featured</th>
            <th>Options</th>
            
        </tr>
        </thead>
        <tbody>
        <?php foreach ($this->qtyList as $qty): ?>
            <tr>
                <td><?php echo $qty['product_id']; ?></td>
                <td><?php echo $qty['product_name']; ?></td>
                    <td><?php echo $qty['name']; ?></td>
                    <td><?php echo $qty['qty']; ?></td>
                    <td><?php $colorString=''; 
                        foreach ($this->colorList as $color){ 
                        if($qty['product_id']==$color['product_id']){
                            $colorString .= $color['colors']; 
                            $colorString .= " | "; 
                            }
                        }
                        echo rtrim($colorString," | ");
                    ?>
                    </td>
                    <td style="max-width: 150px;"><?php $sizeString='';
                        foreach ($this->sizeList as $size){
                         if($qty['product_id']==$size['product_id']){
                                $sizeString.=$size['sizes']; 
                                $sizeString.=" | ";
                            }
                    }
                        echo rtrim($sizeString," | ");
                    ?></td>
                    <td><?php foreach ($this->imageList as $image){
                        if($qty['product_id']==$image['product_id']){?>
                            <img src="<?php echo $image['image']?>" width="50px" height="50px">
                            <?php 
                        }
                    }?></td>
                    <td><?php echo $qty['product_price']; ?></td>
                    <td><?php echo $qty['is_published']; ?></td>
                    <td><?php echo $qty['is_featured']; ?></td>
                    <td><?php echo $qty['is_new']; ?></td>
                    <td style="min-width:142px;"><a href="<?php echo URL ?>products/edit/<?php echo $qty['product_id'] ?>"><button class="table-btn btn-blue">Edit</button></a>
                    <a href="<?php echo URL ?>products/delete/<?php echo $qty['product_id'] ?>"><button class="table-btn btn-red">Delete</button></a></td>
            
            </tr>
            
        <?php endforeach;?>
        </tbody>

    </table>
    </div>
    <div class="pagination">
    <ol id="numbers"></ol>
    </div>
</div>

<script type="text/javascript" src="<?php echo URL ?>public/js/table_pagination.js"></script>
<script type="text/javascript" src="<?php echo URL ?>public/js/form_validation.js"></script>
<script type="text/javascript" src="<?php echo URL ?>util/form/products_form_validation.js"></script>

<script>

$(pagination(10,'product-table'));

$('#per-page').on('change',function() {
	var rowsPerPage = parseInt($('#per-page').val());
	pagination(rowsPerPage,'product-table');
});
</script>
<script>

      //  var addFrom = document.getElementByClassName("dash-form-container");
        var addFrom = document.getElementById("addFrom");
        addFrom.style.maxHeight = "0px";
        addFrom.style.overflow = "0px";

        function formToggle(){
            if(addFrom.style.maxHeight == "0px"){
                addFrom.style.maxHeight = "none";
            } else{
                addFrom.style.maxHeight = "0px";
            }
        }

       
    </script>

<?php require 'views/footer_dashboard.php'; ?>