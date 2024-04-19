<?php
include("connect.php");

if(isset($_POST['faculty'])) {
    $facultyId = $_POST['faculty'];
    $sql = "SELECT * FROM `major_tbl` WHERE facultyId = '$facultyId'";
    $rs = $conn->query($sql);
    $options = '<option value="">Select Major</option>';
    while($row = mysqli_fetch_assoc($rs)) {
        $options .= '<option value="'.$row['majorId'].'">'.$row['majorKh'].'</option>';
    }
    echo $options;
}
?>