@extends('layouts.admin')

 

@section('title_header')	
 

 <h1 class='title_header '>Daftar Arsip User - {{ $user->data_user->nama }}  </h1>


<ol class="breadcrumb">
  <li><a href="{!! URL::route('arsip_user.index') !!}">Home</a></li>
   <li class="active">{{ $user->data_user->nama }}</li>
</ol>


@stop



@section('main_konten') 
 		<div class="col-md-6 col-md-offset-6">
 			@include('konten.backend.arsip_saya.form_search')
 		</div>
		 
 
	@include('konten.backend.arsip_user.list_arsip.list_data')


@endsection



@section('title')
	Daftar Arsip User
@endsection