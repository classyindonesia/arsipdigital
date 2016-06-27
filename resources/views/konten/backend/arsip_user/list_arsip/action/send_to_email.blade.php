<i style='cursor:pointer;' id='sendToEmail{!! $list->id !!}' class='fa fa-envelope'></i>


<script type="text/javascript">
$('#sendToEmail{!! $list->id !!}').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("arsip_user.send_to_email", [$list->mst_user_id, $list->id]) }}')

})
</script>

