const productId = document.getElementById('product_category_id');
const productId = document.getElementById('category_name');

const editform = document.getElementById('addFrom');

editform.addEventListener('submit', function(event) {

    event.preventDefault();
    if (
        validateCategorytId() &&
        validateCategoryName() &&
    ) {
      editform.submit();
    }
  });

 