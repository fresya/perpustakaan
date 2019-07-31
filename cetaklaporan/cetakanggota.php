<?php
$koneksi = new mysqli("localhost", "root", "","perpustakaan");
$content = '
	<style type="text/css">
		.table{border-collapse: collapse;}
		.table th{padding: 8px 5px; background-color: lightgrey;}
	</style>
';
	$content .= '
	<page>
		<h2 align="center">Laporan Data Anggota</h2>
		<br>
		<div align = "center">
		<table border="1" class="table" align="center">
			<tr>
				<th align="center">No</th>
                <th align="center">ID Anggota</th>
                <th align="center">Nama</th>
				<th align="center">No Telp</th>
                <th align="center">Jenis Kelamin</th>
                <th align="center">Alamat</th>
                <th align="center">Kelas</th>                     
            </tr>';
                                   
            $no = 1;

			$sql = $koneksi -> query("SELECT * FROM data_anggota");

			while ($data = $sql ->fetch_assoc()) {

			$jenis_kelamin = ($data ['jenis_kelamin']==1)?"Laki-Laki":"Perempuan";

			$content .='


			<tr>
				<td align="center">'.$no++.'</td>
				<td>'.$data['id_anggota'].'</td>
				<td>'.$data['nama_anggota'].'</td>
				<td>'.$data['no_hp'].'</td>
				<td>'.$data['jenis_kelamin'].'</td>
				<td>'.$data['alamat'].'</td>
				<td>'.$data['status'].'</td>
            </tr>

            ';
            }
        $content .='
        </table></div>

        </page>';                 
                                        
	require_once('../assets/html2pdf/html2pdf.class.php');
	$html2pdf = new HTML2PDF('P','A4','fr');
	$html2pdf -> WriteHTML($content);
	$html2pdf -> Output('LaporanAdmin.pdf');

	?>