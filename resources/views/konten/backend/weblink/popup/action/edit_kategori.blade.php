<i style='cursor:pointer;' id='edit_kategori{!! $list->id !!}'  class='fa fa-pencil-square'></i> 

<script type="text/javascript">
$('#edit_kategori{!! $list->id !!}').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{!! route("admin_weblink.edit_kategori", [$list->id]) !!}')
})
</script>
