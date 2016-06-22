@extends('layouts.admin')



@section('title_header')
	@include($base_view.'files.komponen.tombol_back')
	@include($base_view.'files.komponen.tombol_download_all')
  <h1 class='title_header '>Daftar File Arsip - {!! $arsip->nama !!} </h1>
  <hr> 
@endsection

 


@section('main_konten')
	@include($base_view.'files.list_data') 
@endsection



@section('title')
Daftar File Arsip - {!! $arsip->nama !!}
@endsection