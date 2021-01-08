$(document).ready(function () {
  $('#search').on("keyup", function () {
    console.log("hi");
    var inputVal = $(this).val();
    $.ajax({
      url: './util/live_search.php',
      type: 'POST',
      dataType: 'JSON',
      data: { 'term': inputVal },
      success: function (data) {
        results = "";
        document.getElementById('results').innerHTML= "";
        data.forEach(product => {
          console.log(product.product_name);
          var list_item = document.createElement("li");
          list_item.innerHTML = product.product_name;
          document.getElementById('results').appendChild(list_item);
        });
        // const searched = data.map(item=>{
        //   const regex = new RegExp(this.value,'gi');
        //   const term = item.name.replace(regex,`<b>${this.value}</b>`)
        //   return `<li>${term}</li>`;
        // }).join('');

      }
    });
  });

});