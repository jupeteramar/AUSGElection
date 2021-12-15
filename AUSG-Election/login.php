<?php 
session_start(); 
include "DB connection.php";
if (isset($_POST['studnum']) && isset($_POST['password'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    $studn = validate($_POST['studnum']);
    $pass = validate($_POST['password']);
    if (empty($studn)) {
        header("Location: index.php?error=User Name is required");
        exit();
    }else if(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
    }else{
        $sql = "SELECT tblstudentslogin.studentNumber, tblstudentslogin.password, tblstudentsinfo.firstname, tblstudentsinfo.lastname, tblstudentsinfo.program, tblstudentsinfo.year, tblstudentsinfo.hasvoted FROM tblstudentsinfo RIGHT OUTER JOIN tblstudentslogin ON tblstudentslogin.studentNumber=tblstudentsinfo.studentNumber WHERE tblstudentslogin.studentNumber='$studn' && tblstudentslogin.password='$pass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) >0) {
            $row = mysqli_fetch_assoc($result);
            if ($row['studentNumber'] === $studn && $row['password'] === $pass) {                
                $_SESSION['studentN'] = $row['studentNumber'];
                $_SESSION['fname'] = $row['firstname'];
                $_SESSION['lname'] = $row['lastname'];
                $_SESSION['prog'] = $row['program'];
                $_SESSION['yr'] = $row['year'];
                $_SESSION['hvoted'] = $row['hasvoted'];

                /*
                // getting studinfo                   
                $sql = "SELECT firstname, lastname, program FROM tblstudentsinfo WHERE studentNumber=$studn";
                $result = mysqli_query($conn, $sql); 
                if(mysqli_num_rows($result) === 1){            
                    while($row = mysqli_fetch_assoc($result)){
                        $_SESSION['fname'] = $row['firstname'];
                        $_SESSION['lname'] = $row['lastname'];
                        $_SESSION['prog'] = $row['program'];
                    }
                }*/
                header("Location: E-Voting.php");
                exit();
            }else{
                header("Location: index.php?error=Incorect User name or password");
                exit();
            }            
        }else{
            header("Location: index.php?error=Incorect User name or password");
            exit();
        }
    }
}else{
    header("Location: index.php");
    exit();
}
