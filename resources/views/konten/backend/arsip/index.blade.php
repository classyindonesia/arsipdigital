@extends('layouts.admin')

 

@section('title_header')	
 

 <h1 class='title_header '>Daftar Arsip User  </h1>
<hr>
@stop



@section('main_konten') 
 	 <div class="col-md-6 col-md-offset-6"> 
	@include('konten.backend.arsip.form_search')
</div>

<div class='col-md-12'>
	<hr>
</div>


	@include('konten.backend.arsip.list_data')
@endsection



@section('title')
	 Daftar Arsip User
@endsection