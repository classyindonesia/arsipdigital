@extends('layouts.admin')



@section('title_header')
 

  <h1 class='title_header '>List Arsip - {{ $folder->nama }} </h1>
  	<hr>



@stop






@section('main_konten')


 @include('konten.backend.arsip_saya.komponen.nav_atas')
 <hr>

<ol class="breadcrumb">
  <li><a href="{!! URL::route('list_folder.index') !!}">Folder</a></li>
  <li class="active">[{{ $folder->nama }}]</li>
  </ol>

 
@include('konten.backend.arsip_saya.list_data')



    
@endsection



@section('title')
Daftar Arsip
@endsection