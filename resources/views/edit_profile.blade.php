@extends('parent')
@section('title', 'Edit Profile')
@section('page_name', 'Edit Profile')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Profile of ID {{ $user->id }}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('profile.update', $user->id) }}" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="card-body">
                                {{-- alert --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-hidden="true">&times;</button>
                                        <h5><i class="icon fas fa-ban"></i> Validate Errors!</h5>
                                        <ul>
                                            @foreach ($errors->all() as $item)
                                                <li>{{ $item }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="user_bio">Username</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name') ?? $user->name }}" placeholder="Enter name ">
                                </div>
                                <div class="form-group">
                                    <label for="user_bio">User Bio</label>
                                    <input type="text" class="form-control" id="user_bio" name="user_bio"
                                        value="{{ old('user_bio') ?? $user->information }}" placeholder="Enter user bio ">
                                </div>
                                <div class="form-group">
                                    <label for="user_image">Upload Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" id="user_image" name="user_image"
                                                class="custom-file-input" placeholder="upload Image ">
                                            <label class="custom-file-label" for="user_image">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                 @if ($user->image)
                                    <a href="{{ Storage::url($user->image) }}" data-toggle="lightbox">
                                        <img src="{{ Storage::url($user->image) }}" width="100" height="100"
                                            alt="user image"></a>
                                @else
                                    <div class="form-group">
                                        {{-- <a href="{{ asset('user.png') }}" target="_blank"> --}}
                                        <a href="{{ asset('user.png') }}" data-toggle="lightbox">
                                            <img src="{{ asset('user.png') }}" width="100" height="100"
                                                alt="user image"></a>

                                    </div>
                                @endif

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
