 
<div id="graph_mingguan" style="min-width: 310px; height: 250px; margin: 0 auto"></div>

<script type="text/javascript">
	
$(function () {
    $('#graph_mingguan').highcharts({
        title: {
            text: 'Hits Per Minggu',
            x: -20 //center
        },
        subtitle: {
            // text: 'Source: WorldClimate.com',
            x: -20
        },
        xAxis: {
            categories: ['Minggu Ini', 'Minggu Kemarin', 'Minggu Sebelumnya']
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
            color : '#A2D651',
            name: 'Mingguan',
             type: 'column',
            data: [{!! $hits_minggu_ini !!}, {!! $hits_minggu_kemarin !!}, {!! $hits_minggu_sebelumnya !!}]
        }]
    });
});

</script>

