<!-- http://localhost/CMS-in-PHP/index.php -->

<?php 
    session_start();
    require_once('models/db.php');

    $query = 'SELECT * FROM reviews
                ORDER BY ID';
    $reviews = $db->query($query);
    include("views/header.php") 
?>
    <title>Black Yelp</title>
</head>

<body>
    <div class="container">
        <?php include("views/nav.php") ?>

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="imgs/im3.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="imgs/im1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="imgs/im2.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <br>

        <?php 
            $cards = 0;
        ?>
        <div class="row">
            <?php foreach ($reviews as $review) : ?>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <?php if(!isset ($_SESSION['name'])): ?>
                                <h5 class="card-title"> <?php echo $review['title']; ?></h5>
                                <p class="card-text"><?php echo $review['content']; ?></p>
                                <?php echo $review['timestamp']; ?>
                            
                            <?php elseif ($_SESSION['userID'] == $review['userFK']) : ?>
                                <h5 class="card-title"> <?php echo $review['title']; ?></h5>
                                <p class="card-text"><?php echo $review['content']; ?></p>
                                <?php echo $review['timestamp']; ?>
                                <div class="text-right">
                                    <form id="updateReview" action="reviewmanager/updateReviews.php" method="post">
                                        <input type="hidden" name="ID" value="<?php echo $review['ID']; ?>">
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </form>
                                    <form id="deleteReview" action="reviewmanager/deleteReviews.php" method="post">
                                        <input type="hidden" name="ID" value="<?php echo $review['ID']; ?>">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </div>
                            <?php else : ?>
                                <h5 class="card-title"> <?php echo $review['title']; ?></h5>
                                <p class="card-text"><?php echo $review['content']; ?></p>
                                <?php echo $review['timestamp']; ?>

                            <?php endif; ?>
                        </div>
                   </div>
                </div>
                <br>
                <?php 
                    $cards++;
                    if($cards % 2 == 0) echo '</div><br><div class="row">';
                ?>
            <?php endforeach; ?>
        </div>
        <br>

<?php include("views/footer.php") ?>