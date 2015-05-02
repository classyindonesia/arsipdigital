<h1>Album Galery</h1>
<hr>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="50px" class="text-center">No</th>
			<th>Judul Album</th>
			<th>keterangan</th>
		</tr>
	</thead>
	<tbody>
	<?php $no=1; ?>
@foreach($album_galery as $list)
		<tr>
			<td>{!! $no !!}</td>
			<td>{!! $list->judul !!}</td>
			<td>{!! $list->keterangan !!}</td>
		</tr>
		<?php $no++; ?>
@endforeach		
	</tbody>
</table>


 