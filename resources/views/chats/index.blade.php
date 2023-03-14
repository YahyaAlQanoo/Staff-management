@extends('parent')

@section('title', 'Meating')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">



                        <section class="content">
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
                                    <h3 class="card-title">Inbox</h3>
                      
                                    <div class="card-tools">
                                      <div class="input-group input-group-sm">
                                        <input type="text" class="form-control" placeholder="Search Mail">
                                        <div class="input-group-append">
                                          <div class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- /.card-tools -->
                                  </div>
                                  <!-- /.card-header -->
                                  <div class="card-body p-0">
                                    {{-- <div class="mailbox-controls">
                                      <!-- Check all button -->
                                      <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                                      </button>
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm">
                                          <i class="far fa-trash-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                          <i class="fas fa-reply"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                          <i class="fas fa-share"></i>
                                        </button>
                                      </div>
                                      <!-- /.btn-group -->
                                      <button type="button" class="btn btn-default btn-sm">
                                        <i class="fas fa-sync-alt"></i>
                                      </button>
                                      <div class="float-right">
                                        1-50/200
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-chevron-left"></i>
                                          </button>
                                          <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-chevron-right"></i>
                                          </button>
                                        </div>
                                        <!-- /.btn-group -->
                                      </div>
                                      <!-- /.float-right -->
                                    </div> --}}
                                    <div class="table-responsive mailbox-messages">
                                      <table class="table table-hover table-striped">
                                        <tbody>
                                    @foreach ($chats as $chat)
                                        <tr>
                                          <td>
                                            <div class="icheck-primary">
                                              <input type="checkbox" value="" id="check3">
                                              <label for="check3"></label>
                                            </div>
                                          </td>
                                          <td class="mailbox-star"><a href="#"><i class="fas fa-star-o text-warning"></i></a></td>
                                          <td class="mailbox-name"><a href="{{ route('chat_show',$chat->id)}}">{{ $chat->name }}</a></td>
                                          <td class="mailbox-subject"><b>{{ implode(' ', array_slice(str_word_count($chat->subject, 2), 0, 3)) }}</b> - {{ implode(' ', array_slice(str_word_count($chat->content, 2), 0, 7)) }}...
                                          </td>
                                          <td class="mailbox-attachment"><i class="fas fa-paperclip"></i></td>
                                          <td class="mailbox-date">{{ $chat->created_at }}</td>
                                        </tr>
                                        
                                    @endforeach


                                        </tbody>
                                      </table>
                                      <!-- /.table -->
                                    </div>
                                    <!-- /.mail-box-messages -->
                                  </div>
                                  <!-- /.card-body -->
                                  <div class="card-footer p-0">
                                    <div class="mailbox-controls">
                                      <!-- Check all button -->
                                      <button type="button" class="btn btn-default btn-sm checkbox-toggle">
                                        <i class="far fa-square"></i>
                                      </button>
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm">
                                          <i class="far fa-trash-alt"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                          <i class="fas fa-reply"></i>
                                        </button>
                                        <button type="button" class="btn btn-default btn-sm">
                                          <i class="fas fa-share"></i>
                                        </button>
                                      </div>
                                      <!-- /.btn-group -->
                                      <button type="button" class="btn btn-default btn-sm">
                                        <i class="fas fa-sync-alt"></i>
                                      </button>
                                      <div class="float-right">
                                        1-50/200
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-chevron-left"></i>
                                          </button>
                                          <button type="button" class="btn btn-default btn-sm">
                                            <i class="fas fa-chevron-right"></i>
                                          </button>
                                        </div>
                                        <!-- /.btn-group -->
                                      </div>
                                      <!-- /.float-right -->
                                    </div>
                                  </div>
                                </div>
                                <!-- /.card -->
                              </div>
                              <!-- /.col -->
                            </div>
                            <!-- /.row -->
                          </section>
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                          <!-- /.card-header -->
                 <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection
