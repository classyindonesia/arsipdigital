<button class='btn btn-primary pull-right' id='tambah_kategori'>tambah kategori</button>


<h3>Kategori Weblink</h3>
<hr style='margin:2px;'>

<table class='table table-bordered'>
	<tr>
		<td class='text-center' width='5%'>No.</td>
		<td>Nama</td>
		<td>Action</td>
	</tr>

<?php $no=1; ?>
@foreach($kategori as $list)
	<tr>
		<td class='text-center'>{!! $no !!}</td>
		<td>{!! $list->nama !!}</td>
		<td>-</td>
	</tr>
<?php $no++; ?>
@endforeach
</table>