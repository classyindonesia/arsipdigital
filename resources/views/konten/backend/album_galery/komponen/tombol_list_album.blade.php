<button  id='list_album' class="btn btn-primary pull-right"> <i class='fa fa-th-list'></i> list album</button>

<script>
$('#list_album').click(function(){
	$('.modal-body').load('{!! route("backend_album_galery.index") !!}')
});
</script>
