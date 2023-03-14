@extends('parent')
@section('title', 'Create Meeting')
@section('page_name', 'Create Meeting')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Meeting</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('meating.store')}}">
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
                                    <label for="meating_name">Meeting Name</label>
                                    <input type="text" class="form-control" id="meating_name" name="meating_name"
                                        placeholder="Create Meating ">
                                </div>
                                <div class="form-group">
                                    <label for="meating_date">Meeting Date</label>
                                    <input type="date" class="form-control" id="meating_date" name="meating_date"
                                        placeholder="Create Meating ">
                                </div>
                                <div class="form-group">
                                    <label for="meating_time">Meeting Time</label>
                                    <input type="time" class="form-control" id="meating_time" name="meating_time"
                                        placeholder="Create Meating ">
                                </div>
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
