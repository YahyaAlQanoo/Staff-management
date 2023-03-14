@extends('parent')

@section('title', 'Show Works')
@section('page_name', 'Show Works')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
 




                <div class="col-md-9">
                    <div class="card card-primary card-outline">
                      <div class="card-header">
                        <h3 class="card-title">Files</h3>
              
                        <div class="card-tools">
                          <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
                          <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
                        </div>
                      </div>
                      <!-- /.card-header -->

 
                      <!-- /.card-body -->
                      <div class="card-footer bg-white">
                        <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
                            @foreach ($works as $work) 

                          <li>
                            @if(pathinfo(public_path($work->works_file))['extension'] == 'png' ||  pathinfo(public_path($work->works_file))['extension'] == 'jpg'  )
                            <span class="mailbox-attachment-icon has-img"><img src="{{ Storage::url($work->works_file)}}" alt="Attachment"></span>
              
                            @endif
              
                            @if(pathinfo(public_path($work->works_file))['extension'] == 'pdf' )
                            <span class="mailbox-attachment-icon">
                              <i class="far fa-file-pdf"></i>
                            </span>
                            @endif

                            @if(pathinfo(public_path($work->works_file))['extension'] == 'zip' || pathinfo(public_path($work->works_file))['extension'] == 'rar' )
                            <span class="mailbox-attachment-icon">
                              <i class="far fa-file-archive"></i>
                            </span>
                            @endif
              
                            @if(pathinfo(public_path($work->works_file))['extension'] == 'docx' )
                              <span class="mailbox-attachment-icon"><i class="far fa-file-word"></i></span>
                            @endif
              
                            <div class="mailbox-attachment-info">
                              <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> {{ $work->works_name}}</a>
                                  <span class="mailbox-attachment-size clearfix mt-1">
                                    <a href="{{ route('works.download',$work->id) }}" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                                  </span>
                            </div>
                          </li>
                          @endforeach

                        </ul>
                      </div>
                      <!-- /.card-footer -->
                       <!-- /.card-footer -->
                    </div>
                    <!-- /.card -->
                  </div>
            </div>
        </div>
    </section>

@endsection

