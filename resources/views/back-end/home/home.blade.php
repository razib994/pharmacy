@extends('back-end.master')

@section('title')
  Pharmacy Management | Dashboard
@endsection

@section('content-title')
   <h1 class="text-uppercase text-white"> <strong> Dashboard </strong> </h1>
@endsection


@section('content')

   <!-- Main content -->
    <section class="content" >
      <div class="container-fluid">
          @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
        <div class="row" style="padding-left: 180px;">
            <div class="col-lg-3 col-6 m-2">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ \App\Models\Customer::count() }}</h3>
                <p>Total Customer</p>
              </div>
              <a href="{{ route("customer_list") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6 m-2">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ \App\Models\Medicine::where('status',1)->count() }}</h3>

                <p>Total Medicine</p>
              </div>
              <a href="{{ route("medicine_list") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <!-- ./col -->
          <div class="col-lg-3 col-6 m-2">
            <!-- small box -->
            <div class="small-box " style="background: #11ad11;">
              <div class="inner text-white">
                <h3>{{ \App\Models\SaleInvoice::whereDate('created_at', \Carbon\Carbon::today())->sum("paid_amount") }}</h3>
                <p class="text-white">Todays Sales</p>
              </div>
              <a href="{{ route("daily_sales") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
            <div class="col-lg-3 col-6 m-2">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner ">
                        <h3>{{ \App\Models\SaleInvoice::sum("total_amount") }}</h3>
                        <p>Total Sales</p>
                    </div>
                    <a href="{{ route("pos_list") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
          <!-- ./col -->

            <!-- ./col -->
            <div class="col-lg-3 col-6 m-2">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ \App\Models\SaleRevenue::sum('total_sale_price') - \App\Models\SaleRevenue::sum('total_purchase_price') }}</h3>
                        <p>Total Revenue</p>
                    </div>
                    <a href="{{ route("revenue_list") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6 m-2">
                <!-- small box -->
                <div class="small-box" style="background: #2bba14;">
                    <div class="inner text-white">
                        <h3>{{ \App\Models\Invoice::sum('due_amount') }}</h3>
                        <p class="text-white">Total A/C Payable</p>
                    </div>
                    <a href="{{ route("payable_manufacturer") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6 m-2">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3> {{ \App\Models\SaleInvoice::sum("due_amount") }} </h3>
                        <p class="">Total A/C Receivable. </p>
                    </div>
                    <a href="{{ route("customer_credit") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6 m-2">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3> {{ \App\Models\Purchase::sum("total_price") }} </h3>
                        <p>Total Purchase </p>
                    </div>
                    <a href="{{ url("purchase/invoice/list") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6 m-2">
                <!-- small box -->
                <div class="small-box" style="background: #2bba14;">
                    <div class="inner text-white">
                        <h3>{{ \App\Models\Manufacturer::count() }}</h3>
                        <p class="text-white">Total Manufacturer </p>
                    </div>
                    <a href="{{ url("manufacturer/list") }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

          @endif
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



@endsection
