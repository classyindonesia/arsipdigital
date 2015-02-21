@extends('layouts.admin')



@section('title_header')
 <h1 class='title_header  animated fadeIn'>Dashboard  <small>control panel</small> </h1>
	<hr>
@stop






@section('main_konten')

<div class='col-md-6'>
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
	@include('konten.backend.home.staff.komponen.box_jml_berita')
	</div>	
</div>


 
 
<div class='col-md-6'>
	<h1 style='margin:1px;padding-left:0.5em;border-left:4px solid #ccc;'>Berita Terakhir</h1>
	<hr style='margin-top:2px;'>
	@include('konten.backend.home.staff.komponen.list_berita_terakhir')

</div>
    
@endsection



@section('title')
Admin Dashboard
@endsection

@section('script_tambahan')
<script src="/plugins/ckeditor/ckeditor.js"></script>
<script src="/plugins/ckeditor/adapters/jquery.js"></script>
@endsection