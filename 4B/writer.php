<?php
include('header.php');
include('function.php');

if (isset($_POST["submit"])) {
    if (addWriter($_POST) > 0) {
        echo "<script>
        alert('Writer created successfully')
        </script>";
    } else {
        echo "<script>
        alert('Error!! Check your connection')
        </script>";
    }
}

$writers = index("SELECT * FROM writer_tb");

?>
<div class="container">
    <div class="col-md-12">
        <form class="mb-5" action="" method="POST">
            <input type="hidden" id="id" name="id">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Create Writer</h5>
                    <div class="mb-3">
                        <label for="writer" class="form-label">Name</label>
                        <input type="text" class="form-control" id="writer" name="name" placeholder="Name of the Writer" required>
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
                        <th scope="col" colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($writers as $writer) : ?>
                        <tr>
                            <td scope="row"><?= $no; ?></td>
                            <td scope="row"><?= $writer["name"] ?></td>
                            <td>
                                <a href="editwriter.php?id=<?php echo $writer["id"]; ?>"><button class="btn btn-info" type="submit" name="submit">Edit</button></a>
                            </td>
                            <td>
                                <a href="deletewrit.php?id=<?php echo $writer["id"]; ?>" onclick="return confirm('Yakin hapus?')"><button class="btn btn-danger" type="submit" name="submit">Delete</button></a>
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