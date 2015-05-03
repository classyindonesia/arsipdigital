<button class="btn btn-primary pull-right" id='add_album'> add </button>

<script>
$('#add_album').click(function(){
	$('.modal-body').load('{!! route("backend_album_galery.add") !!}')
});
</script>