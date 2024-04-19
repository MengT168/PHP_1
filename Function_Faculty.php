<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php
    include("connect.php");

    function Insert_Fal(){
        global $conn;
        if(isset($_POST['btnSub'])){
            $falKh = $_POST['falKh'];
            $falEn = $_POST['falEn'];
            if(!empty($falKh) && !empty($falEn)){
                $sql= "SELECT * FROM `faculty_tbl` WHERE facultyKh = '$falKh' AND facultyEn = '$falEn' ";
                $rs_c= $conn->query($sql);
                $check=mysqli_num_rows($rs_c);
                    
                    if($check > 0){
                        echo '
                        <script>
                        $(document).ready(function(){
                            swal({
                                title: "Faculty already exists!",
                                text: "Insert Again",
                                icon: "error",
                                button: "Done",
                            });
                        });
                        </script>
                        ';
                    }else{
                        $sql= "INSERT INTO `faculty_tbl`( `facultyKh`, `facultyEn`) VALUES ('$falKh','$falEn')";
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
    Insert_Fal();

    function getFal(){
        global $conn;
        $sql = "SELECT * FROM `faculty_tbl`";
        $rs=$conn->query($sql);
        $i=0;
        while($row=mysqli_fetch_array($rs)){
            $falId = $row['facultyId'];
            $falKh = $row['facultyKh'];
            $falEn = $row['facultyEn'];
            $i++;
            echo '
                <tr>
                <th scope="row" >'.$falId.'</th>
                <td>'.$falKh.'</td>
                <td>'.$falEn.'</td>
                <td>
                    <a href="./Update_Faculty.php?id='.$falId.'" class="btn btn-success" name="btn_update">Update</a>
                    <a href="#" onclick="confirmDelete('.$falId.');" class="btn btn-danger">Delete</a>
                </td>
                </tr>
            ';
        }
    }

    function deleteFal(){
        global $conn;
        if(isset($_GET['op']) && $_GET['op'] == 'del' && isset($_GET['id']) ){
            $facultyId = $_GET['id'];
            $sql="DELETE FROM `faculty_tbl` WHERE facultyId = '$facultyId'";
            $rs= $conn->query($sql);
            if($rs){
                echo '
                <script>
                $(document).ready(function(){
                    swal({
                        title: "Success!",
                        text: "Faculty deleted successfully!",
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
                        text: "Failed to delete Faculty!",
                        icon: "error",
                        button: "Ok",
                    });
                });
                </script>
                ';
            }
        }
        }
        
    
    deleteFal();
?>
<script>
    function confirmDelete(falId){
        swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((Delete) => {
        if (Delete) {
            window.location.href = '?tag=faculty&op=del&id=' + falId;
        }
    });
    }
</script>