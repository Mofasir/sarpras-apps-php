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

function tambahSarana($data) {
    global $conn;

    $id_sarana = htmlspecialchars($data["id_sarana"]);
    $nama_sarana = htmlspecialchars($data["nama_sarana"]);
    $jumlah = htmlspecialchars($data["jumlah"]);
    $letak = htmlspecialchars($data["letak"]);
    $keterangan = htmlspecialchars($data["keterangan"]);

    // tambahkan data baru ke database
    mysqli_query($conn, "INSERT INTO data_sarana VALUES('$id_sarana', '$nama_sarana', '$jumlah', '$letak', '$keterangan')");

    return mysqli_affected_rows($conn);
}

function tambahPrasarana($data) {
    global $conn;

    $id_prasarana = htmlspecialchars($data["id_prasarana"]);
    $nama_prasarana = htmlspecialchars($data["nama_prasarana"]);
    $jumlah = htmlspecialchars($data["jumlah"]);
    $keterangan = htmlspecialchars($data["keterangan"]);

    // tambahkan data baru ke database
    mysqli_query($conn, "INSERT INTO data_prasarana VALUES('$id_prasarana', '$nama_prasarana', '$jumlah', '$keterangan')");

    return mysqli_affected_rows($conn);
}

function tambahUser($data) {
    global $conn;

    $nama = $data["nama"];
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $kpassword = mysqli_real_escape_string($conn, $data["kpassword"]);
    $no_hp = $data["no_hp"];
    
    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if( mysqli_fetch_assoc($result) ) {
        echo "<script>
                alert('username sudah terdaftar!')
            </script>";
        return false;
    }

    // cek konfirmasi password
    if( $password !== $kpassword ) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
            </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$nama', '$username', '$password', '$no_hp', 'user')");

    return mysqli_affected_rows($conn);
}

function hapusSarana($id_sarana) {
    global $conn;
    mysqli_query($conn, "DELETE FROM data_sarana WHERE id_sarana = '$id_sarana'");

    return mysqli_affected_rows($conn);
}

function hapusPrasarana($id_prasarana) {
    global $conn;
    mysqli_query($conn, "DELETE FROM data_prasarana WHERE id_prasarana = '$id_prasarana'");

    return mysqli_affected_rows($conn);
}

function hapusUser($id_user) {
    global $conn;
    mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id_user'");

    return mysqli_affected_rows($conn);
}

function editSarana($data) {
    global $conn;

    $id_sarana = htmlspecialchars($data["id_sarana"]);
    $nama_sarana = htmlspecialchars($data["nama_sarana"]);
    $jumlah = htmlspecialchars($data["jumlah"]);
    $letak = htmlspecialchars($data["letak"]);
    $keterangan = htmlspecialchars($data["keterangan"]);

    mysqli_query($conn, "UPDATE data_sarana SET
                            id_sarana = '$id_sarana',
                            nama_sarana = '$nama_sarana',
                            jumlah = '$jumlah',
                            letak = '$letak',
                            keterangan = '$keterangan'
                         WHERE id_sarana = '$id_sarana'
    ");

    return mysqli_affected_rows($conn);
}

function editPrasarana($data) {
    global $conn;

    $id_prasarana = htmlspecialchars($data["id_prasarana"]);
    $nama_prasarana = htmlspecialchars($data["nama_prasarana"]);
    $jumlah = htmlspecialchars($data["jumlah"]);
    $keterangan = htmlspecialchars($data["keterangan"]);

    mysqli_query($conn, "UPDATE data_prasarana SET
                            id_prasarana = '$id_prasarana',
                            nama_prasarana = '$nama_prasarana',
                            jumlah = '$jumlah',
                            keterangan = '$keterangan'
                         WHERE id_prasarana = '$id_prasarana'
    ");

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
?>