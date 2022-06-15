@extends('back-end.master')


@section('title')
   Type
@endsection

@section('content-title')
   Update Type
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-6">
			<div class="card" style="padding:30px;">

				<div class="card card-primary">
              <div class="card-header">
                <h3 class="p-0 m-0">Update Type</h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('type_update') }}" method="POST">
              	@csrf
                <div class="card-body">

                  <div class="form-group">
                    <label>Box/Carton Type</label>
                    <input type="text" name="box_curton" class="form-control" value="{{ $info->box_carton }}">
                    <input type="hidden" name="id" class="form-control" value="{{ $info->id }}">
                    @error('name')
					          <span class="text-danger">{{ $message }}</span>
					         @enderror
                  </div>

                   <div class="form-group">
                    <label>Quantity Per Box/Carton</label>
                    <input type="text" name="quantity" class="form-control"  value="{{ $info->quantity }}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                   @enderror
                  </div>


                </div>


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
