@extends('layouts.app')
@section('content')
<div class="content-wrapper" style="text-align:center;">
    <form action="" method="POST" enctype="multipart/form-data">
		@csrf		
		<div class="form-group">
			<a class="btn btn-info" href="{{ route('user.export') }}">Export Excel File</a>
		</div> 
	</form>
</div>
@endsection