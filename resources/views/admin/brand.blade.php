
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
                    <th>Name</th>
                    <th>Tite</th>
                    <th>Identity</th>
                    <th>Description</th>
                    <th>Written</th>
                    {{-- <th>Action</th> --}}
                    </tr>
                </thead>
                {{-- <tbody>
                    @foreach ($brandViews as $key=>$row )
                    <tr>
                    <th>{{$key++}}</th>
                    <td>{{$row->name}}</td>
                    <td>{{$row->title}}</td>
                    <td>{{$row->identity}}</td>
                    <td>{{$row->description}}</td>
                    <td>{{$row->written}}</td>


                    <td> 
                        <a href="{{route('class.edit',$row->id)}}" class="btn btn-info">Edit</a>
                        <a href="{{route('class.delete',$row->id)}}" class ="btn btn-danger">Delete</a> --}}
                        {{-- <a href="{{route('class.edit',$row->id)}}" class="btn btn-info">Edit</a>
                        <a href="{{route('class.delete',$row->id)}}" class ="btn btn-danger">Delete</a> --}}

                  {{-- </td>
                    </tr>
                    @endforeach
                </tbody> --}}
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
<script>
    $(document).ready(function() {
      $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
      });

     $(function () {
        $('#dataTable').DataTable({
            processing: true,
            serverSide: true,
            bDestroy: true,
            ajax: ({
                url: "{{ route('admin.brand') }}",  
            }),
            displayLength: 10,
            columns: [{
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'identity',
                    name: 'identity'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'written',
                    name: 'written'
                },
            ]
        });
    });
  </script>
  