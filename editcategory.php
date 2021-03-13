<?php
include('header.php');
include('function.php');

//ambil data sebelum diubah
$id = $_GET["id"];
$category = index("SELECT * FROM category_tb WHERE id = $id")[0];

if (isset($_POST["submit"])) {
    if (editCate($_POST) > 0) {
        echo "<script>
        alert('Category Edited successfully');
        document.location.href = 'category.php';
        </script>";
    } else {
        echo "<script>
        alert('Error!! Check your connection');
        document.location.href = 'category.php';
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
                    <h5 class="card-title mb-3">Edit category</h5>
                    <div class="mb-3">
                    <input type="hidden" name="id" value="<?php echo $category["id"] ?>">
                        <label for="category" class="form-label">Name</label>
                        <input type="text" class="form-control" id="category" name="name" value="<?php echo $category["name"] ?>" required>
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit">Edit</button>
                </div>
            </div>
        </form>

<?php include('footer.php') ?>