    <footer class="footer">
      <div class="container">
			<div class="col-md-12">

			@foreach($kategori_weblink as $list)
				<div class='col-md-3 col-xs-4'>
					<h3>{!! $list->nama !!}</h3>
					@if(count($list->mst_weblink)>0)
						<ul style='margin-left:-1em;'>
							@foreach($list->mst_weblink as $list_weblink)
								<li> <a href="{!! $list_weblink->url !!}" target='__blank'>{!! $list_weblink->nama !!}</a> </li>
							@endforeach
						</ul>
					@endif
				</div>
			@endforeach
			</div>
</div>
<hr style='border:2px solid #aaa;'>
      <div class="container">
			<div class="col-md-12">
				
	        	<p class="text-muted text-right">Copyright &copy; {{ str_replace('http://', '', URL::to("/")) }}</p>
			</div>
		</div>


    </footer>