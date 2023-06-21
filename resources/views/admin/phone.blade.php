
@extends('layouts.app')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            {{-- <h1>User</h1> --}}

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              {{-- <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
              <li class="breadcrumb-item active"> Brand DataTables</li> --}}
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#PhoneCreateModel">Add Phone</button>

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
                <div class="card-body">
                     <table id="yajra-datatable" class="table table-bordered table-striped">
                     <thead>
                       <tr>
                        <th>SL</th>
                        <th>Extension</th>
                        <th>Server IP</th>
                        <th>User Login</th>
                        <th>User Pass</th>
                        <th>Phone Type</th>
                        <th>Status</th>
                        <th>Active</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    </table>
                  </div>
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
                    <div class="modal-body">
                      <form action="" method="post" id="update_product_form">
                        <div class="form-group row">
                          <label for="user_id" class="col-sm-2 col-form-label">User ID</label>
                          <div class="col-sm-10">
                            <input type="user_id" class="form-control" id="up_userId" name="up_userId" placeholder="User ID">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="username" class="col-sm-2 col-form-label">User Name</label>
                          <div class="col-sm-10">
                            <input type="username" class="form-control" id="up_username" name="up_username" placeholder="User Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="Password" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                            <input type="password" class="form-control" id="up_password" name="up_password" placeholder="Password">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
                          <div class="col-sm-10">
                            <input type="full_name" class="form-control" id="up_fullanme" placeholder="Full Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="usergroup" class="col-sm-2 col-form-label">User Group</label>
                          <div class="col-sm-10">
                            <input type="user_group" class="form-control" id="up_user_group" placeholder="User Group">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="phone_login" class="col-sm-2 col-form-label">Phone Login</label>
                          <div class="col-sm-10">
                            <input type="phone_login" class="form-control" id="up_phone_login" placeholder="Phone Password">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="phone_pass" class="col-sm-2 col-form-label">Phone Pass</label>
                          <div class="col-sm-10">
                            <input type="phone_pass" class="form-control" id="up_phone_pass" placeholder="Phone Password">
                          </div>
                        </div>        
                      </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="updateData()">Update</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal End -->
   </section>  
   
   
   <div class="modal fade" id="PhoneCreateModel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Phone</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form action="" method="POST" id="">
                @csrf

                <div class="form-group row">
                  <label for="extension" class="col-sm-2 col-form-label">Extension</label>
                  <div class="col-sm-10">
                    <input type="extension" class="form-control" id="extension" name="extension" placeholder="Phone extension">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="server_ip" class="col-sm-2 col-form-label">Server IP</label>
                  <div class="col-sm-10">
                    <input type="server_ip" class="form-control" id="server_ip" name="server_ip" placeholder="server ip">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="fullname" class="col-sm-2 col-form-label">Phone Login</label>
                  <div class="col-sm-10">
                    <input type="phone_login" class="form-control" id="phone_login" placeholder="Phone login">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="phone_pass" class="col-sm-2 col-form-label">Phone Pass</label>
                  <div class="col-sm-10">
                    <input type="phone_pass" class="form-control" id="phone_pass" placeholder="Phone Password">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="phone_type" class="col-sm-2 col-form-label">Phone Type</label>
                  <div class="col-sm-10">
                    <input type="phone_type" class="form-control" id="phone_type" placeholder="Phone Type">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="phone_status" class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <input type="phone_status" class="form-control" id="phone_status" placeholder="Phone status">
                  </div>
                </div>        
              </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary uaerCretaeData">Save</button>
            </div>
        </div>
    </div>
  </div>




@endsection
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript">

$(document).ready(function(){
      $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
      });
});

  $(function () {
    var table = $('#yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.phone') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'extension', name: 'phoneextension'},
            {data: 'server_ip', name: 'servername'},
            {data: 'login', name: 'userlogin'},
            {data: 'pass', name: 'userpass'},
            {data: 'phone_type', name: 'phonetype'},
            {data: 'status', name: 'phonestatus'},
            {data: 'active', name: 'phoneactive'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
      });
    
    });

    $(document).on('click','.user_deactivate',function(){
                  let isConfirm = confirm('Are you sure to DEACTIVE this Phone?');
                  if (isConfirm) {
                    let id =$(this).data('id');
                        $.ajax({
                              url:"{{route('phone.active')}}",
                              type: 'POST',
                              data: {
                                    user_deactivate_id:id
                              },
                              success: function (response) {
                                if(response.status == 'success'){
                                  Command: toastr["success"]("Success!", "User Deactive successfully");

                                  $('#yajra-datatable').DataTable().ajax.reload();
                                  toastr.options = {
                              "closeButton": false,
                              "debug": false,
                              "newestOnTop": false,
                              "progressBar": false,
                              "positionClass": "toast-top-right",
                              "preventDuplicates": false,
                              "onclick": null,
                              "showDuration": "300",
                              "hideDuration": "1000",
                              "timeOut": "5000",
                              "extendedTimeOut": "1000",
                              "showEasing": "swing",
                              "hideEasing": "linear",
                              "showMethod": "fadeIn",
                              "hideMethod": "fadeOut"
                              }

                                }
                              }
                        });
                  }
            });




</script>