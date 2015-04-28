    <tr>
        <td class='text-center'>4</td>
        <td>Nama Pencarian</td>
        <td>

        <input value="{!! $sv->get_val('config_nama_pencarian') !!}" type="text" name='value_config_nama_pencarian' id="value_config_nama_pencarian" placeholder='nama pencarian' class="form-control">
        </td>
        <td>
        	<button id='config_nama_pencarian' class='btn btn-primary'>
	         update
        	</button>       	

        </td>
    </tr>

    <script type="text/javascript">
$('#config_nama_pencarian').click(function(){
	setuju = confirm('are you sure?');


	if(setuju == true){

 
		value_config = $('#value_config_nama_pencarian').val();
 

	form_data = { 
			_token: "{!! csrf_token() !!}", 
			variable_config : 'config_nama_pencarian', 
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