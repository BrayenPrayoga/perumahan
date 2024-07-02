<html>
	<head>
        <style>
			.float-right {
				float : right !important;
			}
			.width-100 {
				width : 100% !important;
			}
			.width-50 {
				width : 50% !important;
			}
			.txt-center {
				text-align : center !important;
			}

            #title {
            }
            #title h1 {
                float : left;
                margin : 0px;
                text-align : center;
            }
			
			.kop {
				font-size : 20px;
			}
			
			#detail {
				font-size : 20px !important;
			}
			#detail table td {
				padding : 10px !important;
			}
			.txt-center {
				text-align : center !important;
			}
			.ses-style {
				border: 1px solid black;
				padding: 7px;
				font-weight: bold;
			}
			table {
				border-collapse: collapse;
			}
        </style>
    </head>
    <body>
    <!-- <body> -->
    	<center>
			<span style="font-size: 15px;"><b>PEMERINTAHAN PROVINSI DAERAH KHUSUS IBU KOTA JAKARTA</b></span><br>
            <span style="font-size: 17px;"><b>RUKUN TETANGGA RT 009 RW 010</b></span><br>
            <span style="font-size: 17px;"><b>KELURAHAN JONGGOL, KECAMATAN JONGGOL</b></span><br>
			<span style="font-size: 14px;">Perumahan Citra Indah City, Bukit Angsana RT 009 RW 010, Jonggol</span>
    	</center>
		<br>
			<hr style="border:1px solid #000;">
    	<br>
    	<table border="0" style="width: 100%; font-size: 17px;">
    		<tr>
    			<td align="center" style="font-weight: bold;"><u>SURAT KETERANGAN DOMISILI</u></td>
    		</tr>
    	</table>
		<table border="0" style="width: 100%; font-size: 14px;">
		<tr>
			<td align="center" style="font-weight: bold;">No.  009/010/SKD/</td>
		</tr>
		</table>
        <br>
    	<table border="0" style="width: 100%;">
    		<span>
                Yang bertanda tangan dibawah ini Pengurus RT. 009 / RW. 010 Kelurahan Jonggol, Kecamatan Jonggol, Jawa Barat dengan ini menerangkan :
            </span>
    	</table>
    	<br><br>
    	<table border="0" style="width: 100%;">
    		{{-- <tr>
				<td width="50%">
					<table border="0" style="width: 100%;">
						<tr>
							<td width="35%">Nama</td>
							<td width="65%">: </td>
						</tr>
					</table>
				</td>
				<td width="50%">
					<table border="0" style="width: 100%;">
						<tr>
							<td width="35%">Tkt. Keamanan</td>
							<td width="65%">: </td>
						</tr>
					</table>
				</td>
			</tr> --}}
			<tr>
				<td colspan="2">
					<table border="0" style="width: 100%;">
						<tr>
							<td width="25%">Nama</td>
							<td width="75%" style="vertical-align: top;">: {{$surat->nama}}</b></td>
						</tr>
						<tr>
							<td width="25%">Jenis / Kelamin</td>
							<td width="75%" style="vertical-align: top;">: {{(getUser($surat->id_users)->jenis_kelamin==1)?'Laki-Laki':'Perempuan'}}</b></td>
						</tr>
						<tr>
							<td width="25%">Tempat / Tanggal Lahir</td>
							<td width="75%" style="vertical-align: top;">: {{$surat->tempat_lahir}}, {{tgl_indo($surat->tgl_lahir)}}</b></td>
						</tr>
						<tr>
							<td width="25%">No. KTP / NIK</td>
							<td width="75%" style="vertical-align: top;">: {{getUser($surat->id_users)->nik_ktp}}</b></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td style="vertical-align: top;">: {{$surat->nama}}</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td style="vertical-align: top;">: Jl. Centex Gg. Epatik II Dalam RT 015 / RW 010 Ciracas, Jakarta Timur</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
        <br>
    	<table border="0" style="width: 100%;">
    		<span>
                Bahwa nama tersebut diatas adalah warga kami dan berdomisili diwilayah kami.<br>
                Demikian surat ini dibuat untuk dapat digunakan sebagaimana mestinya.
            </span>
    	</table>
    	<br><br><br>
    	<table border="0" style="width: 100%;">
			<tr>
				<td align="center">
					<span style="float: right;">Jakarta, {{date('d F Y')}}</span>
					<br>
                    <span style="float: right;padding-top: 10px;">Pengurus RT 009 / 010</span>
					<br><br><br>
					<div width="40%" style="float: right;">
						<img src="{{url('/tanda_tangan/ttd.png')}}" alt="Tanda Tangan" style="padding-right:15px;height:100px;width:100px;">
						<br>
						<span style="padding-right:-10px;">Joko Prayitnama</span>
                    </div>
				</td>
			</tr>
		</table>
    </body>
</html>