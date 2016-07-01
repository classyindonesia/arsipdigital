@extends('layouts.public')

@section('main_konten')
 
      <div class='col-md-8  animated fadeIn' style='padding-top:3px;'>
		@include('konten.frontend.auth.login.list_berita')
      </div> 

	<div class='col-md-4'>
		<div class="row">
			<div class="col-md-10 col-md-offset-2">
		 		@if(Auth::guest())
					@include('konten.frontend.auth.login.form_login')
				@endif
				@include('konten.frontend.auth.login.foto_slide')
				@include('konten.frontend.auth.login.list_file') 
			</div>
		</div>
	</div>
 

 
@endsection


@section('custom_meta_tag')
	<meta name="description" content="{!! env('DESKRIPSI_APP') !!}">
	<meta name="keywords" content="{!! env('KEYWORD_APP') !!}">
@endsection
