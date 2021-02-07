$(document).ready(function () {
    $('input[type=radio][name=color]').on("change", function () {
      var color = $(this).val();
      console.log("hi");
        var productId = $('input[type=text][name=prod_id]').val();
      if (!color == "") {
        $.ajax({
          url: 'http://127.0.0.1/wasthra/inventory/getSizes',
          type: 'POST',
          dataType: 'JSON',
          data: { 'color': color, 'product_id': productId },
          success: function (data) {
              var sizeContainer = document.getElementById('sizeCommon')
              sizeContainer.innerHTML = "";
            if(data.length>0){
                sizeList = "";
                data.forEach(record => {
                    sizeList += `<label class="size-container" ><input type="radio" name="size" value="${record.size}" required>
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