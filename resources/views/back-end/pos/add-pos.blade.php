@extends('back-end.master')


@section('title')
   POS
@endsection

@section('content-title')
   Add Sale
@endsection


@section('content')


<div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
      <div class="card" style="padding:30px;">
             <a href="{{ route('all_stock') }}" class="stock-btn">Stock Info</a>

             @if(Session::has('message'))
                <div class="alert alert-success" role="alert">
                  <p class="text-center font-weight-bold p-0 m-0">{{ Session::get('message') }}</p>
                </div>
             @endif

        <div class="card card-primary">
              <div class="card-header">
                <h3 class="p-0 m-0 pos_info">POS Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('pos_store') }}" method="POST">
                @csrf
                <div class="card-body">

                    <div class="add_item">
                    <div class="row">

                       <div class="form-group col-lg-4">
                          <label>
                              Customer
                              <span id="plus" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i></span>
                           </label>
                          <select class="form-control select2" id="customer_id" name="customer_id" style="width: 100%;">
                              <option selected="selected" value="">Select here</option>
                               @foreach( $customers as $show)
                              <option value="{{ $show->id }}">{{ $show->name }}</option>
                              @endforeach
                          </select>
                           @error('customer_id')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </div>

                        <div class="form-group col-lg-4">
                            <label>Sale Date</label>
                            <input type="date" name="sale_date" class="form-control" id="single1" readonly>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>

                        <div class="form-group col-lg-4">
                            <label>Invoice No</label>
                            <input type="text" name="invoice_no" value="{{ $invoice_no }}" class="form-control" readonly>
                        </div>
                  </div>
                  </div>

                  <div class="row">
                     <table class="table table-bordered">
                       <thead>
                         <tr>
                           <th>Medicine Name</th>
                           <th>Category</th>
                           <th>Available Stock</th>
                           <th>Quantity</th>
                           <th>Purchase Unit Price</th>
                           <th>Sale Unit Price</th>
                           <th>Total Price</th>
                           <th>Action</th>
                         </tr>
                       </thead>

                      <tbody>
                     <tr>

                       <td class="col-lg-3">
                         <select class="form-control select2 medicine_name" id="medicine_name" name="medicine_name[]">
                              <option selected="selected">Select here</option>
                              @foreach( $medicine as $show)
                                <option value="{{ $show->medicine_name }}">
                                  {{ $show->medicine_name }}
                                </option>
                                @endforeach
                          </select>

                       </td>

                        <td class="col-lg-2">
                         <select class="form-control select2 category_id" id="category_id" name="category_id[]">
                              <option selected="selected">Select here</option>
                              @foreach( $category as $show)
                              <option value="{{ $show->id }}">
                                {{ $show->name }}
                              </option>
                              @endforeach
                          </select>
                       </td>

                        <td class="col-lg-1">
                         <input type="text" class="form-control available_stock" value="" readonly="">
                       </td>

                        <td class="col-lg-1">
                         <input type="text" class="form-control quantity" name="quantity[]" placeholder="0">
                       </td>

                       <td class="col-lg-1">
                         <input type="text" class="form-control purchase_unit_price" name="purchase_unit_price[]" value="0.00" readonly="">
                       </td>

                       <td class="col-lg-1">
                         <input type="text" class="form-control sale_unit_price" name="sale_unit_price[]" value="0.00" readonly="">
                       </td>

                       <td class="col-lg-2">
                         <input type="text" class="form-control total_pos_price" name="total_price[]" placeholder="0.00" readonly="">
                       </td>

                        <td class="col-lg-1">
                         <a class="btn btn-xs btn-danger" id="remove_pos" style="background: red;">
                           <i class="fa fa-minus"></i>
                         </a>

                       </td>

                       <!-- total purchase and sale price input field -->
                         <input type="hidden" name="total_purchase_price[]" class="total_purchase_price">
                         <input type="hidden" name="total_sale_price[]" class="total_price">
                       <!-- total purchase and sale price input field -->

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
                              <a class="btn btn-xs btn-danger" id="add_row_pos">
                                  <i class="fa fa-plus"></i>
                              </a>
                            </td>
                          </tr>
                          <tr>
                            <td colspan="5"></td>
                            <td>Discount:</td>
                            <td>
                              <input type="text" name="discount" class="form-control discount" placeholder="0.00">
                            </td>
                          </tr>


                          <tr>
                            <td colspan="5"></td>
                            <td>Total Amount:</td>
                            <td>
                              <input type="text" name="total_amount" class="form-control total_amount" value="0.00">
                            </td>
                          </tr>

                          <tr>
                            <td colspan="5"></td>
                            <td>Paid Amount:</td>
                            <td>
                              <input type="text" name="paid_amount" class="form-control paid_amount_sale" placeholder="0.00">
                            </td>
                          </tr>
                          <tr>
                            <td colspan="5"></td>
                            <td>Due Amount:</td>
                            <td>
                              <input type="text" name="due_amount" class="form-control due_amount_sale" placeholder="0.00" readonly>
                            </td>

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

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Customer Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
      </div>
      <div class="modal-body">
          <ul id="save_msgList"></ul>
        <form action="" method="POST" id="form">
            @csrf
          <div class="form-group">
              <label>Name</label>
              <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Customer Name" value="{{ old('name') }}">
              @error('name')
              <span class="text-danger">{{ $message }}</span>
             @enderror
          </div>

          <div class="form-group">
              <label>Phone Number</label>
              <input type="text" name="phone_no" id="phone" class="form-control @error('phone_no') is-invalid @enderror" placeholder="Phone Number" value="{{ old('phone_no') }}">
               @error('phone_no')
                <span class="text-danger">{{ $message }}</span>
               @enderror
          </div>

          <div class="form-group">
              <label>Address</label>
              <input type="text" name="address" id="addres" class="form-control @error('address') is-invalid @enderror" placeholder="Customer Address" value="{{ old('address') }}">
               @error('address')
                <span class="text-danger">{{ $message }}</span>
               @enderror
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="ajaxSubmit" class="btn btn-success">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection

