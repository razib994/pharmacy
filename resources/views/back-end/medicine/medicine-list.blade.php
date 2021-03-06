@extends('back-end.master')

@section('title')
   Medicine
@endsection

@section('content-title')
   All Medicine
@endsection
@section('content')
<div class="container">
    <div class="row">
	    <div class="col-lg-12">
            <a href="{{ url('/medicine_excel_download') }}" class="excel_btn">
                <i class="fa fa-file-excel"></i>Download Excel
            </a>
               @if(Session::has('message'))
                   <div class="alert alert-danger" role="alert">
				      <p class="text-center font-weight-bold p-0 m-0">{{ Session::get('message') }}</p>
				   </div>
                @endif

                  @if(Session::has('update'))
                   <div class="alert alert-success" role="alert">
				      <p class="text-center font-weight-bold p-0 m-0">{{ Session::get('update') }}</p>
				   </div>
                @endif

			<div class="card" style="padding:30px;">

				<table id="example" class="table table-striped table-bordered">
				    <thead>
				        <tr>
				            <th>SN</th>
				            <th>Manufacturer</th>
				            <th>Category</th>
				            <th>Unit</th>
				            <th>Medicine</th>
				            <th>Generic</th>
				            <th>Purchase Unit Price</th>
				            <th>Sale Unit Price</th>
				            <th>Status</th>
				            <th style="width:70px;">Action</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@php($i=1)
				    	@foreach($medicines as $show)
				       <tr>
				       	  <td>{{ $i++ }}</td>
				       	  <td>{{ $show->manufacturer->name }}</td>
				       	  <td>{{ $show->category->name}}</td>
				       	  <td>{{ $show->unit->name}}</td>
				       	  <td>{{ $show->medicine_name }}</td>
				       	  <td>{{ $show->generic_name }}</td>
				       	  <td>
				       	  	<?php echo number_format((float)$show->purchase_unit_price, 2, '.', ''); ?>
				       	  </td>
				       	  <td>
				       	  	<?php echo number_format((float)$show->sale_unit_price, 2, '.', ''); ?>
				       	  </td>
				       	  <td>
				            	@if($show->status==1)
				            	<span class="text-primary">Active</span>
				            	@else
				            	<span class="text-danger">Inactive</span>
				            	@endif
				            </td>
				       	   <td>

				            	<a href="{{ route('medicine_edit',['id'=>$show->id]) }}" title="update">
				            		<i class="fa fa-edit"></i>
				            	</a>

				               <a href="{{ route('medicine_delete',['id'=>$show->id]) }}" onclick="return confirm('Are you sure?')" title="delete" class="bg-danger">
				               	<i class="fa fa-trash"></i>
				               </a>
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
