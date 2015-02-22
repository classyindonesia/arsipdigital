@extends('layouts.admin')

 

@section('title_header')	
 @include('konten.backend.berita.lampiran.komponen.upload_file')

 <h1 class='title_header '>Lampiran Berita  </h1>
<hr>
@stop



@section('main_konten') 

@include('konten.backend.berita.komponen.nav_atas')
<hr>
@include('konten.backend.berita.lampiran.list_data')


@endsection



@section('title')
	 Lampiran Berita
@endsection