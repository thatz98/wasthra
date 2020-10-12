<?php require 'views/header_dashboard.php'; ?>

<div class="container">
    <div class="row">
        <h2>Price Categories</h2>
        </div>
        <div class="" >
            <button class="btn btn-square" onclick="formToggle()">+ Add New Category</button>
            <form action="<?php echo URL; ?>>user/create" id="addFrom" class="hidden-form" method="post">
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
            <th>Discount</th>
            <th>Retail Price</th>
            <th>Net Price</th>
            <th>Options</th>
        </tr>
        
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