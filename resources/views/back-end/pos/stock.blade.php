@extends('back-end.master')


@section('title')
   Stock
@endsection

@section('content-title')
   All Stock
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-12">
            <a href="{{ url('get_stock_list_excel') }}" class="excel_btn">
                <i class="fa fa-file-excel"></i>Download Excel
            </a>

			<div class="card" style="padding:30px;">

				<table id="example" class="table table-striped table-bordered text-center">
				    <thead>
				        <tr>
				            <th>SL No</th>
				            <th>Medicine Name</th>
				            <th>Category Name</th>
				            <th>Box/Carton Quantity</th>
				            <th>In Quantity</th>
				             <th>Out Quantity</th>
				            <th>Avaiable Quantity</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@php($i=1)
				    	@foreach($stock as $show)
				    	<?php
				    	  $out_stock = App\Models\PosInvoice::where('category_id',$show->category_id)->where('medicine_name',$show->medicine_name)->sum('quantity');

				    	  $in_stock = App\Models\Stock::where('category_id',$show->category_id)->where('medicine_name',$show->medicine_name)->sum('in_quantity');

				    	  $available = $in_stock - $out_stock;
				    	?>
				    	<tr>
				    		<td>{{ $i++ }}</td>
				    		<td>{{ $show->medicine_name }}</td>
				    		<td>{{ $show->category->name }}</td>
				    		<td>{{ $show->sum }}</td>
				    		<td>{{ $show->sum1 }}</td>
				    		<td>{{ $out_stock }}</td>
				    		<td>
				    			{{ $available }}
				    		</td>
				    		<input type="hidden" id="in_stock" value="{{ $available }}">
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
