@extends('back-end.master')


@section('title')
   Purchase
@endsection

@section('content-title')
   All Per Unit Purchase Price Edit
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
                <h3 class="p-0 m-0">Per Unit Purchase Price Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('per_unit_price_update') }}" method="POST">
              	@csrf
                <div class="card-body">

                  <div class="form-group">
                    <label>Total Sale Price</label>
                    <input type="text" name="total_sale_price" class="form-control" value="{{ $info->total_sale_price }}">
                    <input type="hidden" name="id" class="form-control" value="{{ $info->id }}">
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