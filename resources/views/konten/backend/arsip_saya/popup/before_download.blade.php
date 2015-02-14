<h3>View or Download</h3>
<hr>
 



<table width='100%'>
	<tr>
		<td>Nama File</td>
		<td>{{ $file->nama_file_asli }}</td>
	</tr>
	<tr>
		<td>size</td>
		<td>{{ Fungsi::size($file->size) }}</td>
	</tr>	
</table>


<hr>





 @if($cek == 1 || $cek == 2)
	<b>View file</b><hr style='margin:2px;'>
	

	<button style='font-size:20px;' class='btn btn-primary' id='view{{ $file->id }}'> 
		@if($cek==1) 
			<i class="fa fa-file-image-o"></i>
		@else
			<i class="fa fa-file-pdf-o"></i>
		@endif

	 View file
	</button>

<script type="text/javascript">
$('#view{{ $file->id }}').click(function(){
	window.open('{!! URL::route("my_archive.view_file", $file->id) !!}');
})


</script>

<hr>

@endif







<b>Download</b><hr style='margin:2px;'>

<button id='download_file{{ $file->id }}' class='btn btn-primary' style='font-size:20px;'> <i class='fa fa-cloud-download'></i> download</button>
 
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