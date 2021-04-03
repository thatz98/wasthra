$(document).ready(function () {
  $('#search').on("keyup", function () {
    var inputVal = $(this).val();
    if (!inputVal == "") {
      $.ajax({
        url: 'http://127.0.0.1/search',
        type: 'POST',
        dataType: 'JSON',
        data: { 'term': inputVal },
        success: function (data) {
          results = "";
          document.getElementById('results').innerHTML = "";
          if(data.length>0){
            data.forEach(product => {
              var list_item = document.createElement("li");
              list_item.innerHTML = `<a href=\"http://127.0.0.1/shop/productDetails/${product.product_id}\"><img src=/${product.image}><span class=\"search-link\">${product.product_name}<br>${product.name}</span></a>`;
              document.getElementById('results').appendChild(list_item);
            });
            var list_item = document.createElement("li");
              list_item.innerHTML = `<a href=\"http://127.0.0.1/search/advancedSearch/${inputVal}\"><span class=\"search-link\">Advaced search results <i class=\"fa fa-arrow-right"></i></span></a>`;
              document.getElementById('results').appendChild(list_item);
          }
        },
        error: function() { 
          results = "";
          document.getElementById('results').innerHTML = "";
          var list_item = document.createElement("li");
              list_item.innerHTML = 'No matching results';
              document.getElementById('results').appendChild(list_item);
      } 
      });

    } else {
      document.getElementById('results').innerHTML = "";
    }

  });
});