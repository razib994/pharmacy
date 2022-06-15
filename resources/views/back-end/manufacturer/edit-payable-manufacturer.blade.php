@extends('back-end.master')


@section('title')
   Payable Manufacturer
@endsection

@section('content-title')
  Update Payable Manufacturer
@endsection


@section('content')


<div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
      <div class="card" style="padding:30px;">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="p-0 m-0">Update Payable Manufacturer</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update_payable_manufacturer') }}" method="POST">
                @csrf
                <div class="card-body">

                    <div class="add_item">
                    <div class="row">

                       <div class="form-group col-lg-2">
                            <label>Invoice No</label>
                            <input type="text" name="invoice_no" class="form-control" value="{{ $info->invoice_no }}" readonly="">
                             <input type="hidden" name="id" value="{{ $info->id }}">
                        </div>
                      
                       <div class="form-group col-lg-3">
                          <label> Manufacturer</label>
                          <input type="text" class="form-control" value="{{ $info->manufacturer->name }}" readonly="">

                          <input type="hidden" name="manufacturer_id" class="form-control" value="{{ $info->manufacturer_id }}" readonly="">

                        </div>

                        <div class="form-group col-lg-2">
                            <label>Due Amount</label>
                            <input type="text" name="due_amount" class="form-control" value="{{ $info->due_amount }}" readonly="">

                             <input type="hidden" name="paid_amount" value="{{ $info->paid_amount }}" readonly="">

                        </div>

                        <div class="form-group col-lg-2">
                            <label>Todays Amount</label>
                            <input type="text" name="todays_payment" class="form-control">
                        </div>

                        <div class="form-group col-lg-3">
                            <label>Payment Date</label>
                            <input type="text" name="payment_date" class="form-control" id="single" readonly="">
                        </div>

                  </div>
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