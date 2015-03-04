<button class='btn btn-primary' id='back'> <i class='fa fa-arrow-left'></i> back</button>
<script type="text/javascript">
$('#back').click(function(){
	$('.modal-body').load('{!! route("admin_weblink.kategori") !!}');
});

</script>


<div id='pesan'></div>

<hr style='margin:2px'>

<h3>edit kategori weblink</h3>
<hr style='margin:2px'>



<div class='form-group'>
	<input value='{!! $kategori->nama !!}' autofocus type='text' name='nama' id='nama' placeholder='nama kategori...' class='form-control' />
</div>


<button class='btn btn-primary' id='simpan'> <i class='fa fa-floppy-o'></i> simpan</button>

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
	id : '{!! $kategori->id !!}',
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ URL::route("admin_weblink.update_kategori") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			

	 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
        datajson = JSON.parse(xhr.responseText);
        $.each(datajson, function( index, value ) {
       		$('#pesan').append(index + ": " + value+"<br>")
          });
        $('#simpan').removeAttr('disabled');

		      //    alert('error! terjadi kesalahan pada sisi server!')
		},
		success:function(ok){
			//$('#simpan').removeAttr('disabled');
			$('.modal-body').load('{!! route("admin_weblink.kategori") !!}')

 		}
	})
})
</script>
