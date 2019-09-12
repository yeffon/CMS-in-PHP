<nav class="navbar navbar-expand-lg navbar-light bg-info text-white">
  <a class="navbar-brand" href="../index.php">Black Yelp</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse flex-row-reverse" id="navbarText">
    <ul class="navbar-nav mr-sm-2">
      <?php if(!isset ($_SESSION['name'])) : ?>
        <li class="nav-item">
          <span class="navbar-text">
            Welcome, <?php echo $_SESSION['name'] ?>
          </span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="reviewmanager/createReviews.php">Create Review</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../usermanager/logout.php">Logout</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>