<?php include('../views/header.php'); ?>

<body>
    <div class="container">
        <?php include('../views/nav2.php'); ?>
        <div id="page" class="mx-auto">
            <h1 class="text-center">Register Here</h1>
        </div>

        <br>

        <div class="main">
            <form id="addusers" action="adduser.php" method="post">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">First Name:</label>
                    <div class="col-sm-10">
                        <input type="text" name="FName" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Last Name:</label>
                    <div class="col-sm-10">
                        <input type="text" name="LName" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Email:</label>
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
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Confirm Password:</label>
                    <div class="col-sm-10">
                    <input type="password" name="conPW" class="form-control" required>
                    </div>
                </div>
                <div><button class="mx-auto" type="submit">Register</button></div>
            </form>
            <br>
        </div>
</body>
<?php include('../views/footer.php') ?>
