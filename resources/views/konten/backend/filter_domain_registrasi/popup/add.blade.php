<h3>
	<i class='fa fa-plus-square'></i> Add Filter Domain
</h3>
<hr>

<div class="row">
	<div class="col-md-12">
		
		<div class="form-group">
			{!! Form::label('nama', 'Nama Domain') !!}		
			{!! Form::text('nama', '', ['id' => 'nama', 'class' => 'form-control']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('domain', 'Domain : ') !!}
			{!! Form::text('domain', '', ['class' => 'form-control', 'id' => 'domain']) !!}
		</div>
		<hr>

		<div class="form-group">
			<button id='simpan' class='btn btn-info pull-right'><i class='fa fa-floppy-o'></i> SIMPAN</button>
		</div>


	</div>
</div>



<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');

form_data ={
	nama : $('#nama').val(),
	domain : $('#domain').val(),
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend.filter_domain.insert") }}',
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



