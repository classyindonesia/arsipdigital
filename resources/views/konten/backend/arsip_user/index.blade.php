@extends('layouts.admin')

 

@section('title_header')	
 
 <h1 class='title_header '>Daftar Arsip User  </h1>
<hr>
@stop



@section('main_konten') 
@include('konten.backend.arsip_user.list_data')

@endsection



@section('title')
	Daftar Arsip User
@endsection