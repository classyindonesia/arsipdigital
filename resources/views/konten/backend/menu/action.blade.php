
<i class='fa fa-times' style='cursor:pointer;' id='del{{ $list->id }}'></i>
<script type="text/javascript">
$('#del{{ $list->id }}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{{ route("backend_menu.del") }}',
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


|| 

  <i id='edit{!! $list->id !!}' class='fa fa-pencil-square cursor' ></i>  
<script type="text/javascript">
$('#edit{!! $list->id !!}').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend_menu.edit", $list->id) }}');
})
</script>
