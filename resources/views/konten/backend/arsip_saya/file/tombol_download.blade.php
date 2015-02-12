    <button id='download_file{{ $file->id }}' class='btn btn-primary' style='font-size:20px;'> 
      <i class='fa fa-cloud-download'></i> download raw file</button>
     
    <script type="text/javascript">
    $('#download_file{{ $file->id }}').click(function(){
      window.location.href='{{ URL::route("my_archive.download_file", $file->id) }}'
    });
    </script>



     @if($cek == 1)

    <button id='download_file_watermark{{ $file->id }}' class='btn btn-primary' style='font-size:20px;'> 
      <i class='fa fa-cloud-download'></i> download file with watermark</button>
     
    <script type="text/javascript">
    $('#download_file_watermark{{ $file->id }}').click(function(){
      window.location.href='{{ URL::route("my_archive.download_file_watermark", $file->id) }}'
    });
    </script>


     @endif