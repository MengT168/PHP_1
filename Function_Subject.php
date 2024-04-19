<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php
    include("connect.php");

    function getFaculty(){
        global $conn;
        $sql = "SELECT * FROM `faculty_tbl` ORDER BY facultyId";
        $exec = mysqli_query($conn, $sql);
        while ($rw = mysqli_fetch_array($exec)) {
            $facultyId= $rw['facultyId'];
            $facultyKh= $rw['facultyKh'];
            echo '
                    <option value='.$facultyId.'>
                               '.$facultyKh.'
                    </option>
                ';
        }
    }

    // function getMajorId(){
    //     global $conn;
    //     $sql = "SELECT * FROM `major_tbl` ORDER BY facultyId";
    //     $exec = mysqli_query($conn, $sql);
    //     while ($rw = mysqli_fetch_array($exec)) {
    //         $majorId= $rw['majorId'];
    //         $majorkh= $rw['majorKh'];
    //         echo '
    //                 <option value='.$majorId.'>
    //                            '.$majorkh.'
    //                 </option>
    //             ';
    //     }
    // }
    function getYearId(){
        global $conn;
        $sql = "SELECT * FROM `year_tbl` ORDER BY yearId";
        $exec = mysqli_query($conn, $sql);
        while ($rw = mysqli_fetch_array($exec)) {
            $yearId= $rw['yearId'];
            $yearKh= $rw['yearKh'];
            echo '
                    <option value='.$yearId.'>
                               '.$yearKh.'
                    </option>
                ';
        }
    }
    function getSemesterId(){
        global $conn;
        $sql = "SELECT * FROM `semester_tbl` ORDER BY semesterId";
        $exec = mysqli_query($conn, $sql);
        while ($rw = mysqli_fetch_array($exec)) {
            $semesterId= $rw['semesterId'];
            $semesterKh= $rw['semesterKh'];
            echo '
                    <option value='.$semesterId.'>
                               '.$semesterKh.'
                    </option>
                ';
        }
    }

    function InsertSub(){
        global $conn;
        if(isset($_POST['btnSub'])){
            $subKh = $_POST['subKh'];
            $subEn = $_POST['subEn'];
            $subCn = $_POST['subCn'];
            $subhr = $_POST['subhr'];
            $facultyId = $_POST['facultyId'];
            $majorId = $_POST['majorId'];
            $yearId = $_POST['yearId'];
            $semesterId = $_POST['semesterId'];
        
            $sql_c = "SELECT * FROM `subject_Tbl` WHERE subjectKh = '$subKh' AND subjectEn = '$subEn'";
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
              if(!empty($subKh) && !empty($subEn) && !empty($subCn) && !empty($subhr) && !empty($facultyId) && !empty($majorId) && !empty($yearId) && !empty($semesterId)  ){
                $sql= "INSERT INTO `subject_tbl`(`subjectKh`, `subjectEn`, `creditNumber`, `hours`,`facultyId`, `majorId`, `yearId`, `semesterId`) 
              VALUES ('$subKh','$subEn','$subCn','$subhr', '$facultyId' ,'$majorId','$yearId','$semesterId')";
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
                      text: "Invalid Input",
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
    InsertSub();

    function getSubJect(){
        global $conn;
        $sql = "SELECT * FROM `subject_tbl`";
        $rs=$conn->query($sql);
        $i=0;
        while($row=mysqli_fetch_array($rs)){
            $subjectId = $row['subjectId'];
            $subjectKh = $row['subjectKh'];
            $subjectEn = $row['subjectEn'];
            $creditNumber = $row['creditNumber'];
            $hours = $row['hours'];
            $facultyId = $row['facultyId'];
            $majorId = $row['majorId'];
            $yearId = $row['yearId'];
            $semesterId = $row['semesterId'];
            $i++;
            echo '
                <tr>
                <th scope="row" >'.$i.'</th>
                <td>'.$subjectKh.'</td>
                <td>'.$subjectEn.'</td>
                <td style="text-align: center;" >'.$creditNumber.'</td>
                <td style="text-align: center;">'.$hours.'</td>
                <td style="text-align: center;" >'.$facultyId.'</td>
                <td style="text-align: center;" >'.$majorId.'</td>
                <td style="text-align: center;" >'.$yearId.'</td>
                <td style="text-align: center;" >'.$semesterId.'</td>
                <td>
                    <a href="./Update_Subject.php?id='.$subjectId.'" class="btn btn-success" style="width: 100px;" name="btn_update">Update</a>
                    <a href="#" onclick="confirmDelete('.$subjectId.');" class="btn btn-danger" style="width: 100px;" >Delete</a>
                </td>
                </tr>
            ';
        }
    }

    function deleteSub(){
        global $conn;
        if(isset($_GET['op']) && $_GET['op'] == 'del' && isset($_GET['id']) ){
            $subjectId = $_GET['id'];
            $sql="DELETE FROM `subject_tbl` WHERE subjectId = '$subjectId'";
            $rs= $conn->query($sql);
            if($rs){
                echo '
                <script>
                $(document).ready(function(){
                    swal({
                        title: "Success!",
                        text: "Subject deleted successfully!",
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
                        text: "Failed to delete Subject!",
                        icon: "error",
                        button: "Ok",
                    });
                });
                </script>
                ';
            }
        }
    }
    deleteSub();
?>
<script>
    function confirmDelete(subjectId){
        swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((Delete) => {
        if (Delete) {
            window.location.href = '?tag=subject&op=del&id=' + subjectId;
        }
    });
    }
</script>

