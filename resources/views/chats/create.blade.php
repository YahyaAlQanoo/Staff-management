@extends('parent')
@section('title', 'Create Chat')
@section('page_name', 'Create Chat')

@section('styles')
<link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

<style>
  .select2-selection--single {
    height: 43px !important;
  }
</style>

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-3">
                  <a href="#" class="btn btn-primary btn-block mb-3">Compose</a>
        
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Folders</h3>
        
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body p-0">
                      <ul class="nav nav-pills flex-column">
                        <li class="nav-item active">
                          <a href="{{ route('chats')}}" class="nav-link">
                            <i class="fas fa-inbox"></i> Inbox
                            
                          </a>
                        </li>
                        <li class="nav-item">
                          <a href="{{ route('create_chat')}}" class="nav-link">
                            <i class="far fa-envelope"></i> Send
                          </a>
                        </li>
                  
                         

                      </ul>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
          
                  <!-- /.card -->
                </div>
                <div class="col-md-9">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Create Chat</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form enctype="multipart/form-data" method="POST" action="{{ route('create_chat') }}">
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
                                  <label>To:</label>
                                  <select name="to" class="form-control select2" style="width: 100%;">
                                    <option selected="selected"></option>
                                    @foreach ($users as $user)
                                      <option value="{{ $user->id }}" >{{ $user->name }}</option>
                                    @endforeach
                            
                                  </select>
                                </div>
                                <div class="form-group">
                                  <input class="form-control" name="subject" placeholder="Subject:">
                                </div>



                                <div class="form-group">
                                  <textarea id="compose-textarea" name='content' class="form-control" style="height: 300px; display: none;">
                                  </textarea>
                              </div>


                              <div class="mb-3">
                                <label for="formFile" class="form-label">chosse file</label>
                                <input class="form-control" type="file" name="file" id="formFile">
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
{{-- <script src="../../plugins/select2/js/select2.full.min.js"></script> --}}
    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('plugins/summernote/summernote-bs4.min.js') }}"></script>
    {{-- <script src="../../plugins/summernote/summernote-bs4.min.js"></script> --}}

    <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
      })
    </script>
    <script>
      $(function () {
        //Add text editor
        $('#compose-textarea').summernote()
      })
    </script>
@endsection

 