@extends('back-end.master')


@section('title')
   Purchase
@endsection

@section('content-title')
   Add Purchase
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
              <form action="{{ route('purchase_store') }}" method="POST">
                @csrf
                <div class="card-body">

                    <div class="add_item">
                    <div class="row">

                       <div class="form-group col-lg-4">
                          <label> Manufacturer</label>
                          <select class="form-control select2" id="manufacturer_id" name="manufacturer_id" style="width: 100%;" id="manufacturer_id">
                              <option selected="selected" value="">Select here</option>
                              @foreach( $manufacturer as $show)
                              <option value="{{ $show->id }}">{{ $show->name }}</option>
                              @endforeach
                          </select>
                           @error('manufacturer_id')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group col-lg-4">
                            <label>Purchase Date</label>
                            <input type="date" name="purchase_date" class="form-control">
                            @error('purchase_date')
                            <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>

                        <div class="form-group col-lg-4">
                            <label>Invoice No</label>
                            <input type="text" name="invoice_no" class="form-control" placeholder="Invoice No">
                            @error('invoice_no')
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
                           <th>Box/Carton Type</th>
                           <th>Quantity</th>
                           <th>Total Quantity</th>
                           <th>Total Purchase Price</th>
                           <th>Total Price</th>
                           <th>Action</th>
                         </tr>
                       </thead>

                      <tbody>
                      <tr>
                          <td> <select class="form-control select2" id="medicine_name" name="medicine_name[]" style="width: 100%;" id="medicine_name">
                                  <option selected="selected">Select here</option>
                                  @foreach( $medicine as $show)
                                      <option value="{{ $show->medicine_name }}">{{ $show->medicine_name }}</option>
                                  @endforeach
                              </select>
                          </td>
                          <td><select class="form-control select2" id="category_id" name="category_id[]" id="category_id" style="width:100%;">
                                  <option selected="selected">Select here</option>
                                  @foreach( $category as $show)
                                      <option value="{{ $show->id }}">{{ $show->name }}</option>
                                  @endforeach
                              </select></td>
                          <td><select class="form-control select2 box_quantity" name="type_id[]" style="width: 100%" >
                                  <option selected="selected">Select here</option>
                                  @foreach( $type as $show)
                                      <option value="{{ $show->id }}">{{ $show->box_carton }}({{ $show->quantity }})</option>
                                  @endforeach
                              </select></td>
                          <td><input type="text" class="form-control quantity" name="quantity[]" placeholder="0"></td>
                          <td><input type="text" class="form-control total_quantity" name="total_quantity[]" placeholder="0"></td>
                          <td><input type="text" class="form-control purchase_price" name="total_purchase_price[]" placeholder="0.00" style="width:100%"></td>
                          <td><input type="text" class="form-control total_price" name="total_price[]" placeholder="0.00" style="width:100%"></td>
                          <td style="display: none;">
                              <input type="text" class="form-control type_quantity">
                          </td>
                          <td><a class="btn btn-xs btn-danger" id="remove" style="background: red;">
                                  <i class="fa fa-minus"></i>
                              </a></td>
                      </tr>
                       </tbody>
                            <tfoot>
                              <tr>
                                <td colspan="5"></td>
                                <td>Sub Total:</td>
                                <td>
                                  <input type="text" name="subtotal" class="form-control subtotal" value="0.00" readonly>
                                </td>
                                <td>
                                  <a class="btn btn-xs btn-danger" id="add_row">
                                      <i class="fa fa-plus"></i>
                                  </a>
                                </td>
                              </tr>
                              <tr>
                                <td colspan="5"></td>
                                <td>Paid Amount:</td>
                                <td>
                                  <input type="text" name="paid_amount" class="form-control paid_amount" placeholder="0.00">
                                </td>
                                  <td></td>
                              </tr>
                              <tr>
                                <td colspan="5"></td>
                                <td>Due Amount:</td>
                                <td>
                                  <input type="text" name="due_amount" class="form-control due_amount" placeholder="0.00" readonly>
                                </td>
                                  <td></td>
                              </tr>
                            </tfoot>
                         </table>
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
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $('#add_row').on('click',function(){
        AddRowfunction();
    });

    function AddRowfunction(){

        var tr = '<tr>'+
            '<td class="col-lg-2"><select class="form-control select2" id="medicine_name" name="medicine_name[]" style="width: 100%;" id="medicine_name"><option selected="selected">Select here</option>@foreach( $medicine as $show)<option value="{{ $show->medicine_name }}">{{ $show->medicine_name }}</option>@endforeach</select></td>'+

            '<td class="col-lg-2"><select class="form-control select2" id="category_id" name="category_id[]" style="width: 100%;"><option selected="selected">Select here</option>@foreach( $category as $show)<option value="{{ $show->id }}">{{ $show->name }}</option>@endforeach</select></td>'+

            ' <td class="col-lg-2"><select class="form-control select2 box_quantity" name="type_id[]" style="width: 100%;"><option selected="selected">Select here</option>@foreach( $type as $show)<option value="{{ $show->id }}">{{ $show->box_carton }} ({{ $show->quantity }})</option>@endforeach</select></td>'+

            ' <td class="col-lg-1"><input type="text" class="form-control quantity" name="quantity[]" placeholder="0"></td>'+

            '<td class="col-lg-1"><input type="text" class="form-control total_quantity" name="total_quantity[]" placeholder="0"></td>'+

            '<td class="col-lg-1"><input type="text" class="form-control purchase_price" name="total_purchase_price[]" placeholder="0.00" style="width:100px;"></td>'+

            '<td class="col-lg-1"><input type="text" class="form-control total_price" name="total_price[]" placeholder="0.00" style="width:100px;"></td>'+

            '<td class="col-lg-2" style="display:none;"><input type="text" class="form-control type_quantity" ></td>'+

            '<td> <a class="btn btn-xs btn-danger" id="remove" style="background: red;"><i class="fa fa-minus"></i></a></td>'

        '</tr>';
        $('tbody').append(tr);
        $('.select2').select2();
    }

    $(document).on('click','#remove',function(){
        var last = $('tbody tr').length;
        if(last==1){
            alert('Field no deleted!');
        }else{
            $(this).closest('tr').remove();
        }

    });
    //subtotal price
    function SubtotalAmount(){
        var sum =0;
        $('.total_price').each(function(){
            var value = $(this).val();
            if(!isNaN(value) && value.length !=0 ){
                sum= sum+parseFloat(value);
            }
        });
        $('.subtotal').val(sum);

    }
    $(function(){
        $(document).on('change','.box_quantity',function(){
            var type_id = $(this).val();
            $.ajax({
                url:"{{ route('get_quantity') }}",
                type: "GET",
                data:{ type_id:type_id},
                success:function(data){
                    $(".type_quantity").val(data);
                }
            });
            SubtotalAmount();
        });

        //total quantity
        $(document).on('change keyup', '.box_quantity,.quantity',function(){
            var BoxQuantity =  $(this).closest('tr').find('input.type_quantity').val();
            var Quantity =  $(this).closest('tr').find('input.quantity').val();
            var TotalQuantity = BoxQuantity*Quantity;
            $(this).closest('tr').find('input.total_quantity').val(TotalQuantity);

        });

        //total price
        $(document).on('keyup', '.purchase_price',function(){
            var PurchasePrice =  $(this).closest('tr').find('input.purchase_price').val();
            $(this).closest('tr').find('input.total_price').val(PurchasePrice);
            SubtotalAmount();
        });



        //due amount
        $(document).on('keyup', '.paid_amount',function(){
            var SubTotal =  $('.subtotal').val();
            var PaidAmount =  $(this).closest('tr').find('input.paid_amount').val();
            var DueAmount = SubTotal-PaidAmount;
            $('.due_amount').val(DueAmount);
        });
    });
</script>
@endpush
