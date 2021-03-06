@extends('layouts.public')

@section('main_konten')


<a class='btn btn-primary pull-right' href="{!! URL::route('pengguna.index') !!}"> review pencarian</a>

<h2>Pencarian Data {!! Fungsi::setup_variable("config_nama_pencarian") !!}</h2>
<hr>

  

<table class="table table-bordered table-hover">
	<thead>
		<tr class='bg-olive'>
			<th width='20px'>No.</th>
			<th>Nama</th>
			<th width='200px'>Homebase</th>
			<th width='200px'>Status Ikatan</th>
			<th width='60px'>action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = $pengguna->firstItem(); ?>
@foreach($pengguna as $list)
<?php
$id = $hashids->encode(1000, 2000, $list->id);
?>
		<tr>
			<td class='text-center'>{{ $no }} </td>
			<td>{{ $list->nama }}</td>
			<td>@if(count($list->ref_homebase)>0) {{ $list->ref_homebase->nama }} @else - @endif</td>
			<td>@if(count($list->ref_status_ikatan)>0) {{ $list->ref_status_ikatan->nama }} @else - @endif </td>
			<td>
				<a class='label bg-yellow' href="{!! URL::route('pengguna.detail', $id) !!}">view detail</a>

			</td>
		</tr>
		<?php $no++; ?>
@endforeach
	</tbody>
</table>


{!! $pengguna->render() !!}


@endsection


