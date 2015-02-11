<h3>Daftar folder dalam rak :  {{ $rak->nama }}</h3>
 <table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width='5%'>No.</th>
			<th>Nama</th>
			<th width='15%'>jml arsip</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
@foreach($rak->mst_folder as $list)
		<tr>
			<td>{{ $no }}</td>
			<td>{{ $list->nama }}</td>
			<td class='text-center'> {{ count($list->mst_arsip) }} </td>
		</tr>
@endforeach
	</tbody>
</table>