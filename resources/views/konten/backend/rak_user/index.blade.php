@extends('layouts.admin')



@section('title_header')
 <h1 class='title_header  animated fadeIn'> Daftar Rak Arsip   </h1>
	<hr>
@stop






@section('main_konten')

  @include('konten.backend.arsip_saya.komponen.nav_atas')
 <hr>



<table class="table table-bordered table-hover animated fadeIn">
	<thead>
		<tr>
			<th width='5%' class='text-center'>No.</th>
			<th>Nama Rak</th>
			<th>Jumlah Folder/Map</th>
			<th width='5%' class='text-center'>Action</th>
		</tr>
	</thead>
	<tbody>

		<tr>
			<td class='text-center'></td>
			<td></td>
			<td></td>
			<td class='text-center'></td>
		</tr>


	</tbody>
</table>








    
@endsection



@section('title')
 Daftar Rak Arsip
@endsection