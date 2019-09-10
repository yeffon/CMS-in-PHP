<?php include('../views/header.php'); ?>

<body>
    <div class="container">
        <?php include('../views/nav3.php'); ?>
        <div id="page" class="mx-auto">
            <h1 class="text-center">Login to Black Yelp</h1>
        </div>

        <br>
        
        <div class="main">
            <form id="login" action="login.php" method="post">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email: </label>
                    <div class="col-sm-10">
                        <input type="email" name="Email" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" name="PW" class="form-control" required>
                    </div>
                </div>
                <button class="mx-auto" type="submit">Login</button>
            </form>
            <br>
        </div>
</body>
<?php include('../views/footer.php') ?>
