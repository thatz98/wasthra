const categoryId = document.getElementById('category_id');
const categoryName = document.getElementById('category_name');
const productionCost = document.getElementById('production_cost');
const marketPrice = document.getElementById('market_price');
const discount = document.getElementById('discount');

const editform = document.getElementById('editFrom');


editform.addEventListener('submit', function(event) {

    event.preventDefault();
    if (
      validateCategoryId() &&
      validateCategoryName() &&
      validateProductionCost() &&
      validateMarketPrice() &&
      validateDiscount()
    ) {
      editform.submit();
    }
  });



function validateCategoryId() {

    if (checkIfEmpty(categoryId)) return;
    return true;

}

function validateCategoryName() {
    
    if (checkIfEmpty(categoryName)) return;
    
    if (!checkIfOnlyLetters(categoryName)) return;
    return true;

}

function validateProductionCost() {

    if (checkIfEmpty(productionCost)) return;
    
    if (!checkIfOnlyNumbers(productionCost)) return;
    return true;

}

function validateMarketPrice() {
 
    if (checkIfEmpty(marketPrice)) return;

    if (!checkIfOnlyNumbers(marketPrice)) return;
    return true;

}
  
function validateDiscount() {
    
    if (checkIfEmpty(discount)) return;

    if (!checkIfOnlyNumbers(discount)) return;
    return true;

}