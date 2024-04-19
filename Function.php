<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<?php
    include("connect.php");

    function InsertYear(){
        global $conn;
    if(isset($_POST['btnSub'])){
        $yearKh = $_POST['yearKh'];
        $yearEn = $_POST['yearEn'];
        if(!empty($yearKh) && !empty($yearEn)){
            $sql= "SELECT * FROM `year_tbl` WHERE yearKh = '$yearKh' AND yearEn = '$yearEn' ";
            $rs_c= $conn->query($sql);
            $check=mysqli_num_rows($rs_c);
                
                if($check > 0){
                    echo '
                    <script>
                    $(document).ready(function(){
                        swal({
                            title: "Year already exists!",
                            text: "Insert Again",
                            icon: "error",
                            button: "Done",
                        });
                    });
                    </script>
                    ';
                }else{
                    $sql= "INSERT INTO `year_tbl`( `yearKh`, `yearEn`) VALUES ('$yearKh','$yearEn')";
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
    InsertYear();

    function getYear(){
        global $conn;
        
     $sql = "SELECT * FROM `year_tbl` ORDER BY yearId ASC";
     $exec = mysqli_query($conn, $sql);
     $i = 0;
     while ($rw = mysqli_fetch_array($exec)) {
        $yearId = $rw['yearId'];
        $yearKh = $rw['yearKh'];
        $yearEn = $rw['yearEn'];
         $i++;
  echo '<tr>
  <th scope="row">'.$yearId.'</th>
  <td>'.$yearKh.'</td>
  <td>'.$yearEn.'</td>
  <td>
  <a href="./Update_Year.php?id='.$yearId.'" class="btn btn-success" name="btn_update">Update</a>
  <a href="#" onclick="confirmDelete('.$yearId.');" class="btn btn-danger">Delete</a>
  </td>
  </tr>';
  
    }}

    function deleteYear(){
        global $conn;
        if(isset($_GET['op']) && $_GET['op'] == 'del' && isset($_GET['id'])){
            $yearId = $_GET['id'];
            $sql = "DELETE FROM `year_tbl` WHERE yearId = '$yearId'";
            $result = $conn->query($sql);
            if($result){
                echo '
                <script>
                $(document).ready(function(){
                    swal({
                        title: "Success!",
                        text: "Year deleted successfully!",
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
                        text: "Failed to delete year!",
                        icon: "error",
                        button: "Ok",
                    });
                });
                </script>
                ';
            }
        }
    }

    deleteYear();
?>
<script>
function confirmDelete(yearId) {
    swal({
        title: "Are you sure?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((Delete) => {
        if (Delete) {
            window.location.href = '?tag=year&op=del&id=' + yearId;
        }
    });
}
</script>