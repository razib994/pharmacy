@extends('back-end.master')


@section('title')
   POS
@endsection

@section('content-title')
 
@endsection


@section('content')

<div class="container">
  <div class="row">
    <div class="col-lg-10 offset-lg-1" style="background:#fff;padding:50px 0px 40px 0px;margin-bottom:50px;">
        <div class="col-lg-12 table-area">
           <h2 class="text-center">
            Purchase Invoice
           </h2>


            <div class="top_area">
               <div class="row">
                 <div class="col-lg-6 top_left">
                    <span id="customer_name">
                      Manufacturer Name:{{ $purchase_invoice->manufacturer->name }}
                    </span><br/>
                    <?php
                      $manufacturer_info = App\Models\Manufacturer::where('id',$purchase_invoice->manufacturer_id)->first();
                    ?>
                    <span id="address">
                       Address:{{ $manufacturer_info->address }}
                    </span><br/>
                    <span id="phone_no">
                     Phone No:{{ $manufacturer_info->phone_no }}
                    </span><br/>
                 </div>
                 <div class="col-lg-6 top_right">
                    <span id="invoice_no">
                      Invoice No:{{ $purchase_invoice->invoice_no }}
                    </span><br/>
                    <span id="date_invoice">
                      Date:{{ date('d-m-Y', strtotime($purchase_invoice->purchase_date)) }}
                    </span><br/>
                 </div>
               </div>
            </div>
             

            <table class="table text-center">
              <thead>
                  <tr style="background: #f5f5f5;">
                     <th>SN</th>
                     <th>Medicine</th>
                     <th>Category</th>
                     <th>Total Quantity</th>
                     <th>Total Price</th>
                  </tr>
              </thead>
              <tbody>
                  @php($i=1)
                  @foreach($purchase_invoice_overviews as $show)
                 <tr>
                   <td>{{ $i++ }}</td>
                   <td>{{ $show->medicine_name }}</td>
                   <td>{{ $show->category->name }}</td>
                   <td>{{ $show->total_quantity }}</td>
                   <td>{{ $show->total_price }}</td>
                 </tr>
                 @endforeach
              
              </tbody>
              <tfoot>
                  <tr>
                    <td colspan="3"></td>
                    <td>Sub Total:</td>
                    <td>
                      {{ $purchase_invoice->subtotal }}
                    </td>
                  </tr>
                  <tr>
                    <td colspan="3"></td>
                    <td>Paid Amount:</td>
                    <td>
                      {{ $purchase_invoice->paid_amount }}
                    </td>

                  </tr>
                   <tr>
                    <td colspan="3"></td>
                    <td>Due Amount:</td>
                    <td>
                      {{ $purchase_invoice->due_amount }}
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
    </div>
  </div>
</div>

@endsection
