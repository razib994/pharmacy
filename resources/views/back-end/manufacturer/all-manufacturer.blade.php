@extends('back-end.master')


@section('title')
   Manufacturer
@endsection

@section('content-title')
   All Manufacturer
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-12">
            <a href="{{ url('/manufacturer_excel_downlaod') }}" class="excel_btn">
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
				            <th>Name</th>
				            <th>Phone No</th>
				            <th>Email</th>
				            <th>Address</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@php($i=1)
				    	@foreach($manufacturer as $show)
				        <tr>
				            <td>{{ $i++ }}</td>
				            <td>{{ $show->name }}</td>
				            <td>{{ $show->phone_no }}</td>
				            <td>{{ $show->email }}</td>
				            <td>{{ $show->address }}</td>
				            <td>

				            	<a href="{{ route('manufacturer_edit',['id'=>$show->id]) }}" title="update">
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
			</div>


	     </div>
    </div>
</div>

@endsection
