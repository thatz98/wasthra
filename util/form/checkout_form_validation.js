const firstName = document.getElementById('first_name');
const lastName = document.getElementById('last_name');
const postalCode = document.getElementById('postal_code');
const city = document.getElementById('city');
const contactNumber = document.getElementById('contact_no');
const deliveryComment = document.getElementById('delivery_comment');
const addressLine1 = document.getElementById('address_line_1');
const addressLine2 = document.getElementById('address_line_2');
const addressLine3 = document.getElementById('address_line_3');

const editform = document.getElementById('editFrom');

editform.addEventListener('submit', function(event) {

    event.preventDefault();
    if (
        validateFirstName() &&
        validateLastName() &&
        validatePostalCode() &&
        validateAddressLine1() &&
        validateAddressLine2() &&
        validateAddressLine3() &&
        validateDeliveryComment() &&
        validateCity() &&
        validateContactNoM() &&
        validatePayMethod()
        
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

function validatePostalCode() {
    
    if (checkIfEmpty(postalCode)) return;
    
    if (!checkIfOnlyNumbers(postalCode)) return;
    return true;

}

function validateAddressLine1() {
    
    if (checkIfEmpty(addressLine1)) return;

    return true;

}

function validateAddressLine2() {
    
    if (checkIfEmpty(addressLine2)) return;

    return true;

}

function validateAddressLine3() {
    
    if (checkIfEmpty(addressLine3)) return;

    return true;

}

function validateDeliveryComment() {
    
    if (checkIfEmpty(deliveryComment)) return;

    return true;

}

function validateCity(){
    if(document.getElementById('city').value!="0") return true;
    setinvalidWithoutColor(document.getElementById('is_published'),'Must be selected');
        return false;
}

function validateContactNoM() {
    // check if is empty
    if (checkIfEmpty(contactNumber)) return;
    // is if it has only letters
    if (!meetLength(contactNumber, 9, 11)) return;
  
    if (!checkIfOnlyNumbers(contactNumber)) return;
    
    return true;
}

function validatePayMethod() {
        
    if (document.getElementById('cash-on-delivery').checked==true || document.getElementById('online').checked==true) return true;
    setinvalidWithoutColor(document.getElementById('gender-radio-m'),'Must be selected');
    return false;
  }

