<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Print Invoice</title>
  <link rel="stylesheet" href="{{ asset('/') }}public/back-end/data/custom.css">
</head>

 <style>
  .invoice_heading h1{
    text-align: center;
  }
   .invoice_area{
    width: 100%;
    height: 100%;
   }
   .invoice_left{
     width:50%;
     float: left;
   }

   .invoice_right{
     width:50%;
     float: right;
   }
   .invoice_right span{
    margin-left: 230px;
   }
   .invoice_area .table tr td{
    text-align: center;
   }
 </style>
<body>
  
  
  <div class="invoice_area">
    <div class="invoice_heading">
     <h1>Invoice</h1>
  </div>

      <div class="invoice_left">
         <span id="customer_name">Customer Name:</span> {{ $sale_invoice->customer->name }}<br/>
         <span id="address">Address:</span>{{ $sale_invoice->customer->address }}<br/>
         <span id="phone_no">Phone No:</span>{{ $sale_invoice->customer->phone_no }}<br/>
      </div>
      
      <div class="invoice_right">
         <span id="invoice_no">Invoice No:</span>{{ $sale_invoice->invoice_no }}<br/>
         <span id="date_invoice">Date:</span>{{ date('d-m-Y', strtotime($sale_invoice->sale_date)) }}<br/>
      </div>

   <table class="table" style="margin-top:150px;">
              <thead>
                     <tr style="background: #f5f5f5;">
                     <th style="width:50px;">SN</th>
                     <th style="width:300px;">Medicine Name</th>
                     <th style="width:100px;">Category</th>
                     <th style="width:100px;">Quantity</th>
                     <th style="width:100px;">Total Price</th>
                  </tr>
              </thead>
              <tbody>
                  @php($i=1)
                  @foreach($overviews as $show)
                 <tr>
                   <td style="width:50px;">{{ $i++ }}</td>
                   <td style="width:300px;">{{ $show->medicine_name }}</td>
                   <td style="width:100px;">{{ $show->category->name }}</td>
                   <td style="width:100px;">{{ $show->quantity }}</td>
                   <td style="width:100px;">{{ $show->total_price }}</td>
                 </tr>
                 @endforeach
              
              </tbody>
              <tfoot>
                  <tr>
                    <td colspan="3"></td>
                    <td>Sub Total:</td>
                    <td>
                     {{ $sale_invoice->subtotal }}
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3"></td>
                    <td>Discount:</td>
                    <td>
                      {{ $sale_invoice->discount }}
                    </td>
                  </tr>
                   <tr>
                    <td colspan="3"></td>
                    <td>Total Amount:</td>
                    <td>
                      {{ $sale_invoice->total_amount }}
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3"></td>
                    <td>Paid Amount:</td>
                    <td>
                      {{ $sale_invoice->paid_amount }}
                    </td>

                  </tr>
                   <tr>
                    <td colspan="3"></td>
                    <td>Due Amount:</td>
                    <td>
                      {{ $sale_invoice->due_amount }}
                    </td>
                  </tr>
                   <tr>
                    <td colspan="4"></td>
                    <td>
                      
                    </td>
                  </tr>
                  </tfoot>
            </table>

  </div>

</body>
</html>