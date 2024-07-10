<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BLOG HOME-like Navbar with Post and Comments</title>
  <!-- Font Awesome Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Customize styles here */
    .navbar {
      background-color: #3b5998; /* Facebook blue */
    }
    .navbar-brand {
      color: #fff; /* Navbar brand text color */
      font-weight: bold; /* Navbar brand font weight */
    }
    .navbar-nav .nav-link {
      color: #fff; /* Navbar links text color */
    }
    .navbar-nav .nav-link:hover {
      color: #e9ecef; /* Navbar links text color on hover */
    }
    .card {
      border: none; /* Remove card borders */
      margin-bottom: 20px; /* Add some bottom margin */
    }
    .card-img-top {
      border-radius: 0; /* Remove border radius from top image */
    }
    .card-body {
      padding: 20px; /* Add padding to card body */
    }
    .comment {
      margin-top: 15px; /* Add margin between comments */
    }
    .commenter img {
      width: 30px; /* Set commenter avatar size */
      height: 30px;
      border-radius: 50%; /* Make commenter avatar round */
      margin-right: 10px; /* Add margin to avatar */
    }
    .comment .name {
      font-weight: bold; /* Commenter name font weight */
    }
    .comment .timestamp {
      font-size: 12px; /* Comment timestamp font size */
      color: #aaa; /* Comment timestamp color */
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <a class="navbar-brand" href="#">BLOG HOME</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#"><i class="fas fa-home"></i> Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-user"></i> Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-bell"></i> Notifications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-envelope"></i> Messages</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-cog"></i> Settings</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
  <!-- Post Section -->
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Sample Post Title</h5>
      <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam in ex quis metus vehicula convallis.</p>
      <img src="https://via.placeholder.com/300" class="card-img-top" alt="Post Image">
      <p class="card-text"><small class="text-muted">Posted on July 1, 2024</small></p>
      <button class="btn like-button" type="button">
        <i class="fas fa-thumbs-up"></i> Like
      </button>
      <form class="comment-form" action="store_comment.php">
        <input type="text" name="comment" class="form-control" placeholder="Write a comment...">
        <button type="submit" class="btn btn-primary mt-2">Comment</button>
      </form>
    </div>
  </div>

  <!-- Comments Section -->
  <div class="card">
    <div class="card-body">
      <div class="comment">
        <p>This is a sample comment. Lorem ipsum dolor sit amet.</p>
        <div class="commenter">
          <img src="https://via.placeholder.com/30" alt="Commenter Avatar">
          <div>
            <p class="name">John Doe</p>
            <p class="timestamp">July 2, 2024</p>
          </div>
        </div>
      </div>
      <div class="comment">
        <p>Another sample comment. Consectetur adipiscing elit.</p>
        <div class="commenter">
          <img src="https://via.placeholder.com/30" alt="Commenter Avatar">
          <div>
            <p class="name">Jane Smith</p>
            <p class="timestamp">July 3, 2024</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
