@extends('parent')
@section('title', 'Create Works')
@section('page_name', 'Create Works')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Works</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{route('works.store')}}" enctype="multipart/form-data">
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
                                    <label for="works_name">Works Name</label>
                                    <input type="text" class="form-control" id="works_name" name="works_name"
                                        placeholder="Create Works ">
                                </div>
                                {{-- <div class="form-group">
                                    <label for="works_file">Uploade Works</label> <br>
                                    <input type="file"  id="works_file" name="works_file" placeholder="uploade Works ">
                                </div> --}}
                                <div class="form-group">
                                    <label for="works_file">Upload Works</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" id="works_file" name="works_file"
                                                class="custom-file-input" placeholder="upload works ">
                                            <label class="custom-file-label" for="works_file">Choose file</label>
                                        </div>
                                    </div>
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

@section('scripts')
<script src="{{asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>
<script> $(function () {bsCustomFileInput.init();});</script>
@endsection
