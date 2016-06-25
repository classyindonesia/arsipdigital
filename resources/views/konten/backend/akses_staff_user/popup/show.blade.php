<h3>Data User</h3>

<table class="table table-bordered table-hover">
 
		<tr>
			<td>Nama</td>
			<td>{{ $data_user->nama }}</td>
		</tr>


		<tr>
			<td>Email</td>
			<td>{{ $data_user->mst_user->email }}</td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td>{{ $data_user->alamat }}</td>
		</tr>
		<tr>
			<td>No HP</td>
			<td>{{ $data_user->no_hp }}</td>
		</tr>
		<tr>
			<td>No Induk</td>
			<td>{{ $data_user->no_induk }}</td>
		</tr>

		<tr>
			<td>Tgl Lahir</td>
			<td> {!! Fungsi::date_to_tgl($data_user->tgl_lahir) !!} </td>
		</tr>


		<tr>
			<td>Tempat Lahir</td>
			<td>{{ $data_user->tempat_lahir }}</td>
		</tr>


		<tr>
			<td>Jenis Kelamin</td>
			<td> @if($data_user->jenis_kelamin == 'L') Laki-laki @else Perempuan @endif </td>
		</tr>



		<tr>
			<td>Kode Pos</td>
			<td>{{ $data_user->kode_post }}</td>
		</tr>

		<tr>
			<td>No Telp</td>
			<td>{{ $data_user->no_telp }}</td>
		</tr>

		<tr>
			<td>No KTP</td>
			<td>{{ $data_user->no_ktp }}</td>
		</tr>
		<tr>
			<td>Nama Ibu Kandung</td>
			<td>{{ $data_user->nama_ibu_kandung }}</td>
		</tr>
		<tr>
			<td>Status Ikatan</td>
			<td> @if(count($data_user->ref_status_ikatan)>0) {{ $data_user->ref_status_ikatan->nama }} @else - @endif  </td>
		</tr>
		<tr>
			<td>Agama</td>
			<td> @if(count($data_user->ref_agama)>0) {{ $data_user->ref_agama->nama }} @else - @endif </td>
		</tr>

		<tr>
			<td>Kota</td>
			<td>@if(count($data_user->ref_kota)>0) {{ $data_user->ref_kota->nama }} @else - @endif</td>
		</tr>
		<tr>
			<td>Home Base</td>
			<td> @if(count($data_user->ref_homebase)>0) {{ $data_user->ref_homebase->nama }} @else - @endif </td>
		</tr>
		<tr>
			<td>Status Pernikahan</td>
			<td> @if(count($data_user->ref_status_pernikahan)>0) {{ $data_user->ref_status_pernikahan->nama }} @else - @endif </td>
		</tr>


 </table>