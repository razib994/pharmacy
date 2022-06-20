  <!-- Main Sidebar Container -->
  <style>
      [class*="sidebar-dark-"] .sidebar a {
          color: #fff;
      }
  </style>
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #0a0e14;">
    <a href="" class="brand-link">
      <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
      <span class="brand-text font-weight-light" >
          <img src="{{ asset('/') }}front-end/PharmaLogo 2.png" alt="User Image" width="100%">
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item menu-open" style="background: #03ad00;">
            <a href="{{ route('home') }}" class="nav-link" >
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
            @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Users
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('user_add') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('all_user') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All User</p>
                            </a>
                        </li>


                </ul>
            </li>
            @endif

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Customer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
              <li class="nav-item">
                <a href="{{ route('customer_add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Customer</p>
                </a>
              </li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
              <li class="nav-item">
                <a href="{{ route('customer_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Customer</p>
                </a>
              </li>
                @endif
              <li class="nav-item">
                <a href="{{ route('customer_credit') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credit Customer</p>
                </a>
              </li>
                @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
              <li class="nav-item">
                <a href="{{ route('credit_customer_payment_history') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Credit Customer Payment History</p>
                </a>
              </li>
                @endif
            </ul>
          </li>

            @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-prescription-bottle"></i>
              <p>
                Manufacturer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

               <li class="nav-item">
                <a href="{{ route('manufacturer_add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Manufacturer</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('manufacturer_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manufacturer List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('payable_manufacturer') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payable Manufacturer</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('manufacturer_payments_history') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Payment History</p>
                </a>
              </li>



            </ul>
          </li>
            @endif
            @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-pills"></i>
              <p>
                Medicine
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

               <li class="nav-item">
                <a href="{{ route('category_add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('category_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category List</p>
                </a>
              </li>

                 <li class="nav-item">
                <a href="{{ route('unit_add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Unit</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('unit_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Unit List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('type_add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Type</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('type_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Type List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('medicine_add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Medicine</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('medicine_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Medicine List</p>
                </a>
              </li>


            </ul>
          </li>
            @endif
            @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-store"></i>
              <p>
                Purchase
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('purchase_add') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Purchase</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('purchase_invoice_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> Purchase Invoice List</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('purchase_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase List</p>
                </a>
              </li>

            </ul>
          </li>
            @endif
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                POS
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('add_pos') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Pos</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('pos_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Invoice List</p>
                </a>
              </li>

            </ul>
          </li>
            @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
          <!-- report -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <p>
                Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('all_stock') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('daily_sales') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Sales</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('monthly_sales') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Sales</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('yearly_sales') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yearly Sales</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('previous_year_sales') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Previous Year Sales</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="{{ route('revenue_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Revenue</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('monthly_sales_revenue') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Sales Revenue</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('yearly_sales_revenue') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yearly Sales Revenue</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('previous_year_sales_revenue') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Previous Year Sales Revenue</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('monthly_profit_loss') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Profit/Loss</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('yearly_profit_loss') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yearly Profit/Loss</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('previous_year_profit_loss') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Previous Year Profit/Loss</p>
                </a>
              </li>

            </ul>
          </li>
            @endif

            @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
          <!-- Expense -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-calculator"></i>
              <p>
                Expense
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('add_expense') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Expense</p>
                </a>
              </li>

                <li class="nav-item">
                    <a href="{{ route('all_expense') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Expense List</p>
                    </a>
                </li>

              <li class="nav-item">
                <a href="{{ route('monthly_expense') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Monthly Expense</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('yearly_expense') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Yearly Expense</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('previous_year_expense') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Previous Year Expense</p>
                </a>
              </li>

            </ul>
          </li>
            @endif


           <!-- Return -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-shopping-bag"></i>
              <p>
                Return
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
                    <li class="nav-item">
                        <a href="{{ route('add_purchase_return') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Purchase Return</p>
                        </a>
                    </li>
                @endif
                @if(\Illuminate\Support\Facades\Auth::user()->is_admin == 1)
              <li class="nav-item">
                <a href="{{ route('purchase_return_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase Return List</p>
                </a>
              </li>
                @endif

                    <li class="nav-item" >
                        <a href="{{ route('add_sales_return') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add Sales Return</p>
                        </a>
                    </li>

              <li class="nav-item" style="margin-bottom: 35px;">
                <a href="{{ route('sales_return_list') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sales Return List</p>
                </a>
              </li>



            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
