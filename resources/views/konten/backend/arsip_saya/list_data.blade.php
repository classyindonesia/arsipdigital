<table class="table table-bordered table-hover animated fadeIn">
	<thead>
		<tr>
			<th  style='text-align:center;' width='5%'>No.</th>
			<th width='13%'>Kode Arsip</th>
			<th>Nama Arsip</th>
			<th width='15%'>Folder</th>
			<th  width='7%'>jml file</th>
			<th width='20%'>Tgl berkas diarsipkan</th>
			<th width='10%'>action</th>
		</tr>
	</thead>
	<tbody>

<?php $no= $arsip->firstItem(); ?>
@foreach($arsip as $list)
		<tr>
			<td style='text-align:center;'>{{ $no }}</td>
			<td>{{ $list->kode_arsip }}</td>
			<td>{{ $list->nama }}</td>
			<td> @if(count($list->mst_folder)>0) {{ $list->mst_folder->nama }} @else - @endif  </td>
			<td>000</td>
			<td>{{ Fungsi::date_to_tgl($list->tgl_arsip) }}</td>
			<td> 
				@include('konten.backend.arsip_saya.action')
			</td>
		</tr>
		<?php $no++; ?>
@endforeach		
	</tbody>
</table>


{!! $arsip->render() !!}