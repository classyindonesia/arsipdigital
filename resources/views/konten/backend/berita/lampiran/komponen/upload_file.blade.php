<button class='btn btn-primary pull-right' id='upload_file'> 
	<i class='fa fa-cloud-upload'></i> Upload file
</button>


<script type="text/javascript">
	$('#upload_file').click(function(){
		$('#myModal').modal('show');
		$('.modal-body').load('{!! URL::route("lampiran_berita.upload_file") !!}')
	})
</script>