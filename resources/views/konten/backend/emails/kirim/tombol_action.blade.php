<button id='kirim' class='btn btn-primary '> <i class='fa fa-exchange'></i> kirim </button>



 <script type="text/javascript">
 

$('#kirim').click(function(){

jml_penerima = "{!! $jml_penerima !!}";
if(jml_penerima == 0){
	alert('jumlah penerima masih kosong!');
	return false;
}



	setuju = confirm('are you sure?');
	if(setuju == true){
		konten = CKEDITOR.instances["ckeditor"].getData() ;
		$('#kirim').attr('disabled', 'disabled');
		$.ajax({
			url : '{{ URL::route("emails.kirim_email") }}',
			data : {kirim : 1, konten : konten, _token : '{!! csrf_token() !!}', subject : $('#subject').val() },
			type : 'post',
			error: function(err){
				$('#kirim').removeAttr('disabled');
				alert('error! terjadi sesuatu pada sisi server!');
			},
			success:function(ok){
				$('#myModal').modal('show');
				$('.modal-body').html('<div class="alert alert-success">email telah terkirim</div>');

				$('#myModal').on('hidden.bs.modal', function (e) {
				  window.location.reload();
				});
			}
		})
	}
})
</script>
