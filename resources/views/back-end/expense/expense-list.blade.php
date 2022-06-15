@extends('back-end.master')


@section('title')
   Expense
@endsection

@section('content-title')
   All Expense
@endsection


@section('content')


<div class="container">
    <div class="row">

	    <div class="col-lg-12">

			<div class="card" style="padding:30px;">

				<a href="{{ url('get_expense_excel_download') }}" class="excel_btn">
					<i class="fa fa-file-excel"></i>Download Excel
				</a>

				<table id="example" class="table table-striped table-bordered text-center">
				    <thead>
				        <tr>
				            <th>SL No</th>
				            <th>Name</th>
				            <th>Details</th>
				            <th>Amount</th>
				            <th>Date</th>
				            <th>Remarks</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@php($i=1)
				    	@foreach($expenses as $show)
				    	<tr>
				    		<td>{{ $i++ }}</td>
				    		<td>{{ $show->name }}</td>
				    		<td>{{ $show->details }}</td>
				    		<td>{{ $show->amount }}</td>
				    		<td>{{ date('d-m-Y', strtotime($show->date)) }}</td>
				    		<td>{{ $show->remarks }}</td>
				    		<td>

				            	<a href="{{ route('edit_expense',['id'=>$show->id]) }}" title="update">
				            		<i class="fa fa-pen"></i>
				            	</a>

				            	<a href="{{ route('expense_delete',['id'=>$show->id]) }}" onclick="return confirm('Are you sure?')" title="delete" class="bg-danger">
				            		<i class="fa fa-trash"></i>
				            	</a>
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
