@extends('back-end.master')


@section('title')
   Sales Revenue
@endsection

@section('content-title')
   All Sales Revenue
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-12">
            <a href="{{ url('daily_sale_revenue_excel_download') }}" class="excel_btn">
                <i class="fa fa-file-excel"></i>Download Excel
            </a>
			<div class="card" style="padding:30px;">

				<table id="example" class="table table-striped table-bordered text-center">
				    <thead>
				        <tr>
				            <th>Invoice No</th>
				            <th>Sales Revenue</th>
				            <th>Sale Date</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@php($i=1)
				    	@foreach($revenues as $show)
				    	<tr>
				    		<td>{{ $show->invoice_no }}</td>
				    		<td>
				    			<?php
                                   $total_purchase = $show->sum1;
                                   $total_sales = $show->sum2;
                                   echo $revenues_amount = ($total_sales-$total_purchase) - \App\Models\SaleInvoice::where('invoice_no', $show->invoice_no)->sum('discount');
				    			?>
				    		</td>
				    		<td>{{ date('d-m-Y', strtotime($show->sale_date)) }}</td>
				    	</tr>
				    	@endforeach


				    </tbody>
			    </table>

			    <h5 class="text-center text-primary font-weight-bold">

			    </h5>

			</div>


	     </div>
    </div>
</div>

@endsection
