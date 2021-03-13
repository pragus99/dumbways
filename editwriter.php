<?php
include('header.php');
include('function.php');

//ambil data sebelum diubah
$id = $_GET["id"];
$writer = index("SELECT * FROM writer_tb WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (editWrit($_POST) > 0) {
        echo "<script>
        alert('Writer Edited successfully');
        document.location.href = 'writer.php';
        </script>";
    } else {
        echo "<script>
        alert('Error!! Check your connection');
        document.location.href = 'writer.php';
        </script>";
    }
}


?>
<div class="container">
    <div class="col-md-12">
        <form class="mb-5" action="" method="POST">
            <input type="hidden" id="id" name="id">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Edit Writer</h5>
                    <div class="mb-3">
                    <input type="hidden" name="id" value="<?php echo $writer["id"] ?>">
                        <label for="writer" class="form-label">Name</label>
                        <input type="text" class="form-control" id="writer" name="name" value="<?php echo $writer["name"] ?>" required>
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit">Edit</button>
                </div>
            </div>
        </form>

<?php include('footer.php') ?>