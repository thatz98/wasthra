
// Input fields
const currentPasswd = document.getElementById('current_password');
const newPasswd = document.getElementById('new_password');
const confNewPasswd = document.getElementById('confirm_new_password');
// Form
const changeForm = document.getElementById('changeFrom');
    
// Handle form
changeForm.addEventListener('submit', function(event) {
// Prevent default behaviour
      event.preventDefault();
      if (
        validateOldPassword() && 
        validateNewPassword() &&
        validateConfirmNewPassword()
      ) {
        changeForm.submit();
      }
    });
    
// Validators

function validateOldPassword() {
        
  // Empty check
  if (checkIfEmpty(currentPasswd)) return;
  // Must of in certain length
  if (!meetLength(currentPasswd, 4, 100)) return;
  // check password against our character set
  // 1- a
  // 2- a 1
  // 3- A a 1
  // 4- A a 1 @
  //if (!containsCharacters(password, 4)) return;
  
  setValid(currentPasswd);
  return true;

}

function validateNewPassword() {
        
    // Empty check
    if (checkIfEmpty(newPasswd)) return;
    // Must of in certain length
    if (!meetLength(newPasswd, 4, 100)) return;
    // check password against our character set
    // 1- a
    // 2- a 1
    // 3- A a 1
    // 4- A a 1 @
    //if (!containsCharacters(password, 4)) return;
    
    setValid(newPasswd);
    return true;
    
}
  
function validateConfirmNewPassword() {

    if (!validateNewPassword()) {
      setInvalid(confNewPasswd, 'Password must be valid');
      return;
    }
    // If they match
    if (newPasswd.value !== confNewPasswd.value) {
      setInvalid( confNewPasswd, 'Passwords must match');
      return;
    } else {
      setValid(confNewPasswd);
    }
    return true;

}
  