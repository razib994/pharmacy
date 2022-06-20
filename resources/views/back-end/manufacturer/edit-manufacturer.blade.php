@extends('back-end.master')


@section('title')
   Manufacturer
@endsection

@section('content-title')
   Update Manufacturer
@endsection


@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-3"> </div>
	    <div class="col-lg-6">
			<div class="card" style="padding:30px;">

				<div class="card card-primary">
              <div class="card-header">
                <h3 class="p-0 m-0">Update Manufacturer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('manufacturer_update') }}" method="POST">
              	@csrf
                <div class="card-body">

                  <div class="form-group">
                    <label>Manufacturer Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $info->name }}">
                    <input type="hidden" name="id" value="{{ $info->id }}">
                    @error('name')
					          <span class="text-danger">{{ $message }}</span>
					         @enderror
                  </div>

                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone_no" class="form-control @error('phone_no') is-invalid @enderror" value="{{ $info->phone_no }}">
                     @error('phone_no')
          					  <span class="text-danger">{{ $message }}</span>
          				   @enderror
                  </div>

                   <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $info->email }}">
                     @error('email')
                      <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ $info->address }}">
                     @error('address')
          					  <span class="text-danger">{{ $message }}</span>
          					 @enderror
                  </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success btn-center">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
			</div>

	     </div>
        <div class="col-lg-3"> </div>
    </div>
</div>

@endsection
