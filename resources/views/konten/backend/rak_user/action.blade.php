<i data-toggle='tooltip' title='view folders' class='fa fa-credit-card' id='view{{ $list->id }}' style='cursor:pointer;'></i>
<script type="text/javascript">
$('#view{{ $list->id}}').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('#myModal').modal('show');
	$('.modal-body').load('{{ URL::route("rak_user.list_folder", $list->id) }}')

})
</script>

