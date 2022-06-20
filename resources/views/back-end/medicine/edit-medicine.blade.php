@extends('back-end.master')


@section('title')
   Medicine
@endsection

@section('content-title')
   Update Medicine
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
              <form action="{{ route('medicine_update') }}" method="POST">
                @csrf
                <div class="card-body">

                  <div class="row">

                       <div class="form-group col-lg-3">
                            <label>Manufacturer Name</label>
                            <input type="text" class="form-control" value="{{ $info->manufacturer->name }}">
                             <input type="hidden" name="manufacturer_id" class="form-control" value="{{ $info->manufacturer_id }}">
                        </div>

                        <div class="form-group col-lg-3">
                            <label>Category Name</label>
                            <input type="text" class="form-control" value="{{ $info->category->name }}">
                            <input type="hidden" name="category_id" class="form-control" value="{{ $info->category_id }}">
                        </div>

                        <div class="form-group col-lg-3">
                            <label>Unit Name</label>
                            <input type="text" class="form-control" value="{{ $info->unit->name }}">
                            <input type="hidden" name="unit_id" value="{{ $info->unit_id }}">
                        </div>

                         <div class="form-group col-lg-3">
                            <label>Medicine Name</label>
                            <input type="text" name="medicine_name" class="form-control @error('medicine_name') is-invalid @enderror" placeholder="Medicine Name" value="{{ $info->medicine_name }}">
                            @error('generic_name')
                              <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <input type="hidden" name="id" value="{{ $info->id }}">



                  </div>

                  <div class="row">

                        <div class="form-group col-lg-3">
                        <label>Generic Name</label>
                        <input type="text" name="generic_name" class="form-control @error('generic_name') is-invalid @enderror" placeholder="Generic Name" value="{{ $info->generic_name }}">
                      </div>

                       <div class="form-group col-lg-3">
                        <label>Purchase Unit Price</label>
                        <input type="text" name="purchase_unit_price" class="form-control @error('purchase_unit_price') is-invalid @enderror" value="{{ $info->purchase_unit_price }}">
                      </div>

                       <div class="form-group col-lg-3">
                        <label>Sale Unit Price</label>
                        <input type="text" name="sale_unit_price" class="form-control @error('sale_unit_price') is-invalid @enderror" value="{{ $info->sale_unit_price }}">
                      </div>



                      <div class="form-group col-lg-3">
                        <label>Select Status</label><br/>
                        <select class="form-control select2bs4" name="status" style="width: 100%;">
                            <option selected="selected">Select status</option>
                            <option value="1" {{ ( $info->status == 1) ? 'selected' : '' }}>
                            Active</option>
                            <option value="0" {{ ( $info->status == 0) ? 'selected' : '' }}>Inactive</option>
                        </select>
                         @error('status')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>

                  </div>


                </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-success btn-center">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
      </div>

       </div>
    </div>
</div>

@endsection
