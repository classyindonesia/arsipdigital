<div class='form-group'>
	{!! Form::label('judul', 'Judul Berita :') !!}
	<input placeholder='judul berita...' type='text' name='judul' id='judul' class='form-control'>
</div>

@include('konten.backend.berita.action.add_gambar')
@include('konten.backend.berita.action.add_vidio')

<hr>


{!! Form::label('artikel', 'Artikel :') !!}
<textarea name='artikel' id='ckeditor'></textarea>




<hr>
<div class="row">
	<div class="col-md-6">
		
		<div class="form-group">
			{!! Form::label('keyword', 'Keyword : ') !!}
			{!! Form::text('keyword', '', ['id' => 'keyword', 'class' => 'form-control', 'placeholder' => 'keyword seo']) !!}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('description', 'Description : ') !!}
			{!! Form::textarea('description', '', ['id' => 'description', 'class' => 'form-control', 'placeholder' => 'Description seo', 'style' => 'height:80px']) !!}
		</div>
		
	</div>
</div>

<hr> 
<div class="row">
	<div class="col-md-3">
		<div class='form-group'>
			{!! Form::label('mst_password_media_id', 'Password :') !!}
			{!! Form::select('mst_password_media_id', $password, '', ['id' => 'mst_password_media_id', 'class' => 'form-control']) !!}
		</div>		
	</div>
	<div class="col-md-3">
		<div class='form-group'>
			{!! Form::label('is_published', 'Status berita :') !!}
			{!! Form::select('is_published', [1=>'published',0=>'draft'], 1, ['id' => 'is_published', 'class' => 'form-control']) !!}
		</div>			
	</div>
	<div class="col-md-3">
		<div class='form-group'>
			{!! Form::label('komentar', 'Komentar :') !!}
			{!! Form::select('komentar', [1=>'open',0=>'closed'], 1, ['id' => 'komentar', 'class' => 'form-control']) !!}
		</div>			
	</div>
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
	mst_password_media_id   : $('#mst_password_media_id').val(),
	judul 					: judul,
	artikel 				: artikel,
	keyword 				: $('#keyword').val(),
	description 			: $('#description').val(),	
	komentar 				: komentar,
	is_published			: is_published,
 	_token 					: '{!! csrf_token() !!}'
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
			id_berita = ok["id"];
			window.location.href = '{!! URL::to("backend/berita/edit") !!}/'+id_berita;
			//alert(id_berita);
		}
	})
})

</script>