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
            <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="imgs/im5.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>Welcome to Black Yelp</h5>
                                <?php if (!isset($_SESSION['name'])) : ?>
                                    <p><a href="usermanager/loggingin.php">Click here to sign in</a></p>
                                <?php else : ?>
                                    <p>Greetings, <?php echo $_SESSION['name'] ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="imgs/im2.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>St Tropez</h5>
                                <p>Read more about people's trips to France</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="imgs/im3.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>San Diego</h5>
                                <p>Ronald Reagan was the first person to drive across the Coronado Bridge when it opened in 1969.</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <br>

            <?php
            $cards = 0;
            ?>
            <div class="row">
                <?php foreach ($reviews as $review) : ?>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row no-gutters">
                            <?php if (!isset($_SESSION['name'])) : ?>
                                <div class="col-md-4">
                                    <img src="<?php echo "userImgs/" . $review['images']; ?>" class="card-img img-fluid rounded" alt="Responsive image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $review['title']; ?></h5>
                                        <p class="card-text"><?php echo $review['content']; ?></p>
                                        <p class="card-text"><small class="text-muted"><?php echo $review['timestamp']; ?></small></p>
                                    </div>
                                </div>

                            <?php elseif ($_SESSION['userID'] == $review['userFK']) : ?>
                                <div class="col-md-4">
                                    <img src="<?php echo "userImgs/" . $review['images']; ?>" class="card-img img-fluid rounded" alt="Responsive image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $review['title']; ?></h5>
                                        <p class="card-text"><?php echo $review['content']; ?></p>
                                        <p class="card-text"><small class="text-muted"><?php echo $review['timestamp']; ?></small></p>
                                    </div>
                                    <div class="row justify-content-md-center">
                                        <form id="updateReview" action="reviewmanager/updateReviews.php" method="post">
                                            <input type="hidden" name="ID" value="<?php echo $review['ID']; ?>">
                                            <input type="submit" class="btn btn-primary" value="Update">
                                        </form>

                                        <form id="deleteReview" action="reviewmanager/deleteReviews.php" method="post">
                                            <input type="hidden" name="ID" value="<?php echo $review['ID']; ?>">
                                            <input type="submit" class="btn btn-danger" value="Delete">
                                        </form>
                                    </div>
                                </div>

                            <?php else : ?>
                                <div class="col-md-4">
                                    <img src="<?php echo "userImgs/" . $review['images']; ?>" class="card-img img-fluid rounded" alt="Responsive image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $review['title']; ?></h5>
                                        <p class="card-text"><?php echo $review['content']; ?></p>
                                        <p class="card-text"><small class="text-muted"><?php echo $review['timestamp']; ?></small></p>
                                    </div>
                                </div>

                            <?php endif; ?>
                        </div>
                    </div>

                    <br>
                    <?php
                        $cards++;
                        if ($cards % 2 == 0) echo '</div><br><div class="row">';
                        ?>
                <?php endforeach; ?>
            </div>
            <br>

            <?php include("views/footer.php") ?>