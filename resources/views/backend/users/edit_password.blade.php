@extends('admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
        <section class="content">
            <div class="box-header with-border mb-20">
                <h3 class="box-title">Change Password</h3>
            </div>
                <form method="POST" action="{{route('profile.password.update')}}">
                    @csrf
                    <div class="row">
                                               
                        <div class="col-12">
                            <div class="form-group">
								<h5>Current Password <span class="text-danger">*</span></h5>
								<div class="controls">
                                    <input type="password" name="oldpassword" id="current_password" class="form-control">
                                    @error('oldpassword')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
							</div>
                        </div>
                                               
                        <div class="col-12">
                            <div class="form-group">
								<h5>New Password <span class="text-danger">*</span></h5>
								<div class="controls">
                                    <input type="password" name="password" id="password" class="form-control">
                                    @error('password')
                                        <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
							</div>
                        </div>
                                               
                        <div class="col-12">
                            <div class="form-group">
								<h5>Confirm Password <span class="text-danger">*</span></h5>
								<div class="controls">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                    @error('password_confirmation')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                                </div>
							</div>
                        </div>
                      
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-rounded btn-info">Save</button>
                    </div>
                </form>
        </section>
    </div>
</div>

@endsection