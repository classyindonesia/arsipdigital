<i id='del_foto{!! $list->id !!}' data-toggle='tooltip' title='delete' class='fa fa-times-circle pull-right text-danger' style='cursor:pointer;'></i>

<script type="text/javascript">
$('#del_foto{!! $list->id !!}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju==true){
		$.ajax({
			url : '{!! route("foto_slide.del") !!}',
			type : 'post',
			data: {id : '{!! $list->id !!}', _token : '{!! csrf_token() !!}'},
			error:function(err){
				alert('error! terjadi kesalahan pada sisi server!');
			},
			success:function(ok){
				window.location.reload();
			}
		})
	}
})
</script>