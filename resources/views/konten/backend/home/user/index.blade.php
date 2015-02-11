@extends('layouts.admin')



@section('title_header')
 <h1 class='title_header  animated fadeIn'>Dashboard  <small>control panel</small> </h1>
	<hr>
@stop






@section('main_konten')

 


{{-- env('EKSTENSI_GAMBAR') --}}

 	@include('konten.backend.home.user.komponen.box_jml_arsip')
  



 


    
@endsection



@section('title')
Admin Dashboard
@endsection