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
            <a href="{{ route('invoice_print',['invoice_no'=>$sale_invoice->invoice_no]) }}" class="btn btn-primary" target="_blank" style="margin-left:50px;">print invoice</a>
           <h2 class="text-center">
            Invoice

           </h2>


            <div class="top_area">
               <div class="row">
                 <div class="col-lg-6 top_left">
                    <span id="customer_name">Customer Name:</span> {{ $sale_invoice->customer->name }}<br/>

                    <?php
                      $customer_info = App\Models\Customer::where('id',$sale_invoice->customer_id)->first();
                    ?>

                    <span id="address">Address:</span>{{ $customer_info->address }}<br/>
                    <span id="phone_no">Phone No:</span>{{ $customer_info->phone_no }}<br/>
                 </div>
                 <div class="col-lg-6 top_right">
                    <span id="invoice_no">Invoice No:</span>{{ $sale_invoice->invoice_no }}<br/>
                    <span id="date_invoice">Date:</span>{{ date('d-m-Y', strtotime($sale_invoice->sale_date)) }}<br/>
                 </div>
               </div>
            </div>


            <table class="table text-center">
              <thead>
                  <tr style="background: #f5f5f5;">
                     <th>SN</th>
                     <th>Medicine Name</th>
                     <th>Category</th>
                     <th>Quantity</th>
                     <th>Total Price</th>
                  </tr>
              </thead>
              <tbody>
                  @php($i=1)
                  @foreach($pos_invoice_overviews as $show)
                 <tr>
                   <td>{{ $i++ }}</td>
                   <td>{{ $show->medicine_name }}</td>
                   <td>{{ $show->category->name }}</td>
                   <td>{{ $show->quantity }}</td>
                   <td>{{ $show->total_price }}</td>
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
    </div>
  </div>
</div>

@endsection
