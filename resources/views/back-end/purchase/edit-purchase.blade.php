@extends('back-end.master')


@section('title')
   Purchase
@endsection

@section('content-title')
   Update Purchase
@endsection


@section('content')


<div class="container-fluid">
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
                <h3 class="p-0 m-0">Purchase Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('purchase_invoice_update') }}" method="POST">
                @csrf
                <div class="card-body">

                    <div class="add_item">
                    <div class="row">
                      
                       <div class="form-group col-lg-4">
                          <label> Manufacturer</label>
                          <input type="text" class="form-control" value="{{ $invoices_data->manufacturer->name }}">
                          <input type="hidden" name="manufacturer_id" value="{{ $invoices_data->manufacturer_id }}">
                           @error('manufacturer_id')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group col-lg-4">
                            <label>Purchase Date</label>
                            <input type="date" name="purchase_date" class="form-control" value="{{ $invoices_data->purchase_date }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>

                        <div class="form-group col-lg-4">
                            <label>Invoice No</label>
                            <input type="text" name="invoice_no" class="form-control" value="{{ $invoices_data->invoice_no }}">
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                  </div>
                  </div>

                  <div class="row">
                     <table class="table table-bordered">
                       <thead>
                         <tr>
                           <th>Medicine Name</th>
                           <th>Category</th>
                           <th>Expire Date</th>
                           <th>Box/Carton Type</th>
                           <th>Quantity</th>
                           <th>Total Quantity</th>
                           <th>Total Purchase Price</th>
                           <th>Total Price</th>
                           <th>Action</th>
                         </tr>
                       </thead>

                      <tbody>
                    @foreach($purchases_data as $show)
                     <tr>
                       <td class="col-lg-2">
                       <input type="text" class="form-control" name="medicine_name[]" id="medicine_name" value="{{ $show->medicine_name }}">

                       </td>
                        <td class="col-lg-1">
                          <input type="text" class="form-control" id="category_id" value="{{ $show->category->name }}">
                          <input type="hidden" class="form-control" name="category_id[]" id="category_id" value="{{ $show->category_id }}">
                       </td>
                        <td class="col-lg-1">
                         <input type="date" class="form-control" name="expire_date[]" style="width:100%;" value="{{ $show->expire_date }}">
                       </td>
                        <td class="col-lg-2">
                          <select name="type_id[]" class="form-control select2 box_quantity">
                            @foreach($type as $types_data)
                             <option value="{{ $types_data->id }}" {{ ( $types_data->id ==$show->type_id) ? 'selected' : '' }}>
                              {{ $types_data->box_carton }}({{ $types_data->quantity }})
                            </option>
                            @endforeach
                          </select>
                       </td>
                        <td class="col-lg-1">
                         <input type="text" class="form-control quantity" name="quantity[]" value="{{ $show->quantity }}">
                       </td>
                        <td class="col-lg-1">
                         <input type="text" class="form-control total_quantity" name="total_quantity[]" value="{{ $show->total_quantity }}">
                       </td>
                       <td class="col-lg-1">
                         <input type="text" class="form-control purchase_price" name="total_purchase_price[]" value="{{ $show->total_purchase_price }}" style="width:80px;">
                       </td>
                       <td class="col-lg-1">
                         <input type="text" class="form-control total_price" name="total_price[]" value="{{ $show->total_price }}" style="width:80px;">
                       </td>
                        <td style="display: none;">
                         <input type="text" class="form-control type_quantity">
                       </td>
                        
                        <td class="col-lg-1">
                         <a class="btn btn-xs btn-danger" id="remove" style="background: red;">
                           <i class="fa fa-minus"></i>
                         </a>
                        
                       </td>
                     </tr>
                     @endforeach
                   
                   </tbody>



                        <tfoot>
                          <tr>
                            <td colspan="6"></td>
                            <td>Sub Total:</td>
                            <td>
                              <input type="text" name="subtotal" class="form-control subtotal" value="{{ $invoices_data->subtotal }}" readonly>
                            </td>
                            <td>
                              <!-- <a class="btn btn-xs btn-danger" id="add_row">
                                  <i class="fa fa-plus"></i>
                              </a> -->
                            </td>
                          </tr>
                          <tr>
                            <td colspan="6"></td>
                            <td>Paid Amount:</td>
                            <td>
                              <input type="text" name="paid_amount" class="form-control paid_amount" value="{{ $invoices_data->paid_amount }}">
                            </td>
                          </tr>
                          <tr>
                            <td colspan="6"></td>
                            <td>Due Amount:</td>
                            <td>
                              <input type="text" name="due_amount" class="form-control due_amount" value="{{ $invoices_data->due_amount }}" readonly>
                            </td>

                          </tr>
                        </tfoot>

                     </table>
                  </div>

                </div>
                <!-- /.card-body -->

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