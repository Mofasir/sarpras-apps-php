<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "sarpras");


function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows;
}

function request($data) {
    global $conn;

    $nama = $data["nama"];
    $nama_sarana = htmlspecialchars($data["nama_sarana"]);
    $jumlah = htmlspecialchars($data["jumlah"]);
    $keterangan = htmlspecialchars($data["keterangan"]);

    // tambahkan data baru ke database
    mysqli_query($conn, "INSERT INTO request VALUES('', '$nama', '$nama_sarana', '$jumlah', '$keterangan')");

    return mysqli_affected_rows($conn);
}

function cariSarana($keyword) {
    $query = "SELECT * FROM data_sarana
                WHERE
              id_sarana LIKE '%$keyword%' OR
              nama_sarana LIKE '%$keyword%' OR
              letak LIKE '%$keyword%'
            ";
    return query($query);
}

function cariPrasarana($keyword) {
    $query = "SELECT * FROM data_prasarana
                WHERE
              id_prasarana LIKE '%$keyword%' OR
              nama_prasarana LIKE '%$keyword%'
            ";
    return query($query);
}

function editProfile($data) {
    global $conn;

    $id_user = $data["id_user"];
    $nama = htmlspecialchars($data["nama"]);
    $username = htmlspecialchars($data["username"]);
    $no_hp = htmlspecialchars($data["no_hp"]);

    mysqli_query($conn, "UPDATE user SET
                            nama = '$nama',
                            username = '$username',
                            no_hp = '$no_hp'
                         WHERE id_user = '$id_user'
    ");

    return mysqli_affected_rows($conn);
}
?>