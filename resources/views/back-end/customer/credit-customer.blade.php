@extends('back-end.master')


@section('title')
   Customer
@endsection

@section('content-title')
   Credit Customer
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-12">
			<div class="card" style="padding:30px;">
                <a href="{{ url('/credit_customer_excel') }}" class="excel_btn">
                    <i class="fa fa-file-excel"></i>Download Excel
                </a>
				<table id="example" class="table table-striped table-bordered">
				    <thead>
				        <tr>
				            <th>SN</th>
				            <th>Invoice No</th>
				            <th>Customer Name</th>
				            <th>Sale Date</th>
				            <th>Total Amount</th>
				            <th>Paid Amount</th>
				            <th>Due Amount</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>

				    	@php($i=1)
				    	@foreach($credit_customers as $show)
				        <tr>
				            <td>{{ $i++ }}</td>
				            <td>{{ $show->invoice_no }}</td>
				            <td>{{ $show->customer->name }}</td>
				            <td>{{ date('d-m-Y', strtotime($show->sale_date)) }}</td>
				            <td>{{ $show->total_amount }}</td>
				            <td>{{ $show->paid_amount }}</td>
				            <td>{{ $show->due_amount }}</td>
				            <td>
				            	<a href="{{ route('edit_credit_customer',['invoice_no'=>$show->invoice_no]) }}" title="update"><i class="fa fa-pen"></i></a>
				            </td>
				        </tr>
				        @endforeach
				    </tbody>
			    </table>
			</div>

	     </div>
    </div>
</div>

@endsection
