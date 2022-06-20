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
        <div class="col-lg-3"></div>
	    <div class="col-lg-6">
			<div class="card" style="padding:30px;">

             @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                  <p class="text-center font-weight-bold p-0 m-0">{{ Session::get('message') }}</p>
                </div>
             @endif

				<div class="card card-primary">
              <div class="card-header">
                <h3 class="p-0 m-0">Customer Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('customer_store_data') }}" method="POST">
              	@csrf
                <div class="card-body">

                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Customer Name" value="{{ old('name') }}">
                    @error('name')
					          <span class="text-danger">{{ $message }}</span>
					         @enderror
                  </div>

                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone_no" class="form-control @error('phone_no') is-invalid @enderror" placeholder="Phone Number" value="{{ old('phone_no') }}">
                     @error('phone_no')
          					  <span class="text-danger">{{ $message }}</span>
          				   @enderror
                  </div>

                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Customer Address" value="{{ old('address') }}">
                     @error('address')
          					  <span class="text-danger">{{ $message }}</span>
          					 @enderror
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success btn-center">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
			</div>

	     </div>
        <div class="col-lg-3"></div>
    </div>
</div>

@endsection
