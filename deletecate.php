<?php


require 'function.php';

$id = $_GET['id'];

    if ( delCate($id) > 0) 
    {
    echo "<script>
            alert('Data berhasil dihapus');
            document.location.href = 'category.php';
          </script>";
    } else {

        echo "<script>
            alert('Data gagal dihapus. hapus dulu buku terkait');
            document.location.href = 'category.php';
          </script>";
    }


?>