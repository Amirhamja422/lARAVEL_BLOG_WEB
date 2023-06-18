
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
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#userCretaeModal">Add User</button>

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
   
   
   <div class="modal fade" id="userCretaeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add User</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form action="" method="POST" id="">
                @csrf

                <div class="form-group row">
                  <label for="username" class="col-sm-2 col-form-label">User Name</label>
                  <div class="col-sm-10">
                    <input type="username" class="form-control" id="username" name="username" placeholder="User Name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="Password" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="fullname" class="col-sm-2 col-form-label">Full Name</label>
                  <div class="col-sm-10">
                    <input type="full_name" class="form-control" id="full_name" placeholder="Full Name">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="usergroup" class="col-sm-2 col-form-label">User Group</label>
                  <div class="col-sm-10">
                    <input type="user_group" class="form-control" id="user_group" placeholder="User Group">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="phone_login" class="col-sm-2 col-form-label">Phone Login</label>
                  <div class="col-sm-10">
                    <input type="phone_login" class="form-control" id="phone_login" placeholder="Phone Password">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="phone_pass" class="col-sm-2 col-form-label">Phone Pass</label>
                  <div class="col-sm-10">
                    <input type="phone_pass" class="form-control" id="phone_pass" placeholder="Phone Password">
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
        ajax: "{{ route('profile.view') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'user_id', name: 'user_id'},
            {data: 'user', name: 'user'},
            {data: 'pass', name: 'pass'},
            {data: 'full_name', name: 'full_name'},
            {data: 'user_group', name: 'user_group'},
            {data: 'phone_login', name: 'phone_login'},
            {data: 'phone_pass', name: 'phone_pass'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
      });
    
    });


  $(document).on('click','.update_user_form',function(){
      let id =$(this).data("id");
      let user =$(this).data("user");
      let pass =$(this).data("pass");
      let fname =$(this).data("fname");
      let usergroup =$(this).data("group");
      let phonelogin =$(this).data("login");
      let phonepass =$(this).data("pp");
      $('#up_userId').val(id);
      $('#up_username').val(user);
      $('#up_password').val(pass);
      $('#up_fullanme').val(fname);
      $('#up_user_group').val(usergroup);
      $('#up_phone_login').val(phonelogin);
      $('#up_phone_pass').val(phonepass);
  });

  $(document).on('click','.delete_user',function(e){
      e.preventDefault();
      let dlt_id =$(this).data('id');
      if(confirm('are you sure you want to delete??')){
        
      $.ajax({
      url:"{{route('profile.delete')}}",
      method:'post',
      data:{
          dlt_id:dlt_id
      },
      success:function(response){
          if(response.status == 'success'){
            Command: toastr["success"]("Success!", "User deleted successfully");
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

         })
        }
    });


    $(document).on('click','.uaerCretaeData',function(){
           let username =$('#username').val();     
           let password =$('#password').val();     
           let full_name =$('#full_name').val();     
           let user_group =$('#user_group').val();     
           let phone_login =$('#phone_login').val();     
           let phone_pass =$('#phone_pass').val();
           $.ajax({
            url:"{{route('profile.create')}}",
                method:'POST',
                data:{
                    username:username,
                    password:password,
                    full_name:full_name,
                    user_group:user_group,
                    phone_login:phone_login,
                    phone_pass:phone_pass
                    },
                success:function(response){
                     // console.log(response);
                     if(response.status == 'success'){
                    Command: toastr["success"]("Success!", "User Added successfully");
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
                    },
                    error:function(err){
                    console.log(err);
                    let error=err.responseJSON;
                    $.each(error.errors,function(index,value){
                    console.log(value);
                    $('.errorMesgContainer').append('<div class="alert alert-danger" role="alert">'+value+'</div>');

                    });

                    }

                })
            });

            $(document).on('click','.user_deactivate',function(){
                  let isConfirm = confirm('Are you sure to DEACTIVE this User?');
                  if (isConfirm) {
                    let id =$(this).data('id');
                        $.ajax({
                              url:"{{route('profile.deactive')}}",
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


            $(document).on('click','.user_active',function(){
                  let isConfirm = confirm('Are you sure to ACTIVE this User?');
                  if (isConfirm) {
                    let id =$(this).data('id');
                        $.ajax({
                              url:"{{route('profile.active')}}",
                              type: 'POST',
                              data: {
                                    user_activate_id:id
                              },
                              success: function (response) {
                              if(response.status == 'success'){
                              Command: toastr["success"]("Success!", "User Active successfully");
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