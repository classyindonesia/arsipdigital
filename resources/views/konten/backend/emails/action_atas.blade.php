<input type='text' id='subject' name='subject' placeholder='subject' class='pull-right' />
<br>
<button id='kirim' class='btn btn-primary pull-right'> <i class='fa fa-exchange'></i> kirim </button>
<button id='clear_antrian' class='btn btn-primary pull-right'> <i class='fa fa-refresh'></i> clear antrian</button>



 <script type="text/javascript">
$('#clear_antrian').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{{ URL::route("emails.kirim_email") }}',
			data : {clear : 1, _token : '{!! csrf_token() !!}' },
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



$('#kirim').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{{ URL::route("emails.kirim_email") }}',
			data : {kirim : 1, _token : '{!! csrf_token() !!}', subject : $('#subject').val() },
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
