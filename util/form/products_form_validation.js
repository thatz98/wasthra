const productId = document.getElementById('product_id');
const productName = document.getElementById('product_name');
const quantity = document.getElementById('quantity');
const colors = document.getElementById('color');
const description = document.getElementById('description');

const editform = document.getElementById('addFrom');


editform.addEventListener('submit', function(event) {

    event.preventDefault();
    if (
        validateProductId() &&
        validateproductName() &&
        validateColors() &&
        validateQuantity() &&
        validateDescription() &&
        validateSingleSize()
    ) {
      editform.submit();
    }
  });

  function validateProductId() {

    if (checkIfEmpty(productId)) return;

    if (!containsCharacters(productId,8)) return;
    return true;

}

function validateproductName() {
    
    if (checkIfEmpty(productName)) return;
    
    // if (!checkIfOnlyLetters(productName)) return;
    return true;

}

function validateColors() {
    
  if (checkIfEmpty(colors)) return;
  
  // if (!checkIfOnlyLetters(productName)) return;
  return true;

}

function validateQuantity() {

  if (checkIfEmpty(quantity)) return;

  if (!checkIfOnlyNumbers(quantity)) return;
  return true;

}

function validateDescription() {
    
  if (checkIfEmpty(description)) return;
  
  // if (!checkIfOnlyLetters(productName)) return;
  return true;

}

function validateSingleSize() {
        
  if (document.getElementById('XS').checked==true || 
  document.getElementById('S').checked==true || 
  document.getElementById('M').checked==true ||
  document.getElementById('L').checked==true ||
  document.getElementById('XL').checked==true) return true;
      setinvalidWithoutColor(document.getElementById('size-field'),'Must be selected');
      return false;
}