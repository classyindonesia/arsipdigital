@extends('layouts.admin')



@section('title_header')


<button class='btn btn-primary pull-right' id='add'> <i class='fa fa-plus-square'></i> create</button>
<script type="text/javascript">
$('#add').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ URL::route("my_archive.add") }}');
})
</script>



  <h1 class='title_header '>Arsip Saya </h1>
  	<hr>



@stop






@section('main_konten')


 @include('konten.backend.arsip_saya.komponen.nav_atas')
 <hr>
 
@include('konten.backend.arsip_saya.list_data')



    
@endsection



@section('title')
Daftar Arsip
@endsection