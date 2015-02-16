<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width='5%' class='text-center'>No.</th>
			<th>Kode Arsip</th>
			<th>Nama Arsip</th>
			<th>Pemilik Arsip</th>
			<th>tgl arsip</th>
			<th width='5%' class='text-center'>action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = $arsip_user->firstItem(); ?>
@foreach($arsip_user as $list)
		<tr>
			<td rowspan='{{ count($list->mst_arsip)+1 }}'>{{ $no }}</td>
			@foreach($list->mst_arsip as $list2)
				<tr>
					<td>{{ $list2->kode_arsip }}</td>
					<td>{{ $list2->nama }}</td>
					<td>-</td>
					<td>-</td>
					<td></td>
				</tr>
			@endforeach
		</tr>
		<?php $no++; ?>
@endforeach

	</tbody>
</table>