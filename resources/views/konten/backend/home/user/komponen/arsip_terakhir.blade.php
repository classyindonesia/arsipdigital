
<table class="table table-bordered table-hover">
	<thead>
		<tr class='bg-olive'>
			<th colspan='4'><h3 style='margin:2px;'>Arsip terakhir</h3></th>
		</tr>
		<tr class='bg-olive'>
			<th>Arsip</th>
			<th class='text-center' width='10%'>jml file</th>
			<th width='170px'>created at</th>
			<th width='150px' class='text-center'>Action</th>
		</tr>
	</thead>
	<tbody>
 
@foreach($arsip as $list)
		<tr>
			<td>{{{ $list->nama }}}</td>
			<td class='text-center'>{{ count($list->mst_file) }}</td>
			<td>
				<span data-toggle='tooltip' title="{!! Fungsi::date_to_tgl(date('Y-m-d', strtotime($list->created_at))) !!}">
					{!! $list->c__waktu_pembuatan !!}									
				</span>
			</td>
			<td class='text-center'>
				@include('konten.backend.arsip_saya.action')
			</td>
		</tr>
@endforeach
	</tbody>
</table>
