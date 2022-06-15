@extends('back-end.master')


@section('title')
   Unit
@endsection

@section('content-title')
   All Unit
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-12">

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

				<table id="example" class="table table-striped table-bordered">
				    <thead>
				        <tr>
				            <th>SN</th>
				            <th>Name</th>
				            <th>Status</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@php($i=1)
				    	@foreach($info as $show)
				        <tr>
				            <td>{{ $i++ }}</td>
				            <td>{{ $show->name }}</td>
				            <td>
				            	@if($show->status==1)
				            	<span class="text-primary">Active</span>
				            	@else
				            	<span class="text-danger">Inactive</span>
				            	@endif
				            </td>
				            <td>

				            	<a href="{{ route('unit_edit',['id'=>$show->id]) }}" title="update">
				            		<i class="fa fa-pen"></i>
				            	</a>

				            	<a href="{{ route('unit_delete',['id'=>$show->id]) }}" onclick="return confirm('Are you sure?')" title="delete" class="bg-danger">
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