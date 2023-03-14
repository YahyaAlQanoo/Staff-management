@extends('parent')
@section('title', 'Create Services')
@section('page_name', 'Create Services')

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Services</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form method="POST" action="{{ route('store_serves') }}" >
                @csrf
                <div class="card-body">
                    {{-- alert --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-ban"></i> Validate Errors!</h5>
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{$item}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="name">Name Employee</label>
                        <input type="text" class="form-control" id="name" name="employee_name" placeholder="Enter Name " value="{{Auth::user()->name}}">
                    </div>
                    @if (! Auth::user()->is_hr == 1 )

                    <div class="form-group">
                        <label>Employee HR</label>
                        <select name="hr" class="form-control" id="user">
                            @foreach ($hr as $hr_response)
                                       <option value="{{ $hr_response->id }}" >{{ $hr_response->name }}</option>

                            @endforeach
                        </select>
                    </div>
                    @endif

                    <div class="form-group">
                        <label>Choose Services</label>
                        <select name="name" class="form-control" id="user">
                                <option value="vacation" >vacation</option>
                                <option value="permission" >permission</option>
                                <option value="other">other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message">Message Services</label>
                        <textarea class="form-control" name="content" id="message" rows="3" placeholder="Enter Message"></textarea>
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
