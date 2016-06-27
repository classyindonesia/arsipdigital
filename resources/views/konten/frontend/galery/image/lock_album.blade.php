
<div class="col-md-4 col-md-offset-4 text-center">
	<div class="form-group">
		{!! Form::label('password', 'Masukkan Password :') !!}
		{!! Form::password('password', ['class' => 'form-control', 'id' => 'password', 'placeholder' => 'password album...']) !!}
	</div>
	<div class="form-group">
		<button id='unlock' class='btn btn-info  '>SUBMIT</button>
	</div>
</div>




<script type="text/javascript">
$('#unlock').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');

form_data ={
	mst_album_id : {!! $img->mst_album_galery->id !!},
	password : $('#password').val(),
 	_token : '{!! csrf_token() !!}'
}
$('#unlock').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("galery.submit_password_album") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			$('#unlock').removeAttr('disabled');
			$('#myModal').modal('show');
			$('.modal-body').html('<div id="pesan"> </div>');
		 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
	        datajson = JSON.parse(xhr.responseText);
	        $.each(datajson, function( index, value ) {
	       		$('#pesan').append(index + ": " + value+"<br>")
	          });
		},
		success:function(ok){
			$('#unlock').removeAttr('disabled');
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


