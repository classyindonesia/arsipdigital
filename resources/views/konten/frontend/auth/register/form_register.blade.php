<div class="row">
	<div class="col-md-6 col-md-offset-3">

		<div class="form-group">
			{!! Form::label('nama', 'Nama : ') !!}
			{!! Form::text('nama', '', ['id' => 'nama', 'class' => 'form-control', 'placeholder' => 'nama...']) !!}
		</div>

			
		<div class="form-group">
			{!! Form::label('email', 'Alamat Email : ') !!}
			{!! Form::text('email', '', ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'email...']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('no_hp', 'Nomor HP : ') !!}
			{!! Form::text('no_hp', '', ['id' => 'no_hp', 'class' => 'form-control', 'placeholder' => 'nomor hp...']) !!}
		</div>

		<div class="form-group text-center">
			<button id='mendaftar' class='btn btn-info'><i class='fa fa-bolt'></i> Mendaftar</button>
		</div>

	</div>
</div>




<script type="text/javascript">
$('#mendaftar').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');

form_data ={
	nama : $('#nama').val(),
	email : $('#email').val(),
	no_hp : $('#no_hp').val(),
	token : '{!! csrf_token() !!}',
 	_token : '{!! csrf_token() !!}'
}
$('#mendaftar').attr('disabled', 'disabled');
$('#myModal').modal('show');
$('.modal-body').html('<h1>loading... <i class="fa fa-refresh fa-spin"></i> </h1>');
	$.ajax({
		url : '{{ route("frontend_register.submit_register") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			
			$('.modal-body').html('<div id="pesan"></div>');
			$('#mendaftar').removeAttr('disabled');
		 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
	        datajson = JSON.parse(xhr.responseText);
	        $.each(datajson, function( index, value ) {
	       		$('#pesan').append(index + ": " + value+"<br>")
	          });
		},
		success:function(ok){
			$('#mendaftar').removeAttr('disabled');
			nama = $('#nama').val(''),
			email = $('#email').val(''),
			no_hp = $('#no_hp').val(''),			
			$('#myModal').modal('show');
			$('.modal-body').html('<h1 class="text-success"> Silahkan check inbox email anda</h1>');	
		}
	})
})



$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
})

</script>


