<?php
include('header.php');
require "function.php";

$id = $_GET["id"];
$book = index("SELECT * FROM book_tb WHERE id = $id")[0];
$categories = index("SELECT * FROM category_tb");
$writers = index("SELECT * FROM writer_tb");

if (isset($_POST["submit"])) {
    if (addBook($_POST) > 0) {
        echo "<script>
        alert('Book edited successfully')
        </script>";
    } else {
        echo "<script>
        alert('Error!! Check your connection')
        </script>";
    }
}


?>
<div class="container">
    <div class="col-md-12">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="card mb-5">
                <div class="card-body">
                    <h5 class="card-title mb-3">Create Book</h5>
                    <input type="hidden" name="id" value="<?php echo $book["id"] ?>">
                    <input type="hidden" name="oldimg" value="<?php echo $book["img"] ?>">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name" value="<?php echo $book["name"] ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category</label>
                        <select class="form-select" id="category" name="category_id" required>
                            <option disabled>Select One</option>
                            <?php foreach($categories as $category) : ?>
                            <option value="<?php echo $category["id"] ?>" 
                            <?php if($category["id"]==$book["category_id"]) : ?>
                            selected <?php endif; ?>
                            >
                             <?php echo $category["name"] ?></option>
                            <?php endforeach; ?> 
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="writer" class="form-label">Writer</label>   
                        <select class="form-select" id="writer" name="writer_id" required>
                        <option disabled>Select One</option>
                            <?php foreach($writers as $writer) : ?>
                            <option value="<?php echo $writer["id"] ?>" 
                            <?php if($writer["id"]==$book["writer_id"]) : ?>
                            selected <?php endif; ?>
                            >
                             <?php echo $writer["name"] ?></option>
                             <?php endforeach; ?> 
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="year" class="form-label">Publication Year</label>
                        <input type="number" class="form-control" name="year" id="year" value="<?php echo $book["publication_year"] ?>" min="1800" max="2021" required>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Image</label>
                        <input type="file" class="form-control" id="img" name="img" required> 
                    </div>

                    <button class="btn btn-primary" type="submit" name="submit">Create</button>
                </div>
            </div>
        </form>

    </div>
</div>

<?php include('footer.php') ?>