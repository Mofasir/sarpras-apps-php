<?php
require 'functions.php';

$id_prasarana = $_GET["id_prasarana"];

if( hapusPrasarana($id_prasarana) > 0 ) {
    echo "<script>
        alert('Data berhasil dihapus!');
        document.location.href = 'prasarana.php';
    </script> 
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'prasarana.php';
        </script> 
    ";
}
?>