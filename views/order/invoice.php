<style>

@import url(https://fonts.googleapis.com/css?family=Roboto:100,300,400,900,700,500,300,100);
*{
  margin: 0;
  box-sizing: border-box;

}
body{
  background: #E0E0E0;
  font-family: 'Roboto', sans-serif;
  background-image: url('');
  background-repeat: repeat-y;
  background-size: 100%;
}
::selection {background: #f31544; color: #FFF;}
::moz-selection {background: #f31544; color: #FFF;}
h1{
  color: #222;
  margin-bottom: 5px;
}
h2{
margin-bottom: 3px;}
h3{
  font-weight: 300;
  line-height: 32px;
}
p{
  font-size: 12px;
  color: #666;
  line-height: 14px;
  margin-bottom: 3px;
}

#invoiceholder{
  width:100%;
  height: 100%;
  padding-top: 50px;
}

#invoice{
  position: relative;

  margin: 0 auto;
  width: 700px;
  background: #FFF;
}

[id*='invoice-']{ /* Targets all id with 'col-' */
  border-bottom: 1px solid #EEE;
  padding: 30px;
}

.title{
  float: right;
}
.title p{text-align: right;}

table{
  width: 100%;
  border-collapse: collapse;
}
td{
  padding: 5px 0 5px 15px;
  border: 1px solid #EEE
}
.tabletitle{
  padding: 5px;
  background: #EEE;
}
.service{border: 1px solid #EEE;}
.item{width: 40%;}
.itemtext{font-size: 14px;}

#legalcopy{
  margin-top: 30px;
}

.legal{
  width:70%;
}
</style>
<div id="invoiceholder">


  <div id="invoice" class="effect2">
    
    <div id="invoice-top">
      <div class="title">
        <h1>Invoice #1069</h1>
        <p>Issued: May 27, 2015
        </p>
        <p>
           Payment Method: Online
        </p>
        <p>
           Payment Status: Success
        </p>
      </div><!--End Title-->
    </div><!--End InvoiceTop-->


    
    <div id="invoice-mid">
      <div class="info">
        <h2>Client Name</h2>
        <p>Address Line 1,</p>
        <p>Address Line 1,</p>
        <p>Address Line 1,</p>
        <p>City</p>
        <p>Postal Code</p>
        <p>Email: </p>
        <p>Contact No: </p>
      </div>  

    </div><!--End Invoice Mid-->
    
    <div id="invoice-bot">
      
      <div id="table">
        <table>
          <tr class="tabletitle">
            <td class="item"><h2>Item Name</h2></td>
            <td class="color"><h2>Color</h2></td>
            <td class="size"><h2>Size</h2></td>
            <td class="qty"><h2>Qty</h2></td>
            <td class="price"><h2>Item Price</h2></td>
            <td class="subtotal"><h2>Sub-total</h2></td>
          </tr>
          
          <tr class="service">
            <td class="tableitem"><p class="itemtext">Communication</p></td>
            <td class="tableitem"><p class="itemtext">Red</p></td>
            <td class="tableitem"><p class="itemtext">XXL</p></td>
            <td class="tableitem"><p class="itemtext">5</p></td>
            <td class="tableitem"><p class="itemtext">$75</p></td>
            <td class="tableitem"><p class="itemtext">$375.00</p></td>
          </tr>
          
          <tr class="service">
          <td class="tableitem"><p class="itemtext">Communication</p></td>
            <td class="tableitem"><p class="itemtext">Red</p></td>
            <td class="tableitem"><p class="itemtext">XXL</p></td>
            <td class="tableitem"><p class="itemtext">5</p></td>
            <td class="tableitem"><p class="itemtext">$75</p></td>
            <td class="tableitem"><p class="itemtext">$375.00</p></td>
          </tr>
          
          <tr class="service">
          <td class="tableitem"><p class="itemtext">Communication</p></td>
            <td class="tableitem"><p class="itemtext">Red</p></td>
            <td class="tableitem"><p class="itemtext">XXL</p></td>
            <td class="tableitem"><p class="itemtext">5</p></td>
            <td class="tableitem"><p class="itemtext">$75</p></td>
            <td class="tableitem"><p class="itemtext">$375.00</p></td>
          </tr>
          
          <tr class="service">
          <td class="tableitem"><p class="itemtext">Communication</p></td>
            <td class="tableitem"><p class="itemtext">Red</p></td>
            <td class="tableitem"><p class="itemtext">XXL</p></td>
            <td class="tableitem"><p class="itemtext">5</p></td>
            <td class="tableitem"><p class="itemtext">$75</p></td>
            <td class="tableitem"><p class="itemtext">$375.00</p></td>
          </tr>
          
          <tr class="service">
          <td class="tableitem"><p class="itemtext">Communication</p></td>
            <td class="tableitem"><p class="itemtext">Red</p></td>
            <td class="tableitem"><p class="itemtext">XXL</p></td>
            <td class="tableitem"><p class="itemtext">5</p></td>
            <td class="tableitem"><p class="itemtext">$75</p></td>
            <td class="tableitem"><p class="itemtext">$375.00</p></td>
          </tr>
          
            
          <tr class="tabletitle">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td class="Rate"><h2>Total</h2></td>
            <td class="payment"><h2>$3,644.25</h2></td>
          </tr>
          
        </table>
      </div><!--End Table-->

      
      <div id="legalcopy">
        <p class="legal"><strong>Thank you for your business!</strong> Please feel free to contact us if you have any queries.
        </p>
      </div>
      
    </div><!--End InvoiceBot-->
  </div><!--End Invoice-->
</div><!-- End Invoice Holder-->