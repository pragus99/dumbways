<?php
include('header.php');
include('function.php');
$id = $_GET['id'];
$book = index("SELECT * FROM book_tb WHERE id = $id")[0];

?>

<div class="container">

<div class="container">
  <div class="row">
    <div class="col-md-9">
      <div class="card mb-5">
        <div class="card-header">
          <h1><?php echo $book["name"] ?></h1>

        </div>
        <div class="card-body">
          <img src="<?php echo $book["img"] ?>" alt="" class="card-img-top" style="height:400px;object-fit: cover;object-position:center;">
        </div>
        <div class="card-footer">
          <div class="d-flex justify-content-between align-items-center ">
            <div class="media">
              <img src="{{ $post->user->gravatar() }}" alt="" class="mr-2">
              <div class="media-body">
                <div>
                  <?php echo $book["writer_id"] ?> - <?php echo $book["publication_year"] ?></p>   
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</div>

</div>

<?php include('footer.php') ?>