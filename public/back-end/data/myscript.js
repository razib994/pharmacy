
//  $('#add_row').on('click',function(){
//   AddRowfunction();
// });

//   function AddRowfunction(){
 
//     var tr = '<tr>'+

//              '<td class="col-lg-2"><input type="text" class="form-control" name="medicine_name[]" placeholder="Medicine Name"></td>'+

//               ' <td class="col-lg-2"><select class="form-control select2bs4 box_quantity" name="category_name[]" style="width: 100%;"><option selected="selected">Select here</option>@foreach( $categories as $show)<option value="{{ $show->name }}">{{ $show->name }}</option>@endforeach</select></td>'+

//              '<td class="col-lg-1"><input type="date" class="form-control" name="expire_date[]" style="width:100px;"></td>'+

//              ' <td class="col-lg-2"><select class="form-control select2bs4 box_quantity" name="type_id[]" style="width: 100%;"><option selected="selected">Select here</option>@foreach( $types as $show)<option value="{{ $show->id }}">{{ $show->box_carton }} ({{ $show->quantity }})</option>@endforeach</select></td>'+

//              ' <td class="col-lg-1"><input type="text" class="form-control quantity" name="quantity[]" value="0"></td>'+

//              '<td class="col-lg-1"><input type="text" class="form-control total_quantity" name="total_quantity[]" value="0"></td>'+

//              '<td class="col-lg-1"><input type="text" class="form-control purchase_price" name="purchase_price[]" value="0.00"></td>'+

//              '<td class="col-lg-1"><input type="text" class="form-control sale_price" name="sale_price[]" value="0.00"></td>'+

//              '<td class="col-lg-1"><input type="text" class="form-control total_price" name="total_price[]" value="0.00" style="width:100px;"></td>'+

//              '<td class="col-lg-2" style="display:none;"><input type="text" class="form-control type_quantity" ></td>'+

//              '<td class="col-lg-2" style="display:none;"><input type="text" class="form-control unit_price" name="purchase_unit_price[]"></td>'+

//              '<td class="col-lg-2" style="display:none;"><input type="text" class="form-control unit_sale_price" name="sale_unit_price[]"></td>'+

//              '<td> <a class="btn btn-xs btn-danger" id="remove" style="background: red;"><i class="fa fa-minus"></i></a></td>'

//             '</tr>';
//             $('tbody').append(tr);
//     }

//     $(document).on('click','#remove',function(){
//       var last = $('tbody tr').length;
//         if(last==1){
//           alert('Field no deleted!');
//         }else{
//            $(this).closest('tr').remove();
//         }

//       });
//       