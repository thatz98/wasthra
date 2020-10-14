<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=(isset($this->title)) ? $this->title : 'Wasthra'; ?></title>
    <link rel="stylesheet" href="<?php echo URL; ?>public/css/all.css">
    <link rel="stylesheet" type="text/css" href="public/css/login.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/9a9d2e1253.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="header-plain">
        <div class="contaner">
            <div class="navbar">
                <div class="logo">
                    <img src="<?php echo URL; ?>public/images/logo.png" width="125px">
                </div>
                <nav>
                    <ul id="menuItems">
                        <li><a href="<?php echo URL; ?>">Home</a></li>
                        <li><a href="<?php echo URL; ?>shop">Shop</a></li>
                        <li><a href="<?php echo URL; ?>about">About</a></li>
                        <li><a href="<?php echo URL; ?>contact">Contact Us</a></li>
                        <?php if(Session::get('loggedIn')==true): ?>
                            <li><a href="<?php echo URL; ?>login/logout">Logout</a></li>
                        <?php else: ?>
                            <li><a href="<?php echo URL; ?>login">Login/Signup</a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <img src="<?php echo URL; ?>public/images/cart.png" width="30px" height="30px">
                <img src="<?php echo URL; ?>public/images/menu.png" class="menu-icon" onclick="menuToggle()">
            </div>

            <div class="login">
                <div class="login-form-cont">
                    <div class="form sign-in" style="padding-top: 130px;">
                    <h2>Welcome back,</h2>
    <div class="form-inner-container" >
                                <form action="<?php echo URL; ?>login/signup" id="regForm" method="post" novalidate>
                                    <div class="row">
                                        <div style="text-align: center;">
                                            <label>Username</label><br>
                                            <input type="text" name="email" onfocusout="validateEmail()" id="email">
                                            <div class="helper-text"><span></span></div>
                                            
                                            
                                            <label>Password</label><br>
                                            <input type="password" name="password" onfocusout="validatePassword()" id="password"><div class="helper-text"><span></span></div>
                                        </div>
                                        
                                    </div>
                                    <button type="submit" class="btn">Login</button>
                                </form>
                            </div>
  </div>
  <div class="sub-cont">
    <div class="img">
      <div class="img__text m--up">
        <h2>New here?</h2>
        <p>Sign up and discover great amount of new opportunities!</p>
      </div>
      <div class="img__text m--in">
        <h2>One of us?</h2>
        <p>If you already has an account, just sign in. We've missed you!</p>
      </div>
      <div class="img__btn">
        <span class="m--up t-btn">Sign Up</span>
        <span class="m--in">Login</span>
      </div>
    </div>
    <div class="form sign-up">
      <h2>Time to feel like home,</h2>
                    <div class="form-inner-container" >
                                <form action="<?php echo URL; ?>login/signup" id="regForm" method="post" novalidate>
                                    <div class="row">
                                        <div class="col-2" style="text-align: center;">
                                            <label>First Name</label><br>
                                            <input type="text" name="first_name" onfocusout="validateFirstName()" id="first_name">
                                            <div class="helper-text"><span></span></div>
                                            <label>NIC</label><br>
                                            <input type="text" name="nic" onfocusout="validateNIC()" id="nic">
                                            <div class="helper-text"><span></span></div>
                                            <label>Mobile Number</label><br>
                                            <input type="text" name="contact_no" onfocusout="validateContactNo()" id="contact_no">
                                            <div class="helper-text"><span></span></div>
                                            <label>Password : </label><br>
                                            <input type="password" name="password" onfocusout="validatePassword()" id="password"><div class="helper-text"><span></span></div>
                                        </div>
                                        <div class="col-2" style="text-align: center;">
                                            <label>Last Name</label><br>
                                            <input type="text" name="last_name" onfocusout="validateLastName()" id="last_name">
                                            <div class="helper-text"><span></span></div>
                                            <label>Email</label><br>
                                            <input type="email" name="email" onfocusout="validateEmail()" id="email">
                                            <div class="helper-text"><span></span></div>
                                            <label>Gender</label><br>
                                            <select name="gender">
                                                <option value="male">Male</option>
                                                <option value="female">Female</option></select><div class="helper-text"><span></span></div>
                                            <label>Confirm Password</label><br>
                                            <input type="password" name="conf_password" onfocusout="validateConfPassword()" id="conf_password">
                                            <div class="helper-text"><span></span></div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn">Sign Up</button>
                                </form>
                            </div>
