@if( session('album_galery_'.$album->id) != null && $album->mst_password_media_id != null)
	
	<button style="margin-right:1em;" id='lock_album' class='btn btn-info pull-right'><i class='fa fa-lock'></i> LOCK</button>




<script type="text/javascript">
$('#lock_album').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
			$('#pesan').removeClass('alert alert-danger animated shake').html('');

		form_data ={
			mst_album_id : {!! $album->id !!},
		 	_token : '{!! csrf_token() !!}'
		}
	$('#lock_album').attr('disabled', 'disabled');
		$.ajax({
			url : '{{ route("galery.submit_lock_album") }}',
			data : form_data,
			type : 'post',
			error:function(xhr, status, error){
				$('#lock_album').removeAttr('disabled');
				$('#myModal').modal('show');
				$('.modal-body').html('<div id="pesan"> </div>');			
			 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
		        datajson = JSON.parse(xhr.responseText);
		        $.each(datajson, function( index, value ) {
		       		$('#pesan').append(index + ": " + value+"<br>")
		          });
			},
			success:function(ok){
				$('#lock_album').removeAttr('disabled');
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
