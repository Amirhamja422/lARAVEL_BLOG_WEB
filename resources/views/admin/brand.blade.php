
@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>BRAND</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
              <li class="breadcrumb-item active"> Brand DataTables</li>
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
        <table id="yajra-datatable" class="table table-bordered table-striped">
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(function () {
    
    var table = $('#yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.brand') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'title', name: 'title'},
            {data: 'identity', name: 'identity'},
            {data: 'description', name: 'description'},
            {data: 'written', name: 'written'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
</script>

  