@extends('back-end.master')


@section('title')
   Users
@endsection

@section('content-title')
   All Users
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
				            <th>UserName/Email</th>
				            <th>Role</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@php($i=1)
				    	@foreach($users as $user)
				        <tr>
				            <td>{{ $i++ }}</td>
				            <td>{{ $user->name }}</td>
				            <td>{{ $user->email }}</td>
				            <td>{{ ($user->is_admin ==1) ? "Admin ":"User" }}</td>
				            <td>

				            	<a href="{{ route('edit_user',['id'=>$user->id]) }}" title="update"><i class="fa fa-pen"></i></a>

				            	<a href="{{ route('delete_user',['id'=>$user->id]) }}" onclick="return confirm('Are you sure?')" title="delete" class="bg-danger">
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
