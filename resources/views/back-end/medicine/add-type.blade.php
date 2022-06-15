@extends('back-end.master')


@section('title')
   Type
@endsection

@section('content-title')
   Add Type
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
                <h3 class="p-0 m-0">Type Info</h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('type_store') }}" method="POST">
              	@csrf
                <div class="card-body">

                  <div class="form-group">
                    <label>Box/Carton Type</label>
                    <input type="text" name="box_curton" class="form-control @error('box_curton') is-invalid @enderror" placeholder="Box/Carton Type" value="{{ old('box_curton') }}">
                    @error('name')
					          <span class="text-danger">{{ $message }}</span>
					         @enderror
                  </div>

                   <div class="form-group">
                    <label>Quantity Per Box/Carton</label>
                    <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="Quantity Per Box/Carton" value="{{ old('quantity') }}">
                    @error('name')
                    <span class="text-danger">{{ $message }}</span>
                   @enderror
                  </div>


                </div>
               

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