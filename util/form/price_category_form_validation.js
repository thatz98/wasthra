    // Input fields
const categoryId = document.getElementById('category_id');
const categoryName = document.getElementById('category_name');
const productionCost = document.getElementById('production_cost');
const marketPrice = document.getElementById('market_price');
const discount = document.getElementById('discount');


    // Form
const form = document.getElementById('addFrom');
 
  
    // Handle form
form.addEventListener('submit', function(event) {
 
    // Prevent default behaviour
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


  // Validators
function validateCategoryId() {

    if (checkIfEmpty(categoryId)) return;

    if (!containsCharacters(categoryId,7)) return;
    return true;
  //check whether a valid category Id
}

function validateCategoryName() {
    
    if (checkIfEmpty(categoryName)) return;
    
    if (!checkIfOnlyLetters(categoryName)) return;
    return true;

     //check whether a valid category Name
}

function validateProductionCost() {

    if (checkIfEmpty(productionCost)) return;
    
    if (!checkIfOnlyPrice(productionCost)) return;
    return true;

     //check whether a production cost
}

function validateMarketPrice() {
 
    if (checkIfEmpty(marketPrice)) return;

    if (!checkIfOnlyPrice(marketPrice)) return;
    return true;

     //check whether a valid  market price
}
  
function validateDiscount() {
    
    if (checkIfEmpty(discount)) return;

    if (!meetLength(discount,1,4)) return;
    
    if (!checkIfOnlyNumbers(discount)) return;

    if (!meetValue(discount,0,101)) return;
    return true;

     //check whether a valid discount
}