<div class='form-group'>
	{!! Form::label('judul', 'Judul Berita :') !!}
	<input placeholder='judul berita...' type='text' name='judul' id='judul' class='form-control'>
</div>



{!! Form::label('artikel', 'Artikel :') !!}
<textarea name='artikel' id='ckeditor'></textarea>


<hr>


<div class='form-group'>
	{!! Form::label('is_published', 'Status berita :') !!}
	{!! Form::select('is_published', [1=>'published',0=>'draft'], 1, ['id' => 'is_published']) !!}
</div>



<div class='form-group'>
	{!! Form::label('komentar', 'Komentar :') !!}
	{!! Form::select('komentar', [1=>'open',0=>'closed'], 1, ['id' => 'komentar']) !!}
</div>



<div class='form-group'>
	<button id='simpan' class='btn btn-primary form-control'> <i class='fa fa-floppy-o'></i> SIMPAN</button>
</div>




<script type="text/javascript">
$( document ).ready( function() {
	$( 'textarea#ckeditor' ).ckeditor();
} );




$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');
 
judul = $('#judul').val();
//artikel = $('#artikel').val();
is_published = $('#is_published').val();
komentar = $('#komentar').val();
artikel = CKEDITOR.instances["ckeditor"].getData() ;

form_data ={
	judul 			: judul,
	artikel 		: artikel,
	komentar 		: komentar,
	is_published	: is_published,
 	_token 			: '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ URL::route("admin_berita.insert") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			$('#myModal').modal('show');
			$('#simpan').removeAttr('disabled');
	 	$('.modal-body').html('<div id="pesan"></div>');

		$('#pesan').addClass('alert alert-danger animated shake').html('<b>Cek Isian anda, Data Belum tersimpan : </b><br>');
        datajson = JSON.parse(xhr.responseText);
        $.each(datajson, function( index, value ) {
       		$('#pesan').append(index + ": " + value+"<br>")
          });

		      //    alert('error! terjadi kesalahan pada sisi server!')
		},
		success:function(ok){
			//window.location.reload();
			window.location.href = '{!! URL::route("admin_berita.index") !!}';
		}
	})
})

</script>