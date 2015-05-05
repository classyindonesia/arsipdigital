@extends('layouts.admin')



@section('title_header')
	@include($base_view.'komponen.tombol_add')

 <h1 class='title_header '>Menu   </h1>
	<hr>
@stop

 

@section('main_konten')

	@include($base_view.'list_data')
 

    
@endsection



@section('title')
Admin Menu
@endsection


 