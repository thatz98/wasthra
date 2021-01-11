
    // Input fields
    const username = document.getElementById('username');
    const loginPassword = document.getElementById('login_password');

    
    // Form
    const loginForm = document.getElementById('loginForm');

    
    // Handle form
    loginForm.addEventListener('submit', function(event) {
      // Prevent default behaviour
      event.preventDefault();
      if (
        validateLoginPassword() &&
        validateUsername()
      ) {
        loginForm.submit();
      }
    });
    
    // Validators
    
    
    function validateLoginPassword() {
      // Empty check
      if (checkIfEmpty(loginPassword)) return;
      // Must of in certain length
      if (!meetLength(loginPassword, 4, 100)) return;
      // check password against our character set
      // 1- a
      // 2- a 1
      // 3- A a 1
      // 4- A a 1 @
      //if (!containsCharacters(password, 4)) return;
      
      setValid(loginPassword);
      return true;
    }


    function validateUsername() {
        
      if (checkIfEmpty(username)) return;
      if (!containsCharacters(username, 5)) return;
      return true;
    }

   
    //mobile---->


    // Input fields
    const usernameM = document.getElementById('username_m');
    const loginPasswordM = document.getElementById('login_password_m');

    
    // Form
    const loginFormM = document.getElementById('loginForm_m');
    // Validation colors
    
    // Handle form
    loginFormM.addEventListener('submit', function(event) {
      // Prevent default behaviour
      event.preventDefault();
      if (
        validateLoginPasswordM() &&
        validateUsernameM()
      ) {
        loginForm.submit();
      }
    });
    
    // Validators
    
    
    function validateLoginPasswordM() {
      // Empty check
      if (checkIfEmpty(loginPasswordM)) return;
      // Must of in certain length
      if (!meetLength(loginPasswordM, 4, 100)) return;
      // check password against our character set
      // 1- a
      // 2- a 1
      // 3- A a 1
      // 4- A a 1 @
      //if (!containsCharacters(password, 4)) return;
      
      setValid(loginPasswordM);
      return true;
    }


    function validateUsernameM() {
        
      if (checkIfEmpty(usernameM)) return;
      if (!containsCharacters(usernameM, 5)) return;
      return true;
    }

    