<?php require 'views/header_dashboard.php'; ?>

<div class="container">
    <div class="row">
        <h2>Product Category</h2>
        </div>
        <div class="" >
            <button class="btn btn-square" onclick="formToggle()">+ Add New Product Category</button>
            <form action="<?php echo URL; ?>user/create" id="addFrom" class="hidden-form" method="post">
                        <div class="row-top">
                            <div class="col-3 pad-30-0-0-85">
                            <label>Product Category Id : </label><br><input type="text" name="category_id"><br>
                        </div>
                        <div class="col-3 pad-30-0-0-85">
                            <label>Product Category Name : </label><br><input type="text" name="category_name"><br>
            
                        </div>
                        <div class="center-btn">
                            <button type="submit" class="btn">Add New Category</button>
                        </div>
                    </form>
                    </div>
        
    
    <div class="table-container">
    <table>
        <tr>
            <th>Product Category Id</th>
            <th>Product Category Name</th>
            <th>Option</th>
            
        </tr>
        <?php foreach ($this->productcatList as $product_category): ?>
            <tr>
                <td><?php echo $product_category['category_id']; ?></td>
                <td><?php echo $product_category['name']; ?></td>
                    <!-- <td></td>
                    <td></td>
                    <td></td> -->
                    <td><a href="<?php echo URL ?>category/edit/<?php echo $product_category['category_id'] ?>"><button class="table-btn btn-blue">Edit</button></a>
                    <a href="<?php echo URL ?>category/delete/<?php echo $product_category['category_id'] ?>"><button class="table-btn btn-red">Delete</button></a></td>
            
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
