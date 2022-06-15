@extends('back-end.master')


@section('title')
   Purchase
@endsection

@section('content-title')
   Payable Manufacturer
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-12">
            <a href="{{ url('/payable_manufacturer_download') }}" class="excel_btn">
                <i class="fa fa-file-excel"></i>Download Excel
            </a>
               @if(Session::has('message'))
                   <div class="alert alert-danger" role="alert">
				      <p class="text-center font-weight-bold p-0 m-0">{{ Session::get('message') }}</p>
				   </div>
                @endif

                  @if(Session::has('update'))
                   <div class="alert alert-primary" role="alert">
				      <p class="text-center font-weight-bold p-0 m-0">{{ Session::get('update') }}</p>
				   </div>
                @endif

			<div class="card" style="padding:30px;">

				<table id="example" class="table table-striped table-bordered text-center">
				    <thead>
				        <tr>
				            <!-- <th>SL No</th> -->
				            <th>Invoice No</th>
				            <th>Manufacturer</th>
				            <th>Purchase Date</th>
				            <th>Subtotal</th>
				            <th>Paid Amount</th>
				            <th>Due Amount</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
                         @php($i=1)
				    	@foreach($invoice as $show)
				        <tr>
				            <td>{{ $show->invoice_no }}</td>
				            <td>{{ $show->manufacturer->name }}</td>
				            <td>{{ $show->purchase_date }}</td>
				            <td>{{ $show->subtotal }}</td>
				            <td>{{ $show->paid_amount }}</td>
				            <td>{{ $show->due_amount }}</td>
				            <td>
				            	<a href="{{ route('payable_manufacturer_edit',['id'=>$show->id]) }}" title="update">
				            		<i class="fa fa-pen"></i>
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
