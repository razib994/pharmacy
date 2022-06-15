@extends('back-end.master')


@section('title')
   Customer
@endsection

@section('content-title')
   Add Customer
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-6">
			<div class="card" style="padding:30px;">
				<div class="card card-primary">
              <div class="card-header">
                <h3>Update Customer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update_customer') }}" method="POST">
              	@csrf
                <div class="card-body">

                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Customer Name" value="{{ $info->name }}">
                     <input type="hidden" class="form-control" name="id" value="{{ $info->id }}">
                    @error('name')
					          <span class="text-danger">{{ $message }}</span>
					         @enderror
                  </div>

                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone_no" class="form-control @error('phone_no') is-invalid @enderror" placeholder="Phone Number" value="{{ $info->phone_no }}">
                     @error('phone_no')
            					  <span class="text-danger">{{ $message }}</span>
            				 @enderror
                  </div>

                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Customer Address" value="{{ $info->address }}">
                     @error('address')
					             <span class="text-danger">{{ $message }}</span>
					           @enderror
                  </div>

                </div>
                <!-- /.card-body -->

                @if(Session::has('message'))
                   <p class="text-success text-center font-weight-bold">{{ Session::get('message') }}</p>
                @endif

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-center">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
			</div>

	     </div>
    </div>
</div>

@endsection