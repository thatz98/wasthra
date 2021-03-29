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
        
    if(document.getElementById('size').value!="0") return true;
    setinvalidWithoutColor(document.getElementById('is_published'),'Must be selected');
        return false;
}

function validateCoupleSize() {
        
    if(document.getElementById('size-couple').value!="0") return true;
    setinvalidWithoutColor(document.getElementById('is_published'),'Must be selected');
        return false;
}
