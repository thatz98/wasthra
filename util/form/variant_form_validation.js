const Quantity = document.getElementById('Quantity');
const Colors = document.getElementById('Color');
const size = document.getElementById('size');

const editform = document.getElementById('addFromviewProduct');


editform.addEventListener('submit', function(event) {

    event.preventDefault();
    if (
        validateColors() &&
        validateQuantity() &&
        validateSize()
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


function validateSize() {
        
    if(size.value!="0") return true;
    setinvalidWithoutColor(size,'Must be selected');
        return false;
}
