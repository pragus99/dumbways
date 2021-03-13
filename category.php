<?php
include('header.php');
require "function.php";

if (isset($_POST["submit"])) {
    if (addCategory($_POST) > 0) {
        echo "<script>
        alert('Category created successfully')
        </script>";
    } else {
        echo "<script>
        alert('Error!! Check your connection')
        </script>";
    }
}

$categories = index("SELECT * FROM category_tb");
?>

<div class="container">
    <div class="col-md-12">
        <div class="card mb-5">
            <div class="card-body">
                <h5 class="card-title mb-3">Create Category</h5>
                <form class="" action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" id="id" name="id">
                    <div class="mb-3">
                        <label for="category" class="form-label">Name</label>
                        <input type="text" class="form-control" id="category" name="name" placeholder="Name of the Category" required>
                    </div>
                    <button class="btn btn-primary" type="submit" name="submit">Create</button>
                </form>
            </div>
        </div>
        <div>
            <table class="table table-striped mb-5">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($categories as $category) : ?>
                        <tr>
                            <td scope="row"><?= $no; ?></td>
                            <td scope="row"><?= $category["name"] ?></td>
                            <td>
                                <a href="editcategory.php?id=<?php echo $category["id"]; ?>"><button class="btn btn-info" type="submit" name="submit">Edit</button></a>
                            </td>
                            <td>
                                <a href="deletecate.php?id=<?php echo $category["id"]; ?>" onclick="return confirm('Yakin hapus?')"><button class="btn btn-danger" type="submit" name="submit">Delete</button></a>
                            </td>
                        </tr>
                        <?php $no++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include('footer.php') ?>