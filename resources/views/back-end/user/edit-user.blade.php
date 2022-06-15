@extends('back-end.master')


@section('title')
   Edit User
@endsection

@section('content-title')
    Edit User
@endsection


@section('content')


<div class="container">
    <div class="row">
	    <div class="col-lg-6">
            @if(Session::has('message'))
                <p class="text-success text-center font-weight-bold">{{ Session::get('message') }}</p>
            @endif
			<div class="card" style="padding:30px;">
				<div class="card card-primary">
              <div class="card-header">
                <h3>Update User</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('update_user') }}" method="POST">
              	@csrf
                <div class="card-body">
                  <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ $info->name }}">
                     <input type="hidden" class="form-control" name="id" value="{{ $info->id }}">
                    @error('name')
					          <span class="text-danger">{{ $message }}</span>
					         @enderror
                  </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address Username" value="{{ $info->email }}">
                        @error('email')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="is_admin">
                            <option value="2" {{ ($info->is_admin == 2) ? 'selected':'' }}> User </option>
                            <option value="1" {{ ($info->is_admin == 1) ? 'selected':'' }}> Admin </option>
                        </select>

                    </div>

                </div>
                <!-- /.card-body -->



                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-center">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
			</div>

	     </div>
    </div>
</div>

@endsection
