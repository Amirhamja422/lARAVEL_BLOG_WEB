
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
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#userCretaeModal">ADD ICON</button>

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
        <!-- Modal Start -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                      <form action="" method="POST" id="update_product_form">
                        <div class="form-group row">
                          <label for="user_id" class="col-sm-2 col-form-label">Title</label>
                          <div class="col-sm-10">
                            <input type="up_title_name" class="form-control" id="up_title_name" name="up_title_name" placeholder="Enter Title">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="title_name" class="col-sm-2 col-form-label">Icon</label>
                          <div class="col-sm-10">
                            <input type="icon" class="form-control" id="up_icon" name="up_con" placeholder="Enter Icon">
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
        </div><!-- Modal End -->
   </section>  
   
   
   <div class="modal fade" id="userCretaeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">ADD ICON</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form id="imgupload" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                  <label for="title_name" class="col-sm-2 col-form-label">Title</label>
                  <div class="col-sm-10">
                    <input type="title_name" class="form-control" id="title_name" name="title_name" placeholder="Enter Title">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                  <div class="col-sm-10">
                    <input type="file" autofocus name="file" id="file">
                    <span id="test"></span>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
      $.ajaxSetup({
        headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
      });
});

  $(document).on('click','.uaerCretaeData',function(){
    var form_data = new FormData();
    var file = $('#file').prop('files')[0];
		var title_name = $('#title_name').val();
    if(title_name ==''){
      document.getElementById('test').innerHTML='please select a file';

    }
    form_data.append('file', file);
		form_data.append('title_name', title_name);
    $.ajax({
      url:"{{route('admin.fileUpload')}}",
      	type: "POST",
				data:  form_data,
				contentType: false,
				cache: false,
				processData:false,
				success: function(data){
					console.log(data);
					$('#imgupload').trigger('reset');

				},         
			});
    });

</script>