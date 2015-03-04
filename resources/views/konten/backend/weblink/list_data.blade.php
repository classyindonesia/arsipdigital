<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class='text-center' width='5%'>No</th>
			<th>Nama</th>
			<th>Kategori link</th>
			<th>URL</th>
			<th class='text-center' width='5%'>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = $weblink->firstItem(); ?>
@foreach($weblink as $list)
		<tr>
			<td class='text-center'>{{ $no }}</td>
			<td>{{ $list->nama }}</td>
			<td>@if(count($list->mst_kategori_weblink)>0) {!! $list->mst_kategori_weblink->nama !!} @else - @endif</td>
			<td> {{ $list->url }} </td>
			<td>
				@include('konten.backend.weblink.action.edit')
				@include('konten.backend.weblink.action.del')

			</td>
		</tr>
		<?php $no++; ?>
@endforeach
	</tbody>
</table>

{!! $weblink->render() !!}