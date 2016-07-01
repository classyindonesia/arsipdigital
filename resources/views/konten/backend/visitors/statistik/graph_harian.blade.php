 
<div id="graph_harian" style="min-width: 310px; height: 250px; margin: 0 auto"></div>

<script type="text/javascript">
	
$(function () {
    $('#graph_harian').highcharts({
        title: {
            text: 'Hits Per Hari',
            x: -20 //center
        },
        subtitle: {
            // text: 'Source: WorldClimate.com',
            x: -20
        },
        xAxis: {
            categories: ['Hari Ini', 'Kemarin', 'Hari Sebelumnya']
        },
        yAxis: {
            title: {
                text: 'Jumlah Hits'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            // valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Harian',
             type: 'column',
            data: [{!! $hits_hari_ini !!}, {!! $hits_kemarin !!}, {!! $hits_hari_sebelumnya !!}]
        }]
    });
});

</script>

