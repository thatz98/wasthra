const categoryId = document.getElementById('product_category_id');
const categoryName = document.getElementById('category_name');

 const editform = document.getElementById('addFrom');

editform.addEventListener('submit', function(event) {

    event.preventDefault();
    if (
        validateCategorytId() &&
        validateCategoryName() 

    ) {
      editform.submit();
    }
  });

  function validateCategorytId(){
    if (checkIfEmpty(categoryId)) return;

    if (!containsCharacters(categoryId,10)) return;
    return true;
}


  function validateCategoryName(){
    if (checkIfEmpty(categoryName)) return;
    return true;
  }

 