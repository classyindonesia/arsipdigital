<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');
 
nama = $('#nama').val();
no_induk = $('#no_induk').val();
alamat 						= $('#alamat').val();
tgl_lahir					= $('#thn_lahir').val()+"-"+$('#bln_lahir').val()+"-"+$('#tgl_lahir').val();
tempat_lahir				= $('#tempat_lahir').val();
jenis_kelamin				= $('#jenis_kelamin').val();
no_hp						= $('#no_hp').val();
kode_post					= $('#kode_post').val();
no_telp						= $('#no_telp').val();
no_ktp						= $('#no_ktp').val();
nama_ibu_kandung			= $('#nama_ibu_kandung').val();
ref_status_pernikahan_id	= $('#ref_status_pernikahan_id').val();
ref_status_ikatan_id		= $('#ref_status_ikatan_id').val();
ref_agama_id				= $('#ref_agama_id').val();
ref_kota_id					= $('#ref_kota_id').val();
/* end value */

form_data ={
	id 							: '{!! $data_user->id !!}',
	nama 						: nama,
	no_induk 					: no_induk,
	alamat						: alamat,
	tgl_lahir					: tgl_lahir,
	tempat_lahir				: tempat_lahir,
	jenis_kelamin				: jenis_kelamin,
	no_hp						: no_hp,
	kode_post					: kode_post,
	no_telp						: no_telp,
	no_ktp						: no_ktp,
	nama_ibu_kandung			: nama_ibu_kandung,
	ref_status_pernikahan_id	: ref_status_pernikahan_id,
	ref_status_ikatan_id		: ref_status_ikatan_id,
	ref_agama_id				: ref_agama_id,
	ref_kota_id					: ref_kota_id,
 	_token 						: '{!! csrf_token() !!}'
}
	$.ajax({
		url : '{{ URL::route("my_profile.update") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			$('#myModal').modal('show');

	 	$('.modal-body').html('<div id="pesan"></div>');

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
