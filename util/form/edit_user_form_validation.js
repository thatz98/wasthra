const firstName = document.getElementById('first_name_u');
const lastName = document.getElementById('last_name_u');
const email = document.getElementById('email_u');
const contactNo = document.getElementById('contact_no_u');
    
const editform = document.getElementById('editFrom');

editform.addEventListener('submit', function(event) {

      event.preventDefault();
      if (
        validateFirstName() &&
        validateLastName() &&
        validateEmail()
      ) {
        editform.submit();
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
    