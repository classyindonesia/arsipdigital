<button id='kategori' class='btn btn-primary pull-right'> <i class='fa fa-th-list'></i> kategori weblink</button>

<script type="text/javascript">
$('#kategori').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{!! route("admin_weblink.kategori") !!}')
})
</script>