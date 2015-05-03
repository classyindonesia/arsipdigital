@include($base_view.'komponen.tombol_list_album')

<h1>Edit Album</h1>
<hr>


<div id='pesan'></div>


<div class="form-group">
 {!! Form::label('judul', 'judul album : ') !!}
 <input value="{!! $a->judul !!}" type="text" name='judul' id='judul' placeholder='judul album...' class="form-control">
</div>

<div class="form-group">
 {!! Form::label('keterangan', 'keterangan album : ') !!}
 <input value="{!! $a->keterangan !!}" type="text" name='keterangan' id='keterangan' placeholder='keterangan album...' class="form-control">
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
	id : '{!! $a->id !!}',
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ URL::route("backend_album_galery.update") }}',
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
