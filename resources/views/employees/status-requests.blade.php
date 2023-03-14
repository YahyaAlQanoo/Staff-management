@extends('parent')
@section('title', 'status of requests')
@section('page_name', 'status of requests')

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
                                <h3 class="card-title">status of requests</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>service name</th>
                                            <th>content</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $service->name }}</td>
                                                <td>{{ $service->content }}</td>
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
