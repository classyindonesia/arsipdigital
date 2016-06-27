@extends('layouts.admin')

 

@section('title_header')	
@include($base_view.'komponen.tombol_add')
 <h1 class='title_header '>Filter Domain Registrasi  </h1>
<hr>
@stop



@section('main_konten') 
	<div class="col-md-6">
	 	@include($base_view.'list_data')		
	</div>
@endsection



@section('title')
	Filter Domain Registrasi
@endsection