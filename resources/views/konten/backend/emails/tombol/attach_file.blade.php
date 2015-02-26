<button class='btn btn-primary pull-right' id='attach'> <i class='fa fa-paperclip'></i> attach file</button>
<script type="text/javascript">
$('#attach').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load("{!! URL::route('emails.attach_file') !!}");
})
</script>