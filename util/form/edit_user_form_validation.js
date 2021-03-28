// Input fields

const edit_FirstName = document.getElementById('first_name_edituser');
const edit_LastName = document.getElementById('last_name_edituser');
const edit_Email = document.getElementById('email_edituser');
const edit_ContactNo = document.getElementById('contact_no_edituser');

// Form
const editform = document.getElementById('editFrom');


// Handle form
editform.addEventListener('submit', function (event) {

  // Prevent default behaviour
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

// Validators
function validateEditFirstName() {

  if (checkIfEmpty(edit_FirstName)) return;

  if (!checkIfOnlyLetters(edit_FirstName)) return;
  return true;

}

function validateEditLastName() {

  if (checkIfEmpty(last_name_edituser)) return;

  if (!checkIfOnlyLetters(last_name_edituser)) return;
  return true;

}

function validateEditContactNo() {

  if (checkIfEmpty(edit_ContactNo)) return;

  if (!meetLength(edit_ContactNo, 9, 11)) return;

  if (!checkIfOnlyNumbers(edit_ContactNo)) return;
  return true;
  //mobile---->

}


function validateEditEmail() {

  if (checkIfEmpty(edit_Email )) return;

  if (!containsCharacters(edit_Email, 5)) return;
  return true;
  //check whether a acceptable e-mail

}
