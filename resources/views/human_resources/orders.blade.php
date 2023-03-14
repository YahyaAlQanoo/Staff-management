@extends('parent')
@section('title', 'Show Employee Services')
@section('page_name', 'Show Employee Services')

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
                                <h3 class="card-title">Show Employee Services</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body p-0">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>service name</th>
                                            <th>employee_name</th>
                                            <th>date</th>
                                            <th>Status</th>
                                            <th>Send request</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($services as $service)
                                            <tr class="m-0 p-0">
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $service->name }}</td>
                                                <td>{{ $service->employee_name }}</td>
                                                <td>{{ $service->date }}</td>
                                                <td>
                                                    @if ($service->response === 1)
                                                        <span class="badge bg-success">مقبول</span>
                                                    @endif
                                                    @if ($service->response === null)
                                                        <span class="badge bg-warning">بانتظار الرد</span>
                                                    @endif
                                                    @if ($service->response === 0)
                                                        <span class="badge bg-danger">مرفوض</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <form action="{{ route('passing_orders', $service->id) }}" method="POST">
                                                        @csrf
                                                        @method('put')
                                                        <button type="submit" @disabled($service->manager_id !== null) class="btn @if ($service->manager_id !== null) btn-danger @endif btn-primary">Send</button>
                                                    </form>
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
