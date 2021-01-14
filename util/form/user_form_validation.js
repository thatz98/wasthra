
    // Input fields
const first_Name = document.getElementById('first_name_user');
const last_Name = document.getElementById('last_name_user');
const password = document.getElementById('password_user');
const confirm_Password = document.getElementById('conf_password_user');
const email = document.getElementById('email_user');
const contact_No = document.getElementById('contact_no_user');
// Form
const form = document.getElementById('addFrom');
// Validation colors


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
    form.submit();
  }
});

// Validators
function validateFirstName() {
  // check if is empty
  if (checkIfEmpty(first_Name)) return;
  // is if it has only letters
  if (!checkIfOnlyLetters(first_Name)) return;
  return true;
}
function validateLastName() {
  // check if is empty
  if (checkIfEmpty(last_Name)) return;
  // is if it has only letters
  if (!checkIfOnlyLetters(last_Name)) return;
  return true;
}

function validateContactNo() {
  // check if is empty
  if (checkIfEmpty(contact_No)) return;
  // is if it has only letters
  if (!meetLength(contact_No, 9, 11)) return;

  if (!checkIfOnlyNumbers(contact_No)) return;
  
  return true;
}

function validateNIC() {
  // check if is empty
  if (checkIfEmpty(nic)) return;
  // is if it has only letters
  if (!meetLength(nic, 10, 13)) return;

  setValid(nic);
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
  //if (!containsCharacters(password, 4)) return;
  
  setValid(password);
  return true;
}
function validateConfirmPassword() {
  if (!validatePassword()) {
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
