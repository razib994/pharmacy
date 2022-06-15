@extends('back-end.master')


@section('title')
   Sales Revenue
@endsection

@section('content-title')
Sales Reveue
    <?php
    use Carbon\Carbon;
    $year = Carbon::now()->year-1;
     echo $year;
    ?>
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-12">

			<div class="card" style="padding:30px;">

				<a href="{{ url('previous_sale_revenue_excel_download') }}" class="excel_btn">
					<i class="fa fa-file-excel"></i>Download Excel
				</a>

				<table id="example" class="table table-striped text-center">
				    <thead>
				        <tr>
				            <th>Invoice No</th>
				            <th>Sales Revenue</th>
				            <th>Sale Date</th>
				        </tr>
				    </thead>
				    <tbody>
				    	@php($i=1)
				    	<?php
				    	   $sum=0;
				    	 ?>
				    	@foreach($revenues as $show)
				    	<tr>
				    		<td>{{ $show->invoice_no }}</td>
				    		<td>
				    			<?php
                                   $total_purchase = $show->sum1;
                                   $total_sales = $show->sum2;
                                   echo $revenues_amount = $total_sales-$total_purchase;
				    			?>
				    		</td>
				    		<td>{{ date('d-m-Y', strtotime($show->sale_date)) }}</td>
				    		<?php
				    		  $sum +=$revenues_amount;
				    		?>
				    	</tr>
				    	@endforeach


				    </tbody>
				    <tfoot>
				    	 <tr>
                            <td colspan="1"></td>
                            <td>Total: <?php echo $sum ?></td>
                            <td></td>
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
