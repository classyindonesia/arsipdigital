<div class="animated fadeIn">
    <!-- Primary tile -->
    <div class="box box-solid bg-light-blue">
        <div class="box-header">
            <h3 class="box-title"> 
            <i class='fa fa-info'></i> Info Arsip</h3>
        </div>
        <div class="box-body">
            <table>
                <tr>
                    <td width='50%'>Nama Arsip</td>
                    <td>: {{ $arsip->nama }}</td>
                </tr>
                <tr>
                    <td>Total File Size</td>
                    <td>: <span id='size_all_files'>{{ Fungsi::size($size) }}</span></td>
                </tr>


                <tr>
                    <td>Jumlah File</td>
                    <td>: <span id='jml_file'>{{ count($file) }}</span></td>
                </tr>

                <tr>
                    <td>Pemilik</td>
                    <td>: {{ $user->nama }}</td>
                </tr>

                <tr>
                    <td>Max Upload Size</td>
                    <td>: {{ Fungsi::size($max_upload) }}</td>
                </tr>



            </table>


        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div><!-- /.col -->