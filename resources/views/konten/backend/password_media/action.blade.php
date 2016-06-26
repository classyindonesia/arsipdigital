<i class='fa fa-pencil-square' id='edit{{ $list->id }}' style='cursor:pointer;'></i>
<script type="text/javascript">
$('#edit{{ $list->id}}').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend_password.edit", $list->id) }}')

})
</script>

||

<i class='fa fa-times' style='cursor:pointer;' id='del{{ $list->id }}'></i>

<script type="text/javascript">
$('#del{{ $list->id }}').click(function(){

 setuju = confirm('are you sure?');
 if(setuju == true){
			$.ajax({
				url : '{{ route("backend_password.delete") }}',
				data : {id : '{{ $list->id }}', _token : '{!! csrf_token() !!}' },
				type : 'post',
				error: function(err){
					swal('error', 'terjadi kesalahan pada sisi server!', 'error');
				},
				success:function(ok){
					window.location.reload();
				}
			})	 	
 }




});
</script>



