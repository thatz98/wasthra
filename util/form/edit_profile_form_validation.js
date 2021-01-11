
const firstName = document.getElementById('first_name');
const lastName = document.getElementById('last_name');
const email = document.getElementById('email');
const contactNo = document.getElementById('contact_no');
const addressLine1 = document.getElementById('address_line_1_update');
const addressLine2 = document.getElementById('address_line_2_update');
const addressLine3 = document.getElementById('address_line_3_update');
const postalCode = document.getElementById('postal_code');

const editprofileform = document.getElementById('editProfileFrom');

editprofileform.addEventListener('submit', function(event) {
    
      event.preventDefault();
      if ( 
        validateFirstName() &&
        validateLastName() &&
        validateContactNo() &&
        validateEmail() &&
        validateUpdateAddressLine1() &&
        validateUpdateAddressLine2() && 
        validateUpdateAddressLine3() &&
        validatePostalCode()
      ) {
        editprofileform.submit();
      }
    });
    
function validateFirstName() {
    
      if (checkIfEmpty(firstName)) return;

      if (!checkIfOnlyLetters(firstName)) return;
      return true;

    }

function validateLastName() {
    
      if (checkIfEmpty(lastName)) return;
    
      if (!checkIfOnlyLetters(lastName)) return;
      return true;

    }
    
function validateContactNo() {
    
      if (checkIfEmpty(contactNo)) return;

      if (!meetLength(contactNo, 9, 11)) return;
    
      if (!checkIfOnlyNumbers(contactNo)) return;
      return true;
    }

function validateEmail() {

      if (checkIfEmpty(email)) return;

      if (!containsCharacters(email, 5)) return;
      return true;

    }
    
function validateUpdateAddressLine1() {
    
        if (checkIfEmpty(addressLine1)) return;
  
        if (!containsCharacters(addressLine1, 6)) return;
        return true;
  
      }

function validateUpdateAddressLine2() {
    
        if (checkIfEmpty(addressLine2)) return;
  
        if (!checkIfOnlyLetters(addressLine2)) return;
        return true;
  
      }

function validateUpdateAddressLine3() {
    
        if (checkIfEmpty(addressLine3)) return;
  
        if (!checkIfOnlyLetters(addressLine3)) return;
        return true;
  
      }   
    
function validatePostalCode() {
    
        if (checkIfEmpty(postalCode)) return;
  
        if (!meetLength(postalCode,5,6)) return;
      
        if (!checkIfOnlyNumbers(postalCode)) return;
        return true;

      }      