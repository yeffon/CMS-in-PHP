<?php 
    session_start();
    include('../views/header.php'); 

    //get id to populate display
    $ID = trim(filter_input(INPUT_POST, 'ID', FILTER_VALIDATE_INT));

    require_once('../models/db.php');

    $statement = $db->prepare("SELECT * FROM reviews
                            WHERE ID = :rID");
    $statement->bindParam(':rID', $ID);
    $statement->execute();

    $review = $statement->fetch();
?>

<body>
    <div class="container">
        <?php include('../views/nav4.php'); ?>
        <br>
        <div class="main">
            <form id="updateReviews" action="updateReview.php" method="post">
                <input type="hidden" name="ID" value="<?php echo $review['ID']; ?>">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Update Review Title</label>
                    <div class="col-sm-10">
                        <input type="input" name="title" class="form-control" value="<?php echo $review['title']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Tell us about your stay:</label>
                    <div class="col-sm-10">
                        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $review['content']; ?></textarea>
                    </div>
                </div>
                <div><button class="mx-auto" type="submit">Update Review</button></div>
            </form>
            <br>  
    </div>
</body>
<?php include('../views/footer.php') ?>
