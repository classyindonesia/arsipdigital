<h3>Detail File Lampiran </h3>
<hr style='margin:2px;'>

<table class='table'>
	<tr>
		<td width='30%'>
			Nama Lampiran
		</td>
		<td>{!! $lampiran->nama !!}</td>
	</tr>


	<tr>
		<td>
			nama file 
		</td>
		<td>{!! $lampiran->nama_file_asli !!}</td>
	</tr>


	<tr>
		<td>
			tgl upload
		</td>
		<td>{!! Fungsi::date_to_tgl($lampiran->created_at) !!}</td>
	</tr>

	<tr>
		<td>
			Size 
		</td>
		<td>{!! Fungsi::size($lampiran->size) !!}</td>
	</tr>


</table>