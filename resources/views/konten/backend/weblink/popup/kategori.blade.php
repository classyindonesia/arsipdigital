<button class='btn btn-primary pull-right' id='tambah_kategori'> <i class='fa fa-plus'></i> tambah kategori</button>


<script type="text/javascript">
$('#tambah_kategori').click(function(){
	$('.modal-body').load('{!! route("admin_weblink.add_kategori") !!}')
})
</script>


<h3>Kategori Weblink</h3>
<hr style='margin:2px;'>

<table class='table table-bordered'>
	<tr>
		<td class='text-center' width='5%'>No.</td>
		<td>Nama</td>
		<td class='text-center' width='5%'>Action</td>
	</tr>

<?php $no=1; ?>
@foreach($kategori as $list)
	<tr>
		<td class='text-center'>{!! $no !!}</td>
		<td>{!! $list->nama !!}</td>
		<td class='text-center' >
			@include('konten.backend.weblink.popup.action.edit_kategori')
			|| 
			@include('konten.backend.weblink.popup.action.del_kategori')

		</td>
	</tr>
<?php $no++; ?>
@endforeach
</table>