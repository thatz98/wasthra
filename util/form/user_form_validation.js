
    // Input fields
const first_Name = document.getElementById('first_name_user');
const last_Name = document.getElementById('last_name_user');
const User_password = document.getElementById('password_user');
const confirm_User_Password = document.getElementById('conf_password_user');
const User_email = document.getElementById('email_user');
const contact_No = document.getElementById('contact_no_user');
const User_NIC = document.getElementById('User_NIC');
// Form
const form = document.getElementById('addFrom');
// Validation colors


// Handle form
form.addEventListener('submit', function(event) {
  // Prevent default behaviour
  event.preventDefault();
  if (
    validateUserFirstName() &&
    validateUserLastName() &&
    validateUserPassword() &&
    validateUserConfirmPassword() &&
    // validateUserNIC() &&
    validateUserEmail()
  ) {
    form.submit();
  }
});

// Validators
function validateUserFirstName() {
  // check if is empty
  if (checkIfEmpty(first_Name)) return;
  // is if it has only letters
  if (!checkIfOnlyLetters(first_Name)) return;
  return true;
}
function validateUserLastName() {
  // check if is empty
  if (checkIfEmpty(last_Name)) return;
  // is if it has only letters
  if (!checkIfOnlyLetters(last_Name)) return;
  return true;
}

function validateUserContactNo() {
  // check if is empty
  if (checkIfEmpty(contact_No)) return;
  // is if it has only letters
  if (!meetLength(contact_No, 9, 11)) return;

  if (!checkIfOnlyNumbers(contact_No)) return;
  
  return true;
}



function validateUserPassword() {
  // Empty check
  if (checkIfEmpty(User_password)) return;
  // Must of in certain length
  if (!meetLength(User_password, 4, 100)) return;
  // check password against our character set
  // 1- a
  // 2- a 1
  // 3- A a 1
  // 4- A a 1 @
  //if (!containsCharacters(password, 4)) return;
  
  setValid(User_password);
  return true;
}
function validateUserConfirmPassword() {
  if (!validateUserPassword()) {
    setInvalid(confirm_User_Password, 'Password must be valid');
    return;
  }
  // If they match
  if (User_password.value !== confirm_User_Password.value) {
    setInvalid( confirm_User_Password, 'Passwords must match');
    return;
  } else {
    setValid( confirm_User_Password);
  }
  return true;
}
function validateUserEmail() {
  if (checkIfEmpty( User_email)) return;
  if (!containsCharacters( User_email, 5)) return;
  return true;
}
