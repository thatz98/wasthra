<?php require 'views/header_dashboard.php'; ?>

<div class="container">
    <div class="row">
        <h2>Price Categories</h2>
        </div>
        <div class="" >
            <button class="btn btn-square" onclick="formToggle()">+ Add New Category</button>
            <form action="<?php echo URL; ?>>priceCategories/create" id="addFrom" class="hidden-form" method="post">
                        <div class="row-top">
                               
                            <div class="col-4 pad-30-0-0-85">
                                <label>Price Category ID : </label><br><input type="text" name="category_id"><br><br>                            
                                <label>Production Cost : </label><br><input type="text" name="production_cost"><br>
                            </div>
                            <div class="col-4 pad-30-0-0-85">
                                <label>Price Category Name: </label><br><input type="text" name="category_name"><br><br>
                                <label>Additional Market Price: </label><br><input type="text" name="market_price"><br>  
                            </div>
                           
                       
                        </div>
                        <div class="center-btn">
                                <button type="submit" class="btn btn-grey">Calculate Retail Price</button>
                        </div>
                        <div class="center-content">
                                <label>Reatil Price:</label><br><br>
                        </div>
                        <div class="center-content pad-auto">
                               <label>Discount: </label><br><input type="text" name="discount"><br>
                        </div>           
                        <div class="center-btn">
                                <button type="submit" class="btn btn-grey">Calculate Net Price</button>
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
        
    
    <table>
        <tr>
            <th>Price Category ID</th>
            <th>Price Category Name</th>
            <th>Production Cost</th>
            <th>Additional Market Prices</th>
            <th>Retail Price</th>
            <th>Discount</th>
            <th>Net Price</th>
            <th>Options</th>
        </tr>
        
        <?php foreach ($this->pricecatList as $price_category ): ?>
            <tr>
                <td><?php echo $price_category['price_category_id']; ?></td>
                <td><?php echo $price_category['price_category_name']; ?></td>
                    <td><?php echo $price_category['production_cost']; ?></td>
                    <td><?php echo $price_category['add_market_price']; ?></td>
                    <td><?php echo $price_category['production_cost']+$price_category['add_market_price']; ?></td>
                    <td><?php echo $price_category['discount']; ?></td>
                    <td><?php echo $price_category['production_cost']+$price_category['add_market_price']-$price_category['discount']; ?></td>
                      
                    <td><a href="<?php echo URL ?>priceCategories/edit/<?php echo $price_category['price_category_id'] ?>"><button class="table-btn btn-blue">Edit</button></a>
                    <a href="<?php echo URL ?>priceCategories/delete/<?php echo $price_category['price_category_id'] ?>"><button class="table-btn btn-red">Delete</button></a></td>
            
            </tr>

        <?php endforeach;?>
    </table>
</div>

<?php require 'views/footer.php'; ?>

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