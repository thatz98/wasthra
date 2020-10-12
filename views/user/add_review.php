<?php require 'views/header_dashboard.php'; ?>   

    <div class="row">
        <h2>Add Review</h2>
    </div>
    
    <form method="update">
    <div class="center-content">
        <div class="form-container" >
        
            
                <p>You have selected "Product Name"</p><br>

                <div class="center-btn">
                    <label allign="center">Product images : </label><br>
                    <!-- <button type="file" class="btn">Add New image</button> -->
                    <input class="btn" type="file" accept="image/*"><br>
                </div>

                <label allign="center">Summary : </label><br>
                <textarea rows="4" cols="30" name="comment"></textarea><br><br>

                <label allign="center">Rate out of 5 : </label><br>

                <input type="checkbox">
                <label>1</label>
                <input type="checkbox" >
                <label>2</label>
                <input type="checkbox">
                <label>3</label>
                <input type="checkbox">
                <label>4</label>
                <input type="checkbox">
                <label>5</label>
            
                <div class="center-btn">
                    <button type="submit" class="btn">Submit</button>
                </div>


        </div>
    </div>
</form>