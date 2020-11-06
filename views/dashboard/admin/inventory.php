<?php require 'views/header_dashboard.php'; ?>

<div class="small-container">
    <div class="row">
        <h2 class="title title-min">Inventory</h2>
        </div>

    <div class="table-container">
    <div class="center-content">
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
                <td><?php if(empty($inventory['reorder_level'])){
                    echo 'not set';
                } else{
                    echo $inventory['reorder_level']; 
                    }?></td>
                <td><?php if(empty($inventory['reorder_qty'])){
                    echo 'not set';
                } else{
                    echo $inventory['reorder_qty']; 
                    }?></td>
                <td><a href="<?php echo URL ?>inventory/edit/<?php echo $inventory['product_id'] ?>"><button class="table-btn btn-blue">Edit</button></a>
                
            
            </tr>

        <?php endforeach;?>
        

          
        
    </table>
    </div>
</div>
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
