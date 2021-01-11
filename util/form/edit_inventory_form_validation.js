const reorderLevel = document.getElementById('reorder_level');
const reorderQuantity = document.getElementById('reorder_quantity');

const editform = document.getElementById('editFrom');

editform.addEventListener('submit', function(event) {

    event.preventDefault();
    if (
      validateReorderLevel() &&
      validateReorderQuantity()
    ) {
      editform.submit();
    }
  });

  function validateReorderLevel() {
 
    if (checkIfEmpty(reorderLevel)) return;

    if (!checkIfOnlyNumbers(reorderLevel)) return;
    return true;

}

function validateReorderQuantity() {
 
    if (checkIfEmpty(reorderQuantity)) return;

    if (!checkIfOnlyNumbers(reorderQuantity)) return;
    return true;

}