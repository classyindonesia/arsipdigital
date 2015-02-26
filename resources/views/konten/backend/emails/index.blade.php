@extends('layouts.admin')

 

@section('title_header')	
	
 

 <h1 class='title_header '>Kirim Email  </h1>
<hr>
@stop



@section('main_konten') 

	@include('konten.backend.emails.komponen.nav_atas')
	@include('konten.backend.emails.list_data')
	@include('konten.backend.emails.add_antrian')

@endsection



@section('title')
	 Kirim Email
@endsection


@section('style_tambahan')
	  <link media="all" type="text/css" rel="stylesheet" href="/plugins/bootstrap-select/css/bootstrap-select.min.css">
@endsection


@section('script_tambahan')
 <script src="/plugins/bootstrap-select/js/bootstrap-select.min.js"></script>
@endsection