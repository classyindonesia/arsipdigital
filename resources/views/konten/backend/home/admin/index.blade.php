@extends('layouts.admin')



@section('title_header')
 <h1 class='title_header  animated fadeIn'>Dashboard  <small>control panel</small> </h1>
	<hr>
@stop






@section('main_konten')


<div class='col-md-6' >
	<div class="col-lg-6 col-xs-6 animated fadeIn">
		@include('konten.backend.home.admin.komponen.box_user')
	</div>
	
	<div class="col-lg-6 col-xs-6 animated fadeIn">
		@include('konten.backend.home.admin.komponen.box_jml_rak_arsip')
	</div>
	<div class="col-lg-6 col-xs-6 animated fadeIn">
		@include('konten.backend.home.admin.komponen.box_jml_folder_arsip')
	</div>
	<div class="col-lg-6 col-xs-6 animated fadeIn">
		@include('konten.backend.home.admin.komponen.box_jml_arsip')
	</div>
	<div class="col-lg-6 col-xs-6 animated fadeIn">
		@include('konten.backend.home.admin.komponen.box_jml_file_arsip')
	</div>
	<div class="col-lg-6 col-xs-6 animated fadeIn">
		@include('konten.backend.home.admin.komponen.box_total_size_file')
	 </div>
</div>

	 <div class='col-md-6' >

		@include('konten.backend.home.admin.komponen.statistik_folder')


</div>
    
@endsection



@section('title')
Admin Dashboard
@endsection