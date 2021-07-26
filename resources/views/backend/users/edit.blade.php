@extends('admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
        <section class="content">
            <div class="box-header with-border">
                <h4 class="box-title">Edit User</h4>
            </div>
                <form method="POST" action="{{route('users.update',$user->id)}}">
                    @csrf
                    <div class="row">
                        <div class="col-6">						
                            <div class="form-group">
                              <h5>Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                <input type="text" name="name" class="form-control" required data-validation-required-message="This field is required" value="{{$user->name}}">
                                </div>
                                
                            </div>
                        </div>
                        <div class="col-6">	 
                            <div class="form-group">
                                <h5>Email <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="email" name="email" class="form-control" required data-validation-required-message="This field is required" value="{{$user->email}}">
                                </div>
                                
                            </div>
                    
                        </div>
                        <div class="col-6">
                            <div class="form-group">
								<h5>Password</h5>
								<div class="controls">
                                    <input type="password" name="password" class="form-control">
                                </div>
							</div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
								<h5>User Role <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="role" id="role" required class="form-control">
										<option value="" selected="" disabled="">Select Role</option>
										<option value="admin" {{{$user->role == 'admin' ? 'selected' : ''}}}>Admin</option>
										<option value="operator" {{{$user->role == 'operator' ? 'selected' : ''}}}>Operator</option>
										
									</select>
								</div>
							</div>
                        </div>
                        <div class="col-6">	 
                            <div class="form-group">
                                <h5>Phone <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="phone" class="form-control" value="{{$user->phone}}"" required data-validation-required-message="This field is required" >
                                </div>
                                
                            </div>
                    
                        </div>
                        <div class="col-6">
                            <div class="form-group">
								<h5>Address <span class="text-danger">*</span></h5>
								<div class="controls">
									<input type="text" name="address" class="form-control" value="{{$user->address}}" required data-validation-required-message="This field is required"> </div>
							</div>
                        </div>
                       
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-rounded btn-info">Update</button>
                    </div>
                </form>
        </section>
    </div>
</div>

@endsection