<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width='5%' class='text-center'>No.</th>
			<th>Nama</th>
			<th>Email</th>
			<th width='10%' class='text-center'>jml Arsip</th>
			<th width='10%' class='text-center'>action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = $arsip_user->firstItem(); ?>
@foreach($arsip_user as $list)
		<tr>
			<td width='5%' class='text-center'>{{ $no }}</td>
			<td> {!! $list->mst_user->data_user->nama !!} </td>
			<td width='20%'  > {!! $list->mst_user->email !!} </td>
			<td class='text-center'>{{ count($list->mst_arsip) }}</td>
			<td class='text-center'>
				@include('konten.backend.arsip_user.action')
			</td>
		</tr>
		<?php $no++; ?>
@endforeach

	</tbody>
</table>

{!! $arsip_user->render() !!}