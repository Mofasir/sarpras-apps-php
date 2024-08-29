<?php
require 'functions.php';

$id_sarana = $_GET["id_sarana"];

if( hapusSarana($id_sarana) > 0 ) {
    echo "<script>
        alert('Data berhasil dihapus!');
        document.location.href = 'sarana.php';
    </script> 
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'sarana.php';
        </script> 
    ";
}
?>
