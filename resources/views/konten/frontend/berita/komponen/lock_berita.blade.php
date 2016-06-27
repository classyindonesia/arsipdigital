@if( session('berita_'.$berita->id) != null && $berita->mst_password_media_id != null)
	
	<button style="margin-right:1em;" id='lock_berita' class='btn btn-info pull-right'><i class='fa fa-lock'></i> LOCK</button>




<script type="text/javascript">
$('#lock_berita').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
			$('#pesan').removeClass('alert alert-danger animated shake').html('');

		form_data ={
			mst_berita_id : {!! $berita->id !!},
		 	_token : '{!! csrf_token() !!}'
		}
	$('#lock_berita').attr('disabled', 'disabled');
		$.ajax({
			url : '{{ route("berita.submit_lock_berita") }}',
			data : form_data,
			type : 'post',
			error:function(xhr, status, error){
				$('#lock_berita').removeAttr('disabled');
				$('#myModal').modal('show');
				$('.modal-body').html('<div id="pesan"> </div>');			
			 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
		        datajson = JSON.parse(xhr.responseText);
		        $.each(datajson, function( index, value ) {
		       		$('#pesan').append(index + ": " + value+"<br>")
		          });
			},
			success:function(ok){
				$('#lock_berita').removeAttr('disabled');
				window.location.reload();
			}
		});		
	}
})



$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
})

</script>




@endif
