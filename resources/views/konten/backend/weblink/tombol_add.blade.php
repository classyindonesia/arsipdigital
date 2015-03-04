<button style='margin-right:1em;' id='add' class='btn btn-primary pull-right'> <i class='fa fa-plus-square'></i> tambah link</button>

<script type="text/javascript">
$('#add').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{!! route("admin_weblink.add") !!}')
})
</script>