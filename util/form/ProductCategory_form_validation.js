 // Input fields

const categoryId = document.getElementById('product_category_id');
const categoryName = document.getElementById('category_name');


    // Form
const editform = document.getElementById('addFrom');
  
    // Handle form
editform.addEventListener('submit', function(event) {

  // Prevent default behaviour
    event.preventDefault();
    if (
        validateCategorytId() &&
        validateCategoryName() 

    ) {
      editform.submit();
    }
  });

    // Validators
function validateCategorytId(){

    if (checkIfEmpty(categoryId)) return;

    if (!containsCharacters(categoryId,10)) return;
    return true;

}


function validateCategoryName(){

    if (checkIfEmpty(categoryName)) return;
    return true;

  }

 