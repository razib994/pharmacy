@extends('back-end.master')


@section('title')
   Payment History
@endsection

@section('content-title')
    Credit Customer Payment History
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-12">
			<div class="card" style="padding:30px;">
                <a href="{{ url('credit_customer_payment_history') }}" class="excel_btn">
                    <i class="fa fa-file-excel"></i>Download Excel
                </a>
				<table id="example" class="table table-striped table-bordered text-center">
				    <thead>
				        <tr>
				            <!-- <th>SL No</th> -->
				            <th>Invoice No</th>
				            <th>Customer Name</th>
				            <th>Todays Payment</th>
				            <th>Payment Date</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
                         @php($i=1)
				    	@foreach($payments as $show)
				        <tr>
				            <td>{{ $show->invoice_no }}</td>
				            <td>{{ $show->customer->name }}</td>
				            <td>{{ $show->todays_payment }}</td>
				            <td>{{ $show->payment_date }}</td>
				              <td>

				            	<a href="{{ route('credit_customer_payment_history_delete',['id'=>$show->id]) }}" onclick="return confirm('Are you sure?')" title="delete" class="bg-danger">
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
