<button class='btn btn-primary pull-right' id='import'> <i class='fa fa-cloud-upload'></i> import </button>
	<script type="text/javascript">
	$('#import').click(function(){
		$('#myModal').modal('show');
		$('.modal-body').load('{{ URL::route("users.import") }}');
	})
	</script>