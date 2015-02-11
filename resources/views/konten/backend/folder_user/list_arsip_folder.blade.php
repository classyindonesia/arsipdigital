<table class="table table-bordered table-hover animated fadeIn">
	<thead>
		<tr>
			<th  style='text-align:center;' width='5%'>No.</th>
			<th width='20%'>Kode Arsip</th>
			<th>Nama Arsip</th>
 			<th  class="text-center" width='12%'>jml file</th>
 			<th align='center' width='14%'>action</th>
		</tr>
	</thead>
	<tbody>

<?php $no= $arsip->firstItem(); ?>
@foreach($arsip as $list)
		<tr>
			<td style='text-align:center;'>{{ $no }}</td>
			<td>{{ $list->kode_arsip }}</td>
			<td>{{ $list->nama }}</td>
 			<td  class="text-center">  
 				{{ count($list->mst_file) }} 
 				 
 			</td>
 			<td align='center'> 
				@include('konten.backend.arsip_saya.action')
			</td>
		</tr>
		<?php $no++; ?>
@endforeach		
	</tbody>
</table>


{!! $arsip->render() !!}