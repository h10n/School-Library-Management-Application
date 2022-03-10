<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>LIBRARY MEMBERSHIP CARD</title>
	<style media="screen">
		.card {
			float: left;
			width: 283px;
			height: 196px;
			border: 1px solid black;
			background-image: url("{{ asset('img/card-bg.jpg')}}");
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center center;
		}

		.avatar {
			position: absolute;
			top: 71px;
			margin-left: 15px;
		}

		#kop {
			padding-left: 5px;
			padding-right: 5px;
			padding-top: 5px;
		}

		#kop p {
			padding: 0;
			margin: 0;
		}

		#kop1 {
			font-size: 8pt;
			text-align: center;
			text-transform: uppercase;
		}

		#kop2 {

			font-size: 8pt;
			text-align: center;
			text-transform: uppercase;
		}

		.kop3 {

			font-size: 4pt;
			text-align: center;
		}


		#identitasPerpus {
			padding: 0;
			margin: 0;
			width: 100%;
		}

		#identitas {
			font-size: 8pt;
			text-align: left;
			margin-left: 70px;
		}

		#ttdTable {
			position: absolute;
			top: 136px;
			padding-right: 5px;
			margin: 0;
			font-size: 6pt;
			width: 100%;
			text-align: right;
		}

		#ttdTable td {
			vertical-align: bottom;
		}

		#ttdTable .tengah {
			width: 35%;
		}

		#ttdTable .ttd {
			height: 12px;
		}

		#berlaku {
			padding-left: 5px;
			position: absolute;
			top: 182px;
			font-size: 6pt;
		}

		.peraturan {
			margin-top: 30px;
			font-size: 8pt;
		}
	</style>
</head>

<body>
	@php
	$logoImg = !empty($setting->logo) ? asset('storage/uploads/logo/'.$setting->logo) :
	asset('img/icons8-no-camera.svg');
	$avatarImg = !empty($member->photo) ? asset('storage/uploads/anggota/'.$member->photo) :
	asset('img/icons8-no-camera.svg');
	@endphp
	<div class="card">
		<table id="kop" width="100%">
			<tr>
				<td>
					<img src="{{ $logoImg }}" width="37px">
				</td>
				<td id="identitasPerpus">
					<p id='kop1'><b>KARTU ANGGOTA PERPUSTAKAAN</b></p>
					<p id='kop2'><b>{{ $setting->name }}</b></p>
					<p class='kop3'>{{ $setting->address }}</p>
					<p class='kop3'>{{ $setting->website .' | '. $setting->email}}</p>
				</td>
			</tr>
		</table>
		<br>
		<div class="avatar">
			<img src="{{ $avatarImg }}" width="46px">
		</div>
		<table id="identitas" border="0">
			<tr>
				<td>Member Id</td>
				<td>:</td>
				<td>{{ $member->no_induk }}</td>
			</tr>
			<tr>
				<td>Name</td>
				<td>:</td>
				<td>{{ $member->name }}</td>
			</tr>
			@if ($member->jenis_anggota === 'siswa/i')
			<tr>
				<td>Grade</td>
				<td>:</td>
				<td>{{ $member->kelas }}</td>
			</tr>
			<tr>
				<td>Major</td>
				<td>:</td>
				<td>{{ $member->jurusan }}</td>
			</tr>
			@endif
		</table>
		<table id="ttdTable">
			<tr>
				<td>Samarinda, {{ Carbon\Carbon::now()->formatLocalized('%d %B %Y') }}</td>
			</tr>
			<tr>
				<td>Librarian</td>
			</tr>
			<tr>
				<td class="tengah ttd">
				</td>
			</tr>
			<tr>
				<td>{{ auth::user()->name ?? '' }}</td>
			</tr>
		</table>
	</div>
	<div class="card">
		<ol class="peraturan">
			@foreach ($announcements as $announcement)
			<li>{{ $announcement->text }}</li>
			@endforeach
		</ol>
	</div>
</body>

</html>