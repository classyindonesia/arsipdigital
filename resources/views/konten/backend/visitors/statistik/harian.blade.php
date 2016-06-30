<div class="panel panel-success">
    <div class="panel-heading">
        <h3 class="panel-title"> <i class='fa fa-bar-chart'></i> Hits Harian</h3>
    </div>
    <div class="panel-body">
        <table class="table table-hover">
            <tr>
                <td>
                    Hari Ini
                </td>
                <td>
                    {!! Fungsi::restyle_text($hits_hari_ini)  !!}
                </td>
            </tr>
 
             <tr>
                <td>
                    Kemarin
                </td>
                <td>
                    {!! Fungsi::restyle_text($hits_kemarin)  !!}
                </td>
            </tr>

             <tr>
                <td>
                    Hari sebelumnya
                </td>
                <td>
                    {!! Fungsi::restyle_text($hits_hari_sebelumnya)  !!}
                </td>
            </tr>

        </table>
    </div>
</div>