</div>
</div>
</div>
        </div>
    </div>
<!--------account -------->
<!---------    
<div class="account-page">
    <div class="container">
        <div class="row">
            <div class="col-2">
                <img src="public/images/image1.png" width="100%">
            </div>
            <div class="col-2">
                <div class="login-form-container">
                    <div class="form-btn">
                        <span onclick="login()">Login</span>
                        <span onclick="register()">Register</span>
                        <hr id="indicator">
                    </div>
                    <form action="<?php echo URL; ?>login/run" id="loginForm" method="post">
                        <input type="text" placeholder="Username" name="username">
                        <input type="password" placeholder="Password" name="password">
                        <button type="submit" class="btn">Login</button><br>
                        <a href="">Forgot password</a>
                    </form>
                    <form action="<?php echo URL; ?>login/signup" id="regForm" method="post" novalidate>
                        <input type="text" placeholder="First Name" name="first_name" onfocusout="validateFirstName()" id="first_name"><span class="helper-text"></span>
                        <input type="text" placeholder="Last Name" name="last_name" onfocusout="validateLastName()" id="last_name"><span class="helper-text"></span><span class="helper-text"></span>
                        <input type="text" placeholder="NIC" name="nic" onfocusout="validateNIC()" id="nic"><span class="helper-text"></span>
                        <input type="email" placeholder="Email" name="email" onfocusout="validateEmail()" id="email"><span class="helper-text"></span>
                        <input type="text" placeholder="Mobile Number" name="contact_no" onfocusout="validateContactNo()" id="contact_no"><span class="helper-text"></span>
                        <input type="text" placeholder="Gender" name="gender" onfocusout="validateFirstName()" id="gender">
                        <input type="password" placeholder="Password" name="password" onfocusout="validatePassword()" id="password"><span class="helper-text"></span>
                        <input type="password" placeholder="Confirm Password" name="conf_password" onfocusout="validateConfPassword()" id="conf_password"><span class="helper-text"></span>
                        <button type="submit" class="btn">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> ------>



<script>
    
    document.querySelector('.img__btn').addEventListener('click', function() {
  document.querySelector('.login-form-cont').classList.toggle('s--signup');
});
    // Input fields
const firstName = document.getElementById('first_name');
const lastName = document.getElementById('last_name');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('conf_password');
const email = document.getElementById('email');
// Form
const form = document.getElementById('regForm');
// Validation colors
const green = '#4CAF50';
const red = '#F44336';

// Handle form
form.addEventListener('submit', function(event) {
  // Prevent default behaviour
  event.preventDefault();
  if (
    validateFirstName() &&
    validateLastName() &&
    validatePassword() &&
    validateConfirmPassword() &&
    validateEmail()
  ) {
    const name = firstName.value;
    const container = document.querySelector('div.login-form-container');
    const loader = document.createElement('div');
    loader.className = 'progress';
    const loadingBar = document.createElement('div');
    loadingBar.className = 'indeterminate';
    loader.appendChild(loadingBar);
    container.appendChild(loader);
    setTimeout(function() {
      const loaderDiv = document.querySelector('div.progress');
      const panel = document.createElement('div');
      panel.className = 'card-panel green';
      const text = document.createElement('span');
      text.className = 'white-text';
      text.appendChild(
        document.createTextNode(
          `Sign up successful, welcom to Wasthra ${name}`
        )
      );
      panel.appendChild(text);
      container.replaceChild(panel, loaderDiv);
    }, 1000);
  }
});

