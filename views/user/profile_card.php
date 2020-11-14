<link rel="stylesheet" href="<?php echo URL; ?>public/css/profile_card.css">
<?php require 'change_password.php';?>
<?php require 'edit_profile.php';?>
<?php require 'add_new_address.php';?>

<div id="profile-card" class="overlay">
    <div class="profile-card-popup">
        <a href="#" class="close-btn"><i class="fa fa-times-circle"></i></a>
        <div class="row">
      <div class="our-team">
        <div class="picture">
        <div id="profileImage"></div>
        </div>
        <div class="team-content">
            <h3 class="title"><?php echo Session::get('userData')['first_name'].' '.Session::get('userData')['last_name']?></h3><br>
            <div class="row">
                <div class="col-2">
                <span id="firstNameDisplay" hidden><?php echo Session::get('userData')['first_name'];?></span>
<span id="lastNameDisplay" hidden><?php echo Session::get('userData')['last_name'];?></span>   
          
            <label class="field">Email</label><br>
            <h4 class="data-val"><?php echo Session::get('userData')['email'];?></h4><br>
            <label class="field">Gender</label><br>
          <h4 class="data-val"><?php echo Session::get('userData')['gender'];?></h4><br>
            </div>
          <div class="col-2">
          
          <label class="field">Contact Number</label><br>
          <h4 class="data-val"><?php echo Session::get('userData')['contact_no'];?></h4><br>
          <?php if(Session::get('userType')=='customer'){?>
            <label class="field">Address</label><br>
            <?php if(empty(Session::get('addressData'))){?>
              <h4 class="data-val">Not set - <a href="#add-new-address">Add new</a></h4><br>
            <?php } else{
              ?><h4 class="data-val"><?php echo Session::get('addressData')['address_line_1'].', '.Session::get('addressData')['address_line_2'].', '.Session::get('addressData')['address_line_3'];?></h4><br>
           <?php } }?>
              
      </div>
            </div>
            
        </div>
        <ul class="social">
          
          
          <li><a href="#edit-profile"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile</a></li>
          <li><a href="#change-password"><i class="fa fa-key" aria-hidden="true"></i> Change Password</a></li>
          <li><a href="<?php echo URL?>login/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
        </ul>
      </div>

        </div>
        <div class="row">
            
    </div>
    </div>
</div>

<script>
  $(document).ready(function(){
  var intials = $('#firstNameDisplay').text().charAt(0) + $('#lastNameDisplay').text().charAt(0);
  var profileImage = $('#profileImage').text(intials);
});
  </script>
