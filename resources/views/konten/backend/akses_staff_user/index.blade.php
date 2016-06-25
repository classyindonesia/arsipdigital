@extends('layouts.admin')

 

@section('title_header')	
	
	<a class="btn btn-info pull-right" target="__blank" href="{!! route('backend_staff_user.do_export') !!}">export</a> 

 <h1 class='title_header '>  <i class='fa fa-users'></i> Pengguna  </h1>
<hr>
@stop



@section('main_konten') 
  	
  	@include($base_view.'komponen.form_search')
  	<hr>
	@include($base_view.'list_data')
@endsection



@section('title')
	 Pengguna
@endsection