// Validators
function validateFirstName() {
  // check if is empty
  if (checkIfEmpty(firstName)) return;
  // is if it has only letters
  if (!checkIfOnlyLetters(firstName)) return;
  return true;
}
function validateLastName() {
  // check if is empty
  if (checkIfEmpty(lastName)) return;
  // is if it has only letters
  if (!checkIfOnlyLetters(lastName)) return;
  return true;
}
function validatePassword() {
  // Empty check
  if (checkIfEmpty(password)) return;
  // Must of in certain length
  if (!meetLength(password, 4, 100)) return;
  // check password against our character set
  // 1- a
  // 2- a 1
  // 3- A a 1
  // 4- A a 1 @
  //   if (!containsCharacters(password, 4)) return;
  return true;
}
function validateConfirmPassword() {
  if (password.className !== 'valid') {
    setInvalid(confirmPassword, 'Password must be valid');
    return;
  }
  // If they match
  if (password.value !== confirmPassword.value) {
    setInvalid(confirmPassword, 'Passwords must match');
    return;
  } else {
    setValid(confirmPassword);
  }
  return true;
}
function validateEmail() {
  if (checkIfEmpty(email)) return;
  if (!containsCharacters(email, 5)) return;
  return true;
}
// Utility functions
function checkIfEmpty(field) {
  if (isEmpty(field.value.trim())) {
    // set field invalid
    setInvalid(field, `${field.name} must not be empty`);
    return true;
  } else {
    // set field valid
    setValid(field);
    return false;
  }
}
function isEmpty(value) {
  if (value === '') return true;
  return false;
}
function setInvalid(field, message) {
  field.className = 'invalid';
  field.nextElementSibling.innerHTML = message;
  field.nextElementSibling.style.color = red;
}
function setValid(field) {
  field.className = 'valid';
  field.nextElementSibling.innerHTML = '';
  //field.nextElementSibling.style.color = green;
}
function checkIfOnlyLetters(field) {
  if (/^[a-zA-Z ]+$/.test(field.value)) {
    setValid(field);
    return true;
  } else {
    setInvalid(field, `${field.name} must contain only letters`);
    return false;
  }
}
function meetLength(field, minLength, maxLength) {
  if (field.value.length >= minLength && field.value.length < maxLength) {
    setValid(field);
    return true;
  } else if (field.value.length < minLength) {
    setInvalid(
      field,
      `${field.name} must be at least ${minLength} characters long`
    );
    return false;
  } else {
    setInvalid(
      field,
      `${field.name} must be shorter than ${maxLength} characters`
    );
    return false;
  }
}
function containsCharacters(field, code) {
  let regEx;
  switch (code) {
    case 1:
      // letters
      regEx = /(?=.*[a-zA-Z])/;
      return matchWithRegEx(regEx, field, 'Must contain at least one letter');
    case 2:
      // letter and numbers
      regEx = /(?=.*\d)(?=.*[a-zA-Z])/;
      return matchWithRegEx(
        regEx,
        field,
        'Must contain at least one letter and one number'
      );
    case 3:
      // uppercase, lowercase and number
      regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])/;
      return matchWithRegEx(
        regEx,
        field,
        'Must contain at least one uppercase, one lowercase letter and one number'
      );
    case 4:
      // uppercase, lowercase, number and special char
      regEx = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*\W)/;
      return matchWithRegEx(
        regEx,
        field,
        'Must contain at least one uppercase, one lowercase letter, one number and one special character'
      );
    case 5:
      // Email pattern
      regEx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return matchWithRegEx(regEx, field, 'Must be a valid email address');
    default:
      return false;
  }
}
function matchWithRegEx(regEx, field, message) {
  if (field.value.match(regEx)) {
    setValid(field);
    return true;
  } else {
    setInvalid(field, message);
    return false;
  }
}

</script>

<?php require 'views/footer.php'; ?>
