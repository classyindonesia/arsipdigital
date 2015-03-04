 <div id='pesan'></div>

<hr style='margin:2px'>

<h3>edit weblink</h3>
<hr style='margin:2px'>



<div class='form-group'>
	{!! Form::label('nama', 'Nama weblink : ') !!}
	<input autofocus value='{!! $weblink->nama !!}' type='text' name='nama' id='nama' placeholder='nama weblink...' class='form-control' />
</div>

<div class='form-group'>
	{!! Form::label('url', 'Url Weblink : ') !!}
	<input autofocus value='{!! $weblink->url !!}' type='text' value='http://' name='url' id='url' placeholder='url weblink...' class='form-control' />
</div>




<div class='form-group'>
	{!! Form::label('mst_kategori_weblink_id', 'Kategori weblink : ') !!}
	{!! Form::select('mst_kategori_weblink_id', Fungsi::get_dropdown($kategori, 'kategori'), $weblink->mst_kategori_weblink_id, 
	['id' => 'mst_kategori_weblink_id', 'class' => 'form-control']) !!}
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
	url : $('#url').val(),
	id : '{!! $weblink->id !!}',
	mst_kategori_weblink_id : $('#mst_kategori_weblink_id').val(),
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ URL::route("admin_weblink.update") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			

	 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
        datajson = JSON.parse(xhr.responseText);
        $.each(datajson, function( index, value ) {
       		$('#pesan').append(index + ": " + value+"<br>")
          });
        $('#simpan').removeAttr('disabled');
		},
		success:function(ok){
			window.location.reload();

 		}
	})
})
</script>
