

    <tr>
        <td class='text-center'>7</td>
        <td>Notifikasi via sms saat registrasi </td>
        <td>
        	@if($sv->get_val('notif_sms_registrasi') == 1)
        		<span class='label label-success'>enabled</span>
        	@else
        		<span class='label label-danger'>disabled</span>
        	@endif
        </td>
        <td>
        	<button id='notif_sms_registrasi' class='btn btn-primary'>
	        	@if($sv->get_val('notif_sms_registrasi') == 1)
	        		disable  
	        	@else
	        		 enable
	        	@endif
        	</button>       	

        </td>
    </tr>

    <script type="text/javascript">
$('#notif_sms_registrasi').click(function(){
	setuju = confirm('are you sure?');


	if(setuju == true){

	@if($sv->get_val('notif_sms_registrasi') == 1)
		value_config = 0;
	@else
		value_config = 1;
	@endif

	form_data = { 
			_token: "{!! csrf_token() !!}", 
			variable_config : 'notif_sms_registrasi', 
			value_config : value_config 
		}

		$.ajax({
			url : '{!! URL::route("config.update_value") !!}',
			data : form_data,
			type: 'post',
			error:function(err){
				alert('error! terjadi kesalahan pada sisi server!');
			},
			success:function(ok){
				window.location.reload();
			}
		})
	}
});

    </script>