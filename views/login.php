<?php include('../views/header.php'); ?>

<body>
    <div class="container">
        <?php include('../views/nav3.php'); ?>
        <div id="page" class="mx-auto">
            <h1 class="text-center">Login to Black Yelp</h1>
        </div>

        <br>
        
        <div class="main">
            <form id="login" method="post">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email: </label>
                    <div class="col-sm-10">
                        <input type="text" name="Email" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password:</label>
                    <div class="col-sm-10">
                        <input type="text" name="PW" class="form-control" required>
                    </div>
                </div>
            </form>
            <h2 class="text-center"><a href="../index.php">Login</a></h2>
        </div>
</body>
<?php include('../views/footer.php') ?>
