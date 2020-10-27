<?php require 'views/header_dashboard.php'; ?>

<div class="container">
    <div class="row">
        <h2>Edit Price Category</h2>
        </div>
        <div class="row">
        <div class="form-container" >
            <form class="">         
                        <div class="row-top">
                               
                            <div class="col-4">
                                <label>Price Category ID : </label><br><input type="text" name="category_id" value="<?php echo $this->getpricecat['price_category_id'] ?>"><br><br>                            
                                <label>Production Cost : </label><br><input type="text" name="production_cost" value="<?php echo $this->getpricecat['production_cost'] ?>"><br>
                            </div>

                            <div class="col-4">
                                <label>Price Category Name: </label><br><input type="text" name="category_name"  value="<?php echo $this->getpricecat['price_category_name'] ?>"><br><br>
                                <label>Additional Market Price: </label><br><input type="text" name="market_price"  value="<?php echo $this->getpricecat['add_market_price'] ?>"><br>  
                            </div>
                           
                        </div>

                            <div class="center-btn">
                                <button type="submit" class="btn btn-grey">Calculate Retail Price</button>
                            </div>

                            <div class="center-content">
                                <label>Reatil Price:</label><br><br>
                           </div>

                           <div class="center-content">
                                <label>Discount: </label><br><input type="text" name="discount"  value="<?php echo $this->getpricecat['discount'] ?>"><br>
                           </div>

                           <div class="center-btn">
                                <br> <button type="submit" class="btn btn-grey">Calculate Net Price</button>
                           </div>

                           <div class="center-content">
                                <label>Net Price:</label>
                           </div>

                           <br>

                           <div class="center-btn">
                                <button type="submit" class="btn">Add Price Category</button>
                           </div>
            </form>
        </div>
      </div>
</div>          


<?php require 'views/footer.php'; ?>

