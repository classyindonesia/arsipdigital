	<script type="text/javascript">
	$('#hapus{!! $list->id !!}').click(function(){
		setuju = confirm('are you sure?');
		if(setuju == true){
			$.ajax({
				url : '{!! route("backend_galery.del") !!}',
				data : { id : '{!! $list->id !!}', _token : '{!! csrf_token() !!}'},
				type : 'post',				
				error:function(err){
					alert('error! terjadi kesalahan pada sisi server!');
				},
				success:function(ok){
					window.location.reload();
				}
			});
		}
	})
	</script>