<i style='cursor:pointer;' id='edit_weblink{!! $list->id !!}'  class='fa fa-pencil-square'></i> 

<script type="text/javascript">
$('#edit_weblink{!! $list->id !!}').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{!! route("admin_weblink.edit", [$list->id]) !!}')
})
</script>
|| 