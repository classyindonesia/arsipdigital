<h3>
	<i class='fa fa-plus-square'></i> Edit password
</h3>
<hr>

<div class="row">
	<div class="col-md-12">
		<div id="pesan"></div>
		
		<div class="form-group">
			{!! Form::label('nama', 'Nama Password : ') !!}
			{!! Form::text('nama', $password->nama, ['id' => 'nama', 'class' => 'form-control', 'placeholder' => 'nama password...']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password_lama', 'Password Lama: ') !!}
			{!! Form::password('password_lama', ['id' => 'password_lama', 'class' => 'form-control', 'placeholder' => 'password lama...']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password', 'Password baru : ') !!}
			{!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'password...']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password_confirmation', 'Password baru confirmation : ') !!}
			{!! Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'password confirmation...']) !!}
		</div>


		<div class="form-group">
			<button id='simpan' class='btn btn-info pull-right'><i class='fa fa-floppy-o'></i> SIMPAN</button>
		</div>


	</div>
</div>



<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');

form_data ={
	id : {{ $password->id }},
	nama : $('#nama').val(),
	password_lama : $('#password_lama').val(),
	password : $('#password').val(),
	password_confirmation : $('#password_confirmation').val(),
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend_password.update") }}',
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
			window.location.reload();
		}
	})
})



$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
})

</script>


