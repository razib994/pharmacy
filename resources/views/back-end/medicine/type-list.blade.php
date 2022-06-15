@extends('back-end.master')


@section('title')
   Type
@endsection

@section('content-title')
   All Type
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
				            <th>Box/Carton</th>
				            <th>Quantity</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@php($i=1)
				    	@foreach($info as $show)
				        <tr>
				            <td>{{ $i++ }}</td>
				            <td>{{ $show->box_carton }}</td>
				            <td>{{ $show->quantity }}</td>
				            <td>

				            	<a href="{{ route('type_edit',['id'=>$show->id]) }}" title="update">
				            		<i class="fa fa-pen"></i>
				            	</a>

				            	<a href="{{ route('type_delete',['id'=>$show->id]) }}" onclick="return confirm('Are you sure?')" title="delete" class="bg-danger">
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