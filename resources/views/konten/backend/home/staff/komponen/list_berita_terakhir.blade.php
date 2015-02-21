@foreach($berita_terakhir as $list)

	<b> <i class='fa fa-angle-right'></i> {{ $list->judul }}</b>
	<br>

	<span class='label bg-red'><i class='fa fa-calendar'></i> {{ Fungsi::date_to_tgl($list->created_at) }}</span> ||
	<span class='label bg-olive'><i class='fa fa-clock-o'></i> {{ date('H:i', strtotime($list->created_at)) }}</span>
	||
	<span style='cursor:pointer;' id='edit{{ $list->id }}' class='label bg-blue'> <i class='fa fa-pencil-square'></i> edit </span>
	<hr style='margin-top:2px;'>

<script type="text/javascript">
$('#edit{{ $list->id }}').click(function(){
	window.location.href = '{{ URL::route("admin_berita.edit", $list->id) }}'
});
</script>



@endforeach