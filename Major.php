<!DOCTYPE html>
<?php
    include("Function_Major.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</head>
<body>
<h1 style="text-align: center; font-style: italic; " >Major INSERT</h1>
<div class="container mt-3" style="width: 800px ; height: 700px;" >
    <form method="post" enctype="multipart/form-data" >
  <div class="mb-3">
    <label  class="form-label">Major Khmer</label>
    <input type="text" class="form-control" name="majorKh" >
  </div>
  <div class="mb-3">
    <label class="form-label">Major English</label>
    <input type="text" class="form-control" name="majorEn" >
  </div>
  <div class="mb-3">
    <label class="form-label">Faculty Name</label>
    <!-- <input type="text" class="form-control" name="falEn" > -->
    <select class="form-select" name="facultyId" >
    <?php
        getFal();
    ?>
    </select>
  </div>
  
  <button type="submit" class="btn btn-primary" name="btnSub" >Submit</button>
</form>
<table class="table mt-4 ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col" style="width: 200px;" >Major KH</th>
      <th scope="col" >Major EN</th>
      <th scope="col" style="width: 200px; text-align: center; " >Faculty ID</th>
      <th scope="col"  >Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
         getMajor();
    ?>
  </tbody>
  
</table>
    </div>
</body>
</html>

