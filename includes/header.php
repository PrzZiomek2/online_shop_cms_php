<?php

include('includes/functions.php');

 ?> 

<!DOCTYPE html>
<html>

<head>
	<title>Online Shop</title>
	<meta charset="utf-8"  />
   <meta http-equiv="X-UA-Compatibile" content="IE=edge">
   <meta name="viewport"content="width=device-width, initial-scale=1.0">

   <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />

    <link rel="stylesheet" href="css/mdb.min.css" />
    <link rel="stylesheet" href="css/customs/pages/products.css" />
</head>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Menu</a>
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/project_p_ziomek/">Główna</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">Panel</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Wyloguj</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<body>

<?php

getMessage();

 ?>