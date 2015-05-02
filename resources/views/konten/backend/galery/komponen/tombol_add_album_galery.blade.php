<button class="btn btn-primary pull-right" id='add_album'> tambahkan album galery </button>

<script>
$('#add_album').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{!! route("backend_album_galery.add") !!}')
});
</script>