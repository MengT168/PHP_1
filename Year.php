<!DOCTYPE html>
<html lang="en">
    <?php
        include("Function.php");
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</head>
<body>
<h1 style="text-align: center; font-style: italic; " >YEAR INSERT</h1>
    <div class="container mt-3" style="width: 500px ; height: 500px;" >
    <form method="post" enctype="multipart/form-data" >
  <div class="mb-3">
    <h1></h1>
    <label  class="form-label">Year Khmer</label>
    <input type="text" class="form-control" name="yearKh" >
  </div>
  <div class="mb-3">
    <label class="form-label">Year English</label>
    <input type="text" class="form-control" name="yearEn" >
  </div>
  
  <button type="submit" class="btn btn-primary" name="btnSub" >Submit</button>
</form>

<table class="table mt-4 ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Year KH</th>
      <th scope="col">Year EN</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  
  <tbody>
    <?php
         getYear();
    ?>
  </tbody>
  
</table>
    </div>    
    
</body>
</html>

