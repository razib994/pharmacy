@extends('back-end.master')


@section('title')
   Per Unit Price
@endsection

@section('content-title')
  Per Unit Price
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-12">

			<div class="card" style="padding:30px;">

				<table id="example" class="table table-striped table-bordered text-center">
				    <thead>
				        <tr>
				            <th>Manufacturer</th>
				            <th>Category</th>
				            <th>Medicine</th>
				            <th>Total Quantity</th>
				            <th>Total Perchase Price</th>
				            <th>Per Unit Purchase Price</th>
				            <th>Total Sale Price</th>
				            <th>Per Unit Sale Price</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
                         @php($i=1)
				    	 @foreach($perunitprices as $show)
				    	 <?php
                           $total_quantity = $show->total_quantity;
                           $total_purchase_price = $show->total_purchase_price;
                           $total_sale_price = $show->total_sale_price;
                           $per_unit_purchase_price = $total_purchase_price / $total_quantity;
                           $per_unit_sale_price = $total_sale_price / $total_quantity;
				    	 ?>
				        <tr>
				            <td>{{ $show->manufacturer->name }}</td>
				            <td>{{ $show->category->name }}</td>
				            <td>{{ $show->medicine_name }}</td>
				            <td>{{ $show->total_quantity }}</td>
				            <td>{{ $show->total_purchase_price }}</td>
				            <td>
				            	<?php echo number_format((float)$per_unit_purchase_price, 2, '.', ''); ?>
				            </td>
				            <td>{{ $show->total_sale_price }}</td>
				            <td><?php echo number_format((float)$per_unit_sale_price, 2, '.', ''); ?></td>
				            <td>

				            	<a href="{{ route('per_unit_price_edit',['id'=>$show->id]) }}" title="update">
				            		<i class="fa fa-edit"></i>
				            	</a>

				            	<a href="{{ route('manufacturer_delete',['id'=>$show->id]) }}" onclick="return confirm('Are you sure?')" title="delete" class="bg-danger">
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
