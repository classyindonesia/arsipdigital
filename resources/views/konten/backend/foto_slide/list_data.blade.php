

<div class="row">

@foreach($foto_slide as $list)
  <div class="col-sm-6 col-md-3" >
    <div class="thumbnail" style='height:320px;overflow:hidden;'>

    <div style='height:200px;overflow:hidden;'>
      <img src="/upload/foto_slide/{!! $list->nama_file_asli !!}" alt="...">
    </div>
    @include('konten.backend.foto_slide.action.del')


      <div class="caption">
        <h4 style='margin-bottom:2px;'> <i data-toggle='tooltip' title='nama' class="fa fa-check-circle-o"></i> {!! $list->nama !!} </h4>
        <p>
	       <i data-toggle='tooltip' title='jabatan' class="fa fa-check-circle-o"></i>	@if(count($list->ref_jabatan)>0) {!! $list->ref_jabatan->nama !!} @else - @endif   
    	    	<br>
        	<i data-toggle='tooltip' title='nomor induk' class="fa fa-check-circle-o"></i> {!! $list->no_induk !!} </p>
  


      </div>
    </div> 
  </div>
@endforeach

</div>


{!! $foto_slide->render() !!}

