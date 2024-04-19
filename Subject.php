<!DOCTYPE html>
<?php
    include("Function_Subject.php");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
   <style>
    .b{
        width: 1000px;
        height: 500px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: auto;
        margin-bottom: -100px;
    }
       .A{
        width: 46%;
        height: 100%;
       }.B{
        width: 46%;
        height: 100%;
       }
   </style>
</head>
<body>
    <h1 style="text-align: center; font-style: italic; " >SUBJECT INSERT</h1>
    <div class="container mt-3"  >

        <form class="b" method="post" enctype="multipart/form-data"  >
            <div class="A" >
            <div class="mb-3">
        <label  class="form-label">Subject Khmer</label>
        <input type="text" class="form-control" name="subKh" >
    </div>
    <div class="mb-3">
        <label class="form-label">Subject English</label>
        <input type="text" class="form-control" name="subEn" >
    </div>
    <div class="mb-3">
        <label class="form-label">Credit Number</label>
        <input type="text" class="form-control" name="subCn" >
    </div>
    <div class="mb-3">
        <label class="form-label">Hours</label>
        <input type="text" class="form-control" name="subhr" >
    </div>
</div>
    <div class="B" >
    <div class="mb-3">
        <label class="form-label">Faculty</label>
        <select name="facultyId" id="facultyId" class="form-select" onchange="updateMajorList()">
            <option value="">
                Select One
            </option>
            <?php getFaculty(); ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">major</label>
        <select name="majorId" class="form-select" >
        <option value="">
                Select One
            </option>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Year</label>
        <select name="yearId" class="form-select" >
            <?php
                getYearId();
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Semester</label>
        <select name="semesterId" class="form-select" >
            <?php
             getSemesterId();
            ?>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary" name="btnSub" >Submit</button>
    </div>
    </form>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col" style="width: 200px;" >Subject KH</th>
      <th scope="col" style="width: 200px;" >Subject EN</th>
      <th scope="col" style="text-align: center;" >Credit Number</th>
      <th scope="col" style="text-align: center;" >Hours</th>
      <th scope="col" style="text-align: center;" >FacultyId</th>
      <th scope="col" style="text-align: center;" >MajorId</th>
      <th scope="col" style="text-align: center;" >YearId</th>
      <th scope="col" style="text-align: center;" >SemesterId</th>
      <th scope="col"  >Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
         getSubJect();
    ?>
  </tbody>
  
</table>
        </div>
</body>
<script>
function updateMajorList() {
   var facultyId = $("#facultyId").val();
    $.ajax({
        url: 'Fetch.php',
        type: 'POST',
        data: { faculty: facultyId },
        success: function(response) {
            $('select[name="majorId"]').html(response);
        },
        error: function() {
            alert('Error fetching majors');
        }
    });
}
</script>
</html>

