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
                        <label>Product images : </label>
                        <!-- <button type="file" class="btn">Add New image</button> -->
                        <input type="file" accept="image/*" name="img[]"  multiple><br>
                        </div>
                        </div>  
                        <div class="row-top">
                            <div class="col-3">
                            <label>Product ID : </label><br><input type="text" name="product_id"><br>
                            
                            <label>Product Name : </label><br><input type="text" name="product_name"><br>
<label>Product Category : </label><br><select name="category" onchange="if(this.value=='Couple'){$('#size-field').hide();$('#size-field-couple').show();} else{$('#size-field').show();$('#size-field-couple').hide();}">
                            <?php foreach ($this->categoryList as $category): ?><option value="<?php echo $category['name']; ?>"><?php echo $category['name']; ?></option> <?php endforeach;?>
                            <!-- <option value="ladies">Ladies</option>
                            <option value="couple">Couple</option> -->
                        </select><br>
                        <label>Quantity : </label><br><input type="text" name="quantity"><br>
                        
                        </div>
                        <div class="col-3">
                            <div id="size-field">
                            <label>Available Sizes : </label><br>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="XS"><span>XS</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="S"><span>S</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="M"><span>M</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="L"><span>L</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="XL"><span>XL</span>
                            </div>
                            <br>
                            </div>
                            <div id="size-field-couple" hidden>
                            <label>Available Sizes for Couple Gents: </label><br>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="XS-G"><span>XS</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="S-G"><span>S</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="M-G"><span>M</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="L-G"><span>L</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="XL-G"><span>XL</span>
                            </div>
                            <br>
                            
                            <label>Available Sizes for Couple Ladies: </label><br>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="XS-W"><span>XS</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="S-W"><span>S</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="M-W"><span>M</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="L-W"><span>L</span>
                            </div>
                            <div class="checkboxes">
                                <input type="checkbox" name="size[]" value="XL-W"><span>XL</span>
                            </div>
                            <br>
                            </div>
                        <label>Published : </label><br><select name="is_published">
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select><br>
                        
                        
                        
                        <label>Featured : </label><br><select name="is_featured">
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select><br>
                        
                        <label>New : </label><br><select name="is_new">
                            <option value="yes">YES</option>
                            <option value="no">NO</option>
                        </select><br>
                        
                        </div>
                        <div class="col-3">
                            <label>Colors : </label><br><input type="text" name="colors"><br>
                            <label>Price Category : </label><br><select name="price_category">
                            <?php foreach ($this->pricecategoryList as $priceCategory): ?><option value="<?php echo $priceCategory['price_category_name']; ?>"><?php echo $priceCategory['price_category_name']; ?></option> <?php endforeach;?>
                            </select><br>
                            
                            <label>Description : </label><br>
                            <textarea rows="6" cols="30" name="product_description"></textarea><br>

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

<script>

$(function() {
	var rowsPerPage = 10;
	const rows = $('#product-table tbody tr');
	const rowsCount = rows.length;
	const pageCount = Math.ceil(rowsCount / rowsPerPage); // avoid decimals
	const numbers = $('#numbers');
	numbers.empty();
	// Generate the pagination.
	for (var i = 0; i < pageCount; i++) {
		numbers.append('<li><a href="#">' + (i+1) + '</a></li>');
	}
		
	// Mark the first page link as active.
	$('#numbers li:first-child a').addClass('active');

	// Display the first set of rows.
	displayRows(1,rowsCount);
	
	// On pagination click.
	$('#numbers li a').click(function(e) {
		var $this = $(this);
		
		e.preventDefault();
		
		// Remove the active class from the links.
		$('#numbers li a').removeClass('active');
		
		// Add the active class to the current link.
		$this.addClass('active');
		
		// Show the rows corresponding to the clicked page ID.
		displayRows($this.text(),rowsCount);
	});
	
	// Function that displays rows for a specific page.
	function displayRows(index,total) {
		var start = (index - 1) * rowsPerPage;
		var end = start + rowsPerPage;
        $('#start').text(start+1);
if (total<=end) {
    $('#end').text(total);
} else{
    $('#end').text(end);
}
		
		// Hide all rows.
		rows.hide();
		
		// Show the proper rows for this page.
		rows.slice(start, end).show();
	}
});

$('#per-page').on('load change',function() {
	var rowsPerPage = parseInt($('#per-page').val());
	const rows = $('#product-table tbody tr');
	const rowsCount = rows.length;
	const pageCount = Math.ceil(rowsCount / rowsPerPage); // avoid decimals
	const numbers = $('#numbers');
	numbers.empty();
	// Generate the pagination.
	for (var i = 0; i < pageCount; i++) {
		numbers.append('<li><a href="#">' + (i+1) + '</a></li>');
	}
		
	// Mark the first page link as active.
	$('#numbers li:first-child a').addClass('active');

	// Display the first set of rows.
	displayRows(1,rowsCount);
	
	// On pagination click.
	$('#numbers li a').click(function(e) {
		var $this = $(this);
		
		e.preventDefault();
		
		// Remove the active class from the links.
		$('#numbers li a').removeClass('active');
		
		// Add the active class to the current link.
		$this.addClass('active');
		
		// Show the rows corresponding to the clicked page ID.
		displayRows($this.text(),rowsCount);
	});
	
	// Function that displays rows for a specific page.
	function displayRows(index,total) {
		var start = (index - 1) * rowsPerPage;
		var end = start + rowsPerPage;
        $('#start').text(start+1);
if (total<=end) {
    $('#end').text(total);
} else{
    $('#end').text(end);
}
		
		// Hide all rows.
		rows.hide();
		
		// Show the proper rows for this page.
		rows.slice(start, end).show();
	}
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