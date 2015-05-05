<div class="row">

	@foreach($galery as $list)
		<div class=" col-md-4">
			<div  class="thumbnail">
				<a href="{!! route('galery.image', $list->id) !!}">
				  <img style="height:240px;overflow:hidden;" src="/upload/galery/thumbnail_{!! $list->nama_file !!}" alt="...">
  			    </a>
			</div>
		</div>
	@endforeach

</div>

{!! $galery->render() !!}
