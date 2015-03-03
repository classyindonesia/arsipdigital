@extends('layouts.admin')

 

@section('title_header')	
 
@include('konten.backend.weblink.tombol_kategori')

 <h1 class='title_header '>Weblink  </h1>
<hr>
@stop



@section('main_konten')  



@include('konten.backend.weblink.list_data')



@endsection



@section('title')
	 Daftar Weblink
@endsection