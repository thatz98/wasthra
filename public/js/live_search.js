$(document).ready(function () {
  $('#search').on("keyup", function () {
    var inputVal = $(this).val();
    if (!inputVal == "") {
      $.ajax({
        url: './util/live_search.php',
        type: 'POST',
        dataType: 'JSON',
        data: { 'term': inputVal },
        success: function (data) {
          results = "";
          document.getElementById('results').innerHTML = "";
          if(data.length>0){
            data.forEach(product => {
              var list_item = document.createElement("li");
              list_item.innerHTML = product.product_name;
              document.getElementById('results').appendChild(list_item);
            });
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