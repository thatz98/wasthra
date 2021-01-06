const city = document.getElementById('city');
const deliveryFee = document.getElementById('delivery_fee');


const form = document.getElementById('addFrom');

form.addEventListener('submit', function(event) {

    event.preventDefault();
    if (
      validateCity() &&
      validateDeliveryFee()
    ) {
      form.submit();
    }
  });


function validateCity() {
 
    if (checkIfEmpty(city)) return;

    if (!checkIfOnlyLetters(city)) return;
    return true;

}

function validateDeliveryFee() {
 
    if (checkIfEmpty(deliveryFee)) return;

    if (!checkIfOnlyNumbers(deliveryFee)) return;
    return true;

}