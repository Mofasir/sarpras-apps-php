<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$prasarana = query("SELECT * FROM data_prasarana");

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="s-touch-icon" sizes="76x76" href="../assets/img/logo-app.png">
    <link rel="icon" type="image/png" href="../assets/img/logo-app.png">
    <title>Data Prasarana Pesantren</title>
</head>
<body>
    <div id="cetak">
    <h1>Laporan Data Prasarana Pesantren</h1>
        <table>
                <tr>
                    <th>No.</th>
                    <th>Id Prasarana</th>
                    <th>Nama Prasarana</th>
                    <th>Jumlah</th>
                    <th>Keterangan</th>
                </tr>';

        $i = 1;
        foreach( $prasarana as $row ) {
            $html .= '<tr>
                <td>'. $i++ .'</td>
                <td>'. $row["id_prasarana"] .'</td>
                <td>'. $row["nama_prasarana"] .'</td>
                <td>'. $row["jumlah"] .'</td>
                <td>'. $row["keterangan"] .'</td>
            </tr>';
        };

$html .= '</div>
</table>
<p>................., ...........................20....</p>
<p>Staf Sarana Prasarana,</p>
<br>
<br>
<br>
<br>
<p>_______________________</p>
</body>
</html>';


$mpdf->WriteHTML($html);
$mpdf->Output();

?>