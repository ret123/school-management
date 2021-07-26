@extends('admin.admin_master')

@section('content')


<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
        <section class="content">
            <div class="box-header with-border">
                <h4 class="box-title">Edit User</h4>
            </div>
                <form method="POST" action="{{route('profile.update')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-20">
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
                        <div class="col-6">
                            <div class="form-group">
								<h5>Gender <span class="text-danger">*</span></h5>
								<div class="radio">
                                    <fieldset class="control">
                                        <input type="radio" name="gender" value="male" {{$user->gender == 'male' ? 'checked' : '' }} id="male" required>
                                        <label for="male">Male</label>
                                    </fieldset>
                                    <fieldset class="control">
                                        <input type="radio" name="gender" value="female" {{$user->gender == 'female' ? 'checked' : '' }} id="female">
                                        <label for="female">Female</label>
                                    </fieldset>
                                   
                                </div>
                                
                            </div>
                           
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <h5>Upload Image</h5>
                                
                                    <div class="custom-file">
                                        <input type="file" class="form-control" id="image" name="image">
                                      
                                    </div>
                                
                            </div>
                            <div class="form-group">
                                <img src="{{!empty($user->image) ? url('upload/avatar/'.$user->image) : url('upload/avatar/default.jpg')}}" width="100" height="100" id="showImage" alt="">
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

@section('script')
    <script>
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>

@endsection