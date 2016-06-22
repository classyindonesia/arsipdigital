<table class="table table-bordered table-hover animated fadeIn">
	<thead>
		<tr>
			<th  style='text-align:center;' width='5%'>No.</th>
			<th width='13%'>Kode Arsip</th>
			<th>Nama Arsip</th>
			<th width='15%'>Folder</th>
			<th  style='text-align:center;' width='7%'>jml file</th>
			<th width='20%'>Tgl berkas diarsipkan</th>
			<th width='150px' class="text-center">action</th>
		</tr>
	</thead>
	<tbody>

<?php $no= $arsip->firstItem(); ?>
@foreach($arsip as $list)
		<tr>
			<td style='text-align:center;'>{{ $no }}</td>
			<td>{{ $list->kode_arsip }}</td>
			<td>
				<a href="{!! route('my_archive.files', $list->id) !!}">
					{{ $list->nama }}
				</a>
			</td>
			<td>
				@if(count($list->mst_folder)>0) 
				<a href="{!! URL::route('list_folder.list_arsip', $list->mst_folder->id) !!}">
					{{ $list->mst_folder->nama }} 
				</a>
				@else
					-
				@endif
			</td>
			<td style='text-align:center;'>{{ count($list->mst_file) }}</td>
			<td>{{ Fungsi::date_to_tgl($list->tgl_arsip) }}</td>
			<td class="text-center"> 
				@include('konten.backend.arsip_saya.action')
			</td>
		</tr>
		<?php $no++; ?>
@endforeach		
	</tbody>
</table>


{!! $arsip->render() !!}