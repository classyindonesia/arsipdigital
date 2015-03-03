<script type="text/javascript">
 
$('#kotak_gambar{!! $list->id !!}')
  .mouseenter(function() {
  	//trigger when mouse is entered
	   $( "#gambar{!! $list->id !!}" ).fadeTo( "slow" , 0.3); 	
	   $('#tombol_del{!! $list->id !!}').fadeIn();
	   $('#tombol_insert{!! $list->id !!}').fadeIn();
  })
  .mouseleave(function() {
    //trigger when mouse is leave
     $( "#gambar{!! $list->id !!}" ).fadeTo( "slow" , 1); 	
     $('#tombol_del{!! $list->id !!}').fadeOut();
     $('#tombol_insert{!! $list->id !!}').fadeOut();

  });




$('#tombol_insert{!! $list->id !!}').click(function(){
	CKEDITOR.instances['ckeditor'].insertHtml('<img src="/upload/gambar_berita/{!! $list->nama_file_asli !!}">');
	$('#myModal').modal('hide');
})






$('#tombol_del{!! $list->id !!}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{!! route("admin_berita.del_gambar") !!}',
			type : 'post',
			data : { _token: "{!! csrf_token() !!}", id : "{!! $list->id !!}" },
			error:function(err){
				alert('error! terjadi kesalahan pada sisi server!');
			},
			success:function(ok){
				 $('.modal-body').load('{!! URL::current() !!}')
			}
		});
		//alert('true');
	} 
})


</script>