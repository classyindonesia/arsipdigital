@if($vidio->currentPage() > 1)
	<a id='pref_page' href="#" class='btn btn-success'> <i class='fa fa-arrow-left'></i> kembali </a>
	<script type="text/javascript">
	$('#pref_page').click(function(){
		$('.modal-body')
		.html('<h1>loading... <i class="fa fa-refresh fa-spin"></i></h1>')
		.load('{!! URL::current() !!}?page={!! $vidio->currentPage() - 1 !!}');
		return false;
	})
	</script>
@endif


@if($vidio->hasMorePages() == 1) 


	<a id='next_page' href="#" class='btn btn-success'>halaman berikutnya <i class='fa fa-arrow-right'></i></a>
	<script type="text/javascript">
	$('#next_page').click(function(){
		$('.modal-body')
		.html('<h1>loading... <i class="fa fa-refresh fa-spin"></i></h1>')
		.load('{!! $vidio->nextPageUrl() !!}');
		return false;
	})
	</script>



@endif