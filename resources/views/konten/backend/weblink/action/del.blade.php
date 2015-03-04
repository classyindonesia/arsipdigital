<i class='fa fa-times' style='cursor:pointer;' id='del_weblink{{ $list->id }}'></i>
<script type="text/javascript">
$('#del_weblink{{ $list->id }}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{{ route("admin_weblink.del") }}',
			data : {id : '{{ $list->id }}', _token : '{!! csrf_token() !!}'},
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
