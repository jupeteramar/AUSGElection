<?php
    session_start();
    include "DB Connection.php";

    $studn = $_SESSION['studentN'];
    $pres = $_POST['pres'];
    $vp = $_POST['vp'];
    $sec = $_POST['sec'];
    $treas = $_POST['treas'];

    // inserting vote to tblstudentsvote
    $sql = "INSERT INTO tblstudentsvote VALUES('', $studn, $pres, $vp, $sec, $treas)";
    if (mysqli_query($conn,$sql)){        
        $sql = "UPDATE tblstudentsinfo SET hasvoted=1 WHERE studentNumber=$studn;";
        if(mysqli_query($conn, $sql)){ // updating student vote status to 1

             $sql = "SELECT idPresident FROM tblcandidatespres;";
             $result = mysqli_query($conn, $sql);
             if (mysqli_num_rows($result) >0){
                while($row = mysqli_fetch_assoc($result)){
                    $presC = array();
                    $pres[0] = $row["idPresident"];
                }
        }
        else{
            echo "Error adding a new record! ".mysqli_error($conn);   
            /* header("Location: Dashboard.php");            
            exit();       */         
        }
    }
    else{
        echo "Error adding a new record! ".mysqli_error($conn);
    }   



?>