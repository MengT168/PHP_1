<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
    include("connect.php");

    function Insert_Semester(){
        global $conn;
        if(isset($_POST['btnSub'])){
            $seKh = $_POST['seKh'];
            $seEn = $_POST['seEn'];
            if(!empty($seKh) && !empty($seEn)){
                $sql= "SELECT * FROM `semester_tbl` Where semesterKh = '$seKh' and semesterEn = '$seEn' ";
                $rs_c= $conn->query($sql);
                $check=mysqli_num_rows($rs_c);
                    
                    if($check > 0){
                        echo '
                        <script>
                        $(document).ready(function(){
                            swal({
                                title: "Semester already exists!",
                                text: "Insert Again",
                                icon: "error",
                                button: "Done",
                            });
                        });
                        </script>
                        ';
                    }else{
                        $sql= "INSERT INTO `semester_tbl`( `semesterKh`, `semesterEn`) VALUES ('$seKh','$seEn')";
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
                                    text: "Insert success!",
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
    }
    Insert_Semester();

    function getSemester(){
        global $conn;
        $sql = "SELECT * FROM `semester_tbl`";
        $rs=$conn->query($sql);
        $i=0;
        while($row= mysqli_fetch_array($rs)){
        $semesterId = $row['semesterId'];
        $semesterKh = $row['semesterKh'];
        $semesterEn = $row['semesterEn'];
         $i++;
  echo '<tr>
  <th scope="row">'.$semesterId.'</th>
  <td>'.$semesterKh.'</td>
  <td>'.$semesterEn.'</td>
  <td>
  <a href="./Update_Semester.php?id='.$semesterId.'" class="btn btn-success" name="btn_update">Update</a>
  <a href="#" onclick="confirmDelete('.$semesterId.');" class="btn btn-danger">Delete</a>
  </td>
  </tr>';
        }
    }

    function deleteSemester(){
        global $conn;

        if(isset($_GET['op']) && $_GET['op'] == 'del' && isset($_GET['id'])){
            $semesterId = $_GET['id'];
            $sql = "DELETE FROM `semester_tbl` WHERE semesterId = '$semesterId'";
            $result = $conn->query($sql);
            if($result){
                echo '
                <script>
                $(document).ready(function(){
                    swal({
                        title: "Success!",
                        text: "Semester deleted successfully!",
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
                        text: "Failed to delete Semester!",
                        icon: "error",
                        button: "Ok",
                    });
                });
                </script>
                ';
            }
        }
    }
    deleteSemester();
?>
<script>
function confirmDelete(semesterId) {
    swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((Delete) => {
        if (Delete) {
            window.location.href = '?tag=semester&op=del&id=' + semesterId;
        }
    });
}
</script>