
    // Input fields
    const checkUsername = document.getElementById('check_username');
   
    // Form
    const forgotForm = document.getElementById('forgot-password');
    // Validation colors
    
    // Handle form
    forgotForm.addEventListener('submit', function(event) {
      // Prevent default behaviour
      event.preventDefault();
      if (
        validateForgotPasswordUsername()
      ) {
        forgotForm.submit();
      }
    });
    
    // Validators

    function validateForgotPasswordUsername() {
        
      if (checkIfEmpty(checkUsername)) return;
      if (!containsCharacters(checkUsername, 5)) return;
      return true;
    }

