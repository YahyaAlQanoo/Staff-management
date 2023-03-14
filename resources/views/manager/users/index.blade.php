@extends('parent')

@section('title', 'Users')

{{-- @section('style')
    <style>
        .delete-btn {
            color: red;
            outline-width: 0px;
            outline-color: transparent;
            border-width: 0px;
            background-color: transparent;
            display: inline;
            padding: 0px
        }

        .actions {
            display: flex;
            flex-direction: row;
            column-gap: 5px;
        }

        td,
        th {
            max-width: 270px;
            min-width: 60px;
            text-align: left;
            word-wrap: break-word;
        }

        td div {
            height: 60px;
            overflow: auto;
            max-width: 270px;
            word-wrap: break-word;
        }
    </style>
@endsection --}}

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Users</h3>

                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right"
                                        placeholder="Search">

                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>name</th>
                                        <th>user_name</th>
                                        <th>department</th>
                                        <th>Email</th>
                                        <th>type</th>
                                        <th>Bio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr class="font-weight-bold">
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <td>{{ $user->department_name ?? '---'}}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->is_employee == 1)
                                                    <span class="text-success">Employee</span>
                                                @endif
                                                @if ($user->is_hr == 1)
                                                    <span class="text-red">Hr</span>
                                                @endif
                                                @if ($user->is_manager == 1)
                                                    <span class="text-warning">Manger</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($user->is_manager)
                                                <button @disabled($user->is_manager == 1 ) href="{{ route('manager_show_user_profile', $user->id) }}"
                                                    class="btn btn-primary">Show profile
                                                </button>
                                                @else
                                                <a href="{{ route('manager_show_user_profile', $user->id) }}"
                                                    class="btn btn-primary">Show profile
                                                </a>
                                                @endif

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
