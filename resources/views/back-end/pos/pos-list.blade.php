@extends('back-end.master')


@section('title')
   Invoices
@endsection

@section('content-title')
   All Invoices
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-12">
            <a href="{{ url('get_all_invoices') }}" class="excel_btn">
                <i class="fa fa-file-excel"></i>Download Excel
            </a>
			<div class="card" style="padding:30px;">

				<table id="example" class="table table-striped table-bordered text-center">
				    <thead>
				        <tr>
				            <th>Invoice No</th>
				            <th>Customer Name</th>
				            <th>Sale Date</th>
				            <th>Total Amount</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@php($i=1)
				    	@foreach($invoice_list as $show)
				    	<tr>
				    		<td>{{ $show->invoice_no }}</td>
				    		<td>{{ $show->customer->name }}</td>
				    		<td>{{ date('d-m-Y', strtotime($show->sale_date)) }}</td>
				    		<td>{{ $show->total_amount }}</td>
				    		<td>

				            	<a href="{{ route('pos_overview',['invoice_no'=>$show->invoice_no]) }}" title="Overview" class="bg-info">
				            		<i class="fa fa-eye"></i>
				            	</a>
				            	<a href="{{ route('invoice_print',['invoice_no'=>$show->invoice_no]) }}" title="Print" class="bg-success" target="_blank">
				            		<i class="fa fa-print" aria-hidden="true"></i>
				            	</a>


				            	<a href="{{ route('pos_edit',['invoice_no'=>$show->invoice_no]) }}" title="Update">
				            		<i class="fa fa-edit"></i>
				            	</a>

                                @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
				            	<a href="{{ route('pos_delete',['id'=>$show->id]) }}" onclick="return confirm('Are you sure?')" title="Delete" class="bg-danger">
				            		<i class="fa fa-trash"></i>
				            	</a>
                                @endif

				            </td>
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
