@extends('back-end.master')


@section('title')
   Sales Revenue
@endsection

@section('content-title')
Profit/Loss for the month of
   <?php
    use Carbon\Carbon;
    $month = date('F');
    $year = Carbon::now()->year;
     echo $month.' '.$year;
    ?>
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-12">
            <a href="{{ url('get_profit_loss_monthly') }}" class="excel_btn">
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
                       $total_purchase_price = App\Models\SaleRevenue::whereMonth('sale_date',date('m'))->sum('total_purchase_price');

                       $total_sale_price = App\Models\SaleRevenue::whereMonth('sale_date',date('m'))->sum('total_sale_price');

                       $revenue = $total_sale_price - $total_purchase_price;

                       $current_month_expense = App\Models\Expense::whereMonth('date',date('m'))->sum('amount');

                       $profit_loss = $revenue-$current_month_expense;

                     ?>

				    <tbody>
			           <tr>
			           		<td>{{  $month = date('F') }}</td>
			           		<td>{{ $profit_loss }}</td>
			           	</tr>
				    </tbody>
			    </table>

			    <h5 class="text-center text-primary font-weight-bold">

			    </h5>

			</div>


	     </div>
    </div>
</div>

@endsection
