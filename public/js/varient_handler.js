$(document).ready(function () {

  $("#addToCartI").submit(function (e) {
    e.preventDefault();
    if (
      $('input[type=number][name=quantity]').val()
    ) {
      document.getElementById("addToCartI").submit();
    }
  });

  $('input[type=radio][name=color]').on("change", function () {
    var color = $(this).val();
    var cat = $('#cat').val();
    document.getElementById('quantitydiv').innerHTML = `<div class="empty-result"><label class="empty-checkbox" >Select size!</label></div>`;
    $('#buttonI').show();

    var productId = $('input[type=text][name=prod_id]').val();
    if (color != "" && cat != "Couple") {
      $.ajax({
        url: 'http://127.0.0.1/shop/getSizes',
        type: 'POST',
        dataType: 'JSON',
        data: { 'color': color, 'product_id': productId },
        success: function (data) {
          var sizeContainer = document.getElementById('sizeCommon');
          sizeContainer.innerHTML = "";
          if (data.length > 0) {
            sizeList = "";
            data.forEach(record => {
              sizeList += `<label class="size-container" ><input type="radio" name="size" value="${record.size}" required>
                    <span class="checkbox">${record.size}</span></label>`;
            });
            sizeContainer.innerHTML = sizeList;
          } else {
            sizeContainer.innerHTML = `<div class="empty-result"><label class="empty-checkbox" >No available sizes!</label></div>`;
            $('#buttonI').hide();
          }
        },
        error: function () {
        }
      });

    } else if (color != "" && cat == "Couple") {
      $.ajax({
        url: 'http://127.0.0.1/shop/getSizes',
        type: 'POST',
        dataType: 'JSON',
        data: { 'color': color, 'product_id': productId },
        success: function (data) {
          var sizeContainerGents = document.getElementById('sizeGents');
          sizeContainerGents.innerHTML = "";

          if (data.length > 0) {
            sizeList = "";
            data.forEach(record => {
              if (record.size.includes('-G')) {
                sizeList += `<label class="size-container" ><input type="radio" name="size2" value="${record.size}" required>
                <span class="checkbox">${record.size.replace("-G", "")}</span></label>`;
              }

            });
            sizeContainerGents.innerHTML = sizeList;
          } else {
            sizeContainerGents.innerHTML = `<div class="empty-result"><label class="empty-checkbox" >No available sizes!</label></div>`;
            $('#buttonI').hide();
          }
        },
        error: function () {
        }
      });

      $.ajax({
        url: 'http://127.0.0.1/shop/getSizes',
        type: 'POST',
        dataType: 'JSON',
        data: { 'color': color, 'product_id': productId },
        success: function (data) {
          var sizeContainerLadies = document.getElementById('sizeLadies');
          sizeContainerLadies.innerHTML = "";
          if (data.length > 0) {
            sizeList = "";
            data.forEach(record => {
              if (record.size.includes('-W')) {
                sizeList += `<label class="size-container" ><input type="radio" name="size1" value="${record.size}" required>
                    <span class="checkbox">${record.size.replace("-W", "")}</span></label>`;
              }
            });
            sizeContainerLadies.innerHTML = sizeList;
          } else {
            sizeContainerLadies.innerHTML = `<div class="empty-result"><label class="empty-checkbox" >No available sizes!</label></div>`;
            $('#buttonI').hide();
          }
        },
        error: function () {
        }
      });

    } else {

    }


  });


});

