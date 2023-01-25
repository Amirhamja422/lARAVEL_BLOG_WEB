
@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
              <li class="breadcrumb-item active">Category DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                    <th>Sl</th>
                    <th>First</th>
                    <th>Last</th>
                    <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clsview as $key=>$row )
                    <tr>
                    <th>{{$key++}}</th>
                    <td>{{$row->class_name}}</td>
                    <td>{{$row->email}}</td>
                    <td>
                        {{-- <a href="{{route('class.edit',$row->id)}}" class="btn btn-info">Edit</a>
                        <a href="{{route('class.delete',$row->id)}}" class ="btn btn-danger">Delete</a> --}}
                        <a href="" class="btn btn-info">Edit</a>
                        <a href="" class ="btn btn-danger">Delete</a>

                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
      </div>
    
      <!-- /.card-body -->              
    </div>
        </div>
          </div>
        </div>
      </div>
   </section>
                                                                       
@endsection
 