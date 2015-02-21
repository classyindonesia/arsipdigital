@extends('layouts.admin')



@section('title_header')

   <h1 class='title_header '>Upload File Arsip - {{ $arsip->nama }}</h1>
 
 

<ol class="breadcrumb">
  <li><a href="{!! URL::route('arsip_user.index') !!}">Home</a></li>
   <li> <a href="{!! URL::route('arsip_user.list_arsip', Request::segment(3)) !!}">{{ $user->nama }} </a></li>
  <li class="active"> {{ $arsip->nama }}</li>
</ol>


@stop


@section('main_konten')



 

<hr>
<h3>Daftar File Tersimpan</h3>

<div class='col-md-9' id='list_file_raw'>
 	@include('konten.backend.arsip_user.list_arsip.list_file_uploaded')
</div>
<div class='col-md-3'>
	@include('konten.backend.arsip_saya.list_file_info')

</div>



@endsection



@section('title')
Upload File Arsip
@endsection


@section('script_tambahan')
    <script src="/js/plugins/blueimp/vendor/jquery.ui.widget.js"></script>
    <script src="/js/plugins/blueimp/jquery.iframe-transport.js"></script>
    <script src="/js/plugins/blueimp/jquery.fileupload.js"></script>
    <script src="/js/plugins/blueimp/jquery.fileupload-process.js"></script>
    <script src="/js/plugins/blueimp/jquery.fileupload-validate.js"></script>
@endsection