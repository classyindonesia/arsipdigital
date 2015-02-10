    <!-- Warning box -->
    <div class="box box-solid bg-light-blue">
        <div class="box-header">
            <h3 class="box-title"> <i class='fa fa-info-circle'></i> Daftar Arsip Folder</h3>
        </div>
        <div class="box-body">
<hr>
        	<table>
        		<tr>
        			<td width='48%'>Nama Folder</td>
        			<td>: {{ $folder->nama }}</td>
        		</tr>
        		<tr>
        			<td>Jumlah Arsip</td>
        			<td>: {{ $arsip->total() }}</td>
        		</tr>
        		<tr>
        			<td>Rak </td>
        			<td>: {{ $folder->mst_rak->nama }}</td>
        		</tr>
        		<tr>
        			<td>Jumlah File</td>
        			<td>: 000</td>
        		</tr>

        	</table>

        </div><!-- /.box-body -->
    </div><!-- /.box -->