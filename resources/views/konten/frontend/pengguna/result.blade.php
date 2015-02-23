@extends('layouts.public')

@section('main_konten')


<a class='btn btn-primary pull-right' href="{!! URL::route('pengguna.index') !!}"> review pencarian</a>

<h2>Pencarian Data Pengguna</h2>
<hr>

  

<table class="table table-bordered table-hover">
	<thead>
		<tr class='bg-olive'>
			<th width='20px'>No.</th>
			<th>Nama</th>
			<th width='200px'>Email</th>
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
			<td class='text-align'>{{ $no }} </td>
			<td>{{ $list->nama }}</td>
			<td>{{ $list->mst_user->email }}</td>
			<td>
				<a class='label bg-yellow' href="{!! URL::route('pengguna.detail', $id) !!}">view detail</a>

			</td>
		</tr>
@endforeach
	</tbody>
</table>


@endsection


