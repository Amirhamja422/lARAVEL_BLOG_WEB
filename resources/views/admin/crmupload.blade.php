
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
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#userCretaeModal">ADD CSV</button>

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
                        <th>ID</th>
                        <th>Title</th>
                        <th>Icon</th>
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
   
   
   <div class="modal fade" id="userCretaeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">CSV FILE</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form id="formDataValu" class="form-horizontal" method="post">
                @csrf

                <div class="form-group row">
                  <label for="csv_title" class="col-sm-2 col-form-label">CSV Title</label>
                  <div class="col-sm-10">
                    <input type="csv_title" class="form-control" id="csv_title" name="csv_title" placeholder="Enter Csv Title">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="icon" class="col-sm-2 col-form-label">CSV File</label>
                  <div class="col-sm-10">
                    <input type="file" name="file" id="file">
                  </div>
                </div>
              </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary csvUploadData">Save</button>
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



$(document).on('click','.csvUploadData',function(){
           let csv_title =$('#csv_title').val();
           var form_data = new FormData();
           var file_data = $('#file').prop('files')[0];
           form_data.append('file', file_data);
           form_data.append('csv_title', csv_title);
           $.ajax({
              url:"{{route('admin.csvupload')}}",
              type: "POST",
              data:  form_data,
              contentType: false,
              cache: false,
              processData:false,
              success: function(data){
              console.log(data);
					    //  $('#formDataValu').trigger('reset');
			         	},         
			         });
            });


//   $(function () {
//     var table = $('#yajra-datatable').DataTable({
//         processing: true,
//         serverSide: true,
//         ajax: "{{ route('profile.view') }}",
//         columns: [
//             {data: 'DT_RowIndex', name: 'DT_RowIndex'},
//             {data: 'user_id', name: 'user_id'},
//             {data: 'user', name: 'user'},
//             {data: 'pass', name: 'pass'},
//             {data: 'full_name', name: 'full_name'},
//             {data: 'user_group', name: 'user_group'},
//             {data: 'phone_login', name: 'phone_login'},
//             {data: 'phone_pass', name: 'phone_pass'},
//             {
//                 data: 'action', 
//                 name: 'action', 
//                 orderable: true, 
//                 searchable: true
//             },
//         ]
//       });
    
//     });



</script>