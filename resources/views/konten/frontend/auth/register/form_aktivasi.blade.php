

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		
	<div class="form-group">
		{!! Form::label('email', 'Email : ') !!}
		{!! Form::text('email', $registration->email, ['id' => 'email', 'class' => 'form-control', 'readonly']) !!}
	</div>

	<div class="form-group">
		{!! Form::label('password', 'Password : ') !!}
		{!! Form::password('password', ['id' => 'password', 'class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('password_confirmation', 'Password Confirmation : ') !!}
		{!! Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control']) !!}
	</div>

	<div class="form-group">
		<button id='simpan' class='btn btn-info pull-right'><i class='fa fa-floppy-o'></i> SUBMIT</button>
	</div>


	</div>
</div>



<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');

form_data ={
	password : $('#password').val(),
	password_confirmation : $('#password_confirmation').val(),
	email : '{!! $registration->email !!}',
	token : '{!! $registration->token !!}',
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("frontend_register.submit_aktivasi") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			$('#simpan').removeAttr('disabled');
	 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
        datajson = JSON.parse(xhr.responseText);
        $.each(datajson, function( index, value ) {
       		$('#pesan').append(index + ": " + value+"<br>")
          });
		},
		success:function(ok){
			window.location.href = '{!! route("home.index") !!}';
		}
	})
})



$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
})

</script>


