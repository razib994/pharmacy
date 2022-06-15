@extends('back-end.master')


@section('title')
   Manufacturer
@endsection

@section('content-title')
   Add Manufacturer
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-6">
			<div class="card" style="padding:30px;">

             @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                  <p class="text-center font-weight-bold p-0 m-0">{{ Session::get('message') }}</p>
                </div>
             @endif

				<div class="card card-primary">
              <div class="card-header">
                <h3 class="p-0 m-0">Manufacturer Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('manufacturer_store') }}" method="POST">
              	@csrf
                <div class="card-body">

                  <div class="form-group">
                    <label>Manufacturer Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Manufacturer Name" value="{{ old('name') }}">
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
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" value="{{ old('email') }}">
                     @error('email')
                      <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" placeholder="Manufacturer Address" value="{{ old('address') }}">
                     @error('address')
          					  <span class="text-danger">{{ $message }}</span>
          					 @enderror
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-center">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
			</div>

	     </div>
    </div>
</div>

@endsection