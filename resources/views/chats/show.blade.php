@extends('parent')

@section('title', 'Meating')

@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
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
      <!-- /.col -->
    <div class="col-md-9">
      <div class="card card-primary card-outline">
        <div class="card-header">
          <h3 class="card-title">Read Mail</h3>

          <div class="card-tools">
            <a href="#" class="btn btn-tool" title="Previous"><i class="fas fa-chevron-left"></i></a>
            <a href="#" class="btn btn-tool" title="Next"><i class="fas fa-chevron-right"></i></a>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <div class="mailbox-read-info">
            <h5>{{ $chat->subject }}</h5>
            <h6>From: {{ $chat->name}}
              <span class="mailbox-read-time float-right">{{ $chat->created_at}}</span></h6>
          </div>
          <!-- /.mailbox-read-info -->
          <div class="mailbox-controls with-border text-center">
            <div class="btn-group">
              <button type="button" class="btn btn-default btn-sm" data-container="body" title="Delete">
                <i class="far fa-trash-alt"></i>
              </button>
              <button type="button" class="btn btn-default btn-sm" data-container="body" title="Reply">
                <i class="fas fa-reply"></i>
              </button>
              <button type="button" class="btn btn-default btn-sm" data-container="body" title="Forward">
                <i class="fas fa-share"></i>
              </button>
            </div>
            <!-- /.btn-group -->
            <button type="button" class="btn btn-default btn-sm" title="Print">
              <i class="fas fa-print"></i>
            </button>
          </div>
          <!-- /.mailbox-controls -->
          <div class="mailbox-read-message">
            {{  htmlspecialchars_decode($chat->content) }}
          </div>
          <!-- /.mailbox-read-message -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer bg-white">
          <ul class="mailbox-attachments d-flex align-items-stretch clearfix">
            <li>



 
 




              
              @if(pathinfo(public_path($chat->file))['extension'] == 'png' ||  pathinfo(public_path($chat->file))['extension'] == 'jpg'  )
              <span class="mailbox-attachment-icon has-img"><img src="{{ Storage::url($chat->file)}}" alt="Attachment"></span>

              @endif

              @if(pathinfo(public_path($chat->file))['extension'] == 'pdf' )
              <span class="mailbox-attachment-icon">
                <i class="far fa-file-pdf"></i>
              </span>
              @endif


              @if(pathinfo(public_path($chat->file))['extension'] == 'zip' || pathinfo(public_path($chat->file))['extension'] == 'rar' )
              <span class="mailbox-attachment-icon">
                <i class="far fa-file-archive"></i>
              </span>
              @endif

              @if(pathinfo(public_path($chat->file))['extension'] == 'docx' )
              <span class="mailbox-attachment-icon"><i class="far fa-file-word"></i></span>
              @endif

              <div class="mailbox-attachment-info">
                <a href="#" class="mailbox-attachment-name"><i class="fas fa-paperclip"></i> {{ pathinfo(public_path($chat->file))['filename'] . '.'.pathinfo(public_path($chat->file))['extension']  }}</a>
                    <span class="mailbox-attachment-size clearfix mt-1">
                      <a href="{{ route('chat_download',$chat->id) }}" class="btn btn-default btn-sm float-right"><i class="fas fa-cloud-download-alt"></i></a>
                    </span>
              </div>
            </li>
  
          </ul>
        </div>
        <!-- /.card-footer -->
        <div class="card-footer">
          <div class="float-right">
            <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
            <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
          </div>
          <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
          <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
@endsection
