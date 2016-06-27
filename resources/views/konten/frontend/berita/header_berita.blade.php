  <h1 style='margin:2px;'> <a href="/"><i class='fa fa-arrow-left'></i></a> </h1>
  <h2>{{ $berita->judul }}</h2>
  <i class='fa fa-calendar'></i> {{ Fungsi::date_to_tgl(date('Y-m-d', strtotime($berita->created_at))) }}
  ||
  <i class='fa fa-clock-o'></i> {{ date('H:i', strtotime($berita->created_at)) }} [WIB]