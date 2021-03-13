<?php
include('header.php');
include('function.php');

$books = index("SELECT * FROM book_tb");
$writers = index("SELECT * FROM writer_tb");
?>

<div class="container">

  <div class="row row-cols-3 row-cols-md-3 g-4">
  <?php foreach ($books as $book) : ?>
      
    <div class="col">
      <div class="card text-white bg-secondary">
          <img src="<?php echo $book["img"] ?>" class="card-img-top" alt="gambar buku" style="height:300px;object-fit: cover;object-position:center;">
          <div class="card-body bg-dark">
            <h5 class="card-title"><?php echo $book["name"] ?></h5>
            <p class="card-text">
            <p><?php echo $book["writer_id"] ?> - <?php echo $book["publication_year"] ?></p>   
              
            </p>
          </div>
          <div>
          <a href="view.php?id=<?=$book["id"];?>">
              <button class="btn btn-primary">See More</button>
            </a>
          </div>
      </div>

    </div>
    <?php endforeach; ?>
  </div>

</div>

<?php include('footer.php') ?>