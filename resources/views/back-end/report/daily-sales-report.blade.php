@extends('back-end.master')


@section('title')
   Daily Sales
@endsection

@section('content-title')
Daily Sales
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-12">
            <a href="{{ url('daily_excel_download') }}" class="excel_btn">
                <i class="fa fa-file-excel"></i>Download Excel
            </a>
			<div class="card" style="padding:30px;">

				<table id="example" class="table table-striped text-center">
				    <thead>
				        <tr>
				            <th>Invoice No</th>
				            <th>Sale Date</th>
				            <th>Amount</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@php($i=1)
				    	<?php
				    	   $sum=0;
                        $a = '';
				    	   $subtotals = App\Models\SaleReturnSubtotal::
				    	   whereDay('return_date',date('d'))
				    	   ->sum('subtotal');
				    	 ?>
				    	@foreach($daily as $show)
				    	<tr>
				    		<td>{{ $show->invoice_no }}</td>
				    		<td>{{ date('d-m-Y', strtotime($show->sale_date)) }}</td>
				    		<td>{{ $a = $show->paid_amount }}</td>
				    	</tr>
				    	  <?php
				    		  $sum =$sum +$a;
                              $today = \Carbon\Carbon::now()->toDateString();
				    		?>
				    	@endforeach
				    </tbody>
				    <tfoot>
				    	 <tr>
                            <td colspan="2"> </td>
                            <td> Total:   {{ (\App\Models\CreditCustomer::where('sale_date', $today)->sum("paid_amount") + \App\Models\CreditPaymentHistory::where('payment_date', $today)->sum("todays_payment")) - \App\Models\SalesReturn::where('return_date', $today)->sum("total_amount") }}</td>
                          </tr>
				    </tfoot>
			    </table>

			    <h5 class="text-center text-primary font-weight-bold">

			    </h5>

			</div>


	     </div>
    </div>
</div>

@endsection
