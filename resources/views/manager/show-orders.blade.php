@extends('parent')
@section('title', 'Show Orders')
@section('page_name', 'Show Orders')

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
                                <h3 class="card-title">Show Orders</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>service name</th>
                                            <th>employee_name</th>
                                            <th>Status</th>
                                            <th>date</th>
                                            <th style="width: 40px">Send request</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $service->name }}</td>
                                                <td>{{ $service->employee_name }}</td>
                                                <td>
                                                    @if ($service->response === 1)
                                                        <span class="badge bg-success">مقبول</span>
                                                    @endif
                                                    @if ($service->response === 0)
                                                        <span class="badge bg-danger">مرفوض</span>
                                                    @endif
                                                    @if ($service->response === null)
                                                        <span class="badge bg-warning">بانتطار الرد</span>
                                                    @endif
                                                </td>
                                                <td>{{ $service->date }}</td>
                                                <td>
                                                    <a href="{{ route('add_response', $service->id) }}"
                                                        class="btn btn-primary">Add response</a>
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
