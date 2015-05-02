<h1>Tambah Album</h1>
<hr>

<div id='pesan'></div>


<div class="form-group">
 {!! Form::label('judul', 'judul album : ') !!}
 <input type="text" name='judul' id='judul' placeholder='judul album...' class="form-control">
</div>

<div class="form-group">
 {!! Form::label('keterangan', 'keterangan album : ') !!}
 <input type="text" name='keterangan' id='keterangan' placeholder='keterangan album...' class="form-control">
</div>





<div class="form-group">
	<button id='simpan'  class="btn btn-primary"> <i class='fa fa-floppy-o'></i> SIMPAN</button>
</div>

<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');
judul = $('#judul').val();
keterangan = $('#keterangan').val();
 

form_data ={
	judul : judul,
	keterangan : keterangan,
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ URL::route("backend_album_galery.store") }}',
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
			//window.location.reload();
			$('.modal-body').load('{!! route("backend_album_galery.index") !!}')

		}
	})
})
</script>
