@include('layouts.komponen.backend.src_blueimp')


<style type="text/css">
.fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
</style>
<h3>Upload File Lampiran</h3>
<hr style='margin:2px;'>
<input type='text' name='nama' placeholder='nama lampiran...' id='nama' class='form-control' />
<input type='text' name='deskripsi' id='deskripsi' class='form-control' placeholder='deskripsi lampiran...' />


<div class="fileUpload btn btn-primary">
    <span> <i class="fa fa-link"></i> pilih file </span>
     <input 
        id="fileupload" 
        type="file"
        name="files" 
        data-url="{!! URL::route('lampiran_berita.do_upload_file') !!}" 
        class='btn btn-primary upload'
    />
</div>
<span style='width:100px;overflow:hidden;' id='selected_file'></span>


<hr>

<button id='do_upload' class='btn btn-primary'> <i class='fa fa-play'></i> start upload</button>
    <div id='files'></div>

<script>

$(document).ready(function() {

  $.fn.textlimit = function()
  { 

    return this.each(function()                       
    {

    var $elem = $(this);            // Adding this allows u to apply this anywhere
    var $limit = 22;                // The number of characters to show
    var $str = $elem.html();        // Getting the text
    var $strtemp = $str.substr(0,$limit);   // Get the visible part of the string
    $str = $strtemp + '<span class="hide">' + $str.substr($limit,$str.length) + '</span> ...';  
    $elem.html($str);
    })

  };

});






$(function () {
    $('#fileupload').fileupload({
        dataType: 'json',
        acceptFileTypes: /(\.|\/)({!! env('ALLOWED_EXTENSION_FILEUPLOAD') !!})$/i,
        maxFileSize: {{ $max_upload }},
        add: function (e, data) {

            $.each(data.files, function (index, file) {
                $('#selected_file').html(file.name);
                $('#selected_file').textlimit();
                console.log('Added file: ' + file.name);
            });

           $("#do_upload").click(function(){
           	nama = $.trim($('#nama').val());
           	if(nama == ''){
           		alert('nama harus diisi!');
           		return false;
           	}
           	 data.submit();
           })
        },        
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
                $('#nama').val('');
                $('#deskripsi').val('');
                $('#files').html('<span class="text-success">saved!</span>');
                data.files.splice(index,1); //remove selected file
                $('#selected_file').html('');
            });
        },
    processfail: function (e, data) {
        $('<p/>').html('<span class="text-danger">Processing ' + data.files[data.index].name + ' failed! '+data.files[data.index].error+'</span>').appendTo('#files');
         console.log('Processing ' + data.files[data.index].name + ' failed.! '+data.files[data.index].error);
    },
    start: function (e) {
        $("#do_upload").attr('disabled', 'disabled');
            console.log('Uploads started');
            $('#files').html('<span class="text-warninf">uploading... <i class="fa fa-refresh fa-spin"></i> </span>');
        },
    stop: function (e) {
        console.log('Uploads finished');
        $('#do_upload').removeAttr('disabled');
    },
    fail: function (e, data) {
        console.log(data.jqXHR)
        $('#files').html('<span class="text-danger">'+data.textStatus+': '+data.errorThrown+'</span>');
    },    

    }).on('fileuploadsubmit', function (e, data) {
		  data.formData = {
		  	nama : $('#nama').val(),
		  	deskripsi : $('#deskripsi').val(),
		  	_token: "{!! csrf_token() !!}"  
		  }
	});
});






$('#myModal').on('hidden.bs.modal', function (e) {
  window.location.reload();
})

</script>







