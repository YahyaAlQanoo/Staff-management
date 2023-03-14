@extends('parent')

@section('title', 'Users')

@section('style')
<style>
    .delete-btn{
        color: red;
        outline-width: 0px;
        outline-color: transparent;
        border-width: 0px;
        background-color: transparent;
        display: inline;
        padding: 0px
    }
    .actions{
        display: flex;
        flex-direction: row;
        column-gap: 5px;
    }

        td ,th {
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
@endsection

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
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

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
                <th>Email</th>
                <th>type</th>
                <th>information</th>
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
                      @if ($user->department_id == 1 )
                          employee
                      @endif   
                      @if ($user->department_id == 2 )
                          Hr
                      @endif   
                    </td>
                    <td> <div>{{ $user->information }}</div> </td>
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
