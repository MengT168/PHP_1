<?php
    require("connect.php");
    $tag="";
    if (isset($_GET['tag']))
    $tag = $_GET['tag'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="?tag=subject">Subject</a>
        <a class="nav-link" href="?tag=faculty">Faculty</a>
        <a class="nav-link" href="?tag=major">Major</a>
        <a class="nav-link" href="?tag=semester">Semester</a>
        <a class="nav-link" href="?tag=year">Year</a>
      </div>
    </div>
  </div>
</nav>
</body>
</html>

<?php
    if ($tag == "subject")
    include("Subject.php");
  elseif ($tag == 'faculty')
    include("Faculty.php");
    elseif ($tag == 'major')
    include("Major.php");
    elseif ($tag == 'semester')
    include("Semester.php");
    elseif ($tag == 'year')
    include("Year.php");
?>
