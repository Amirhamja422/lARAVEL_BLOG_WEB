
@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User</h1>
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
                    <th>SL</th>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Fullname</th>
                    <th>Usergroup</th>
                    <th>Phone Login</th>
                    <th>Phone Password</th>
                    <th>Action</th>
                    </tr>
                </thead>
                </table>
      </div>
    
      <!-- /.card-body -->              
    </div>
        </div>
          </div>
        </div>
      </div>


        <!-- Modal Start -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">Contrary to popular belief, Lorem Ipsum is not simply random text. It has
                        roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.
                        Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of
                        the more obscure Latin words, consectetur.</div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal End -->



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
        ajax: "{{ route('profile.view') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'user_id', name: 'user_id'},
            {data: 'user', name: 'user'},
            {data: 'pass', name: 'pass'},
            {data: 'full_name', name: 'full_name'},
            {data: 'user_group', name: 'user_group'},
            {data: 'phone_login', name: 'phone_login'},
            {data: 'phone_login', name: 'phone_login'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });



    function editData() {
       $('#editModal').modal('show');
    }

      



</script>