@extends('back-end.master')


@section('title')
  Purchase
@endsection

@section('content-title')
   Item Wise Purchase List
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-12">
            <a href="{{ url('get_purches_list_excel') }}" class="excel_btn">
                <i class="fa fa-file-excel"></i>Download Excel
            </a>
               @if(Session::has('message'))
                   <div class="alert alert-danger" role="alert">
				      <p class="text-center font-weight-bold p-0 m-0">{{ Session::get('message') }}</p>
				   </div>
                @endif

                  @if(Session::has('update'))
                   <div class="alert alert-success" role="alert">
				      <p class="text-center font-weight-bold p-0 m-0">{{ Session::get('update') }}</p>
				   </div>
                @endif

			<div class="card" style="padding:30px;">

				<table id="example" class="table table-striped text-center">
				    <thead>
				        <tr>
				            <!-- <th>SL No</th> -->
				            <th>Invoice No</th>
				            <th>Manufacturer</th>
				            <th>Medicine</th>
				            <th>Category</th>
				            <th>Purchase Date</th>
				            <th>Total Quantity</th>
				            <th>Total Price</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
                         @php($i=1)
                         <?php
				    	   $sum=0;
				    	 ?>
				    	@foreach($purchase_list as $show)
				        <tr>
				            <td>{{ $show->invoice_no }}</td>
				            <td>{{ $show->manufacturer->name }}</td>
				            <td>{{ $show->medicine_name }}</td>
				            <td>{{ $show->category->name }}</td>
				            <td>{{ $show->purchase_date }}</td>
				            <td>{{ $show->total_quantity }}</td>
				            <td>{{ $show->total_price }}</td>
				            <?php
				    		  $sum +=$show->total_price;
				    		?>
				            <td>

				            <!-- 	<a href="" title="update">
				            		<i class="fa fa-edit"></i>
				            	</a> -->

				            	<a href="{{ route('item_wise_purchase_list_delete',['id'=>$show->id]) }}" onclick="return confirm('Are you sure?')" title="delete" class="bg-danger">
				            		<i class="fa fa-trash"></i>
				            	</a>
				            </td>
				        </tr>
				        @endforeach
				    </tbody>
				     <tfoot>
				    	 <tr>
                            <td colspan="6"></td>
                            <td>Total: <?php echo $sum ?></td>
                          </tr>
				    </tfoot>
			    </table>

			    <h5 class="text-center text-primary font-weight-bold">

			    </h5>

			</div>


	     </div>
    </div>
</div>

@endsection
