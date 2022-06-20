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










