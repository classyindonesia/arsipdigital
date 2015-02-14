@extends('layouts.admin')

 

@section('title_header')	
 

 <h1 class='title_header '>Staff Akses  </h1>
<hr>
@stop



@section('main_konten') 
  @include('konten.backend.staff_akses.list_data')



@endsection



@section('title')
	 Staff Akses
@endsection