<?php
include("connect.php");

if (isset($_GET['id']))
    $id = $_GET['id'];

if (isset($_POST['btnback'])) {
    $url = "Navbar.php?tag=subject";
    header("Location:" . $url);
}

$sql = "SELECT * FROM `subject_tbl` WHERE subjectId = '$id' ";
$rs = $conn->query($sql);
while ($row = mysqli_fetch_array($rs)) {
?>

    <!DOCTYPE html>
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
        <style>
            .b {
                width: 1000px;
                height: 500px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin: auto;
                margin-bottom: -100px;

            }

            .A {
                width: 46%;
                height: 100%;
            }

            .B {
                width: 46%;
                height: 100%;
            }
        </style>
    </head>

    <body>
        <h1 style="text-align: center; font-style: italic; ">SUBJECT UPDATE</h1>
        <div class="container mt-3">

            <form class="b" method="post" enctype="multipart/form-data">
                <div class="A">
                    <div class="mb-3">
                        <label class="form-label">Subject Khmer</label>
                        <input type="text" class="form-control" value="<?php echo $row['subjectKh'] ?>" name="subKh">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subject English</label>
                        <input type="text" class="form-control" value="<?php echo $row['subjectEn'] ?>" name="subEn">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Credit Number</label>
                        <input type="text" class="form-control" value="<?php echo $row['creditNumber'] ?>" name="subCn">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Hours</label>
                        <input type="text" class="form-control" value="<?php echo $row['hours'] ?>" name="subhr">
                    </div>
                </div>
                <div class="B">

                    <div class="mb-3">
                        <label class="form-label">major</label>
                        <select name="majorId" class="form-select">
                            <?php
                            $sql = "SELECT * FROM `major_tbl` ORDER BY majorKh";
                            $exec = mysqli_query($conn, $sql);
                            while ($rw = mysqli_fetch_array($exec)) {
                            ?>
                                <option value="<?php echo $rw['majorId'] ?>" <?php if ($rw['majorId'] == $row['majorId']) echo "selected"; ?>>
                                    <?php
                                    echo $rw['majorKh'];
                                    ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Year</label>
                        <select name="yearId" class="form-select">
                            <?php
                            $sql = "SELECT * FROM `year_tbl` ORDER BY yearKh";
                            $exec = mysqli_query($conn, $sql);
                            while ($rw = mysqli_fetch_array($exec)) {
                            ?>
                                <option value="<?php echo $rw['yearId'] ?>" <?php if ($rw['yearId'] == $row['yearId']) echo "selected"; ?>>
                                    <?php
                                    echo $rw['yearKh'];
                                    ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Semester</label>
                        <select name="semesterId" class="form-select">
                        <?php
                            $sql = "SELECT * FROM `semester_tbl` ORDER BY semesterKh";
                            $exec = mysqli_query($conn, $sql);
                            while ($rw = mysqli_fetch_array($exec)) {
                            ?>
                                <option value="<?php echo $rw['semesterId'] ?>" <?php if ($rw['semesterId'] == $row['semesterId']) echo "selected"; ?>>
                                    <?php
                                    echo $rw['semesterKh'];
                                    ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" name="btnback" >Back</button>
                    <button type="submit" class="btn btn-success" name="btnSub">Update</button>
                </div>
            </form>
        </div>
    </body>

    </html>
<?php
}
?>

<?php
    if(isset($_POST['btnSub'])){
        $subjectKh = $_POST['subKh'];
        $subjectEn = $_POST['subEn'];
        $creditNumber = $_POST['subCn'];
        $hours = $_POST['subhr'];
        $majorId = $_POST['majorId'];
        $yearId = $_POST['yearId'];
        $semesterId = $_POST['semesterId'];
        $sql= "UPDATE `subject_tbl` SET `subjectKh`='$subjectKh',`subjectEn`='$subjectEn',`creditNumber`='$creditNumber' ,`hours`='$hours' ,`majorId`='$majorId' 
        ,`yearId`='$yearId' ,`semesterId`='$semesterId' WHERE subjectId = '$id'";
        $rs=$conn->query($sql);
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
                    $("input[name=\'subKh\']").val("");
                    $("input[name=\'subEn\']").val("");
                    $("input[name=\'subCn\']").val("");
                    $("input[name=\'subhr\']").val("");
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
?>
