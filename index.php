<!-- http://localhost/CMS-in-PHP/index.php -->

<?php 
session_start();
require_once('models/db.php');

  $query = 'SELECT * FROM reviews
            ORDER BY ID';
  $reviews = $db->query($query);
include("views/header.php") ?>
    <title>Black Yelp</title>
</head>

<body>
    <div class="container">
        <?php include("views/nav.php") ?>

        <img src="imgs/palm-trees-beach.jpg" class="img-fluid" alt="Responsive image">

        <br><br>
        <?php foreach ($reviews as $review) : ?>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title"> <?php echo $review['title']; ?></h5>
                    <p class="card-text"><?php echo $review['content']; ?></p>
                    <?php echo $review['timestamp']; ?>
                </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
        <br>

<?php include("views/footer.php") ?>