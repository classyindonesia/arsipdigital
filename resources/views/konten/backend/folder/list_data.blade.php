

<table class="table table-bordered table-hover animated fadeIn">
	<thead>
		<tr>
			<th width='5%' style='text-align:center;'>No.</th>
			<th>Nama Folder</th>
			<th width='15%'>Rak</th>
			<th width='7%'>jml folder</th>
			<th width='5%'>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = $folder->firstItem(); ?>
@foreach($folder as $list)
		<tr>
			<td align='center'> {{ $no }}</td>
			<td>{{ $list->nama }}</td>
			<td> @if(count($list->mst_rak)>0) {{ $list->mst_rak->nama }} @else - @endif</td>
			<td style='text-align:center;'> 
				<a class='label label-success' href="{!! URL::route('folders.child', $list->id) !!}"> {{ count($list->child) }} </a>
				</td>
			<td align='center'>
				@include('konten.backend.folder.action')
			</td>
		</tr>
		<?php $no++; ?>
@endforeach		
	</tbody>
</table>

{!! $folder->render() !!}