 
<div id="graph_bulanan" style="min-width: 310px; height: 250px; margin: 0 auto"></div>

<script type="text/javascript">
	
$(function () {
    $('#graph_bulanan').highcharts({
        title: {
            text: 'Hits Per Minggu',
            x: -20 //center
        },
        subtitle: {
            // text: 'Source: WorldClimate.com',
            x: -20
        },
        xAxis: {
            categories: ['Bulan Ini', 'Bulan Kemarin', 'Bulan Sebelumnya']
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
            color : '#008CA8',
            name: 'Bulanan',
             type: 'column',
            data: [{!! $hits_bulan_ini !!}, {!! $hits_bulan_kemarin !!}, {!! $hits_bulan_sebelumnya !!}]
        }]
    });
});

</script>

