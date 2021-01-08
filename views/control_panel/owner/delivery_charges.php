<?php require 'views/header_dashboard.php'; ?>

<div class="small-container">

    <div class="row">
        <h2 class="title title-min">Delivery Charges</h2>
    </div>
    <div class="row-right">
        <a href="<?php echo URL ?>report" class="btn">Generate Report</a>
    </div>

        <div class="" >
            <button class="btn btn-square" onclick="formToggle()">+ Add New Delivery Charge</button>
            <form action="<?php echo URL; ?>deliveryCharges/create" id="addFrom" class="hidden-form" method="post">
                        <div class="row-top">
                            <div class="col-3">
                                <div class="helper-text">
                                   <label>City</label><br>
                                   <input type="text" name="delivery_city" id="delivery_city" data-helper="City" onfocusout="validateDeliveryCity()">
                                   <span class="popuptext"></span>
                                </div><br>
                           </div>
                           <div class="col-3">
                                <div class="helper-text">
                                   <label>Delivery Fee</label><br>
                                   <input type="text" name="delivery_fee" id="delivery_fee" data-helper="Delivery Fee" onfocusout="validateDeliveryFee()">
                                   <span class="popuptext"></span>
                                </div><br>
                           </div>
                        </div>

                        <div row>
                        <div class="center-btn">
                            <button type="submit" class="btn">Add New Charge</button>
                        </div>
                        </div>
            </form>
        </div>
        
    
    <div class="table-container">
    <table>
        <tr>

            <th>City</th>
            <th>Delivery Fee</th>
            <th>Option</th>
            
        </tr>

        <?php foreach ($this->deliverycharges as $charges): ?>

            <tr>
                <td><?php echo $charges['city']; ?></td>
                <td><?php echo $charges['delivery_fee']; ?></td>
                
                    <td><a href="<?php echo URL ?>deliveryCharges/edit/<?php echo $charges['city'] ?>"><button class="table-btn btn-blue">Edit</button></a>
                    <a href="<?php echo URL ?>deliveryCharges/delete/<?php echo $charges['city'] ?>"><button class="table-btn btn-red">Delete</button></a></td>
            
            </tr>

        <?php endforeach;?>
        

          
        
    </table>
    
</div>
</div>
</div>


<script type="text/javascript" src="<?php echo URL ?>public/js/form_validation.js"></script>
<script type="text/javascript" src="<?php echo URL ?>util/form/delivery_charges_form_validation.js"></script>


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