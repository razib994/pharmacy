@extends('back-end.master')


@section('title')
   Expense
@endsection

@section('content-title')
   <?php
    use Carbon\Carbon;
    echo $today1 = Carbon::now()->year;
    ?>
 Expense
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-12">
            <a href="{{ url('get_expense_excel_yearly_download') }}" class="excel_btn">
                <i class="fa fa-file-excel"></i>Download Excel
            </a>
			<div class="card" style="padding:30px;">

				<table id="example" class="table table-striped text-center">
				    <thead>
				        <tr>
				            <th>SL No</th>
				            <th>Name</th>
				            <th>Details</th>
				            <th>Amount</th>
				            <th>Date</th>
				            <th>Remarks</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@php($i=1)
				    	<?php
				    	   $sum=0;
				    	 ?>
				    	@foreach($yearly as $show)
				    	<tr>
				    		<td>{{ $i++ }}</td>
				    		<td>{{ $show->name }}</td>
				    		<td>{{ $show->details }}</td>
				    		<td>{{ $show->amount }}</td>
				    		<td>{{ date('d-m-Y', strtotime($show->date)) }}</td>
				    		<td>{{ $show->remarks }}</td>
				    		<?php
				    		  $sum +=$show->amount;
				    		?>
				    	</tr>
				    	@endforeach
				    </tbody>
				    <tfoot>
				    	 <tr>
                            <td colspan="3"></td>
                            <td>Total: <?php echo $sum ?></td>
                          </tr>
				    </tfoot>
			    </table>

			</div>


	     </div>
    </div>
</div>

@endsection
