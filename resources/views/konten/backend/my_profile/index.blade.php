@extends('layouts.admin')



@section('title_header')
  <h1 class='title_header  '>My Profile  </h1>
	<hr>
@stop






@section('main_konten')
<?php
$data_user = Auth::user()->data_user;
 ?>
 
 

	<div class='col-md-6 animated fadeIn'>
		@include('konten.backend.my_profile.form_change_avatar')
		@include('konten.backend.my_profile.konten_kiri')
	</div>

	<div class='col-md-6 animated fadeIn'>
		<div style='height:100px'>
			<button   id='simpan' class='btn btn-primary pull-right'><i class='fa fa-floppy-o'></i> simpan</button>
		</div>
 <hr>
		@include('konten.backend.my_profile.konten_kanan')
	</div>

	@include('konten.backend.my_profile.submit_script')

@endsection



@section('title')
My Profile
@endsection



@section('style_tambahan')

<style type="text/css">
.tabel_form_data td{
	padding-top: 1em;
	padding-bottom: 3px;
}
 
</style>


@endsection