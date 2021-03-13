<?php


require 'function.php';

$id = $_GET['id'];

    if ( delWrit($id) > 0) 
    {
    echo "<script>
            alert('Data berhasil dihapus');
            document.location.href = 'writer.php';
          </script>";
    } else {
        echo "<script>
            alert('Data gagal dihapus, hapus dulu buku terkait');
            document.location.href = 'writer.php';
          </script>";
    }


?>