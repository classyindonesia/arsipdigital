@extends('layouts.admin')



@section('title_header')
<a class='btn btn-primary' href="{!! URL::route('my_archive.index') !!}">
	<i class='fa fa-arrow-left'></i> back

</a>
   <h1 class='title_header pull-right '>Upload File Arsip - {{ $arsip->nama }}</h1>
  	<hr>
 
@stop


@section('main_konten')
	@include('konten.backend.arsip_saya.form_upload_file')

 

<hr>
<h3>Daftar File Tersimpan</h3>

<div class='col-md-9' id='list_file_raw'>
	@include('konten.backend.arsip_saya.list_file_uploaded')
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