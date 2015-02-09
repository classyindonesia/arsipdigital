@extends('layouts.admin')



@section('title_header')
 <h1 class='title_header  animated fadeIn'>My Profile  </h1>
	<hr>
@stop






@section('main_konten')
<?php
$data_user = Auth::user()->data_user;
 ?>


<div class='col-md-12'>
	<button id='simpan' class='btn btn-primary pull-right'><i class='fa fa-floppy-o'></i> simpan</button>
</div>
	@include('konten.backend.my_profile.submit_script')


	<div class='col-md-6 animated fadeIn'>
		@include('konten.backend.my_profile.konten_kiri')
	</div>

	<div class='col-md-6 animated fadeIn'>
		@include('konten.backend.my_profile.konten_kanan')
	</div>


@endsection



@section('title')
My Profile
@endsection



@section('script_tambahan')
	{!! HTML::script('plugins/bootstrap-select/js/bootstrap-select.min.js') !!}
@endsection
@section('style_tambahan')
	{!! HTML::style('plugins/bootstrap-select/css/bootstrap-select.min.css') !!}
@endsection