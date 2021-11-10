<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Detail Pasien {{ $nama }}</title>
</head>
<body>
	<center>
		<h1>PT. Jasamedika Saranatama</h1>
		<p>Jl. Cikutra Baru Raya No.28, Neglasari, Bandung, Kota Bandung, Jawa Barat 40124</p>
		<hr />
		<h2>Kartu Berobat</h2>
	</center>
	ID Pasien : {{ $id }} <br />
	Nama : {{ $nama }} <br />
	Alamat : {{ $alamat }}, RT {{ $rt }} RW {{ $rw }} <br />
	Kel/Kec, Kota : {{ $nama_kelurahan }} / {{ $nama_kecamatan}}, Kota {{ $nama_kota }} <br />
	Tanggal Lahir : {{ $tanggal_lahir }} <br />
	Jenis Kelamin : {{ $jenis_kelamin }} <br />
</body>
</html>