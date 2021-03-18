const firstNameCheckout = document.getElementById('first_name_checkout');
const lastNameCheckout = document.getElementById('last_name_checkout');
const postalCodeCheckout = document.getElementById('postal_code_checkout');
const cityCheckout = document.getElementById('city_checkout');
const contactNumberCheckout = document.getElementById('contact_no_checkout');
const deliveryCommentCheckout = document.getElementById('delivery_comment_checkout');
const addressLine1Checkout = document.getElementById('address_line_1_checkout');
const addressLine2Checkout = document.getElementById('address_line_2_checkout');
const addressLine3Checkout = document.getElementById('address_line_3_checkout');

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
        validateCity() &&
        validateContactNoM() &&
        validatePayMethod()
        
    ) {
      editform.submit();
    }
  });

  function validateFirstName() {
    
    if (checkIfEmpty(firstNameCheckout)) return;
    
    if (!checkIfOnlyLetters(firstNameCheckout)) return;
    return true;

}

function validateLastName() {
    
    if (checkIfEmpty(lastNameCheckout)) return;
    
    if (!checkIfOnlyLetters(lastNameCheckout)) return;
    return true;

}

function validatePostalCode() {
    
    if (checkIfEmpty(postalCodeCheckout)) return;
    
    if (!checkIfOnlyNumbers(postalCodeCheckout)) return;
    return true;

}

function validateAddressLine1() {
    
    if (checkIfEmpty(addressLine1Checkout)) return;

    return true;

}

function validateAddressLine2() {
    
    if (checkIfEmpty(addressLine2Checkout)) return;

    return true;

}

function validateAddressLine3() {
    
    if (checkIfEmpty(addressLine3Checkout)) return;

    return true;

}

// function validateDeliveryComment() {
    
//     if (checkIfEmpty(deliveryCommentCheckout)) return;

//     return true;

// }

function validateCity(){
    if(document.getElementById('city_checkout').value!="0") return true;
    setinvalidWithoutColor(document.getElementById('is_published'),'Must be selected');
        return false;
}

function validateContactNoM() {
    // check if is empty
    if (checkIfEmpty(contactNumberCheckout)) return;
    // is if it has only letters
    if (!meetLength(contactNumberCheckout, 9, 11)) return;
  
    if (!checkIfOnlyNumbers(contactNumberCheckout)) return;
    
    return true;
}

function validatePayMethod() {
        
    if (document.getElementById('cash-on-delivery').checked==true || document.getElementById('online').checked==true) return true;
    setinvalidWithoutColor(document.getElementById('gender-radio-m'),'Must be selected');
    return false;
  }

