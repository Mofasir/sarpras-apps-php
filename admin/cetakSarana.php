<?php

require_once __DIR__ . '/vendor/autoload.php';

require 'functions.php';
$sarana = query("SELECT * FROM data_sarana");

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
    <title>Data Sarana Pesantren</title>
</head>
<body>
    <div id="cetak">
    <h1>Laporan Data Sarana Pesantren</h1>
        <table>
                <tr>
                    <th>No.</th>
                    <th>Id Sarana</th>
                    <th>Nama Sarana</th>
                    <th>Jumlah</th>
                    <th>Letak</th>
                    <th>Keterangan</th>
                </tr>';

        $i = 1;
        foreach( $sarana as $row ) {
            $html .= '<tr>
                <td>'. $i++ .'</td>
                <td>'. $row["id_sarana"] .'</td>
                <td>'. $row["nama_sarana"] .'</td>
                <td>'. $row["jumlah"] .'</td>
                <td>'. $row["letak"] .'</td>
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
