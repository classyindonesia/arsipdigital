@include('konten.backend.foto_slide.popup.jabatan.tombol_add')

<h2>Daftar Jabatan</h2>
<hr style='margin:2px'>


<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width='5%'>No.</th>
			<th>Nama Jabatan</th>
			<th width='5%'>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
		@foreach($jabatan as $list)
		<tr>
			<td class='text-center'>{!! $no !!}</td>
			<td>{!! $list->nama !!}</td>
			<td>
				@include('konten.backend.foto_slide.popup.jabatan.action_edit')
				||
				@include('konten.backend.foto_slide.popup.jabatan.action_del')
			</td>
		</tr>
		<?php $no++; ?>
		@endforeach
	</tbody>
</table>