<?php require 'views/header_dashboard.php'; ?>

<div class="container">
    <div class="row">
        <h2 class="title title-min">Price Categories</h2>
    </div>
        <div class="" >
            <button class="btn btn-square" onclick="formToggle()">+ Add New Category</button>
            <form action="<?php echo URL; ?>priceCategories/create" id="addFrom" class="hidden-form" method="post">
   
                    <div class="row-top">                            
                            <div class="col-3">
                                <label>Price Category ID</label><br><input type="text" name="category_id" id="category_id" ><br><br>                            
                                <label>Production Cost</label><br><input type="text" name="production_cost" id="production_cost" placeholder="LKR"><br>
                            </div>
                            <div class="col-3">
                                <label>Price Category Name</label><br><input type="text" name="category_name"  id="category_name"><br><br>
                                <label>Additional Market Price</label><br><input type="text" name="market_price" id="market_price" placeholder="LKR"><br>  
                            </div>

                           <script type="text/javascript">

                            function calculateRetail(){
                                document.getElementById('retail-display').innerHTML = parseFloat(document.getElementById('production_cost').value) + parseFloat(document.getElementById('market_price').value);
                            }

                            function calculateNet(){
                                document.getElementById('net-display').innerHTML =  ((parseFloat(document.getElementById('production_cost').value)+parseFloat(document.getElementById('market_price').value))*(100-parseFloat(document.getElementById('discount').value)))/100;
                            }
                           </script>   
                    </div>

                        <div class="center-btn">
                                <span onclick="calculateRetail()" class="btn btn-grey">Calculate Retail Price</span>
                        </div>

                        <div class="center-content" style="margin-bottom: 20px;">
                                <label>Reatil Price : LKR&nbsp;</label><br>
                                <div id="retail-display">
                                    
                                </div><br>
                        </div>

                        <div class="center-content pad-auto">
                               <label>Discount: </label><br><input type="text" name="discount" id="discount">%<br>
                        </div> 

                        <div class="center-btn">
                                <span onclick="calculateNet()" class="btn btn-grey">Calculate Net Price</span>
                        </div>
                        
                        <div class="center-content">
                                <label>Net Price : LKR&nbsp;</label><br>
                                <div id="net-display">

                                </div><br>
                        </div><br>

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
                    <td>LKR <?php echo $price_category['production_cost']; ?></td>
                    <td>LKR <?php echo $price_category['add_market_price']; ?></td>
                    <td>LKR <?php echo $price_category['production_cost']+$price_category['add_market_price']; ?></td>
                    <td><?php echo $price_category['discount']; ?>%</td>
                    <td>LKR <?php echo (($price_category['production_cost']+$price_category['add_market_price'])*(100-$price_category['discount']))/100; ?></td>
                      
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