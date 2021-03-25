<div id="addReview" class="overlay">

    <div class="popup">
    <?php if (isset($_GET['id'])){
                foreach($this->orderItems as $item){
                    if($item['product_id']==$_GET['id']){
                        $pId=$item['product_id'];
                        $name=$item['product_name'];
                        break;
                    }
    }
} ?>
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        <div class="row">
            <h3 class="title title-min">Add Review</h3>
        </div>

        <div class="row">
            <form action="<?php echo URL; ?>shop/submitReview/<?php echo $pId?>" id="addFrom"
                enctype="multipart/form-data" method="post">
                <div class="row">
                <p>You have selected "<?php  echo($name)?>"</p>
            </div>
            <div class="row" style="margin-top:30px;">
                <div class="col-2">
                    <div class="">
                        <label>Product images</label><br><br>
                        <!-- <button type="file" class="btn">Add New image</button> -->
                        <input type="file" accept="image/*" name="img[]" multiple><br><br>
                    </div>
                </div>
            </div>
            <input type="text" name="product_id" value="<?php echo $pId?>" hidden>
            <div class="row">
                <div class="col-2">
                <label>Summary</label><br><br>
                <textarea rows="4" cols="30" name="comment"></textarea><br><br>
                </div>
                
            </div>
            <div class="row">
                <div class="col-2">
                <label>Rate out of 5</label><br><br>
                    <div class="row">
                    

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
                    </div>
                
                </div>
                
            </div>
            <?php $this->userID = Session::get('userId');?>
                <input type="text" name="user_id" value="<?php echo $this->userID?>" hidden>
                <div class="row">
                    <button type="submit" class="btn">Submit</button>
                </div>
            </form>

        </div>

        </div>
    </div>
