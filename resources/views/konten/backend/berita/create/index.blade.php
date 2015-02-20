@extends('layouts.admin')

 

@section('title_header')	

<a class='btn btn-primary pull-right' href="{!! URL::route('admin_berita.index') !!}"> <i class='fa fa-arrow-left'></i> back</a>

 <h1 class='title_header '>Create Berita  </h1>
<hr>
@stop



@section('main_konten') 
	@if(Request::segment(3) != NULL)
		@include('konten.backend.berita.create.form_edit')
	@else
		@include('konten.backend.berita.create.form_create')
	@endif

@endsection



@section('title')
	 Create Berita
@endsection

@section('script_tambahan')
<script src="/plugins/ckeditor/ckeditor.js"></script>
<script src="/plugins/ckeditor/adapters/jquery.js"></script>
@endsection