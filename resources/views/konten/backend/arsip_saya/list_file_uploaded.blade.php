
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th style='text-align:center;width:5%'>No.</th>
			<th>Nama</th>
			<th style='text-align:center;width:20%'>size</th>
			<th style='text-align:center;width:10%'>Action</th>
		</tr>
	</thead>
	<tbody>
<?php $no=1; ?>
@foreach($file as $list)
		<tr>
			<td align='center'>{{ $no }}</td>
			<td>{{ $list->nama_file_asli }}</td>
			<td align='center'>{{ Fungsi::size($list->size) }}</td>
			<td class='text-center'>@include('konten.backend.arsip_saya.action_file')</td>
		</tr>
		<?php $no++; ?>
@endforeach
 
	</tbody>
</table>