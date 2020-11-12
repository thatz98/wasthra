
    // Input fields
    const newPassword = document.getElementById('new_password');
    const confirmNewPassword = document.getElementById('confirm_new_password');

    
    // Form
    const resetForm = document.getElementById('resetForm');
    // Validation colors
    
    // Handle form
    resetForm.addEventListener('submit', function(event) {
      // Prevent default behaviour
      event.preventDefault();
      if (
        validateNewPassword() &&
        validateConfirmNewPassword()
      ) {
        resetForm.submit();
      }
    });
    
    // Validators
    
    function validateNewPassword() {
      // Empty check
      if (checkIfEmpty(newPassword)) return;
      // Must of in certain length
      if (!meetLength(newPassword, 4, 100)) return;
      // check password against our character set
      // 1- a
      // 2- a 1
      // 3- A a 1
      // 4- A a 1 @
      //if (!containsCharacters(password, 4)) return;
      
      setValid(newPassword);
      return true;
    }
    function validateConfirmNewPassword() {
      if (!validateNewPassword()) {
        setInvalid(confirmNewPassword, 'Password must be valid');
        return;
      }
      // If they match
      if (newPassword.value !== confirmNewPassword.value) {
        setInvalid(confirmNewPassword, 'Passwords must match');
        return;
      } else {
        setValid(confirmNewPassword);
      }
      return true;
    }