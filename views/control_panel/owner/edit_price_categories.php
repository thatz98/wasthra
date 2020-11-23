<?php require 'views/header_dashboard.php'; ?>

<div class="container">
    <div class="row">
        <h2 class="title title-min">Edit Price Category</h2>
    </div>
        <div class="row">
        <div class="form-container">
            <form action="<?php echo URL; ?>priceCategories/editSave/" id="editFrom" method="post">        
                        <div class="row-top">   
                            <div class="col-3">
                                <input type="text" name="prev_id" value="<?php echo $this->getpricecat['price_category_id']?>" style="display:none">
                                <label>Price Category ID</label><br><input type="text" name="category_id" id="category_id" value="<?php echo $this->getpricecat['price_category_id'] ?>"><br><br>                            
                                <label>Production Cost</label><br><input type="text" name="production_cost" id="production_cost"  placeholder="LKR" value="<?php echo $this->getpricecat['production_cost'] ?>"><br>
                            </div>

                            <div class="col-3">
                                <label>Price Category Name</label><br><input type="text" name="category_name" id="category_name" value="<?php echo $this->getpricecat['price_category_name'] ?>"><br><br>
                                <label>Additional Market Price</label><br><input type="text" name="market_price" id="market_price"  placeholder="LKR" value="<?php echo $this->getpricecat['add_market_price'] ?>"><br>  
                            </div>                           
                        </div>

                            <div class="center-btn">
                                   <span onclick="calculateRetail()" class="btn btn-grey" style="padding: 8px 30px; font-weight:normal;">Calculate Retail Price</span>
                            </div>
                            

                            <div class="center-content" style="margin-bottom: 20px;">
                                <label>Reatil Price : LKR&nbsp;</label><br>
                                <div id="retail-display">

                                </div><br>
                           </div>

                           <div class="center-content">
                                <label>Discount: </label><br><input type="text" name="discount" id="discount" value="<?php echo $this->getpricecat['discount'] ?>" style="text-align: center;">%<br>
                           </div>

                           <div class="center-btn">
                                  <span onclick="calculateNet()" class="btn btn-grey" style="padding: 8px 30px; font-weight:normal;">Calculate Net Price</span>
                           </div>

                           <div class="center-content">
                                <label>Net Price : LKR&nbsp;</label>
                                <div id="net-display">

                                </div>
                           </div><br>

                           <div class="center-btn">
                                <button type="submit" class="btn">Update Price Category</button>
                                <a href="<?php echo URL ?>pricecategories" class="btn btn-grey">Cancel</a>
                           </div>
            </form>
      </div>
      </div>
</div>          


<?php require 'views/footer.php'; ?>

<script type="text/javascript">

function calculateRetail(){
    document.getElementById('retail-display').innerHTML = parseFloat(document.getElementById('production_cost').value) + parseFloat(document.getElementById('market_price').value);
}

function calculateNet(){
    document.getElementById('net-display').innerHTML =  ((parseFloat(document.getElementById('production_cost').value)+parseFloat(document.getElementById('market_price').value))*(100-parseFloat(document.getElementById('discount').value)))/100;
}
</script>