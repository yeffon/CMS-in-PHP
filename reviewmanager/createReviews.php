<?php 
    session_start();
    include('../views/header.php'); ?>

    <body>
        <div class="container">
            <?php include('../views/nav4.php'); ?>
            <div id="page" class="mx-auto">
                <h1 class="text-center">Write a review</h1>
            </div>

            <br>

            <div class="main">
                <form id="createReview" action="createReview.php" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Single Image Upload</label>
                        <div class="col-sm-10">
                            <input type="file" name="images" id="images" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Review Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Tell us about your stay:</label>
                        <div class="col-sm-10">
                        <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
                        </div>
                    </div>
                    <div><button class="mx-auto" type="submit" name="submit" id="submit">Submit Review</button></div>
                </form>
                <br>
        </div>
    </body>

<?php include('../views/footer.php') ?>
