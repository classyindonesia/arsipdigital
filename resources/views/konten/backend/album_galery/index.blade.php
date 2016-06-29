@include($base_view.'komponen.tombol_add_album')

<h1>Album Galery</h1>
<hr>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="50px" class="text-center">No</th>
			<th>Judul Album</th>
			<th>Jml File</th>
			<th>keterangan</th>
			<th width="50px">status</th>
			<th width="100px" class="text-center">action</th>
		</tr>
	</thead>
	<tbody>
	<?php $no=1; ?>
@foreach($album_galery as $list)
		<tr>
			<td>{!! $no !!}</td>
			<td>{!! $list->judul !!}</td>
			<td>{!! count($list->mst_galery) !!}</td>
			<td>{!! $list->keterangan !!}</td>
			<td class="text-center">
				@if( $list->mst_password_media_id != null )
					<i class='fa fa-lock text-danger'></i>
				@else
					<i class='fa fa-check text-success'></i>
				@endif
			</td>
			<td class="text-center"> @include($base_view.'action') </td>
		</tr>
		<?php $no++; ?>
@endforeach		
	</tbody>
</table>


 