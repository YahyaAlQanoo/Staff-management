@extends('parent')
@if (Auth::user()->is_manager == 1)
    @section('title', 'Manager Actions')
    @section('page_name', 'Profile User')
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
                            <div class="widget-user-image" style="top:-50px;">

                                @if ($user->image)
                                    <img class="img-circle elevation-2" src="{{ Storage::url($user->image) }}"
                                        alt="admin_image">
                                    {{-- </a> --}}
                                @else
                                    <img class="img-circle elevation-2" src="{{ asset('user.png') }}" alt="User Avatar">
                                    {{-- </a> --}}
                                @endif


                            </div>
                        </div>


                        <div class="card-body">
                            <div class="row mt-4 mb-4">
                                <div class="col-sm-6 border-right ">
                                    <div class="description-block">
                                        <h5 class="description-header">{{ $user->name }}</h5>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="description-block">
                                        <h5 class="description-header">{{ $department->name ?? 'Department Not Found' }}
                                        </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-sm-12 mb-3 text-center text-secondary">
                                    {{ $user->information }}
                                </div>
                            </div>
                            <div class="row border-bottom">
                                <div class="col-sm-12 text-center mt-3 mb-3">



                                    @if (count($works) > 0)




                                        <div class="card card-primary card-outline">
                                            <div class="card-header">
                                                <h3 class="card-title">Files</h3>

                                                <div class="card-tools">
                                                    <a href="#" class="btn btn-tool" title="Previous"><i
                                                            class="fas fa-chevron-left"></i></a>
                                                    <a href="#" class="btn btn-tool" title="Next"><i
                                                            class="fas fa-chevron-right"></i></a>
                                                </div>
                                            </div>
                                            <!-- /.card-header -->


                                            <!-- /.card-body -->
                                            <div class="card-footer bg-white">
                                                <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                                                    @foreach ($works as $work)
                                                        <li>
                                                            @if (pathinfo(public_path($work->works_file))['extension'] == 'png' ||
                                                                    pathinfo(public_path($work->works_file))['extension'] == 'jpg')
                                                                <span class="mailbox-attachment-icon has-img"><img
                                                                        src="{{ Storage::url($work->works_file) }}"
                                                                        alt="Attachment"></span>
                                                            @endif

                                                            @if (pathinfo(public_path($work->works_file))['extension'] == 'pdf')
                                                                <span class="mailbox-attachment-icon">
                                                                    <i class="far fa-file-pdf"></i>
                                                                </span>
                                                            @endif

                                                            @if (pathinfo(public_path($work->works_file))['extension'] == 'zip')
                                                                <span class="mailbox-attachment-icon">
                                                                    <i class="far fa-file-archive"></i>
                                                                </span>
                                                            @endif

                                                            @if (pathinfo(public_path($work->works_file))['extension'] == 'word')
                                                                <span class="mailbox-attachment-icon"><i
                                                                        class="far fa-file-word"></i></span>
                                                            @endif

                                                            <div class="mailbox-attachment-info">
                                                                <a href="#" class="mailbox-attachment-name"><i
                                                                        class="fas fa-paperclip"></i>
                                                                    {{ $work->works_name }}</a>
                                                                <span class="mailbox-attachment-size clearfix mt-1">
                                                                    <a href="{{ route('works.download', $work->id) }}"
                                                                        class="btn btn-default btn-sm float-right"><i
                                                                            class="fas fa-cloud-download-alt"></i></a>
                                                                </span>
                                                            </div>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                            <!-- /.card-footer -->
                                            <!-- /.card-footer -->
                                        </div>

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
