@extends('layouts.admin')

 

@section('title_header')	

@include($base_view.'komponen.tombol_add_album_galery')
@include($base_view.'komponen.tombol_upload_foto')
 <h1 class='title_header '>Galery  </h1>
<hr>
@stop



@section('main_konten') 

	@include($base_view.'list_data')


@endsection



@section('title')
	 Galery
@endsection