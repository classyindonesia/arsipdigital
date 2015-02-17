<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class='text-center' width='5%'>No.</th>
			<th>Kode Arsip</th>
			<th>Nama Arsip</th>
			<th class='text-center' width='7%'>Jml File</th>
			<th class='text-center' width='15%'>tgl Arsip</th>
			<th class='text-center' width='10%'>action</th>
		</tr>
	</thead>
	<tbody>
<?php $no = $arsip->firstItem(); ?>
@foreach($arsip as $list)
		<tr>
			<td class='text-center'>{{ $no }}</td>
			<td> {{ $list->kode_arsip }} </td>
			<td> {{ $list->nama }} </td>
			<td class='text-center'>{{ count($list->mst_file) }}</td>
			<td>{{ Fungsi::date_to_tgl($list->tgl_arsip) }}</td>
			<td  class='text-center'>
				@include('konten.backend.arsip_user.list_arsip.action')	
 
			</td>
		</tr>
		<?php $no++; ?>
@endforeach

	</tbody>
</table>

{!! $arsip->render() !!}