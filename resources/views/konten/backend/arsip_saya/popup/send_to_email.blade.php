<h3>
	Kirim File Arsip via email
</h3>
<hr>

<div class="row">
	<div class="col-md-12">
		<div id="pesan"></div>
	
		<div class="form-group">
			{!! Form::label('email', 'Alamat Email : ') !!}
			{!! Form::text('email', '', ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'alamat email penerima...']) !!}
		</div>
		<div class="form-group">
			<button id='kirim' class='btn btn-info pull-right'><i class='fa fa-share'></i> KIRIM</button>
		</div>

	</div>
</div>



<script type="text/javascript">
$('#kirim').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');

form_data ={
	email : $('#email').val(),
	mst_arsip_id : {!! $arsip->id !!},
 	_token : '{!! csrf_token() !!}'
}
$('#kirim').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("my_archive.do_send_to_email") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			$('#kirim').removeAttr('disabled');
	 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
        datajson = JSON.parse(xhr.responseText);
        $.each(datajson, function( index, value ) {
       		$('#pesan').append(index + ": " + value+"<br>")
          });
		},
		success:function(ok){
			alert('data telah diproses!');
			$('#myModal').modal('hide');
			$('#kirim').removeAttr('disabled');
			// window.location.reload();
		}
	})
})



$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
})

</script>


