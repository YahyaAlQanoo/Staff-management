@extends('parent')

@section('title', 'Create User')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Create User</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ route('store_users') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" class="form-control" name="name" id="Name"
                                placeholder="Enter Name" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="user_name">Username</label>
                            <input type="text" class="form-control" name="user_name" id="user_name"
                                placeholder="Enter username" value="{{ old('user_name') }}">
                        </div>

                        <div class="form-group">
                            <label for="user_email">Email address</label>
                            <input type="email" class="form-control" name="email" id="user_email"
                                placeholder="Enter email" value="{{ old('user_email') }}">
                        </div>


                        <div class="form-group">
                            <label>Choose Type</label>
                            <select name="type" class="form-control" id="user">
                                <option value="employee">employee</option>
                                <option value="hr">hr</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="information">Information</label>
                            <textarea class="form-control" name="information" id="information" placeholder="Enter information"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="user_password">Password</label>
                            <input type="password" class="form-control" name="password" id="user_password"
                                placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label>chosse department</label>
                            <select name="department" class="form-control" id="department">
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        {{-- <div class="form-group">
                        <!-- <label for="customFile">Custom File</label> -->

                        <div class="custom-file">
                          <input type="file" name="user_image" class="custom-file-input" id="customFile">
                          <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                      </div> --}}
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection



@section('scripts')
    <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
