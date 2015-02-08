@extends('layouts.admin')

 

@section('title_header')	

<button class='btn btn-primary pull-right' id='add'> <i class='fa fa-plus-square'></i> create</button>
<script type="text/javascript">
$('#add').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ URL::route("rak.add") }}');
})
</script>



 <h1 class='title_header '>Daftar Rak Arsip  </h1>
<hr>
@stop



@section('main_konten') 
	@include('konten.backend.rak.list_data')

@endsection



@section('title')
	Daftar Rak Arsip
@endsection