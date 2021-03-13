<?php
include('header.php');
require "function.php";

if (isset($_POST["submit"])) {
    if (addBook($_POST) > 0) {
        echo "<script>
        alert('Book created successfully')
        </script>";
    } else {
        echo "<script>
        alert('Error!! Check your connection')
        </script>";
    }
}
$categories = index("SELECT * FROM category_tb");
$writers = index("SELECT * FROM writer_tb");
$books = index("SELECT * FROM book_tb");
?>
<div class="container">
    <div class="col-md-12">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="card mb-5">
                <div class="card-body">
                    <h5 class="card-title mb-3">Create Book</h5>
                    <input type="hidden" id="id" name="id">

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name of the Book" required>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="category_id" required>
                            <option selected disabled>Select One</option>
                            <?php foreach($categories as $category) : ?>
                            <option value="<?php echo $category["id"] ?>"><?php echo $category["name"] ?></option>
                            <?php endforeach; ?> 
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="writer" class="form-label">Writer</label>   
                        <select class="form-select" id="writer" name="writer_id" required>
                            <option selected disabled>Select One</option>
                            <?php foreach($writers as $writer) : ?>
                            <option value="<?php echo $writer["id"] ?>"><?php echo $writer["name"] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="year" class="form-label">Publication Year</label>
                        <input type="number" class="form-control" name="year" id="year" placeholder="Year of Publication" min="1800" max="2021" required>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Image</label>
                        <input type="file" class="form-control" id="img" name="img" required> 
                    </div>

                    <button class="btn btn-primary" type="submit" name="submit">Create</button>
                </div>
            </div>
        </form>

        <div>
        <table class="table table-striped mb-5">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Writer</th>
                        <th scope="col">Publication Year</th>
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($books as $book) : ?>
                        <tr>
                            <td scope="row"><?= $no; ?></td>
                            <td scope="row"><?= $book["name"] ?></td>
                            <td scope="row"><?= $book["category_id"] ?></td>
                            <td scope="row"><?= $book["writer_id"] ?></td>
                            <td scope="row"><?= $book["publication_year"] ?></td>
                            <td>
                                <a href="editbook.php?id=<?php echo $book["id"]; ?>"><button class="btn btn-info" type="submit" name="submit">Edit</button></a>
                            </td>
                            <td>
                                <a href="deletebook.php?id=<?php echo $book["id"]; ?>" onclick="return confirm('Yakin hapus?')"><button class="btn btn-danger" type="submit" name="submit">Delete</button></a>
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