@push('scripts')

<script>

    $(document).ready(function(){
        $('#ajaxSubmit').click(function(e){
            e.preventDefault();
            $.ajax({
                url: "{{ route('customer_store') }}",
                method: 'post',
                data: {
                    name: $('#name').val(),
                    phone_no: $('#phone').val(),
                    address: $('#addres').val(),
                    _token: '{{ csrf_token() }}'

                },
                success: function(result){
                    var response = JSON.parse(result);
                    if (response.status == 400) {
                        $('#save_msgList').html("");
                        $('#save_msgList').addClass('alert alert-danger');
                        $.each(response.errors, function (key, err_value) {
                            $('#save_msgList').append('<li>' + err_value + '</li>');
                        });
                    }else {
                        $('#save_msgList').html("");
                        $('#success_message').addClass('alert alert-success');
                        $('#success_message').text(response.success);
                        $('#exampleModal').find('input').val('');
                        $('#exampleModal').modal('hide');
                    }


                }});
        });
    });

    var d = new Date();
           var currDay = d.getDate();
           var currMonth = d.getMonth();
           var currYear = d.getFullYear();
           var startDate = new Date(currYear, currMonth, currDay);
           $("#single1").datepicker();
           $("#single1").val($.datepicker.formatDate('yy-mm-dd', new Date(startDate)));


  $('#add_row_pos').on('click',function(){
      AddRowPosfunction();
   });

   var i = 0;
   function AddRowPosfunction(){
   ++i;
    var tr = '<tr>'+
             '<td class="col-lg-3"><select class="form-control select2 medicine_name" id="medicine_name'+i+'"name="medicine_name[]" style="width: 100%;"><option selected="selected" >Select here</option>@foreach( $medicine as $show)<option value="{{ $show->medicine_name }}">{{ $show->medicine_name }}</option>@endforeach</select></td>'+

             '<td class="col-lg-2"><select class="form-control select2 category_id" id="category_id'+i+'" name="category_id[]" style="width: 100%;"><option selected="selected">Select here</option>@foreach( $category as $show)<option value="{{ $show->id }}">{{ $show->name }}</option>@endforeach</select></td>'+

             ' <td class="col-lg-1"><input type="text" class="form-control available_stock'+i+'" name="available_stock[]" placeholder="0" readonly=""></td>'+

             ' <td class="col-lg-1"><input type="hidden" value="'+i+'" onclick="a()" id="incriment" name="incriment"/><input type="text" class="form-control quantity'+i+'" name="quantity[]" placeholder="0"></td>'+

             ' <td class="col-lg-1" style="display:none;"><input type="hidden" name="total_purchase_price[]" class="total_purchase_price'+i+'"></td>'+

             ' <td class="col-lg-1" style="display:none;"><input type="hidden" name="total_sale_price[]" class="total_price'+i+'"></td>'+

             '<td class="col-lg-1"><input type="text" name="purchase_unit_price[]" class="form-control purchase_unit_price'+i+'" readonly="" placeholder="0.00"></td>'+

             '<td class="col-lg-1"><input type="text" name="sale_unit_price[]" class="form-control sale_unit_price'+i+'" readonly="" placeholder="0.00"></td>'+

             '<td class="col-lg-2"><input type="text" class="form-control total_pos_price'+i+'" name="total_price[]" placeholder="0.00" readonly=""></td>'+

             '<td class="col-lg-1"><a class="btn btn-xs btn-danger" id="remove_pos" style="background: red;"><i class="fa fa-minus"></i></a></td>'

            '</tr>';
            $('tbody').append(tr);
            $('.select2').select2();
    }




  $(function(){
      $(document).on('click','#remove_pos',function(){
          var last = $('tbody tr').length;
          if(last==1){
              alert('Field no deleted!');
          }else{
              $(this).closest('tr').remove();
          }
          SubtotalAmountSale();
      });

      //total price
     $(document).on('keyup', '.quantity',function(){
        var Quantity =  $('.quantity').val();
        var SaleUnitPrice =  $('.sale_unit_price').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price').val(TotalSalePrice);
        SubtotalAmountSale();
    });

    //total price1
     $(document).on('keyup', '.quantity1',function(){
        var Quantity =  $('.quantity1').val();
        var SaleUnitPrice =  $('.sale_unit_price1').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price1').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price2
     $(document).on('keyup', '.quantity2',function(){
        var Quantity =  $('.quantity2').val();
        var SaleUnitPrice =  $('.sale_unit_price2').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price2').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price3
     $(document).on('keyup', '.quantity3',function(){
        var Quantity =  $('.quantity3').val();
        var SaleUnitPrice =  $('.sale_unit_price3').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price3').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price4
     $(document).on('keyup', '.quantity4',function(){
        var Quantity =  $('.quantity4').val();
        var SaleUnitPrice =  $('.sale_unit_price4').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price4').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price5
     $(document).on('keyup', '.quantity5',function(){
        var Quantity =  $('.quantity5').val();
        var SaleUnitPrice =  $('.sale_unit_price5').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price5').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price6
     $(document).on('keyup', '.quantity6',function(){
        var Quantity =  $('.quantity6').val();
        var SaleUnitPrice =  $('.sale_unit_price6').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price6').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price7
     $(document).on('keyup', '.quantity7',function(){
        var Quantity =  $('.quantity7').val();
        var SaleUnitPrice =  $('.sale_unit_price7').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price7').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price8
     $(document).on('keyup', '.quantity8',function(){
        var Quantity =  $('.quantity8').val();
        var SaleUnitPrice =  $('.sale_unit_price8').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price8').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price9
     $(document).on('keyup', '.quantity9',function(){
        var Quantity =  $('.quantity9').val();
        var SaleUnitPrice =  $('.sale_unit_price9').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price9').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price10
     $(document).on('keyup', '.quantity10',function(){
        var Quantity =  $('.quantity10').val();
        var SaleUnitPrice =  $('.sale_unit_price10').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price10').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price11
     $(document).on('keyup', '.quantity11',function(){
        var Quantity =  $('.quantity11').val();
        var SaleUnitPrice =  $('.sale_unit_price11').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price11').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price12
     $(document).on('keyup', '.quantity12',function(){
        var Quantity =  $('.quantity12').val();
        var SaleUnitPrice =  $('.sale_unit_price12').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price12').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price13
     $(document).on('keyup', '.quantity13',function(){
        var Quantity =  $('.quantity13').val();
        var SaleUnitPrice =  $('.sale_unit_price13').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price13').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price14
     $(document).on('keyup', '.quantity14',function(){
        var Quantity =  $('.quantity14').val();
        var SaleUnitPrice =  $('.sale_unit_price14').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price14').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price15
     $(document).on('keyup', '.quantity15',function(){
        var Quantity =  $('.quantity15').val();
        var SaleUnitPrice =  $('.sale_unit_price15').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price15').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price16
     $(document).on('keyup', '.quantity16',function(){
        var Quantity =  $('.quantity16').val();
        var SaleUnitPrice =  $('.sale_unit_price16').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price16').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price17
     $(document).on('keyup', '.quantity17',function(){
        var Quantity =  $('.quantity17').val();
        var SaleUnitPrice =  $('.sale_unit_price17').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price17').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price18
     $(document).on('keyup', '.quantity18',function(){
        var Quantity =  $('.quantity18').val();
        var SaleUnitPrice =  $('.sale_unit_price18').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price18').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price19
     $(document).on('keyup', '.quantity19',function(){
        var Quantity =  $('.quantity19').val();
        var SaleUnitPrice =  $('.sale_unit_price19').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price19').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price20
     $(document).on('keyup', '.quantity20',function(){
        var Quantity =  $('.quantity20').val();
        var SaleUnitPrice =  $('.sale_unit_price20').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price20').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price21
     $(document).on('keyup', '.quantity21',function(){
        var Quantity =  $('.quantity21').val();
        var SaleUnitPrice =  $('.sale_unit_price21').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price21').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price22
     $(document).on('keyup', '.quantity22',function(){
        var Quantity =  $('.quantity22').val();
        var SaleUnitPrice =  $('.sale_unit_price22').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price22').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price23
     $(document).on('keyup', '.quantity23',function(){
        var Quantity =  $('.quantity23').val();
        var SaleUnitPrice =  $('.sale_unit_price23').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price23').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price24
     $(document).on('keyup', '.quantity24',function(){
        var Quantity =  $('.quantity24').val();
        var SaleUnitPrice =  $('.sale_unit_price24').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price24').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price25
     $(document).on('keyup', '.quantity25',function(){
        var Quantity =  $('.quantity25').val();
        var SaleUnitPrice =  $('.sale_unit_price25').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price25').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price26
     $(document).on('keyup', '.quantity26',function(){
        var Quantity =  $('.quantity26').val();
        var SaleUnitPrice =  $('.sale_unit_price26').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price26').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price27
     $(document).on('keyup', '.quantity27',function(){
        var Quantity =  $('.quantity27').val();
        var SaleUnitPrice =  $('.sale_unit_price27').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price27').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price28
     $(document).on('keyup', '.quantity28',function(){
        var Quantity =  $('.quantity28').val();
        var SaleUnitPrice =  $('.sale_unit_price28').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price28').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price29
     $(document).on('keyup', '.quantity29',function(){
        var Quantity =  $('.quantity29').val();
        var SaleUnitPrice =  $('.sale_unit_price29').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price29').val(TotalSalePrice);
        SubtotalAmountSale();
    });
    //total price30
     $(document).on('keyup', '.quantity30',function(){
        var Quantity =  $('.quantity30').val();
        var SaleUnitPrice =  $('.sale_unit_price30').val();
        var TotalSalePrice = Quantity*SaleUnitPrice;
        $('.total_pos_price30').val(TotalSalePrice);
        SubtotalAmountSale();
    });

     //subtotal price
  function SubtotalAmountSale(){
      var sum =0;

      $('.total_pos_price').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price1').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);          }
      });

      $('.total_pos_price2').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price3').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price4').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price5').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price6').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price7').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price8').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price9').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price10').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price11').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price12').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price13').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price14').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price15').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price16').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price17').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price18').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price19').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price20').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price21').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price22').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price23').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price24').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price25').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price26').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price27').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price28').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price29').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });

      $('.total_pos_price30').each(function(){
          var value = $(this).val();
          if(!isNaN(value) && value.length !=0 ){
            sum= sum+parseFloat(value);
          }
      });


      $('.subtotal').val(sum);

     }


      //discount
     $(document).on('keyup', '.discount',function(){
        var Subtotal =  $('.subtotal').val();
        var Discount =  $('.discount').val();
        var TotalAmount = Subtotal - Discount;
        $('.total_amount').val(TotalAmount);
    });

      //total purchase price
     $(document).on('keyup', '.quantity',function(){
        var Quantity =  $('.quantity').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price').val(TotalPurchasePrice);
    });

    //pos total
    $(document).on('keyup', '.quantity',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price').val();
        var Quantity =  $(this).closest('tr').find('input.quantity').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price').val(TotalPrice);
    });

      //total purchase price1
     $(document).on('keyup', '.quantity1',function(){
        var Quantity =  $('.quantity1').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price1').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price1').val(TotalPurchasePrice);
    });
    //pos total1
    $(document).on('keyup', '.quantity1',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price1').val();
        var Quantity =  $(this).closest('tr').find('input.quantity1').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price1').val(TotalPrice);
    });

    //total purchase price2
     $(document).on('keyup', '.quantity2',function(){
        var Quantity =  $('.quantity2').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price2').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price2').val(TotalPurchasePrice);
    });
    //pos total2
    $(document).on('keyup', '.quantity2',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price2').val();
        var Quantity =  $(this).closest('tr').find('input.quantity2').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price2').val(TotalPrice);
    });

      //total purchase price3
     $(document).on('keyup', '.quantity3',function(){
        var Quantity =  $('.quantity3').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price3').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price3').val(TotalPurchasePrice);
    });
    //pos total3
    $(document).on('keyup', '.quantity3',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price3').val();
        var Quantity =  $(this).closest('tr').find('input.quantity3').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price3').val(TotalPrice);
    });

      //total purchase price4
     $(document).on('keyup', '.quantity4',function(){
        var Quantity =  $('.quantity4').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price4').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price4').val(TotalPurchasePrice);
    });
    //pos total4
    $(document).on('keyup', '.quantity4',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price4').val();
        var Quantity =  $(this).closest('tr').find('input.quantity4').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price4').val(TotalPrice);
    });

    //total purchase price5
     $(document).on('keyup', '.quantity5',function(){
        var Quantity =  $('.quantity5').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price5').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price5').val(TotalPurchasePrice);
    });
    //pos total5
    $(document).on('keyup', '.quantity5',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price5').val();
        var Quantity =  $(this).closest('tr').find('input.quantity5').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price5').val(TotalPrice);
    });

      //total purchase price6
     $(document).on('keyup', '.quantity6',function(){
        var Quantity =  $('.quantity6').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price6').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price6').val(TotalPurchasePrice);
    });7
    //pos total6
    $(document).on('keyup', '.quantity6',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price6').val();
        var Quantity =  $(this).closest('tr').find('input.quantity6').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price6').val(TotalPrice);
    });

      //total purchase price7
     $(document).on('keyup', '.quantity7',function(){
        var Quantity =  $('.quantity7').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price7').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price7').val(TotalPurchasePrice);
    });

    //pos total7
    $(document).on('keyup', '.quantity7',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price7').val();
        var Quantity =  $(this).closest('tr').find('input.quantity7').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price7').val(TotalPrice);
    });

      //total purchase price8
     $(document).on('keyup', '.quantity8',function(){
        var Quantity =  $('.quantity8').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price8').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price8').val(TotalPurchasePrice);
    });

    //pos total8
    $(document).on('keyup', '.quantity8',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price8').val();
        var Quantity =  $(this).closest('tr').find('input.quantity8').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price8').val(TotalPrice);
    });

      //total purchase price9
     $(document).on('keyup', '.quantity9',function(){
        var Quantity =  $('.quantity9').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price9').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price9').val(TotalPurchasePrice);
    });

    //pos total9
    $(document).on('keyup', '.quantity9',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price9').val();
        var Quantity =  $(this).closest('tr').find('input.quantity9').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price9').val(TotalPrice);
    });

      //total purchase price10
     $(document).on('keyup', '.quantity10',function(){
        var Quantity =  $('.quantity10').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price10').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price10').val(TotalPurchasePrice);
    });

    //pos total10
    $(document).on('keyup', '.quantity10',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price10').val();
        var Quantity =  $(this).closest('tr').find('input.quantity10').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price10').val(TotalPrice);
    });

      //total purchase price11
     $(document).on('keyup', '.quantity11',function(){
        var Quantity =  $('.quantity11').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price11').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price11').val(TotalPurchasePrice);
    });

    //pos total11
    $(document).on('keyup', '.quantity11',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price11').val();
        var Quantity =  $(this).closest('tr').find('input.quantity11').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price11').val(TotalPrice);
    });

      //total purchase price12
     $(document).on('keyup', '.quantity12',function(){
        var Quantity =  $('.quantity12').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price12').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price12').val(TotalPurchasePrice);
    });

    //pos total12
    $(document).on('keyup', '.quantity12',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price12').val();
        var Quantity =  $(this).closest('tr').find('input.quantity12').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price12').val(TotalPrice);
    });

      //total purchase price13
     $(document).on('keyup', '.quantity13',function(){
        var Quantity =  $('.quantity13').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price13').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price13').val(TotalPurchasePrice);
    });

    //pos total13
    $(document).on('keyup', '.quantity13',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price13').val();
        var Quantity =  $(this).closest('tr').find('input.quantity13').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price13').val(TotalPrice);
    });

      //total purchase price14
     $(document).on('keyup', '.quantity14',function(){
        var Quantity =  $('.quantity14').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price14').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price14').val(TotalPurchasePrice);
    });

    //pos total14
    $(document).on('keyup', '.quantity14',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price14').val();
        var Quantity =  $(this).closest('tr').find('input.quantity14').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price14').val(TotalPrice);
    });

      //total purchase price15
     $(document).on('keyup', '.quantity15',function(){
        var Quantity =  $('.quantity15').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price15').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price15').val(TotalPurchasePrice);
    });

    //pos total15
    $(document).on('keyup', '.quantity15',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price15').val();
        var Quantity =  $(this).closest('tr').find('input.quantity15').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price15').val(TotalPrice);
    });

      //total purchase price16
     $(document).on('keyup', '.quantity16',function(){
        var Quantity =  $('.quantity16').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price16').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price16').val(TotalPurchasePrice);
    });

    //pos total16
    $(document).on('keyup', '.quantity16',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price16').val();
        var Quantity =  $(this).closest('tr').find('input.quantity16').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price16').val(TotalPrice);
    });

      //total purchase price17
     $(document).on('keyup', '.quantity17',function(){
        var Quantity =  $('.quantity17').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price17').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price17').val(TotalPurchasePrice);
    });

    //pos total17
    $(document).on('keyup', '.quantity17',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price17').val();
        var Quantity =  $(this).closest('tr').find('input.quantity17').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price17').val(TotalPrice);
    });

      //total purchase price18
     $(document).on('keyup', '.quantity18',function(){
        var Quantity =  $('.quantity18').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price18').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price18').val(TotalPurchasePrice);
    });

    //pos total18
    $(document).on('keyup', '.quantity18',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price18').val();
        var Quantity =  $(this).closest('tr').find('input.quantity18').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price18').val(TotalPrice);
    });

      //total purchase price19
     $(document).on('keyup', '.quantity19',function(){
        var Quantity =  $('.quantity19').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price19').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price19').val(TotalPurchasePrice);
    });

    //pos total19
    $(document).on('keyup', '.quantity19',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price19').val();
        var Quantity =  $(this).closest('tr').find('input.quantity19').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price19').val(TotalPrice);
    });

      //total purchase price20
     $(document).on('keyup', '.quantity20',function(){
        var Quantity =  $('.quantity20').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price20').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price20').val(TotalPurchasePrice);
    });

    //pos total20
    $(document).on('keyup', '.quantity20',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price20').val();
        var Quantity =  $(this).closest('tr').find('input.quantity20').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price20').val(TotalPrice);
    });

      //total purchase price21
     $(document).on('keyup', '.quantity21',function(){
        var Quantity =  $('.quantity21').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price21').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price21').val(TotalPurchasePrice);
    });

    //pos total21
    $(document).on('keyup', '.quantity21',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price21').val();
        var Quantity =  $(this).closest('tr').find('input.quantity21').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price21').val(TotalPrice);
    });

      //total purchase price22
     $(document).on('keyup', '.quantity22',function(){
        var Quantity =  $('.quantity22').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price22').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price22').val(TotalPurchasePrice);
    });

    //pos total22
    $(document).on('keyup', '.quantity22',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price22').val();
        var Quantity =  $(this).closest('tr').find('input.quantity22').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price22').val(TotalPrice);
    });

      //total purchase price23
     $(document).on('keyup', '.quantity23',function(){
        var Quantity =  $('.quantity23').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price23').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price23').val(TotalPurchasePrice);
    });

    //pos total23
    $(document).on('keyup', '.quantity23',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price23').val();
        var Quantity =  $(this).closest('tr').find('input.quantity23').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price23').val(TotalPrice);
    });

      //total purchase price24
     $(document).on('keyup', '.quantity24',function(){
        var Quantity =  $('.quantity24').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price24').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price24').val(TotalPurchasePrice);
    });

    //pos total24
    $(document).on('keyup', '.quantity24',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price24').val();
        var Quantity =  $(this).closest('tr').find('input.quantity24').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price24').val(TotalPrice);
    });

      //total purchase price25
     $(document).on('keyup', '.quantity25',function(){
        var Quantity =  $('.quantity25').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price25').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price25').val(TotalPurchasePrice);
    });

    //pos total25
    $(document).on('keyup', '.quantity25',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price25').val();
        var Quantity =  $(this).closest('tr').find('input.quantity25').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price25').val(TotalPrice);
    });

      //total purchase price26
     $(document).on('keyup', '.quantity26',function(){
        var Quantity =  $('.quantity26').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price26').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price26').val(TotalPurchasePrice);
    });

    //pos total26
    $(document).on('keyup', '.quantity26',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price26').val();
        var Quantity =  $(this).closest('tr').find('input.quantity26').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price26').val(TotalPrice);
    });

      //total purchase price27
     $(document).on('keyup', '.quantity27',function(){
        var Quantity =  $('.quantity27').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price27').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price27').val(TotalPurchasePrice);
    });

    //pos total27
    $(document).on('keyup', '.quantity27',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price27').val();
        var Quantity =  $(this).closest('tr').find('input.quantity27').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price27').val(TotalPrice);
    });

      //total purchase price28
     $(document).on('keyup', '.quantity28',function(){
        var Quantity =  $('.quantity28').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price28').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price28').val(TotalPurchasePrice);
    });

    //pos total28
    $(document).on('keyup', '.quantity28',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price28').val();
        var Quantity =  $(this).closest('tr').find('input.quantity28').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price28').val(TotalPrice);
    });

      //total purchase price29
     $(document).on('keyup', '.quantity29',function(){
        var Quantity =  $('.quantity29').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price29').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price29').val(TotalPurchasePrice);
    });

    //pos total29
    $(document).on('keyup', '.quantity29',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price29').val();
        var Quantity =  $(this).closest('tr').find('input.quantity29').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price29').val(TotalPrice);
    });

      //total purchase price30
     $(document).on('keyup', '.quantity30',function(){
        var Quantity =  $('.quantity30').val();
        var PurchaseUnitPrice =  $('.purchase_unit_price30').val();
        var TotalPurchasePrice = Quantity*PurchaseUnitPrice;
        $('.total_purchase_price30').val(TotalPurchasePrice);
    });

    //pos total30
    $(document).on('keyup', '.quantity30',function(){
        var SaleUnitPrice=  $(this).closest('tr').find('input.sale_unit_price30').val();
        var Quantity =  $(this).closest('tr').find('input.quantity30').val();
        var TotalPrice = SaleUnitPrice*Quantity;
        $(this).closest('tr').find('input.total_price30').val(TotalPrice);
    });

      //due amount show
     $(document).on('keyup', '.paid_amount_sale',function(){
        var TotalAmount =  $('.total_amount').val();
        var PaidAmount =  $('.paid_amount_sale').val();
        var DueAmount = TotalAmount - PaidAmount;
        $('.due_amount_sale').val(DueAmount);
    });

     //avaiable quantity
     $(document).on('change','#category_id',function(){
        var category_id = $('#category_id').val();
        var medicine_name = $('#medicine_name').val();
        $.ajax({
           url:"{{ route('get_available_quantity') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $('.available_stock').val(data.available);
           }
        });
     });

     //avaiable quantity
     $(document).on('change','#category_id1', function(){
        var category_id = $('#category_id1').val();
        var medicine_name = $('#medicine_name1').val();

        $.ajax({
           url:"{{ route('get_available_quantity1') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){

            $('.available_stock1').val(data.available);
           }
        });
     });

     //avaiable quantity
     $(document).on('change','#category_id2', function(){
        var category_id = $('#category_id2').val();
        var medicine_name = $('#medicine_name2').val();

        $.ajax({
           url:"{{ route('get_available_quantity2') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){

            $('.available_stock2').val(data.available);
           }
        });
     });

    //avaiable quantity
     $(document).on('change','#category_id3',function(){
        var category_id = $('#category_id3').val();
        var medicine_name = $('#medicine_name3').val();

        $.ajax({
           url:"{{ route('get_available_quantity3') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock3').val(data.available);
           }
        });
     });
     //avaiable quantity
     $(document).on('change','#category_id4',function(){
        var category_id = $('#category_id4').val();
        var medicine_name = $('#medicine_name4').val();

        $.ajax({
           url:"{{ route('get_available_quantity4') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock4').val(data.available);
           }
        });
     });
     //avaiable quantity
     $(document).on('change','#category_id5',function(){
        var category_id = $('#category_id5').val();
        var medicine_name = $('#medicine_name5').val();

        $.ajax({
           url:"{{ route('get_available_quantity5') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock5').val(data.available);
           }
        });
     });
     //avaiable quantity 06
     $(document).on('change','#category_id6',function(){
        var category_id = $('#category_id6').val();
        var medicine_name = $('#medicine_name6').val();

        $.ajax({
           url:"{{ route('get_available_quantity6') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock6').val(data.available);
           }
        });
     });
     //avaiable quantity 07
     $(document).on('change','#category_id7',function(){
        var category_id = $('#category_id7').val();
        var medicine_name = $('#medicine_name7').val();

        $.ajax({
           url:"{{ route('get_available_quantity7') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock7').val(data.available);
           }
        });
     });
     //avaiable quantity 08
     $(document).on('change','#category_id8',function(){
        var category_id = $('#category_id8').val();
        var medicine_name = $('#medicine_name8').val();

        $.ajax({
           url:"{{ route('get_available_quantity8') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock8').val(data.available);
           }
        });
     });
     //avaiable quantity 09
     $(document).on('change','#category_id9',function(){
        var category_id = $('#category_id9').val();
        var medicine_name = $('#medicine_name9').val();

        $.ajax({
           url:"{{ route('get_available_quantity9') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock9').val(data.available);
           }
        });
     });
     //avaiable quantity 10
     $(document).on('change','#category_id10',function(){
        var category_id = $('#category_id10').val();
        var medicine_name = $('#medicine_name10').val();

        $.ajax({
           url:"{{ route('get_available_quantity10') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock10').val(data.available);
           }
        });
     });
     //avaiable quantity 11
     $(document).on('change','#category_id11',function(){
        var category_id = $('#category_id11').val();
        var medicine_name = $('#medicine_name11').val();

        $.ajax({
           url:"{{ route('get_available_quantity11') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock11').val(data.available);
           }
        });
     });
     //avaiable quantity 12
     $(document).on('change','#category_id12',function(){
        var category_id = $('#category_id12').val();
        var medicine_name = $('#medicine_name12').val();

        $.ajax({
           url:"{{ route('get_available_quantity12') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock12').val(data.available);
           }
        });
     });
     //avaiable quantity 13
     $(document).on('change','#category_id13',function(){
        var category_id = $('#category_id13').val();
        var medicine_name = $('#medicine_name13').val();

        $.ajax({
           url:"{{ route('get_available_quantity13') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock13').val(data.available);
           }
        });
     });
     //avaiable quantity 14
     $(document).on('change','#category_id14',function(){
        var category_id = $('#category_id14').val();
        var medicine_name = $('#medicine_name14').val();

        $.ajax({
           url:"{{ route('get_available_quantity14') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock14').val(data.available);
           }
        });
     });
     //avaiable quantity 15
     $(document).on('change','#category_id15',function(){
        var category_id = $('#category_id15').val();
        var medicine_name = $('#medicine_name15').val();

        $.ajax({
           url:"{{ route('get_available_quantity15') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock15').val(data.available);
           }
        });
     });
     //avaiable quantity 16
     $(document).on('change','#category_id16',function(){
        var category_id = $('#category_id16').val();
        var medicine_name = $('#medicine_name16').val();

        $.ajax({
           url:"{{ route('get_available_quantity16') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock16').val(data.available);
           }
        });
     });
     //avaiable quantity 17
     $(document).on('change','#category_id',function(){
        var category_id = $('#category_id').val();
        var medicine_name = $('#medicine_name').val();

        $.ajax({
           url:"{{ route('get_available_quantity') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock').val(data.available);
           }
        });
     });
     //avaiable quantity 18
     $(document).on('change','#category_id18',function(){
        var category_id = $('#category_id18').val();
        var medicine_name = $('#medicine_name18').val();

        $.ajax({
           url:"{{ route('get_available_quantity18') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock18').val(data.available);
           }
        });
     });
     //avaiable quantity 19
     $(document).on('change','#category_id19',function(){
        var category_id = $('#category_id19').val();
        var medicine_name = $('#medicine_name19').val();

        $.ajax({
           url:"{{ route('get_available_quantity19') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock19').val(data.available);
           }
        });
     });
     //avaiable quantity 20
     $(document).on('change','#category_id20',function(){
        var category_id = $('#category_id20').val();
        var medicine_name = $('#medicine_name20').val();

        $.ajax({
           url:"{{ route('get_available_quantity20') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock20').val(data.available);
           }
        });
     });
     //avaiable quantity 21
     $(document).on('change','#category_id21',function(){
        var category_id = $('#category_id21').val();
        var medicine_name = $('#medicine_name21').val();

        $.ajax({
           url:"{{ route('get_available_quantity21') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock21').val(data.available);
           }
        });
     });
     //avaiable quantity 22
     $(document).on('change','#category_id22',function(){
        var category_id = $('#category_id22').val();
        var medicine_name = $('#medicine_name22').val();

        $.ajax({
           url:"{{ route('get_available_quantity22') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock22').val(data.available);
           }
        });
     });
     //avaiable quantity 23
     $(document).on('change','#category_id23',function(){
        var category_id = $('#category_id23').val();
        var medicine_name = $('#medicine_name23').val();

        $.ajax({
           url:"{{ route('get_available_quantity23') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock23').val(data.available);
           }
        });
     });
     //avaiable quantity 24
     $(document).on('change','#category_id24',function(){
        var category_id = $('#category_id24').val();
        var medicine_name = $('#medicine_name24').val();

        $.ajax({
           url:"{{ route('get_available_quantity24') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock24').val(data.available);
           }
        });
     });
     //avaiable quantity 25
     $(document).on('change','#category_id25',function(){
        var category_id = $('#category_id25').val();
        var medicine_name = $('#medicine_name25').val();

        $.ajax({
           url:"{{ route('get_available_quantity25') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock25').val(data.available);
           }
        });
     });
     //avaiable quantity 26
     $(document).on('change','#category_id26',function(){
        var category_id = $('#category_id26').val();
        var medicine_name = $('#medicine_name26').val();

        $.ajax({
           url:"{{ route('get_available_quantity26') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock26').val(data.available);
           }
        });
     });
     //avaiable quantity 27
     $(document).on('change','#category_id27',function(){
        var category_id = $('#category_id27').val();
        var medicine_name = $('#medicine_name5').val();

        $.ajax({
           url:"{{ route('get_available_quantity27') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock27').val(data.available);
           }
        });
     });
     //avaiable quantity 28
     $(document).on('change','#category_id28',function(){
        var category_id = $('#category_id28').val();
        var medicine_name = $('#medicine_name28').val();

        $.ajax({
           url:"{{ route('get_available_quantity28') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock28').val(data.available);
           }
        });
     });
     //avaiable quantity 29
     $(document).on('change','#category_id29',function(){
        var category_id = $('#category_id29').val();
        var medicine_name = $('#medicine_name29').val();

        $.ajax({
           url:"{{ route('get_available_quantity29') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock29').val(data.available);
           }
        });
     });
     //avaiable quantity 30
     $(document).on('change','#category_id30',function(){
        var category_id = $('#category_id30').val();
        var medicine_name = $('#medicine_name30').val();

        $.ajax({
           url:"{{ route('get_available_quantity30') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            console.log(data.available);
            $('.available_stock30').val(data.available);
           }
        });
     });


     // Dynamic Data -------------

     $(document).on('change','#category_id',function(){
        var category_id = $('#category_id').val();
        var medicine_name = $('#medicine_name').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price').val(v.sale_unit_price);
            });
           }
        });
     });

      $(document).on('change','#category_id',function(){
        var category_id = $('#category_id').val();
        var medicine_name = $('#medicine_name').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price').val(v.purchase_unit_price);
            });
           }
        });
     });

      $(document).on('change','#category_id1',function(){
        var category_id = $('#category_id1').val();
        var medicine_name = $('#medicine_name1').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price1') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price1').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id1',function(){
        var category_id = $('#category_id1').val();
        var medicine_name = $('#medicine_name1').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price1') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price1').val(v.purchase_unit_price);
            });
           }
        });
     });

      $(document).on('change','#category_id2',function(){
        var category_id = $('#category_id2').val();
        var medicine_name = $('#medicine_name2').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price2') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price2').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id2',function(){
        var category_id = $('#category_id2').val();
        var medicine_name = $('#medicine_name2').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price2') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price2').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id3',function(){
        var category_id = $('#category_id3').val();
        var medicine_name = $('#medicine_name3').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price3') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price3').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id3',function(){
        var category_id = $('#category_id3').val();
        var medicine_name = $('#medicine_name3').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price3') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price3').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id4',function(){
        var category_id = $('#category_id4').val();
        var medicine_name = $('#medicine_name4').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price4') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price4').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id4',function(){
        var category_id = $('#category_id4').val();
        var medicine_name = $('#medicine_name4').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price4') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price4').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id5',function(){
        var category_id = $('#category_id5').val();
        var medicine_name = $('#medicine_name5').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price5') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price5').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id5',function(){
        var category_id = $('#category_id5').val();
        var medicine_name = $('#medicine_name5').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price5') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price5').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id6',function(){
        var category_id = $('#category_id6').val();
        var medicine_name = $('#medicine_name6').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price6') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price6').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id6',function(){
        var category_id = $('#category_id6').val();
        var medicine_name = $('#medicine_name6').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price6') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price6').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id7',function(){
        var category_id = $('#category_id7').val();
        var medicine_name = $('#medicine_name7').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price7') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price7').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id7',function(){
        var category_id = $('#category_id7').val();
        var medicine_name = $('#medicine_name7').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price7') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price7').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id8',function(){
        var category_id = $('#category_id8').val();
        var medicine_name = $('#medicine_name8').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price8') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price8').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id8',function(){
        var category_id = $('#category_id8').val();
        var medicine_name = $('#medicine_name8').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price8') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price8').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id9',function(){
        var category_id = $('#category_id9').val();
        var medicine_name = $('#medicine_name9').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price9') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price9').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id9',function(){
        var category_id = $('#category_id9').val();
        var medicine_name = $('#medicine_name9').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price9') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price9').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id10',function(){
        var category_id = $('#category_id10').val();
        var medicine_name = $('#medicine_name10').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price10') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price10').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id10',function(){
        var category_id = $('#category_id10').val();
        var medicine_name = $('#medicine_name10').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price10') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price10').val(v.purchase_unit_price);
            });
           }
        });
     });

      $(document).on('change','#category_id11',function(){
        var category_id = $('#category_id11').val();
        var medicine_name = $('#medicine_name11').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price11') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price11').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id11',function(){
        var category_id = $('#category_id11').val();
        var medicine_name = $('#medicine_name11').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price11') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price11').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id12',function(){
        var category_id = $('#category_id12').val();
        var medicine_name = $('#medicine_name12').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price12') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price12').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id12',function(){
        var category_id = $('#category_id12').val();
        var medicine_name = $('#medicine_name12').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price12') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price12').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id13',function(){
        var category_id = $('#category_id13').val();
        var medicine_name = $('#medicine_name13').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price13') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price13').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id13',function(){
        var category_id = $('#category_id13').val();
        var medicine_name = $('#medicine_name13').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price13') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price13').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id14',function(){
        var category_id = $('#category_id14').val();
        var medicine_name = $('#medicine_name14').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price14') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price14').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id14',function(){
        var category_id = $('#category_id14').val();
        var medicine_name = $('#medicine_name14').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price14') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price14').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id15',function(){
        var category_id = $('#category_id15').val();
        var medicine_name = $('#medicine_name15').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price15') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price15').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id15',function(){
        var category_id = $('#category_id15').val();
        var medicine_name = $('#medicine_name15').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price15') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price15').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id16',function(){
        var category_id = $('#category_id16').val();
        var medicine_name = $('#medicine_name16').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price16') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price16').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id16',function(){
        var category_id = $('#category_id16').val();
        var medicine_name = $('#medicine_name16').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price16') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price16').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id17',function(){
        var category_id = $('#category_id17').val();
        var medicine_name = $('#medicine_name17').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price17') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price17').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id17',function(){
        var category_id = $('#category_id17').val();
        var medicine_name = $('#medicine_name17').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price17') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price17').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id18',function(){
        var category_id = $('#category_id18').val();
        var medicine_name = $('#medicine_name18').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price18') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price18').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id18',function(){
        var category_id = $('#category_id18').val();
        var medicine_name = $('#medicine_name18').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price18') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price18').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id19',function(){
        var category_id = $('#category_id19').val();
        var medicine_name = $('#medicine_name19').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price19') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price19').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id19',function(){
        var category_id = $('#category_id19').val();
        var medicine_name = $('#medicine_name19').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price19') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price19').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id20',function(){
        var category_id = $('#category_id20').val();
        var medicine_name = $('#medicine_name20').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price20') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price20').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id20',function(){
        var category_id = $('#category_id20').val();
        var medicine_name = $('#medicine_name20').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price20') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price20').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id21',function(){
        var category_id = $('#category_id21').val();
        var medicine_name = $('#medicine_name21').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price21') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price21').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id21',function(){
        var category_id = $('#category_id21').val();
        var medicine_name = $('#medicine_name21').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price21') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price21').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id22',function(){
        var category_id = $('#category_id22').val();
        var medicine_name = $('#medicine_name22').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price22') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price22').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id22',function(){
        var category_id = $('#category_id22').val();
        var medicine_name = $('#medicine_name22').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price22') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price22').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id23',function(){
        var category_id = $('#category_id23').val();
        var medicine_name = $('#medicine_name23').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price23') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price23').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id23',function(){
        var category_id = $('#category_id23').val();
        var medicine_name = $('#medicine_name23').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price23') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price23').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id24',function(){
        var category_id = $('#category_id24').val();
        var medicine_name = $('#medicine_name24').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price24') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price24').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id24',function(){
        var category_id = $('#category_id24').val();
        var medicine_name = $('#medicine_name24').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price24') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price24').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id25',function(){
        var category_id = $('#category_id25').val();
        var medicine_name = $('#medicine_name25').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price25') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price25').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id25',function(){
        var category_id = $('#category_id25').val();
        var medicine_name = $('#medicine_name25').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price25') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price25').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id26',function(){
        var category_id = $('#category_id26').val();
        var medicine_name = $('#medicine_name26').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price26') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price26').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id26',function(){
        var category_id = $('#category_id26').val();
        var medicine_name = $('#medicine_name26').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price26') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price26').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id27',function(){
        var category_id = $('#category_id27').val();
        var medicine_name = $('#medicine_name27').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price27') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price27').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id27',function(){
        var category_id = $('#category_id27').val();
        var medicine_name = $('#medicine_name27').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price27') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price27').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id28',function(){
        var category_id = $('#category_id28').val();
        var medicine_name = $('#medicine_name28').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price28') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price28').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id28',function(){
        var category_id = $('#category_id28').val();
        var medicine_name = $('#medicine_name28').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price28') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price28').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id29',function(){
        var category_id = $('#category_id29').val();
        var medicine_name = $('#medicine_name29').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price29') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price29').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id29',function(){
        var category_id = $('#category_id29').val();
        var medicine_name = $('#medicine_name29').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price29') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price29').val(v.purchase_unit_price);
            });
           }
        });
     });
      $(document).on('change','#category_id30',function(){
        var category_id = $('#category_id30').val();
        var medicine_name = $('#medicine_name30').val();
        $.ajax({
           url:"{{ route('get_sale_unit_price30') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.sale_unit_price30').val(v.sale_unit_price);
            });
           }
        });
     });

     //get purchase unit price
     $(document).on('change','#category_id30',function(){
        var category_id = $('#category_id30').val();
        var medicine_name = $('#medicine_name30').val();
        $.ajax({
           url:"{{ route('get_purchase_unit_price30') }}",
           type:"GET",
           dataType: "json",
           data:{category_id:category_id,medicine_name:medicine_name},
           success:function(data){
            $.each(data,function(key,v){
                $('.purchase_unit_price30').val(v.purchase_unit_price);
            });
           }
        });
     });





  });
</script>
@endpush
