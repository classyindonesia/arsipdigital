<div class="row">
	<div class="col-md-12">
		<hr>
		<div id="statistik_visitor" style="min-width: 310px; height: 400px; margin: 0 auto"></div>		
	</div>
</div>


<script type="text/javascript">
$(function () {
    $('#statistik_visitor').highcharts({
        title: {
            text: 'Informasi Peserta Pendaftaran',
            x: -20 //center
        },
        xAxis: {
            categories: [
                        	"AGAMA"                        
            ]
        },
        yAxis: {
            title: {
                text: 'Jumlah Peserta Pendaftaran'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' Peserta'
        },
        series: [{
            name: 'Kuota Pendaftaran',
            type: 'column',
            data: [
                        	359,
                        ]
        }, {
            name: 'Terdaftar',
            type: 'column',
            data: [
                        	32,
                        ]
        }, {
            name: 'Sisa Kuota',
            type: 'column',
            data: [
                        	33,

                        ]
        }, {
            name: 'Belum Terverifikasi  (119)',
            type: 'column',
            data: [
            	            		24,
            ]
        }



        ]
    });
});	
</script>