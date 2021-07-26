@extends('admin.admin_master')

@section('content')

<div class="content-wrapper">
    <div class="container-full">

      <!-- Main content -->
        <section class="content">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                  <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                              
                                <img src="{{!empty($user->image) ? url('upload/avatar/'.$user->image) : url('upload/avatar/default.jpg')}}" class="rounded-circle" alt="" width="120" height="120">
                               
                                <div class="mt-3">
                                <h4 class="text-dark">{{Str::upper($user->name)}}</h4>
                                <p class="text-muted mb-1">Profile: {{ucfirst($user->role)}}</p>
              
                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Full Name</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            {{$user->name}}
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Email</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            {{$user->email}}
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Phone</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            {{$user->phone}}
                          </div>
                        </div>
                        <hr>
                                              
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Address</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            {{$user->address}}
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0">Gender</h6>
                          </div>
                          <div class="col-sm-9 text-secondary">
                            {{$user->gender}}
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                          <div class="col-sm-12">
                            <a class="btn btn-success"  href="{{route('profile.edit')}}">Edit</a>
                          </div>
                        </div>
                      </div>
                    </div>
            </div>
                
        </section>
    </div>
</div>

@endsection