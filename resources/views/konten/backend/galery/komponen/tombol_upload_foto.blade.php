
<button class='btn btn-primary pull-right' id='popup_upload'> <i class='fa fa-cloud-upload'></i> upload</button>
<script type="text/javascript">
$('#popup_upload').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend_galery.upload") }}');
})
</script>
