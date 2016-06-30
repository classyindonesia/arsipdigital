<div class="panel panel-warning">
    <div class="panel-heading">
        <h3 class="panel-title"> <i class='fa fa-bar-chart'></i> Hits Bulanan</h3>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
            <tr>
                <td>
                    Bulan Ini
                </td>
                <td>
                    {!! Fungsi::restyle_text($hits_bulan_ini)  !!}
                </td>
            </tr>
 
            <tr>
                <td>
                    Bulan Kemarin
                </td>
                <td>
                    {!! Fungsi::restyle_text($hits_bulan_kemarin)  !!}
                </td>
            </tr>

            <tr>
                <td>
                    Bulan Sebelumnya
                </td>
                <td>
                    {!! Fungsi::restyle_text($hits_bulan_sebelumnya)  !!}
                </td>
            </tr>

        </table>
    </div>
</div>