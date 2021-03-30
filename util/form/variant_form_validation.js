const Quantity = document.getElementById('Quantity');
const Colors = document.getElementById('Color');
const sizeCouple = document.getElementById('size-couple');
const size = document.getElementById('size');

const editform = document.getElementById('addFromviewProduct');


editform.addEventListener('submit', function(event) {

    event.preventDefault();
    if (
        validateColors() &&
        validateQuantity() &&
        (validateSingleSize() || validateCoupleSize())
        

    ) {
      editform.submit();
    }
  });


function validateColors() {
    
  if (checkIfEmpty(Colors)) return;
  
  if (!containsCharacters(Colors,9)) return;
  return true;

}

function validateQuantity() {

  if (checkIfEmpty(Quantity)) return;

  if (!checkIfOnlyNumbers(Quantity)) return;
  return true;

}


function validateSingleSize() {
        
    if(size.value!="0") return true;
    setinvalidWithoutColor(size,'Must be selected');
        return false;
}

function validateCoupleSize() {
        
    if(sizeCouple.value!="0") return true;
    setinvalidWithoutColor(sizeCouple,'Must be selected');
        return false;
}
