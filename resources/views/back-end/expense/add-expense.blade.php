@extends('back-end.master')


@section('title')
   Expense
@endsection

@section('content-title')
   Add Expense
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
                <h3 class="p-0 m-0">Expense Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('store_expense') }}" method="POST">
              	@csrf
                <div class="card-body">

                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Expense Name" value="{{ old('name') }}">
                    @error('name')
					          <span class="text-danger">{{ $message }}</span>
					         @enderror
                  </div>

                  <div class="form-group">
                    <label>Details</label>
                    <input type="text" name="details" class="form-control @error('details') is-invalid @enderror" placeholder="Description" value="{{ old('details') }}">
                     @error('details')
          					  <span class="text-danger">{{ $message }}</span>
          				   @enderror
                  </div>

                  <div class="form-group">
                    <label>Amount</label>
                    <input type="text" name="amount" class="form-control @error('amount') is-invalid @enderror" placeholder="Amount Address" value="{{ old('amount') }}">
                     @error('amount')
          					  <span class="text-danger">{{ $message }}</span>
          					 @enderror
                  </div>

                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control @error('date') is-invalid @enderror" placeholder="Date" value="{{ old('date') }}">
                     @error('date')
                      <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-group">
                    <label>Remarks</label>
                    <input type="text" name="remarks" class="form-control @error('remarks') is-invalid @enderror" placeholder="Remarks" value="{{ old('remarks') }}">
                     @error('remarks')
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
