<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
  $loggedin = true;
}
else{
  $loggedin = false;
}
echo
'<nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="#">SRM University</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/Code/university/index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/Code/university/index.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/Code/university/index.php">Contact</a>
        </li>
      ';
      if(!$loggedin){
      echo
        '
    <div class="navbar-nav">
        <a href="/Code/university/login.php" class="nav-item nav-link">Login</a>
    </div>
    <div class="navbar-nav">
        <a href="/Code/university/sign.php" class="nav-item nav-link">SignUp</a>
    </div>';
      }
      if($loggedin){
      echo
        '</ul>
        <form class="d-flex" action="/Code/Hubspot/search.php" method="get">
        <input class="form-control me-2" type="search" name = "search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <div class="navbar-nav">
      <a class="nav-link" href="/Code/university/logout.php">Log out</a>
    </div>';
    }
    echo'
    </div>
  </div>
</nav>';
?>