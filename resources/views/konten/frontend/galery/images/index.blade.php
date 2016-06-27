@extends('layouts.public')




@section('main_konten')
	@include($base_view.'images.komponen.tombol_back')
	@include($base_view.'images.komponen.tombol_lock')
	<h1>Images @ album : {!! $album->judul !!}</h1>
	<hr>

	@if( session('album_galery_'.$album->id) == null && $album->mst_password_media_id != null)
		@include($base_view.'images.lock_album')
	@else
		@include($base_view.'images.list_data')
	@endif

 @endsection