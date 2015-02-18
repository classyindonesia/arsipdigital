<i data-toggle='tooltip' title='reset password' id='reset_pass{!! $list->mst_user->id !!}' class='fa fa-refresh' style='cursor:pointer;'></i>
<script type="text/javascript">
$('#reset_pass{!! $list->mst_user->id !!}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{{ URL::route("users.reset_password") }}',
			data : {id : '{{ $list->mst_user->id }}', _token : '{!! csrf_token() !!}'},
			type : 'post',
			error: function(err){
				alert('error! terjadi sesuatu pada sisi server!');
			},
			success:function(ok){
				window.location.reload();
			}
		})
	}
})

</script>