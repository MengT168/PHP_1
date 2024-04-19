<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php
    include("connect.php");

    function InsertMajor(){
        global $conn;
        if(isset($_POST['btnSub'])){
            $MajorEn = $_POST['majorEn'];
            $MajorKh = $_POST['majorKh'];
            $facultyId = $_POST['facultyId'];
        
            $sql_c = "SELECT * FROM `major_tbl` WHERE majorKh = '$MajorKh' AND majorEn = '$MajorEn'";
            $rs = $conn->query($sql_c);
            $row=mysqli_num_rows($rs);
            if($row>0){
              echo '
                            <script>
                            $(document).ready(function(){
                                swal({
                                    title: "Mojor already exists!",
                                    text: "Insert Again",
                                    icon: "error",
                                    button: "Done",
                                });
                            });
                            </script>
                            ';
            }else{
              if(!empty($MajorKh) && !empty($MajorEn) && !empty($facultyId) ){
                $sql= "INSERT INTO `major_tbl`( `majorKh`, `majorEn`, `facultyId`) VALUES ('$MajorKh','$MajorEn' , '$facultyId')";
                            $rs = $conn->query($sql);
                            if($rs){
                                echo '
                                <script>
                                $(document).ready(function(){
                                    swal({
                                        title: "Success!",
                                        text: "Insert success!",
                                        icon: "success",
                                        button: "Done",
                                    });
                                });
                                </script>
                                ';
            }
            else{
              echo '
              <script>
              $(document).ready(function(){
                  swal({
                      title: "Error!",
                      text: "Insert Fail!",
                      icon: "fail",
                      button: "Done",
                  });
              });
              </script>
              ';
            }
              }
              else{
                echo '
                <script>
                $(document).ready(function(){
                    swal({
                        title: "Error!",
                        text: "Invalid Input!",
                        icon: "fail",
                        button: "Done",
                    });
                });
                </script>
                ';
              }
          }
        }
    }
    InsertMajor();

    function getFal(){
        global $conn;
        $sql = "SELECT * FROM `faculty_tbl` ORDER BY facultyKh";
                                    $exec = mysqli_query($conn, $sql);
                                    while ($rw = mysqli_fetch_array($exec)) {
                                        $facultyId = $rw['facultyId'];
                                        $facultyKh = $rw['facultyKh'];
                                        
                                        echo '
                                        <option value='.$facultyId.'>
                                            '.$facultyKh.'
                                        </option>
                                        ';
                                    }
    }

    function getMajor(){
        global $conn;
        $sql = "SELECT * FROM `major_tbl`";
        $rs=$conn->query($sql);
        $i=0;
        while($row=mysqli_fetch_array($rs)){
            $majorId = $row['majorId'];
            $majorKh = $row['majorKh'];
            $majorEn = $row['majorEn'];
            $facultyId = $row['facultyId'];
            $i++;
            echo '
                <tr>
                <th scope="row" >'.$majorId.'</th>
                <td>'.$majorKh.'</td>
                <td>'.$majorEn.'</td>
                <td style="text-align: center;" >'.$facultyId.'</td>
                <td>
                    <a href="./Update_Major.php?id='.$majorId.'" class="btn btn-success" name="btn_update">Update</a>
                    <a href="#" onclick="confirmDelete('.$majorId.');" class="btn btn-danger">Delete</a>
                </td>
                </tr>
            ';
        }
    }
    
    function deleteMajor(){
        global $conn;
        if(isset($_GET['op']) && $_GET['op'] == 'del' && isset($_GET['id']) ){
            $majorId = $_GET['id'];
            $sql="DELETE FROM `major_tbl` WHERE majorId = '$majorId'";
            $rs= $conn->query($sql);
            if($rs){
                echo '
                <script>
                $(document).ready(function(){
                    swal({
                        title: "Success!",
                        text: "Major deleted successfully!",
                        icon: "success",
                        button: "Done",
                    });
                });
                </script>
                ';
            } else {
                echo '
                <script>
                $(document).ready(function(){
                    swal({
                        title: "Error!",
                        text: "Failed to delete Major!",
                        icon: "error",
                        button: "Ok",
                    });
                });
                </script>
                ';
            }
        }
    }
    deleteMajor();
?>
<script>
    function confirmDelete(majorId){
        swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((Delete) => {
        if (Delete) {
            window.location.href = '?tag=major&op=del&id=' + majorId;
        }
    });
    }
</script>