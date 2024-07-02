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
			<span style="font-size: 15px;">SURAT PERNYATAAN BELUM PERNAH MENIKAH<br>UNTUK PERSYARATAN MENIKAH</span>
    	</center>
    	<br>
		<table border="0" style="width: 100%; font-size: 14px;">
		<tr>
			<td align="center" style="vertical-align: top;">Nomor : </td>
		</tr>
		</table>
    	<br>
    	<table border="0" style="width: 100%;">
			<tr>
				<td colspan="2">
					<table border="0" style="width: 100%;">
						<tr>
							<td width="25%">Nama</td>
							<td width="75%" style="vertical-align: top;">: {{ $diri->nama }}</b></td>
						</tr>
						<tr>
							<td width="25%">Tempat / Tanggal Lahir</td>
							<td width="75%" style="vertical-align: top;">: {{ $diri->tempat_lahir }} {{ $diri->tgl_lahir }}</b></td>
						</tr>
						<tr>
							<td width="25%">Jenis / Kelamin</td>
							<td width="75%" style="vertical-align: top;">: {{ $diri->jenis_kelamin }}</b></td>
						</tr>
						<tr>
							<td width="25%">Bin / Binti</td>
							<td width="75%" style="vertical-align: top;">: {{ $diri->bin_binti }}</b></td>
						</tr>
						<tr>
							<td width="25%">No. KTP / NIK</td>
							<td width="75%" style="vertical-align: top;">: {{ $diri->nik_ktp }}</b></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td style="vertical-align: top;">: {{ $diri->agama }}</td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td style="vertical-align: top;">: {{ $diri->pekerjaan }}</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td style="vertical-align: top;">: {{ $diri->alamat }}</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<br>
    	<table border="0" style="width: 100%;">
    		<span>
                Dengan ini saya menyatakan dengan sebenarnya bahwa sampai hari ini {{ getDayInDate($hari) }} tanggal {{ tgl_indo($date) }} masih berstatus {{ $umum->status_nikah }} dan 
                belum pernah menikah dengan siapapun ,kecuali baru akan menikah dengan calon suami / istri yang bernama tersebut dibawah ini :
            </span>
    	</table>
        <br><br>
    	<table border="0" style="width: 100%;">
			<tr>
				<td colspan="2">
					<table border="0" style="width: 100%;">
						<tr>
							<td width="25%">Nama</td>
							<td width="75%" style="vertical-align: top;">: {{ $pasangan->nama }}</b></td>
						</tr>
						<tr>
							<td width="25%">Tempat / Tanggal Lahir</td>
							<td width="75%" style="vertical-align: top;">: {{ $pasangan->tempat_lahir }} {{ $pasangan->tgl_lahir }}</b></td>
						</tr>
						<tr>
							<td width="25%">Jenis / Kelamin</td>
							<td width="75%" style="vertical-align: top;">: {{ $pasangan->jenis_kelamin }}</b></td>
						</tr>
						<tr>
							<td width="25%">Bin / Binti</td>
							<td width="75%" style="vertical-align: top;">: {{ $pasangan->bin_binti }}</b></td>
						</tr>
						<tr>
							<td width="25%">No. KTP / NIK</td>
							<td width="75%" style="vertical-align: top;">: {{ $pasangan->nik_ktp }}</b></td>
						</tr>
						<tr>
							<td>Agama</td>
							<td style="vertical-align: top;">: {{ $pasangan->agama }}</td>
						</tr>
						<tr>
							<td>Pekerjaan</td>
							<td style="vertical-align: top;">: {{ $pasangan->pekerjaan }}</td>
						</tr>
						<tr>
							<td>Alamat</td>
							<td style="vertical-align: top;">: {{ $pasangan->alamat }}</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<br>
    	<table border="0" style="width: 100%;">
    		<span>
                Demikianlah surat pernyataan ini saya buat .apabila dikemudian hari ternyata tidak benar maka saya sanggup di tuntut berdasarkan hukum yang berlaku tanpa melibatkan
                pihak manapun baik pemerintah Kelurahan maupun Kecamatan dan surat pernyataan ini untuk persyaratan pernikahan saya pada hari {{ $umum->hari }} tanggal {{ tgl_indo($umum->tanggal) }}
                di KUA {{ $umum->nama_kua }} Kecamatan {{ $umum->kecamatan }} Wali Kota / Kab {{ $umum->walikota }} Provinsi {{ $umum->provinsi }} 
            </span>
    	</table>
        <br>
    	<br><br>
        <table border="0" style="width: 100%;">
			<tr>
				<td align="center" width="50%"></td>
				<td align="center" width="50%">
					<span>Jakarta, {{date('d F Y')}}</span>
				</td>
			</tr>
		</table>
        <br>
    	<table border="0" style="width: 100%;">
			<tr>
				<td align="center" width="50%">
                    <span style="padding-top: 10px;">Orang Tua / Wali</span>
                    <br><br><br>
                    <div>
                        <br><br><br><br><br>
                        <span style="padding-left:-10px;">(............................)</span>
                    </div>
				</td>
                <td align="center" width="50%">
                    <span style="padding-top: 10px;">Yang membuat pernyataan</span>
                    <br><br><br>
                    <div>
                        <br><br><br><br><br>
                        <span style="padding-left:-10px;">Joko Prayitnama</span>
                    </div>
				</td>
			</tr>
		</table>
        <table border="0" style="width: 100%;">
            <tr>
                <td align="center">MENGETAHUI</td>
            </tr>
        </table>
    	<table border="0" style="width: 100%;">
			<tr>
				<td align="center" width="50%">
                    <span style="padding-top: 10px;">Ketua RW 010</span>
                    <br><br><br>
                    <div>
                        <br><br><br><br><br>
                        <span style="padding-left:-10px;">(............................)</span>
                    </div>
				</td>
                <td align="center" width="50%">
                    <span style="padding-top: 10px;">Ketua RT 009 / RW 010</span>
                    <br><br><br>
                    <div>
                        <img src="{{url('/tanda_tangan/ttd.png')}}" alt="Tanda Tangan" style="padding-left:15px;height:100px;width:100px;">
                        <br>
                        <span style="padding-left:-10px;">( Joko Prayitnama )</span>
                    </div>
				</td>
			</tr>
		</table>
    </body>
</html>