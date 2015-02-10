@extends('layouts.admin')

@section('main_konten')


<input data-form-data='{"_token": "{!! csrf_token() !!}"}' id="fileupload" type="file" name="files[]" data-url="{!! URL::route('coba_upload') !!}" multiple>

<div style='display:none;' id='proses_upload'>
	<i class="fa fa-spinner fa-spin"></i>
</div>
 <div id='files'>
 </div>

<div  style='display:none;'  id="progress" class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
    <span class="sr-only">60% Complete</span>
  </div>
</div>


<script>
$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
        acceptFileTypes: /(\.|\/)(xls|gif|jpe?g|pdf|png|mp4|mkv)$/i,
        maxFileSize: 5000000000000000000000,
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').html('<span class="text-success">'+file.name+'</span>').appendTo('#files');
                
            });
         },    

        progressall: function (e, data) {
	        var progress = parseInt(data.loaded / data.total * 100, 10);
	       
	        /*
		        $('#progress .progress-bar').css(
		            'width',
		            progress + '%'
		        );
    */

    	},
    processfail: function (e, data) {
		$('<p/>').html('<span class="text-danger">Processing ' + data.files[data.index].name + ' failed! '+data.files[data.index].error+'</span>').appendTo('#files');
	     console.log('Processing ' + data.files[data.index].name + ' failed.! '+data.files[data.index].error);
    },
    start: function (e) {
    	 $('#proses_upload').fadeIn();
    	
		    console.log('Uploads started');
		},
	stop: function (e) {
		$('#proses_upload').fadeOut();
    	console.log('Uploads finished');
    	$('#progress').fadeOut();
	},
	fail: function (e, data) {
		console.log(data.jqXHR)
    	$('<p/>').html('<span class="text-danger">'+data.textStatus+': '+data.errorThrown+'</span>').appendTo('#files');
 	},
 	progress: function (e, data) {
 		$('#progress').fadeIn();
    	var progress = parseInt(data.loaded / data.total * 100, 10);
		        $('#progress .progress-bar').css(
		            'width',
		            progress + '%'
		        );    	
	}

    });
});
</script>
 
@endsection

@section('script_tambahan')
<script src="/js/plugins/blueimp/vendor/jquery.ui.widget.js"></script>
<script src="/js/plugins/blueimp/jquery.iframe-transport.js"></script>
<script src="/js/plugins/blueimp/jquery.fileupload.js"></script>
<script src="/js/plugins/blueimp/jquery.fileupload-process.js"></script>

<script src="/js/plugins/blueimp/jquery.fileupload-validate.js"></script>
 

@endsection