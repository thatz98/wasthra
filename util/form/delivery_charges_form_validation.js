const deliveryFee = document.getElementById('delivery_fee');
const deliveryCity = document.getElementById('delivery_city');

const form = document.getElementById('addFrom');

form.addEventListener('submit', function(event) {

    event.preventDefault();
    if (
      validateDeliveryCity() &&
      validateDeliveryFee()
    ) {
      form.submit();
    }
  });


function validateDeliveryCity() {
 
    if (checkIfEmpty(deliveryCity)) return;

    if (!checkIfOnlyLetters(deliveryCity)) return;
    return true;

}


function validateDeliveryFee() {
 
    if (checkIfEmpty(deliveryFee)) return;

    if (!checkIfOnlyPrice(deliveryFee)) return;
    return true;

}