$(document).on('change', 'input[type=radio][name=size]', function () {
  var size = $(this).val();
  var color = $('input[type=radio][name=color]:checked').val();
  var productId = $('input[type=text][name=prod_id]').val();
  var qty = document.getElementById('quantitydiv');
  qty.innerHTML = "";
  if (!size == "") {
    $.ajax({
      url: 'http://127.0.0.1/shop/getQtys',
      type: 'POST',
      dataType: 'JSON',
      data: { 'color': color, 'size': size, 'product_id': productId },
      success: function (data) {
        if (data.length > 0 && parseInt(data[0].qty) != 0) {
          qty.innerHTML = `<span class="qty-minus"
                            onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i
                                class="fa fa-minus" aria-hidden="true"></i></span>
                        <input type="number" class="qty-text" id="qty" step="1" min="1" name="quantity"
                            value="1" disabled>
                        <span class="qty-plus"
                            onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &lt; ${parseInt(data[0].qty)}) effect.value++;return false;"><i
                                class="fa fa-plus" aria-hidden="true"></i></span>`
        } else {
          qty.innerHTML = `<div class="empty-result"><label class="empty-checkbox" >Currently out of stock!</label></div>`;
          $('#buttonI').hide();


        }
      },
      error: function () {
      }
    });

  } else {

  }
});

$(document).on('change', 'input[type=radio][name=size1]', function () {
  var size1 = $('input[type=radio][name=size1]:checked').val();
  var size2 = $('input[type=radio][name=size2]:checked').val();
  var color = $('input[type=radio][name=color]:checked').val();
  var productId = $('input[type=text][name=prod_id]').val();
  var qty = document.getElementById('quantitydiv');
  qty.innerHTML = "";
  console.log("hi");
  if (!size1 == "" && !size2 == "") {
    $.ajax({
      url: 'http://127.0.0.1/shop/getCoupleQtys',
      type: 'POST',
      dataType: 'JSON',
      data: { 'color': color, 'size1': size1, 'size2': size2, 'product_id': productId },
      success: function (data) {
        if (data.length > 0 && parseInt(data[0].qty) != 0) {

          qty.innerHTML = `<span class="qty-minus"
                            onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i
                                class="fa fa-minus" aria-hidden="true"></i></span>
                        <input type="number" class="qty-text" id="qty" step="1" min="1" name="quantity"
                            value="1" disabled>
                        <span class="qty-plus"
                            onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &lt; ${parseInt(data[0].qty)}) effect.value++;return false;"><i
                                class="fa fa-plus" aria-hidden="true"></i></span>`
        } else {
          qty.innerHTML = `<div class="empty-result"><label class="empty-checkbox" >Currently out of stock!</label></div>`;
          $('#buttonI').hide();

        }
      },
      error: function () {
      }
    });

  } else {
    qty.innerHTML = `<div class="empty-result"><label class="empty-checkbox" >Select size for both!</label></div>`;
  }
});

$(document).on('change', 'input[type=radio][name=size2]', function () {
  var size1 = $('input[type=radio][name=size1]:checked').val();
  var size2 = $('input[type=radio][name=size2]:checked').val();
  var color = $('input[type=radio][name=color]:checked').val();
  var productId = $('input[type=text][name=prod_id]').val();
  var qty = document.getElementById('quantitydiv');
  qty.innerHTML = "";
  if (!size1 == "" && !size2 == "") {
    $.ajax({
      url: 'http://127.0.0.1/shop/getCoupleQtys',
      type: 'POST',
      dataType: 'JSON',
      data: { 'color': color, 'size1': size1, 'size2': size2, 'product_id': productId },
      success: function (data) {
        if (data.length > 0 && parseInt(data[0].qty) != 0) {

          qty.innerHTML = `<span class="qty-minus"
                            onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i
                                class="fa fa-minus" aria-hidden="true"></i></span>
                        <input type="number" class="qty-text" id="qty" step="1" min="1" name="quantity"
                            value="1" disabled>
                        <span class="qty-plus"
                            onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &lt; ${parseInt(data[0].qty)}) effect.value++;return false;"><i
                                class="fa fa-plus" aria-hidden="true"></i></span>`
        } else {
          qty.innerHTML = `<div class="empty-result"><label class="empty-checkbox" >Currently out of stock!</label></div>`;
          $('#buttonI').hide();

        }
      },
      error: function () {
      }
    });

  } else {
    qty.innerHTML = `<div class="empty-result"><label class="empty-checkbox" >Select size for both!</label></div>`;
  }
});

