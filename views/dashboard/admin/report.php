<?php require 'views/header_dashboard.php'; ?>


<div class="container">
    <div class="row">
        <h2>Generate Report</h2>
     </div>
</div>


<div class="container">
    <div class="center-content">
        <h4>Select Area *</h4>
     </div>

    <div class="center-content">
        <select name="" class="pad-l-55">
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
            <option value=""></option>
        </select><br>
    </div>
  
    <div class="center-content">
        <h4><br>Select Columns *</h4><br><br><br>
    </div>
    <div class="center-content">
        <input type="checkbox" name="column1"> Column 1</br></br>
    </div>
    <div class="center-content">    
        <input type="checkbox" name="column2"> Column 2</br></br>
    </div>
    <div class="center-content">    
        <input type="checkbox" name="column3"> Column 3</br></br>
    </div>
    <div class="center-content">    
        <input type="checkbox" name="column4"> Column 4</br></br>
    </div>
    <div class="center-content">    
        <input type="checkbox" name="column5"> Column 5</br></br>
    </div>

    <div></div>

    <div class="form-btn center-btn">
        <Button type="submit" name="generate report" class="btn" onclick="displayPrompt()">Generate Report</Button>
    </div>










</div>



<?php require 'views/footer.php'; ?>

<script type="text/javascript">
   function displayPrompt(){
    
   }

</script>
