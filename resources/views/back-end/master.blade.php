   @include('back-end.includes.header')
   @include('back-end.includes.navbar')
   @include('back-end.includes.sidebar')

  <div class="content-wrapper" style="background: url('front-end/Pharma Back.jpg'); background-size: cover;">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('content-title')</h1>
          </div>
          <div class="col-sm-6">
          </div>
        </div>
      </div>
    </div>
    @yield('content')
  </div>

  @include('back-end.includes.footer')

  <script>
      $('#add_row').on('click',function(){
      AddRowfunction();
   });

   {{--function AddRowfunction(){--}}

   {{-- var tr = '<tr>'+--}}

   {{--          '<td class="col-lg-2"><select class="form-control select2" id="medicine_name" name="medicine_name[]" style="width: 100%;" id="medicine_name"><option selected="selected">Select here</option>@foreach( $medicine as $show)<option value="{{ $show->medicine_name }}">{{ $show->medicine_name }}</option>@endforeach</select></td>'+--}}

   {{--          '<td class="col-lg-2"><select class="form-control select2" id="category_id" name="category_id[]" style="width: 100%;"><option selected="selected">Select here</option>@foreach( $category as $show)<option value="{{ $show->id }}">{{ $show->name }}</option>@endforeach</select></td>'+--}}

   {{--          '<td class="col-lg-2"><input type="date" class="form-control" name="expire_date[]" style="width: 100%;"></td>'+--}}

   {{--          ' <td class="col-lg-2"><select class="form-control select2 box_quantity" name="type_id[]" style="width: 100%;"><option selected="selected">Select here</option>@foreach( $types as $show)<option value="{{ $show->id }}">{{ $show->box_carton }} ({{ $show->quantity }})</option>@endforeach</select></td>'+--}}

   {{--          ' <td class="col-lg-1"><input type="text" class="form-control quantity" name="quantity[]" placeholder="0"></td>'+--}}

   {{--          '<td class="col-lg-1"><input type="text" class="form-control total_quantity" name="total_quantity[]" placeholder="0"></td>'+--}}

   {{--          '<td class="col-lg-1"><input type="text" class="form-control purchase_price" name="total_purchase_price[]" placeholder="0.00" style="width:80px;"></td>'+--}}

   {{--          '<td class="col-lg-1"><input type="text" class="form-control total_price" name="total_price[]" placeholder="0.00" style="width:80px;"></td>'+--}}

   {{--          '<td class="col-lg-2" style="display:none;"><input type="text" class="form-control type_quantity" ></td>'+--}}

   {{--          '<td> <a class="btn btn-xs btn-danger" id="remove" style="background: red;"><i class="fa fa-minus"></i></a></td>'--}}

   {{--         '</tr>';--}}
   {{--         $('tbody').append(tr);--}}
   {{--         $('.select2').select2();--}}
   {{-- }--}}

    $(document).on('click','#remove',function(){
      var last = $('tbody tr').length;
        if(last==1){
          alert('Field no deleted!');
        }else{
           $(this).closest('tr').remove();
        }

  });

  </script>

  <script>

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

     //due amount
     $(document).on('keyup', '.paid_amount',function(){
        var SubTotal =  $('.subtotal').val();
        var PaidAmount =  $(this).closest('tr').find('input.paid_amount').val();
        var DueAmount = SubTotal-PaidAmount;
        $('.due_amount').val(DueAmount);
    });
    });
  </script>


  <script>
    var d = new Date();
           var currDay = d.getDate();
           var currMonth = d.getMonth();
           var currYear = d.getFullYear();
           var startDate = new Date(currYear, currMonth, currDay);
           $("#single").datepicker();
           $("#single").val($.datepicker.formatDate('yy-mm-dd', new Date(startDate)));
  </script>










