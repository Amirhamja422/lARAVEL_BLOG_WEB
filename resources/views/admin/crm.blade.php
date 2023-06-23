
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


            </ol>
          </div>




        <div class="row">
          <div class="col"  style="display:flex; gap:47px;">
            <label>Start Date</label>
            <input type='date' class="form-control" id='start_date' placeholder='Select Date' style='width: 350px;' >

            <label>End Date</label>
            <input type='date' class="form-control" id='end_date' placeholder='Select Date' style='width: 350px;' >

              <button type="submit" class="btn btn-sm btn-primary px-3" onclick="searchData()"><i
                      class="bi bi-search mr-1'"></i>Search</button>
              <a href="" id="download" class="btn btn-sm btn-info px-3"><i
                      class="bi bi-download mr-1"></i>
                  Download</a>
          </div>
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
                        <th>ID</th>
                        <th>Agent</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Name</th>
                        <th>NID</th>
                        <th>Gender</th>
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
 
   </section>  
   
 



   @endsection
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <!-- Datepicker -->

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

;
    function searchData() {
                const start_date = $('#start_date').val();
                const end_date = $('#end_date').val();

                $('#yajra-datatable').DataTable({
                  processing: true,
                  serverSide: true,
                    ajax: ({
                        url: "{{ route('admin.crm') }}",
                        type: "GET",
                        data: {
                            start_date: start_date,
                            end_date: end_date,
                        }
                    }),
                    displayLength: 10,
                    columns: [

                       {
                            data: 'id',
                            name: 'id'
                        },
                        {
                            data: 'agent',
                            name: 'agent'
                        },
                        {
                            data: 'phone',
                            name: 'phone'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'nid',
                            name: 'nid'
                        },
                        {
                            data: 'gender',
                            name: 'gender'
                        },
                        
                        {
                            data: 'action', 
                            name: 'action', 
                            orderable: true, 
                            searchable: true
                        },
                     
                    ]
                });
            }
        </script>







