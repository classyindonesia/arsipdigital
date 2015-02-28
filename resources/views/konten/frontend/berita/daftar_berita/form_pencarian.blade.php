<div class='col-md-12' style='margin-bottom: 3em;'>
{!! Form::open(['route' => 'berita.search_berita']) !!}
<div class='form-group'>
	<div class='col-md-11'>
    <input autofocus value='{!! Input::get("pencarian") !!}' type='text' name='pencarian' class='form-control' placeholder='pencarian...'>
	</div>
	 
		 
 
</div>


{!! Form::close() !!}
</div>