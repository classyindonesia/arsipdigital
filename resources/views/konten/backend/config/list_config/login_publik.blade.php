    <tr>
        <td class='text-center'>3</td>
        <td>Akses Login depan</td>
        <td>
        	@if($sv->get_val('config_login_frontend') == 1)
        		<span class='label label-success'>show</span>
        	@else
        		<span class='label label-danger'>hide</span>
        	@endif
        </td>
        <td>
        	<button id='config_login_frontend' class='btn btn-primary'>
	        	@if($sv->get_val('config_login_frontend') == 1)
	        		hide 
	        	@else
	        		 show
	        	@endif
        	</button>       	

        </td>
    </tr>

    <script type="text/javascript">
$('#config_login_frontend').click(function(){
	setuju = confirm('are you sure?');


	if(setuju == true){

	@if($sv->get_val('config_login_frontend') == 1)
		value_config = 0;
	@else
		value_config = 1;
	@endif

	form_data = { 
			_token: "{!! csrf_token() !!}", 
			variable_config : 'config_login_frontend', 
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