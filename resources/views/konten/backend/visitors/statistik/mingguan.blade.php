<div class="panel panel-info">
    <div class="panel-heading">
        <h3 class="panel-title"> <i class='fa fa-bar-chart'></i> Hits Mingguan</h3>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
            <tr>
                <td>
                    Minggu Ini
                </td>
                <td>
                    {!! Fungsi::restyle_text($hits_minggu_ini)  !!}
                </td>
            </tr>
            <tr>
                <td>
                    Minggu Kemarin
                </td>
                <td>
                    {!! Fungsi::restyle_text($hits_minggu_kemarin)  !!}
                </td>
            </tr>
            <tr>
                <td>
                    Minggu Sebelumnya
                </td>
                <td>
                    {!! Fungsi::restyle_text($hits_minggu_sebelumnya)  !!}
                </td>
            </tr>


        </table>
    </div>
</div>