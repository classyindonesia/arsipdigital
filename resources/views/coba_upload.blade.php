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
    <span id='persen_upload'>0%</span> Complete
  </div>
</div>


<script>

function set_progress_bar(percent_val){
    if(percent_val == 0){
        $('#progress').hide();
        $('#progress .progress-bar').css('width','0%'); 
        $('#persen_upload').html(percent_val+'%');    
        $('#proses_upload').hide();      
    }else{
        $('#progress .progress-bar').css(
            'width', percent_val+'%'
        );    
        $('#proses_upload').fadeIn();
        $('#persen_upload').html(percent_val+'%');   
        $('#progress').fadeIn();        
    }
}


$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
        acceptFileTypes: /(\.|\/)(xls|gif|jpe?g|pdf|png|mp4|mkv|rar)$/i,
        maxFileSize: 5000000000000000000000,
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('<p/>').html('<span class="text-success">'+file.name+'</span>').appendTo('#files');
                
            });
         },    
    processfail: function (e, data) {
		$('<p/>').html('<span class="text-danger">Processing ' + data.files[data.index].name + ' failed! '+data.files[data.index].error+'</span>').appendTo('#files');
	     console.log('Processing ' + data.files[data.index].name + ' failed.! '+data.files[data.index].error);
    },
    start: function (e) {
		    console.log('Uploads started');
		},
	stop: function (e) {
    	console.log('Uploads finished');
        set_progress_bar(0);
	},
	fail: function (e, data) {
		console.log(data.jqXHR)
    	$('<p/>').html('<span class="text-danger">'+data.textStatus+': '+data.errorThrown+'</span>').appendTo('#files');
 	},
 	progressall: function (e, data) {
    	var progress = parseInt(data.loaded / data.total * 100, 10);
        set_progress_bar(progress); 
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