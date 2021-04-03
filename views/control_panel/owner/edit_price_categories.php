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

                        <input type="text" name="prev_id" value="<?php echo $this->getpricecat['price_category_id'] ?>" style="display:none">

                        <div class="helper-text">
                            <label>Price Category ID</label><br>
                            <input type="text" name="category_id" id="category_id" data-helper="Category ID" onfocusout="validateCategoryId()" placeholder="PRCXXXX" value="<?php echo $this->getpricecat['price_category_id'] ?>">
                            <span class="popuptext"></span>
                        </div><br><br><br>

                        <div class="helper-text">
                            <label>Production Cost</label><br>
                            <input type="text" name="production_cost" id="production_cost" data-helper="Cost" onfocusout="validateProductionCost()" placeholder="LKR" value="<?php echo $this->getpricecat['production_cost'] ?>">
                            <span class="popuptext"></span>
                        </div><br>
                    </div>

                    <div class="col-3">
                        <div class="helper-text">
                            <label>Price Category Name</label><br>
                            <input type="text" name="category_name" id="category_name" data-helper="Category Name" onfocusout="validateCategoryName()" value="<?php echo $this->getpricecat['price_category_name'] ?>">
                            <span class="popuptext"></span>
                        </div><br><br><br>

                        <div class="helper-text">
                            <label>Additional Market Price</label><br>
                            <input type="text" name="market_price" id="market_price" data-helper="Market Price" onfocusout="validateMarketPrice()" placeholder="LKR" value="<?php echo $this->getpricecat['add_market_price'] ?>">
                            <span class="popuptext"></span>
                        </div><br>
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
                    <label>Discount: </label><br>
                    <input type="text" name="discount" id="discount" data-helper="Discount" onfocusout="validateDiscount()" value="<?php echo $this->getpricecat['discount'] ?>" style="text-align: center;">%
                    <span class="popuptext"></span><br>
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




<script type="text/javascript" src="/public/js/form_validation.js"></script>
<script type="text/javascript" src="/util/form/edit_price_category_form_validation.js"></script>

<?php require 'views/footer.php'; ?>

<script type="text/javascript">
    //Calculating Reatail price  & Net price

    function calculateRetail() {
        document.getElementById('retail-display').innerHTML = parseFloat(document.getElementById('production_cost').value) + parseFloat(document.getElementById('market_price').value);
    }

    function calculateNet() {
        document.getElementById('net-display').innerHTML = ((parseFloat(document.getElementById('production_cost').value) + parseFloat(document.getElementById('market_price').value)) * (100 - parseFloat(document.getElementById('discount').value))) / 100;
    }
</script>