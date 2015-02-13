@extends('layouts.admin')



@section('title_header')
 <h1 class='title_header  animated fadeIn'>Dashboard  <small>control panel</small> </h1>
	<hr>
@stop






@section('main_konten')



	@include('konten.backend.home.admin.komponen.box_user')

	@include('konten.backend.home.admin.komponen.box_jml_rak_arsip')

	@include('konten.backend.home.admin.komponen.box_jml_folder_arsip')


	@include('konten.backend.home.admin.komponen.box_jml_arsip')
	@include('konten.backend.home.admin.komponen.box_jml_file_arsip')
	@include('konten.backend.home.admin.komponen.box_total_size_file')
	 
	 







    
@endsection



@section('title')
Admin Dashboard
@endsection