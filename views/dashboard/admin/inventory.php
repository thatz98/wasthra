<?php require 'views/header_dashboard.php'; ?>

<div class="container">
    <div class="row">
        <h2>Inventory</h2>
        </div>
        <!-- <div class="" >
            <button class="btn btn-square" onclick="formToggle()">+ Add New Product Category</button>
            <form action="<?php echo URL; ?>ProductCategory/create" id="addFrom" class="hidden-form" method="post">
                        <div class="row-top">
                            <div class="col-3 pad-30-0-0-85">
                            <label>Product Category Id : </label><br><input type="text" name="product_category_id"><br>
                        </div>
                        <div class="col-3 pad-30-0-0-85">
                            <label>Product Category Name : </label><br><input type="text" name="category_name"><br>
            
                        </div>
                        <div row>
                        <div class="center-btn">
                            <button type="submit" class="btn">Add New Category</button>
                        </div>
                        </div>
                    </form>
                    </div> -->
        
    
    <div class="table-container">
    <table>
        <tr>
            <th>Product ID</th>
            <th>Quantity</th>
            <th>Reorder Quantity</th>
            <th>Reorder Level</th>
            <th>Option</th>
            
        </tr>
        <?php foreach ($this->inventoryDetails as $inventory): ?>
            <tr>
                <td><?php echo $inventory['product_id']; ?></td>
                <td><?php echo $inventory['qty']; ?></td>
                <td><?php echo $inventory['reorder_level']; ?></td>
                <td><?php echo $inventory['reorder_qty']; ?></td>
                <td><a href="<?php echo URL ?>inventory/edit/<?php echo $inventory['product_id'] ?>"><button class="table-btn btn-blue">Edit</button></a>
                
            
            </tr>

        <?php endforeach;?>
        

          
        
    </table>
</div>
<?php require 'views/footer_dashboard.php'; ?>
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
