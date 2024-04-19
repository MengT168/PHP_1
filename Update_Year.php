<!DOCTYPE html>
<?php
    include("connect.php");
  
if(isset($_POST['btnback'])){
    $url = "Navbar.php?tag=year";
    header("Location:".$url);
}

    if(isset($_GET[ 'id']))
    $id=$_GET['id'];
    $sql="SELECT * FROM `year_Tbl` Where yearId = '$id' ";
    $rs=$conn->query($sql);
    while($row= mysqli_fetch_assoc($rs) ){
?>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
<h1 style="text-align: center; font-style: italic; " >YEAR UPDATE</h1>
    <div class="container mt-3" style="width: 500px ; height: 500px;" >
    <form method="post" enctype="multipart/form-data" >
  <div class="mb-3">
    <h1></h1>
    <label  class="form-label">Year Khmer</label>
    <input type="text" class="form-control" value="<?php echo $row['yearKh'] ?>" name="yearKh" >
  </div>
  <div class="mb-3">
    <label class="form-label">Year English</label>
    <input type="text" class="form-control" value="<?php echo $row['yearEn'] ?>" name="yearEn" >
  </div>
  <button type="submit" class="btn btn-primary" name="btnback" >Back</button>
  <button type="submit" class="btn btn-primary" name="btnSub" >Update</button>
</form>
    </div>
</body>
</html>
<?php
    }
?>

<?php
    if(isset($_POST['btnSub'])){
        $yearKh = $_POST['yearKh'];
        $yearEn = $_POST['yearEn'];
        if(!empty($yearKh) && !empty($yearEn)){
    
           
                $sql_up = "UPDATE `year_tbl` SET `yearKh`='$yearKh',`yearEn`='$yearEn' WHERE yearId = '$id'";
            $rs = $conn->query($sql_up);
            $yearKh="";
            $yearEn="";
            if($rs){
                echo'
                <script>
                $(document).ready(function(){
                    swal({
                        title: "Success!",
                        text: "Update success!",
                        icon: "success",
                        button: "Done",
                    }).then((value) => {
                        $("input[name=\'yearKh\']").val("");
                        $("input[name=\'yearEn\']").val("");
                    });
                })
                </script>
                ';
               
            }
            else{
                echo'
                <script>
                $(document).ready(function(){
                    swal({
                        title: "Fail!",
                        text: "Update Fail!",
                        icon: "Fail",
                        button: "Done",
                    });
                })
                </script>
                ';
            }
            
    
        }
    }
?>