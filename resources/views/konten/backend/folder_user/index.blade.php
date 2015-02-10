@extends('layouts.admin')



@section('title_header')
 <h1 class='title_header  animated fadeIn'>Daftar Folder </h1>
	<hr>
@stop






@section('main_konten')

  @include('konten.backend.arsip_saya.komponen.nav_atas')
 <hr>
 



  @include('konten.backend.folder_user.list_data')


    
@endsection



@section('title')
Admin Dashboard
@endsection