@extends('parent')
@section('title', ' Departments')
@section('page_name', ' Departments')

@section('content')
    <section class="content">
        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <!-- /.col -->
                    <div class="col-md-12">

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Departments</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped text-center">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>name</th>
                                            <th style="width: 40px">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($departments as $department)
                                            <tr class="font-weight-bold">
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td style="width: 0px">{{ $department->name }}</td>
                                                <td>
                                                    <a href="{{ route('departments_user', $department->id) }}"
                                                        class="btn btn-primary">Show Employee
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->

                <!-- /.row -->

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </section>
@endsection
