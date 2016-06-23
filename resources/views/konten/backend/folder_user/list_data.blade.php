<?php 
$parent_id = Request::segment(4);
$folder_parent = \App\Models\Mst\Folder::whereParentId($parent_id)->first();
?>
@if(count($folder_parent)>0) 

<a href="
	@if($folder_parent->parent->parent_id == 0)
		{!! URL::route('list_folder.index') !!}	
	@else
		{!! URL::route('list_folder.child', $folder_parent->parent->id) !!}	
	@endif
">
	  kembali ke {{ $folder_parent->parent->nama }}
</a>
@endif

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th style='text-align:center;' width='5%'>No.</th>
			<th>Nama Folder</th>
			<th>Rak</th>
			<th style='text-align:center;' width='5%'>folder</th>
			<th  style='text-align:center;' width='5%'>Arsip</th>
			<th style='text-align:center;' width='10%'>action</th>
		</tr>
	</thead>
	<tbody>
<?php $no = $folder->firstItem(); ?>
@foreach($folder as $list)
		<tr>
			<td style='text-align:center;'>{{ $no }}</td>
			<td>{{ $list->nama }}</td>
			<td> @if(count($list->mst_rak)>0) {{ $list->mst_rak->nama }} @else - @endif </td>
			<td style='text-align:center;'>

				<a class='label label-info' href="{!! URL::route('list_folder.child', $list->id) !!}">{{ count($list->child) }}</a>

				</td>

			<td style='text-align:center;'>
				 
					{{ count($list->mst_arsip) }}
				 
			</td>
			<td style='text-align:center;'>
				@include('konten.backend.folder_user.action.view_arsip')

			</td>
		</tr>
		<?php $no++; ?>
@endforeach

	</tbody>
</table>