 	@if(URL::previous() != Request::fullUrl() )
		<a class="btn btn-primary pull-right" href="{!! URL::previous() !!}">
			<i class='fa fa-arrow-left'></i> back
		</a>
	@else
		<a class="btn btn-primary pull-right" href="{!! route('my_archive.index') !!}">
			<i class='fa fa-arrow-left'></i> back
		</a>
	@endif