	<div id='kotak_gambar{!! $list->id !!}' class='daftar_gambar'>
	<img id='gambar{!! $list->id !!}' class='gambar' src="/upload/gambar_berita/{!! $list->nama_file_asli !!}?{!! date('Ymdhis') !!}" class='img-rounded'   >

			<i data-toggle='tooltip' title='tambahkan gambar ke artikel' id='tombol_insert{!! $list->id !!}' class='fa fa-link tombol_insert'></i>

			<i id='tombol_del{!! $list->id !!}' class='fa fa-times pull-right text-danger tombol_hapus'></i>
	</div>