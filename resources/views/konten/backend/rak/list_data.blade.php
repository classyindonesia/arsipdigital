

<table class="table table-bordered table-hover animated fadeIn">
	<thead>
		<tr>
			<th width='5%' style='text-align:center;'>No.</th>
			<th>Nama Rak</th>
			<th width='15%'>Kode Rak</th>
			<th width='5%'>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = $rak->currentPage(); ?>
@foreach($rak as $list)
		<tr>
			<td align='center'> {{ $no }}</td>
			<td>{{ $list->nama }}</td>
			<td>{{ $list->kode_rak }}</td>
			<td align='center'>
				@include('konten.backend.rak.action')
			</td>
		</tr>
		<?php $no++; ?>
@endforeach		
	</tbody>
</table>

{!! $rak->render() !!}