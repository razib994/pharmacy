@extends('back-end.master')


@section('title')
   Purchase Return
@endsection

@section('content-title')
   Purchase Return
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
                <h3 class="p-0 m-0">Purchase Return</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('store_purchase_return') }}" method="POST">
                @csrf
                <div class="card-body">

                  <div class="row">
                     <table class="table">
                       <thead>
                         <tr>
                           <th>Medicine Name</th>
                           <th>Category</th>
                           <th>Return Date</th>
                           <th>Amount</th>
                           <th>Quantity</th>
                           <th>Total Amount</th>
                           <th>Action</th>
                         </tr>
                       </thead>

                      <tbody>
                     <tr>

                       <td class="col-lg-2">
                         <select class="form-control select2" id="medicine_name" name="medicine_name[]" style="width: 100%;" id="medicine_name">
                              <option selected="selected">Select here</option>
                              @foreach( $medicine as $show)
                              <option value="{{ $show->medicine_name }}">{{ $show->medicine_name }}</option>
                              @endforeach
                          </select>

                       </td>

                        <td class="col-lg-2">
                         <select class="form-control select2" id="category_id" name="category_id[]" id="category_id" style="width:100%;">
                              <option selected="selected">Select here</option>
                              @foreach( $category as $show)
                              <option value="{{ $show->id }}">{{ $show->name }}</option>
                              @endforeach
                          </select>
                       </td>

                        <td class="col-lg-2">
                         <input type="date" class="form-control" name="purchase_return_date[]" style="width:100%;">
                       </td>

                        <td class="col-lg-2">
                         <input type="text" class="form-control amount" name="amount[]" placeholder="0">
                       </td>

                        <td class="col-lg-1">
                         <input type="text" class="form-control quantity" name="quantity[]" placeholder="0">
                       </td>

                        <td class="col-lg-2">
                         <input type="text" class="form-control total_amount" name="total_amount[]" placeholder="0">
                       </td>

                        <td class="col-lg-1">
                         <a class="btn btn-xs btn-danger" id="remove_purchase_return" style="background: red;">
                           <i class="fa fa-minus"></i>
                         </a>

                       </td>
                     </tr>

                   </tbody>

                   <tfoot>
                          <tr>
                            <td colspan="4"></td>
                            <td>Sub Total:</td>
                            <td>
                              <input type="text" name="subtotal" class="form-control subtotal" value="0.00" readonly>
                            </td>
                            <td>
                              <a class="btn btn-xs btn-danger" id="add_return_purchase_row">
                                  <i class="fa fa-plus"></i>
                              </a>
                            </td>
                          </tr>
                        </tfoot>

                     </table>
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

@push('scripts')


<script>
      $('#add_return_purchase_row').on('click',function(){
      AddReturnPurchaseRowfunction();
   });

   function AddReturnPurchaseRowfunction(){

    var tr = '<tr>'+

             '<td class="col-lg-2"><select class="form-control select2" id="medicine_name" name="medicine_name[]" style="width: 100%;" id="medicine_name"><option selected="selected">Select here</option>@foreach( $medicine as $show)<option value="{{ $show->medicine_name }}">{{ $show->medicine_name }}</option>@endforeach</select></td>'+

             '<td class="col-lg-2"><select class="form-control select2" id="category_id" name="category_id[]" style="width: 100%;"><option selected="selected">Select here</option>@foreach( $category as $show)<option value="{{ $show->id }}">{{ $show->name }}</option>@endforeach</select></td>'+

             '<td class="col-lg-2"><input type="date" class="form-control" name="purchase_return_date[]" style="width:100%;"></td>'+

             '<td class="col-lg-2"><input type="text" class="form-control amount" name="amount[]" placeholder="0"></td>'+

             '<td class="col-lg-1"><input type="text" class="form-control quantity" name="quantity[]" placeholder="0"></td>'+

             '<td class="col-lg-2"><input type="text" class="form-control total_amount" name="total_amount[]" placeholder="0"></td>'+

             '<td> <a class="btn btn-xs btn-danger" id="remove_purchase_return" style="background: red;"><i class="fa fa-minus"></i></a></td>'

            '</tr>';
            $('tbody').append(tr);
            $('.select2').select2();
    }

    $(document).on('click','#remove_purchase_return',function(){
      var last = $('tbody tr').length;
        if(last==1){
          alert('Field no deleted!');
        }else{
           $(this).closest('tr').remove();
        }

  });




$(function(){

 //total price
    $(document).on('keyup', '.quantity',function(){
        var Quantity = $(this).val();
        var Amount =  $(this).closest('tr').find('input.amount').val();
        var TotalAmount = Quantity*Amount;
        $(this).closest('tr').find('input.total_amount').val(TotalAmount);
        PurchaseReturnSubtotalAmount();
    });




  //subtotal price
     function PurchaseReturnSubtotalAmount(){
      var sum =0;
      $('.total_amount').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });
      $('.subtotal').val(sum);

     }


});

  </script>


@endpush
