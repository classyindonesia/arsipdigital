@extends('layouts.admin')

 

@section('title_header')
 

@include('konten.backend.users.tombol.add')
@include('konten.backend.users.tombol.import')
	
 <h1 class='title_header '>Daftar Pengguna  </h1>
	<hr>
@stop



@section('main_konten') 

 

	@include('konten.backend.users.list_user')
@endsection



@section('title')
Admin Dashboard
@endsection