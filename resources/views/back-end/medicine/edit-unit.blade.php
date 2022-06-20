@extends('back-end.master')


@section('title')
   Category
@endsection

@section('content-title')
   Update Category
@endsection


@section('content')


<div class="container">
    <div class="row">
        <div class="col-lg-3"></div>
	    <div class="col-lg-6">
			<div class="card" style="padding:30px;">

				<div class="card card-primary">
              <div class="card-header">
                <h3 class="p-0 m-0">Update Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('unit_update') }}" method="POST">
              	@csrf
                <div class="card-body">

                  <div class="form-group">
                    <label>Unit Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $info->name }}">
                    <input type="hidden" name="id" value="{{ $info->id }}">
                    @error('name')
					          <span class="text-danger">{{ $message }}</span>
					         @enderror
                  </div>

                  <div class="form-group">
                    <input type="radio" name="status" value="1" @if($info->status==1) checked @endif>active
                    <input type="radio" name="status" value="0" @if($info->status==0) checked @endif style="margin-left: 10px;">inactive
                  </div>


                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-success btn-center">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
			</div>

	     </div>
        <div class="col-lg-3"></div>
    </div>
</div>

<!-- <script type="text/javascript">
  document.forms['EditForms'].elements['status'].value={{ $info->status }}
</script> -->

@endsection
