const deliveryFee = document.getElementById('delivery_fee');
const deliveryCity = document.getElementById('delivery_city');

const editform = document.getElementById('editFrom');

editform.addEventListener('submit', function(event) {

    event.preventDefault();
    if (
      validateDeliveryCity() &&
      validateDeliveryFee()
    ) {
      editform.submit();
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