<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>portrait</title>
<style media="screen">
.card {
	float: left;
	width: 283px;
	height: 196px;	
	border: 1px solid black;
	background-image: url({{ asset('img/card-bg.jpg') }});
    background-size:     contain;                
    background-repeat:   no-repeat;
    background-position: center center; 
}

.avatar {
	position: absolute;
	top: 81px;
	margin-left: 10px;
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
}

#kop2 {

	font-size: 8pt;
	text-align: center;
}

.kop3 {

	font-size: 7pt;
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
.peraturan{
	margin-top: 30px; 
	font-size : 8pt;  
}
</style>
</head>

<body>

	<div class="card">

		<table id="kop" width="100%">
			<tr>
				<td><img src="{{ asset('img/logo/'.$img_name = !empty($logo) ? $logo : '')  }}" width="37px"></td>
				<td id="identitasPerpus">
					<p id='kop1'><b>KARTU ANGGOTA PERPUSTAKAAN</b></p>
					<p id='kop2'><b>SMK NEGERI 7 SAMARINDA</b></p>
					<p class='kop3'>Jl. Cumi-Cumi No.8, Tj. Laut Indah, Bontang Selatan</p>
					<p class='kop3'>Telp : (0548) 21114</span></p>
				</td>
			</tr>
		</table>
		<br>
		<div class="avatar"><img
				src="{{ asset('img/members_photo/'.$img_name = !empty($members->photo) ? $members->photo : '')  }}"
				width="76" height="auto" /></div>
		<table id="identitas">
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td>1543054</td>
			</tr>
			<tr>
				<td>Nama</td>
				<td>:</td>
				<td>Nur Hakim</td>
			</tr>
			<tr>
				<td>Jenis</td>
				<td>:</td>
				<td>Siswa/i</td>
			</tr>
			<tr>
				<td>Kelas</td>
				<td>:</td>
				<td>X TKJ</td>
			</tr>
		</table>
		<p id="berlaku">Berlaku Hingga 03 November 2020</p>
		<table id="ttdTable">
			<tr>
				<td>Samarinda, 25 Januari 2020</td>
			</tr>
			<tr>
				<td>Pustakawan</td>
			</tr>
			<tr>
				<td class="tengah ttd">
				</td>
			</tr>
			<tr>
				<td>Ferdiana Tri Ulandari, S.Kom</td>
			</tr>
		</table>
	</div>
	<div class="card">
		<ol class="peraturan">
			<li>Kartu Anggota ini harus dibawa setiap kunjungan, pinjaman, pengembalian keperpustakaan.</li>
			<li>Tanpa kartu Aggota, kunjungan, pinjaman, pengembalian tidak dilayani.</li>
			<li>Pengembalian lewat dari Batas waktunya akan dikenakan denda.</li>
			<li>Kartu ini tidak dapat dipergunakan oleh orang lain.</li>
			<li>Kartu Ini Berlaku hingga waktu yang ditentukan.</li>
		  </ol> 
	</div>
</body>

</html>
