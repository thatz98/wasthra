
    // Input fields
const firstName = document.getElementById('first_name');
const lastName = document.getElementById('last_name');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('conf_password');
const email = document.getElementById('email');
const contactNo = document.getElementById('contact_no');
const nic = document.getElementById('nic');
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
    form.submit();
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

function validateContactNo() {
  // check if is empty
  if (checkIfEmpty(contactNo)) return;
  // is if it has only letters
  if (!meetLength(contactNo, 9, 10)) return;

  if (!checkIfOnlyNumbers(contactNo)) return;
  
  return true;
}

function validateNIC() {
  // check if is empty
  if (checkIfEmpty(nic)) return;
  // is if it has only letters
  if (!meetLength(nic, 10, 12)) return;

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
