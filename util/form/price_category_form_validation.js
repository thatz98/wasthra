const categoryId = document.getElementById('category_id');
const categoryName = document.getElementById('category_name');
const productionCost = document.getElementById('production_cost');
const marketPrice = document.getElementById('market_price');
const discount = document.getElementById('discount');

const form = document.getElementById('addFrom');
const editform = document.getElementById('editFrom');

form.addEventListener('submit', function(event) {

    event.preventDefault();
    if (
      validateCategoryId() &&
      validateCategoryName() &&
      validateProductionCost() &&
      validateMarketPrice() &&
      validateDiscout()
    ) {
      form.submit();
    }
  });

  editform.addEventListener('submit', function(event) {

    event.preventDefault();
    if (
      validateCategoryId() &&
      validateCategoryName() &&
      validateProductionCost() &&
      validateMarketPrice() &&
      validateDiscout()
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