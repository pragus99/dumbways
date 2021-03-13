<?php

// terhubung database
$conn = mysqli_connect('localhost', 'root', '', 'dumblibrary');

function index($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $wadah = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $wadah[] = $row;
    }
    return $wadah;
}

//menambah book, category beserta penulis
function addCategory($data)
{
    global $conn;
    $nama = htmlspecialchars($data["name"]);

    $query = "INSERT INTO category_tb VALUES
            ('', '$nama')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function addWriter($data)
{
    global $conn;
    $nama = htmlspecialchars($data["name"]);

    $query = "INSERT INTO writer_tb VALUES
            ('', '$nama')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function addBook($data)
{
    global $conn;

    $nama = htmlspecialchars($data["name"]);
    $categoryId = $data["category_id"];
    $writerId = $data["writer_id"];
    $year = htmlspecialchars($data["year"]);

    // Upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO book_tb VALUES 
            ('', '$nama', '$categoryId', '$writerId', '$year', '$gambar')";

    mysqli_query($conn, $query);    

    return mysqli_affected_rows($conn);
}

// upload gambar
function upload()
{
    $namaFile = $_FILES["img"]["name"];
    $ukuranFile = $_FILES["img"]["size"];
    $error = $_FILES["img"]["error"];
    $tmpName = $_FILES["img"]["tmp_name"];

    // cek upload gambar
    if ($error === 4) {
        echo "<script>
                alert('you must choose image file!');
              </script>";
        return false;
    }

    //cek ekstensi
    $ekstensiValid = ['jpeg', 'jpg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));


    if (!in_array($ekstensiGambar, $ekstensiValid)) {
        echo "<script>
                alert('Please, select image with extension jpeg, jpg, or png!');
              </script>";
        return false;
    }
    //menghasilkan nama acak
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    //cek ukuran
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('Too big! file must under 10 MB');
              </script>";
        return false;
    }

    move_uploaded_file($tmpName, '' . $namaFileBaru);

    return $namaFileBaru;
}

// mengubah book, category dan penulis
function editBook($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["name"]);
    $categoryId = $data["category_id"];
    $writerId = $data["writer_id"];
    $year = htmlspecialchars($data["year"]);
    $oldImg = htmlspecialchars($data["oldimg"]);


    if ($_FILES["img"]["error"] === 4) {
        $gambar = $oldImg;
    } else {
        $gambar = upload();
    }

    $query = "UPDATE book_tb SET 
                name = '$nama', 
                category_id = '$categoryId', 
                writer_id = '$writerId', 
                publication_year = '$year',
                img = '$gambar'
                WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function editCate($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["name"]);

    $query = "UPDATE category_tb SET 
                name = '$nama'
                WHERE id = $id";

    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn);
}

function editWrit($data)
{
    global $conn;
    $id = $data["id"];
    $nama = htmlspecialchars($data["name"]);

    $query = "UPDATE writer_tb SET 
                name = '$nama'
                WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


//menghapus book, category dan penulis

function delBook($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM book_tb WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function delCate($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM category_tb WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function delWrit($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM writer_tb WHERE id = $id");

    return mysqli_affected_rows($conn);
}
?>