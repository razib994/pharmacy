@extends('back-end.master')


@section('title')
   Medicine
@endsection

@section('content-title')
   Add Medicine
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-12">
			<div class="card" style="padding:30px;">

             @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                  <p class="text-center font-weight-bold p-0 m-0">{{ Session::get('message') }}</p>
                </div>
             @endif

				<div class="card card-primary">
              <div class="card-header">
                <h3 class="p-0 m-0">Medicine Info</h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('medicine_store') }}" method="POST">
              	@csrf
                <div class="card-body">

                  <div class="row">

                       <div class="form-group col-lg-3">
                          <label> Manufacturer</label>
                          <select class="form-control select2bs4" name="manufacturer_id" style="width: 100%;" id="manufacturer_id">
                              <option selected="selected">Select here</option>
                              @foreach( $manufacturer as $show)
                              <option value="{{ $show->id }}">{{ $show->name }}</option>
                              @endforeach
                          </select>
                           @error('manufacturer_id')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                         <div class="form-group col-lg-3">
                            <label>Medicine Name</label>
                            <input type="text" name="medicine_name" class="form-control @error('medicine_name') is-invalid @enderror" placeholder="Medicine Name" value="{{ old('medicine_name') }}">
                            @error('generic_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>

                           <div class="form-group col-lg-3">
                        <label>Generic Name</label>
                        <input type="text" name="generic_name" class="form-control @error('generic_name') is-invalid @enderror" placeholder="Generic Name" value="{{ old('generic_name') }}">
                        @error('generic_name')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                      <div class="form-group col-lg-3">
                          <label>Cateogry Name</label>
                          <select class="form-control select2bs4" name="category_id" style="width: 100%;">
                              <option selected="selected">Select here</option>
                               @foreach( $category as $show)
                              <option value="{{ $show->id }}">{{ $show->name }}</option>
                              @endforeach

                          </select>
                             @error('unit_id')
                              <span class="text-danger">{{ $message }}</span>
                             @enderror
                        </div>

                  </div>

                  <div class="row">

                     <div class="form-group col-lg-3">
                          <label>Unit</label>
                          <select class="form-control select2bs4" name="unit_id" style="width: 100%;">
                              <option selected="selected">Select here</option>
                               @foreach( $unit as $show)
                              <option value="{{ $show->id }}">{{ $show->name }}</option>
                              @endforeach

                          </select>
                             @error('unit_id')
                              <span class="text-danger">{{ $message }}</span>
                             @enderror
                        </div>

                     <div class="form-group col-lg-3">
                        <label>Purchase Unit Price</label>
                        <input type="text" name="purchase_unit_price" class="form-control @error('purchase_unit_price') is-invalid @enderror" placeholder="Purchase Unit Price" value="{{ old('purchase_unit_price') }}">
                        @error('purchase_unit_price')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>

                       <div class="form-group col-lg-3">
                        <label>Sale Unit Price</label>
                        <input type="text" name="sale_unit_price" class="form-control @error('sale_unit_price') is-invalid @enderror" placeholder="Sale Unit Price" value="{{ old('sale_unit_price') }}">
                        @error('sale_unit_price')
                          <span class="text-danger">{{ $message }}</span>
                        @enderror
                      </div>



                      <div class="form-group col-lg-3">
                        <label>Select Status</label><br/>
                        <select class="form-control select2bs4" name="status" style="width: 100%;">
                            <option selected="selected">Select status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                         @error('status')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>

                  </div>


                </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-success btn-center">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
			</div>

	     </div>
    </div>
</div>

@endsection
