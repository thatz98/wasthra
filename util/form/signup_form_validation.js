
    // Input fields
const firstName = document.getElementById('first_name');
const lastName = document.getElementById('last_name');
const password = document.getElementById('password');
const confirmPassword = document.getElementById('conf_password');
const email = document.getElementById('email');
const contactNo = document.getElementById('contact_no');
// Form
const form = document.getElementById('regForm');
// Validation colors

// Handle form
form.addEventListener('submit', function(event) {
  // Prevent default behaviour
  event.preventDefault();      
      if (
        validateGender() && validateFirstName()
      && validateLastName()
      && validatePassword()
      && validateConfirmPassword()
      && validateEmail()
      && validateContactNo()
       
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
  if (!meetLength(contactNo, 9, 11)) return;

  if (!checkIfOnlyNumbers(contactNo)) return;
  
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

function validateGender() {
        
  if (document.getElementById('male').checked==true || document.getElementById('female').checked==true || document.getElementById('other').checked==true) return true;
      setinvalidWithoutColor(document.getElementById('gender-radio'),'Must be selected');
      return false;
}
//mobile----->


    // Input fields
    const firstNameM = document.getElementById('first_name_m');
    const lastNameM = document.getElementById('last_name_m');
    const passwordM = document.getElementById('password_m');
    const confirmPasswordM = document.getElementById('conf_password_m');
    const emailM = document.getElementById('email_m');
    const contactNoM = document.getElementById('contact_no_m');

    // Form
    const formM = document.getElementById('regForm_m');
    // Validation colors
    
    // Handle form
    formM.addEventListener('submit', function(event) {
      // Prevent default behaviour
      event.preventDefault();
      
      if (validateFirstNameM()
      && validateLastNameM()
      && validatePasswordM()
      && validateConfirmPasswordM()
      && validateEmailM()
      && validateContactNoM()
      && validateGenderM()
      ) {
        formM.submit();
      }
    });
    
    // Validators
    function validateFirstNameM() {
      // check if is empty
      if (checkIfEmpty(firstNameM)) return;
      // is if it has only letters
      if (!checkIfOnlyLetters(firstNameM)) return;
      return true;
    }
    function validateLastNameM() {
      // check if is empty
      if (checkIfEmpty(lastNameM)) return;
      // is if it has only letters
      if (!checkIfOnlyLetters(lastNameM)) return;
      return true;
    }
    
    function validateContactNoM() {
      // check if is empty
      if (checkIfEmpty(contactNoM)) return;
      // is if it has only letters
      if (!meetLength(contactNoM, 9, 11)) return;
    
      if (!checkIfOnlyNumbers(contactNoM)) return;
      
      return true;
    }
    
    
    function validatePasswordM() {
      // Empty check
      if (checkIfEmpty(passwordM)) return;
      // Must of in certain length
      if (!meetLength(passwordM, 4, 100)) return;
      // check password against our character set
      // 1- a
      // 2- a 1
      // 3- A a 1
      // 4- A a 1 @
      //if (!containsCharacters(password, 4)) return;
      
      setValid(passwordM);
      return true;
    }
    function validateConfirmPasswordM() {
      if (!validatePasswordM()) {
        setInvalid(confirmPasswordM, 'Password must be valid');
        return;
      }
      // If they match
      if (passwordM.value !== confirmPasswordM.value) {
        setInvalid(confirmPasswordM, 'Passwords must match');
        return;
      } else {
        setValid(confirmPasswordM);
      }
      return true;
    }
    function validateEmailM() {
      if (checkIfEmpty(emailM)) return;
      if (!containsCharacters(emailM, 5)) return;
      return true;
    }
    
    function validateGenderM() {
        
      if (document.getElementById('male-m').checked==true || document.getElementById('female-m').checked==true || document.getElementById('other-m').checked==true) return true;
      setinvalidWithoutColor(document.getElementById('gender-radio-m'),'Must be selected');
      return false;
    }

