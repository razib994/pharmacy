@extends('back-end.master')


@section('title')
   Sales Revenue
@endsection

@section('content-title')
Profit/Loss for the month of
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
            <a href="{{ route('download_excel') }}" class="excel_btn">
                <i class="fa fa-file-excel"></i>Download Excel
            </a>
			<div class="card" style="padding:30px;">

				<table id="example" class="table table-striped table-bordered text-center">
				    <thead>
				        <tr>
				            <th>Month Name</th>
				            <th>Profit/Loss</th>
				        </tr>
				    </thead>

                     <?php

                      $date = \Carbon\Carbon::now();

                       $total_purchase_price = App\Models\SaleRevenue::whereYear('sale_date',Carbon::now()->year-1)->sum('total_purchase_price');

                       $total_sale_price = App\Models\SaleRevenue::whereYear('sale_date',Carbon::now()->year-1)->sum('total_sale_price');

                       $revenue = $total_sale_price - $total_purchase_price;

                       $current_year_expense = App\Models\Expense::whereYear('date',Carbon::now()->year-1)->sum('amount');

                       $profit_loss = $revenue-$current_year_expense;

                     ?>

				    <tbody>
			           <tr>
			           		<td>{{ Carbon::now()->year-1 }}</td>
			           		<td>{{ $profit_loss }}</td>
			           	</tr>
				    </tbody>
			    </table>

			 <!--    <?php

			 //    $date = \Carbon\Carbon::now();
				// echo $date->format('Y F'); // april
				// echo $date->subMonth()->format('Y F'); // march
				// echo $date->subMonth('1')->format('Y F'); // february
				// echo $date->subMonth('1')->format('Y F'); // january

			    ?> -->

			</div>


	     </div>
    </div>
</div>

@endsection
