<?php
// Check  session is not started 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once("classes.php");

if (empty($user = unserialize($_SESSION["user"]))) {
  header("location:login.php");
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <script src="scripts/color-modes.js"></script>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.122.0">
  <title>Blog</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album/">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
  <link href="styles/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styles/Blog home.css">
  
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .navbar {
      background-color: #4267B2; /* Facebook blue */
    }
    
    .navbar-brand,
    .navbar-nav .nav-link {
      color: white !important;
    }
    
    .dropdown-menu {
      background-color: #4267B2; /* Light background */
    }
    
    .btn-secondary {
      background-color: #fff;
      border-color: #ddd;
      color: #4267B2;
    }
    
    .btn-secondary:hover {
      background-color: #ddd;
      border-color: #ccc;
    }
    
    .bg-body {
      background-color: #f5f6f7; /* Light grey background */
    }
    
    .card {
      margin-bottom: 20px;
    }
    
    .card-header {
      background-color: #4267B2;
      color: white;
    }
  </style>
</head>

<body class="bg-body">
  <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <!-- SVG symbols here -->
  </svg>
  
  <!-- Option Mode -->
  <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
      <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
        <use href="#circle-half"></use>
      </svg>
      <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
      <!-- Theme options here -->
    </ul>
  </div>
  <!-- /Option Mode -->

  <!-- Navigation -->
  <header class="p-3 mb-3 border-bottom">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="Blog Home.php">My Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse mx-5" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" href="Blog Home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            <div class="d-grid gap-2 row-gap-1">
              <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <?= $user-> more
                  ?> 
                  </button>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="profile.php">My Profile</a></li>
                  <li class="nav-item">
                    <form action="logout.php" method="post">
                      <a class="nav-link" href="logout.php">logout</a>
                    </form>
                  </li>
                </ul>
              </div>
            </div>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <!-- /Navigation -->
  
  <main class="container">
    <!-- Example card with a post -->
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Welcome to My Blog</h5>
      </div>
      <div class="card-body">
        <p class="card-text">This is an example blog post. Here you can write about any topic you like.</p>
        <a href="#" class="btn btn-primary">Read more</a>
      </div>
    </div>
  </main>
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>
