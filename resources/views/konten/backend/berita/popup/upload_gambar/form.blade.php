    <input data-form-data='{"_token": "{!! csrf_token() !!}"   }' 
        id="fileupload" 
        type="file"
        name="files[]" 
        data-url="{!! URL::route('admin_berita.do_upload_gambar') !!}" 
        multiple 
        class='btn btn-primary'
    />


    <div style='display:none;' id='alert' class='alert alert-info'>
         <i style='cursor:pointer;display:none;' class='fa fa-times pull-right' id='close_alert'></i>


        <div style='display:none;' id='proses_upload'>
            <i class="fa fa-spinner fa-spin"></i>
        </div>
        <div  style='display:none;'  id="progress" class="progress">
          <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
            <span id='persen_upload'>0%</span> Complete
          </div>
        </div>

        
         <div id='files'>
         </div>


    </div>