@if(count($list->mst_user)>0)
	<i data-toggle='tooltip' title='ganti foto' class='fa fa-image' id='ganti_avatar{{ $list->mst_user->id }}' style='cursor:pointer;'></i>
	<script type="text/javascript">
	$('#ganti_avatar{{ $list->mst_user->id }}').click(function(){
		$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
		$('#myModal').modal('show');
		$('.modal-body').load('{{ URL::route("users.change_avatar", $list->mst_user->id) }}')

	})
	</script>

@endif