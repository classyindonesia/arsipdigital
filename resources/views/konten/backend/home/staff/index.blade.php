@extends('layouts.admin')



@section('title_header')
 <h1 class='title_header  animated fadeIn'>Dashboard  <small>control panel</small> </h1>
	<hr>
@stop






@section('main_konten')

<div class='col-md-8'>
	<div class='col-md-6'>
	@include('konten.backend.home.staff.komponen.box_jml_arsip')
	</div>

	<div class='col-md-6'>
	@include('konten.backend.home.staff.komponen.box_jml_file')
	</div>

	<div class='col-md-6'>
	@include('konten.backend.home.staff.komponen.box_jml_user')
	</div>

	<div class='col-md-6'>
	@include('konten.backend.home.staff.komponen.box_jml_size_file')
	</div>

</div>
 
    
@endsection



@section('title')
Admin Dashboard
@endsection

@section('script_tambahan')
<script src="/plugins/ckeditor/ckeditor.js"></script>
<script src="/plugins/ckeditor/adapters/jquery.js"></script>
@endsection