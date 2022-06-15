@extends('back-end.master')


@section('title')
   Yearly Sales
@endsection

@section('content-title')
Sales
<?php
    use Carbon\Carbon;
    $year = Carbon::now()->year;
     echo $year;
    ?>
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-12">
			<div class="card" style="padding:30px;">
				<a href="{{ url('yealy_excel_download') }}" class="excel_btn">
					<i class="fa fa-file-excel"></i> Download Excel
				</a>

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
				    	 ?>
				    	@foreach($yearly as $show)
				    	<tr>
				    		<td>{{ $show->invoice_no }}</td>
				    		<td>{{ date('d-m-Y', strtotime($show->sale_date)) }}</td>
				    		<td>{{ $show->paid_amount }}</td>
				    	</tr>
				    	  <?php
				    		  $sum +=$show->paid_amount;
				    		?>
				    	@endforeach
				    </tbody>
				    <tfoot>
				    	 <tr>
                            <td colspan="2"></td>
                            <td>Total: {{ (\App\Models\CreditCustomer::whereYear('sale_date', \Carbon\Carbon::today())->sum("paid_amount") + \App\Models\CreditPaymentHistory::whereYear('payment_date', \Carbon\Carbon::today())->sum("todays_payment")) - \App\Models\SalesReturn::whereYear('return_date', \Carbon\Carbon::today())->sum("total_amount") }}</td>
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
