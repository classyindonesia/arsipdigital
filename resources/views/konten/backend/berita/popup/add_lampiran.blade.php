<h3>Lampiran File Berita</h3>
<hr style='margin:2px'>


<table class='table'>
	<tr>
		<td width='5%'>No.</td>
		<td>Nama Lampiran</td>
		<td>Action</td>
	</tr>

<?php $no=1; ?>
@foreach($lampiran as $list)
	<tr>
		<td>{{ $no }}</td>
		<td>-</td>
		<td>-</td>
	</tr>
<?php $no++; ?>
@endforeach
</table>