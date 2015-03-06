
<i class='fa fa-times' style='cursor:pointer;' id='del_jabatan{{ $list->id }}'></i>
<script type="text/javascript">
$('#del_jabatan{{ $list->id }}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{{ route("foto_slide.del_jabatan") }}',
			data : {id : '{{ $list->id }}', _token : '{!! csrf_token() !!}'},
			type : 'post',
			error: function(err){
				alert('error! terjadi sesuatu pada sisi server!');
			},
			success:function(ok){
				//window.location.reload();
				$('.modal-body').load('{!! route("foto_slide.jabatan") !!}');
			}
		})
	}
})
</script>
