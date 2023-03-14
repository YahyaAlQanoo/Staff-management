@extends('parent')
@if (Auth::user()->is_manager == 1)
@section('title', 'Manager Actions')
@section('page_name', 'Manager Actions')
@else
@section('title', 'Profile')
@section('page_name', 'Profile')
@endif


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row px-5">
                <div class="col-md-12">
                    <!-- Widget: user widget style 1 -->
                    <div class="card card-widget widget-user">
                        <div class="widget-user-header p-0" style="height: 0px;">
                            @if (Auth::user()->is_manager !== 1)
                                <div class="widget-user-image" style="top:-50px;">
                                    {{-- <img class="img-circle elevation-2" src="../dist/img/user1-128x128.jpg"
                                        alt="User Avatar"> --}}

                                    {{-- <img class="img-circle img-bordered-sm" height="65" width="65"> --}}

                                    @if ($user->image)
                                        {{-- <a href="{{ Storage::url($user->image) }}" data-toggle="lightbox"> --}}
                                        <img class="img-circle elevation-2" src="{{ Storage::url($user->image) }}"
                                            alt="admin_image">
                                        {{-- </a> --}}
                                    @else
                                        {{-- <a href="{{ asset('ucas/man.png') }}" data-toggle="lightbox"> --}}
                                            <img class="img-circle elevation-2" src="{{ asset('user.png') }}"
                                                alt="User Avatar">
                                        {{-- </a> --}}
                                    @endif


                                </div>
                            @endif
                        </div>


                        <div class="card-body">
                            @if (Auth::user()->is_manager !== 1)
                                <div class="row mt-4 mb-4">
                                    <div class="col-sm-6 border-right ">
                                        <div class="description-block">
                                            <h5 class="description-header">{{ Auth::user()->name }}</h5>
                                        </div>
                                    </div>
                                    {{-- <div class="col-sm-6 ">
                                    <div class="description-block">
                                        <h5 class="description-header">{{ Auth::user()->department_id ?? 'Department Name' }}</h5>
                                    </div>
                                </div> --}}
                                    <div class="col-sm-6">
                                        <div class="description-block">
                                            <h5 class="description-header">{{ $department->name ?? 'Department Not Found' }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col-sm-12 mb-3 text-center text-secondary">
                                        {{ Auth::user()->information }}
                                    </div>
                                </div>
                            @endif
                            <h5 class="text-center font-weight-bold text-md mt-3">Actions</h5>
                            <div class="row border-bottom">
                                <div class="col-sm-12 text-center mt-3 mb-3">

                                    @if (Auth::user()->is_manager != 1)
                                        <a href="{{ route('profile.edit', Auth::user()->id) }}"
                                            class="btn btn-success ml-3">Edit Profile</a>
                                    @endif


                                    @if (Auth::user()->is_employee == 1)
                                        <a href="{{ route('insert_serves') }}" class="btn btn-success ml-3">Send Service
                                        </a>
                                        <a href="{{ route('show_serves', Auth::user()->id) }}"
                                            class="btn btn-warning ml-3">Show Services</a>
                                        <a href="{{ route('chats') }}" class="btn btn-primary ml-3">Chats</a>
                                    @endif
                                    @if (Auth::user()->is_hr == 1)
                                        <a href="{{ route('human_re', Auth::user()->id) }}"
                                            class="btn btn-primary ml-3">Send Employee Service</a>
                                        <a href="{{ route('human_resources_insert_serves') }}"
                                            class="btn btn-warning ml-3">Send Service</a>
                                        <a href="{{ route('human_resources_show_serves', Auth::user()->id) }}"
                                            class="btn btn-warning ml-3">Show Services</a>
                                    @endif
                                    @if (Auth::user()->is_manager == 1)
                                        <a href="{{ route('show_orders') }}" class="btn btn-danger ml-3">View sent
                                            requests</a>
                                    @endif
                                    @if (Auth::user()->is_manager == 1)
                                        <a href="{{ route('meating.create') }}" class="btn btn-secondary ml-3">Create
                                            meeting</a>
                                    @endif
                                    <a href="{{ route('meating.show') }}" class="btn btn-secondary ml-3">Show meeting</a>
                                    @if (Auth::user()->is_employee == 1 || Auth::user()->is_hr)
                                        <a href="{{ route('works.create') }}" class="btn btn-success ml-3">Works</a>
                                        <a href="{{ route('works.show') }}" class="btn btn-success ml-3">Show works</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.row -->
@endsection
