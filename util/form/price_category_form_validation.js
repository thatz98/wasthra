const categoryId = document.getElementById('category_id');
const categoryName = document.getElementById('category_name');
const productionCost = document.getElementById('production_cost');
const marketPrice = document.getElementById('market_price');
const discount = document.getElementById('discount');

const form = document.getElementById('addFrom');

form.addEventListener('submit', function(event) {

    event.preventDefault();
    if (
      validateCategoryId() &&
      validateCategoryName() &&
      validateProductionCost() &&
      validateMarketPrice() &&
      validateDiscount()
    ) {
      form.submit();
    }
  });

function validateCategoryId() {

    if (checkIfEmpty(categoryId)) return;

    if (!containsCharacters(categoryId,7)) return;
    return true;

}

function validateCategoryName() {
    
    if (checkIfEmpty(categoryName)) return;
    
    if (!checkIfOnlyLetters(categoryName)) return;
    return true;

}

function validateProductionCost() {

    if (checkIfEmpty(productionCost)) return;
    
    if (!checkIfOnlyPrice(productionCost)) return;
    return true;

}

function validateMarketPrice() {
 
    if (checkIfEmpty(marketPrice)) return;

    if (!checkIfOnlyPrice(marketPrice)) return;
    return true;

}
  
function validateDiscount() {
    
    if (checkIfEmpty(discount)) return;

    if (!meetLength(discount,1,4)) return;
    
    if (!checkIfOnlyNumbers(discount)) return;

    if (!meetValue(discount,0,101)) return;
    return true;

}