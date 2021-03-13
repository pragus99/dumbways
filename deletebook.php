<?php

require 'function.php';

$id = $_GET['id'];

    if ( delBook($id) > 0) 
    {
    echo "<script>
            alert('Data berhasil dihapus')
            document.location.href = 'book.php';
          </script>";
    } else {

        echo "<script>
            alert('Data gagal dihapus');
            document.location.href = 'book.php';
          </script>";
    }


?>