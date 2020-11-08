<?php require 'views/header_dashboard.php'; ?>   

    <div class="row">
        <h2>Add Review</h2>
    </div>
    
    <form action="<?php echo URL; ?>shop/submitReview/<?php echo $this->productName[0][0]?>" id="addFrom" enctype="multipart/form-data" method="post">
    <div class="center-content">
        <div class="form-container" >
        
            
                <p>You have selected "<?php  echo $this->productName[0][1]?>"</p><br>

                <div class="center-btn">
                    <label allign="center">Product images : </label><br>
                    <!-- <button type="file" class="btn">Add New image</button> -->
                    <input class="btn" type="file" accept="image/*" name="img[]" multiple><br>
                </div>
                <input type="text" name="product_id" value="<?php echo $this->productName[0][0]?>" style="display:none">
                <label allign="center">Summary : </label><br>
                <textarea rows="4" cols="30" name="comment"></textarea><br><br>

                <label allign="center">Rate out of 5 : </label><br>

                <input type="radio" name="rating" value="1">
                <label>1</label>
                <input type="radio" name="rating" value="2">
                <label>2</label>
                <input type="radio" name="rating" value="3">
                <label>3</label>
                <input type="radio" name="rating" value="4">
                <label>4</label>
                <input type="radio" name="rating" value="5">
                <label>5</label>
                <?php $this->userID = Session::get('userData')['user_id'] ;?>
                <input type="text" name="user_id" value="<?php echo $this->userID?>" style="display:none">
                <div class="center-btn">
                    <button type="submit" class="btn">Submit</button>
                </div>


        </div>
    </div>
</form>