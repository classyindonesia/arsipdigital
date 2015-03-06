
<div style='height:200px;overflow:hidden;'>
	<img id='gambar{!! $foto->id !!}'  src="/upload/foto_slide/{!! $foto->nama_file_asli.'?'.date('YmdHis') !!}" >
</div>
<div class="fileUpload btn btn-primary">
    <span> <i class="fa fa-link"></i> pilih file </span>
     <input 
        id="fileupload" 
        type="file"
        name="files" 
        data-url="{!! URL::route('foto_slide.do_update_foto') !!}" 
        class='btn btn-primary upload'
    />
</div>


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
 
<span style='width:100px;overflow:hidden;' id='selected_file'></span>

 
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
        acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
        maxFileSize: {{ $max_upload }},
        /*
        add: function (e, data) {

            $.each(data.files, function (index, file) {
                $('#selected_file').html(file.name);
                $('#selected_file').textlimit();
                console.log('Added file: ' + file.name);
            });

           $("#do_upload").click(function(){
           	nama = $.trim($('#nama').val());
             ref_jabatan_id = $.trim($('#ref_jabatan_id').val());

           	if(nama == '' || ref_jabatan_id == ''){
           		alert('masih ada isian yg kosong!');
           		return false;
           	}
           	 data.submit();
           })
        },   
        */     
        done: function (e, data) {
            $.each(data.result.files, function (index, file) {
      			$('#pesan').html('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> data telah berhasil tersimpan! </div>');
      			$('#files').html('');
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
   		var skrg = new Date();
		var skrg_int = skrg.getDate()+""+skrg.getHours()+""+skrg.getMinutes()+""+skrg.getSeconds();
       	$('#gambar{!! $foto->id !!}').attr('src', '/upload/foto_slide/{!! $foto->nama_file_asli !!}?'+skrg_int);

    },
    fail: function (e, data) {
        console.log(data.jqXHR)
        $('#files').html('<span class="text-danger">'+data.textStatus+': '+data.errorThrown+'</span>');
    },    

    }).on('fileuploadsubmit', function (e, data) {
		  data.formData = {
		  	id : {!! $foto->id !!},
		  	_token: "{!! csrf_token() !!}"  
		  }
	});
});


 

</script>



