const firstName = document.getElementById('first_name_edituser');
const lastName = document.getElementById('last_name_edituser');
const email = document.getElementById('email_edituser');
const contactNo = document.getElementById('contact_no_edituser');
    
const editform = document.getElementById('editFrom');


editform.addEventListener('submit', function(event) {

      event.preventDefault();
      if (
        validateEditFirstName() &&
        validateEditLastName() &&
        validateEditContactNo() &&
        validateEditEmail()
      ) {
        editform.submit();
      }
    });
    
function validateEditFirstName() {

      if (checkIfEmpty(first_name_edituser)) return;
    
      if (!checkIfOnlyLetters(first_name_edituser)) return;
      return true;

    }

function validateEditLastName() {

      if (checkIfEmpty(last_name_edituser)) return;

      if (!checkIfOnlyLetters(last_name_edituser)) return;
      return true;

    }

function validateEditContactNo() {
    
      if (checkIfEmpty(contact_no_edituser)) return;
    
      if (!meetLength(contact_no_edituser, 9, 11)) return;
    
      if (!checkIfOnlyNumbers(contact_no_edituser)) return;
      return true;

    }
  
    
function validateEditEmail() {

      if (checkIfEmpty(email_edituser)) return;

      if (!containsCharacters(email_edituser, 5)) return;
      return true;

    }
    