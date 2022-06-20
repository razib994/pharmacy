@extends('back-end.master')


@section('title')
   Expense
@endsection

@section('content-title')
   Update Expense
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
                <h3 class="p-0 m-0">Update Expense</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update_expense') }}" method="POST">
              	@csrf
                <div class="card-body">

                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" value="{{ $info->name }}">
                    <input type="hidden" name="id" value="{{ $info->id }}">
                  </div>

                  <div class="form-group">
                    <label>Details</label>
                    <input type="text" name="details" class="form-control" value="{{ $info->details }}">
                  </div>

                  <div class="form-group">
                    <label>Amount</label>
                    <input type="text" name="amount" class="form-control" value="{{ $info->amount }}">
                  </div>

                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" value="{{ $info->date }}">
                  </div>

                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" name="remarks" class="form-control" value="{{ $info->remarks }}">
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
        <div class="col-lg-3"></div>
    </div>
</div>

@endsection
