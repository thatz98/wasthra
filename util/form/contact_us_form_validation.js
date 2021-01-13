const firstNameContact = document.getElementById('first_name_contact');
const lastNameContact = document.getElementById('last_name_contact');
const emailContact = document.getElementById('email _contact');
const messageContact = document.getElementById('message_contact');
const contactNumberContact = document.getElementById('contact_no_contact');

const editform = document.getElementById('editFrom');

editform.addEventListener('submit', function(event) {

    event.preventDefault();
    if (
        validateFirstName() &&
        validateLastName() &&
        validateMessage() &&
        validateEmailM() &&
        validateContactNoM()
        
    ) {
      editform.submit();
    }
  });

  function validateEmailM() {
    if (checkIfEmpty(emailContact)) return;
    if (!containsCharacters(emailContact, 5)) return;
    return true;
  }

  function validateFirstName() {
    
    if (checkIfEmpty(firstNameContact)) return;
    
    if (!checkIfOnlyLetters(firstNameContact)) return;
    return true;

}

function validateLastName() {
    
    if (checkIfEmpty(lastNameContact)) return;
    
    if (!checkIfOnlyLetters(lastNameContact)) return;
    return true;

}

function validateMessage() {
    
    if (checkIfEmpty(messageContact)) return;

    return true;

}

function validateContactNoM() {
    // check if is empty
    if (checkIfEmpty(contactNumberContact)) return;
    // is if it has only letters
    if (!meetLength(contactNumberContact, 9, 11)) return;
  
    if (!checkIfOnlyNumbers(contactNumberContact)) return;
    
    return true;
}