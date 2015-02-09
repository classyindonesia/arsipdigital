<h3>Edit Status Pernikahan</h3>
<hr style='margin:2px;'>


<div id='pesan'></div>



<div class='form-group'>
	{!! Form::label('nama', 'Nama : ') !!}
	<input type='text' value='{{ $status_pernikahan->nama }}' name='nama' placeholder='nama ...' id='nama' class='form-control'>
</div>

 

 <div class='form-group'>
 	<button id='simpan' class='btn btn-info'><i class='fa fa-floppy-o'></i> simpan</button>
</div>



<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');
nama = $('#nama').val();
 if(nama == ''){
	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
	$('#pesan').append('semua isian harus terisi!');
}

form_data ={
	nama : nama,
	id : '{{ $status_pernikahan->id }}',
 	_token : '{!! csrf_token() !!}'
}
	$.ajax({
		url : '{{ URL::route("ref_status_pernikahan.update") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){

	 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
        datajson = JSON.parse(xhr.responseText);
        $.each(datajson, function( index, value ) {
       		$('#pesan').append(index + ": " + value+"<br>")
          });

		      //    alert('error! terjadi kesalahan pada sisi server!')
		},
		success:function(ok){
			window.location.reload();
		}
	})
})
</script>
