$(document).ready(function () {
  
    $('input[type=radio][name=color]').on("change", function () {
      var color = $(this).val();
      
        var productId = $('input[type=text][name=prod_id]').val();
      if (!color == "") {
        $.ajax({
          url: 'http://127.0.0.1/wasthra/shop/getSizes',
          type: 'POST',
          dataType: 'JSON',
          data: { 'color': color, 'product_id': productId },
          success: function (data) {
              var sizeContainer = document.getElementById('sizeCommon')
              sizeContainer.innerHTML = "";
            if(data.length>0){
                sizeList = "";
                data.forEach(record => {
                    sizeList += `<label class="size-container" ><input type="radio" name="size" id="sex" value="${record.size}" required>
                    <span class="checkbox">${record.size}</span></label>`
                });
                sizeContainer.innerHTML = sizeList;
            } else{
                sizeContainer.innerHTML = `<div class="empty-result"><label class="empty-checkbox" >No available sizes!</label></div>`;
            }
          },
          error: function() { 
        } 
        });
  
      } else {
      }
  

      });

      
});

$(document).on('change', 'input[type=radio][name=size]', function(){
    var size = $(this).val();
    var color = $('input[type=radio][name=color]:checked').val();
    var productId = $('input[type=text][name=prod_id]').val();
    var qty = document.getElementById('quantitydiv');
              qty.innerHTML = "";
    console.log(color+" "+size+" "+productId);
    if (!size == "") {
      $.ajax({
        url: 'http://127.0.0.1/wasthra/shop/getQtys',
        type: 'POST',
        dataType: 'JSON',
        data: { 'color': color,'size': size, 'product_id': productId },
        success: function (data) {
          if(data.length>0){
              console.log(data[0].qty);
              qty.innerHTML = `<span class="qty-minus"
                            onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i
                                class="fa fa-minus" aria-hidden="true"></i></span>
                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="99" name="quantity"
                            value="1">
                        <span class="qty-plus"
                            onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &lt; ${parseInt(data[0].qty)}) effect.value++;return false;"><i
                                class="fa fa-plus" aria-hidden="true"></i></span>`
          } else{
            qty.innerHTML = `<div class="empty-result"><label class="empty-checkbox" >Currently out of stock!</label></div>`;
          }
        },
        error: function() { 
      } 
      });
    
    } else {
      
    }
});