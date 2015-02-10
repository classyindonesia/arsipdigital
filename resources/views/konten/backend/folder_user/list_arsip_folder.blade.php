<table class="table table-bordered table-hover animated fadeIn">
	<thead>
		<tr>
			<th  style='text-align:center;' width='5%'>No.</th>
			<th width='20%'>Kode Arsip</th>
			<th>Nama Arsip</th>
 			<th  width='12%'>jml file</th>
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
 			<td>000</td>
 			<td> 
				@include('konten.backend.arsip_saya.action')
			</td>
		</tr>
		<?php $no++; ?>
@endforeach		
	</tbody>
</table>


{!! $arsip->render() !!}