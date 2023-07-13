
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
            <form action="" method="" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                    <div class="custom-file text-left">
                        <input type="file" name="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary px-3" onclick="importData()"><i class="bi bi-search mr-1'"></i>import data</button>
            </form>

          
        
          </div>
      </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
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


function importData(){
    
 }
</script>







