@extends('back-end.master')


@section('title')
   Purchase
@endsection

@section('content-title')
   Purchase Invoice List
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-12">
            <a href="{{ url('get_purchase_invoice_list') }}" class="excel_btn">
                <i class="fa fa-file-excel"></i>Download Excel
            </a>
			<div class="card" style="padding:30px;">

				<table id="example" class="table table-striped table-bordered text-center">
				    <thead>
				        <tr>
				            <th>Invoice No</th>
				            <th>Manufacturer</th>
				            <th>Purchase Date</th>
				            <th>Total Price</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
                        @php($i=1)
				    	@foreach($purchases_invoice as $show)
				        <tr>

				            <td>{{ $show->invoice_no }}</td>
				            <td>{{ $show->manufacturer->name }}</td>
				            <td>
				            	{{ date('d-m-Y', strtotime($show->purchase_date)) }}
				            </td>
				            <td>{{ $show->subtotal }}</td>
				            <td>

				            	<a href="{{ route('purchase_invoice_overview',['invoice_no'=>$show->invoice_no]) }}" title="update" class="bg-success">
				            		<i class="fa fa-eye"></i>
				            	</a>

				            	<a href="{{ route('purchase_edit',['invoice_no'=>$show->invoice_no]) }}" title="update">
				            		<i class="fa fa-pen"></i>
				            	</a>

				            	<a href="{{ route('purchase_invoice_delete',['invoice_no'=>$show->invoice_no]) }}" onclick="return confirm('Are you sure?')" title="delete" class="bg-danger">
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
