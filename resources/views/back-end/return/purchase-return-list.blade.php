@extends('back-end.master')


@section('title')
  Purchase
@endsection

@section('content-title')
   Purchase Return List
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-12">
            <a href="{{ url('return_purches_excel') }}" class="excel_btn">
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
				            <th>Medicine</th>
				            <th>Category</th>
				            <th>Return Date</th>
				            <th>Amount</th>
				            <th>Quantity</th>
				            <th>Total Amount</th>
				            <th>Action</th>
				        </tr>
				    </thead>
				    <tbody>
                         @php($i=1)
                         <?php
				    	   $sum=0;
				    	 ?>
				    	@foreach($return_purchase as $show)
				        <tr>
				            <td>{{ $show->medicine_name }}</td>
				            <td>{{ $show->category->name }}</td>
				            <td>{{ $show->return_date }}</td>
				            <td>{{ $show->amount }}</td>
				            <td>{{ $show->quantity }}</td>
				            <td>{{ $show->total_amount }}</td>
				            <?php
				    		  $sum += $show->total_amount;
				    		?>
				            <td>

				            <!-- 	<a href="" title="update">
				            		<i class="fa fa-pen"></i>
				            	</a> -->

				            	<a href="{{ route('purchase_reutrn_delete',['id'=>$show->id]) }}" onclick="return confirm('Are you sure?')" title="delete" class="bg-danger">
				            		<i class="fa fa-trash"></i>
				            	</a>
				            </td>
				        </tr>
				        @endforeach
				    </tbody>
				     <tfoot>
				    	 <tr>
                            <td colspan="5"></td>
                            <td>Total: <?php echo $sum ?></td>
                          </tr>
				    </tfoot>

			    </table>

			</div>


	     </div>
    </div>
</div>

@endsection
