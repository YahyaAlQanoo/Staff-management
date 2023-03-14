@extends('parent')
@section('title', 'Department')
@section('page_name', 'Department')

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
                                <h3 class="card-title">Department</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>name</th>
                                            <th>username</th>
                                            <th>email</th>
                                            <th>type</th>
                                            <th>Show profile</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->email }}</td>

                                                <td>
                                                    @if ($user->is_employee == 1)
                                                        <span class="badge bg-warning text-dark">employee</span>
                                                    @endif
                                                    @if ($user->is_hr == 1)
                                                        <span class="badge bg-success">Hr</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('manager_show_user_profile', $user->id) }}"
                                                        class="btn btn-primary">Show profile</a>
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
