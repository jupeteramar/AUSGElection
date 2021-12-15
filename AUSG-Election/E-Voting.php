<?php
session_start();
if (isset($_SESSION['studentN']) && isset($_SESSION['fname']) && isset($_SESSION['lname']) && isset($_SESSION['prog']) && isset($_SESSION['yr']) && isset($_SESSION['hvoted'])){
?>
<!DOCTYPE html> 
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="President, Vice President, Secretary, Treasurer">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>E-Voting</title>
    <link rel="stylesheet" href="nicepage.css" media="screen">
<link rel="stylesheet" href="E-Voting.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script>
    <meta name="generator" content="Nicepage 4.1.0, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">     
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "AUSG Election",
		"logo": "images/AdU_logo.png"
}</script>
    <meta name="theme-color" content="#478ac9">
    <meta property="og:title" content="E-Voting">
    <meta property="og:type" content="website">
  </head>
  <body class="u-body">
        
  <header class="u-border-1 u-border-grey-15 u-clearfix u-header u-header" id="sec-6abe"><a href="Home.html" data-page-id="2540115507" class="u-image u-logo u-image-1" data-image-width="456" data-image-height="119" title="Home">
        <img src="images/AdU_logo.png" class="u-logo-image u-logo-image-1">
      </a><nav class="u-menu u-menu-dropdown u-offcanvas u-menu-1" data-position="">
        <div class="menu-collapse" style="font-size: 1rem; letter-spacing: 0px;">
          <a class="u-button-style u-custom-left-right-menu-spacing u-custom-padding-bottom u-custom-top-bottom-menu-spacing u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="#">
            <svg><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#menu-hamburger"></use></svg>
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs><symbol id="menu-hamburger" viewBox="0 0 16 16" style="width: 16px; height: 16px;"><rect y="1" width="16" height="2"></rect><rect y="7" width="16" height="2"></rect><rect y="13" width="16" height="2"></rect>
</symbol>
</defs></svg>
          </a>
        </div>
        
        <div class="u-custom-menu u-nav-container">
          <ul class="u-nav u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="E-Voting.php" style="padding: 10px 20px;">E-Voting</a>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link u-text-active-palette-1-base u-text-hover-palette-2-base" href="Log-In.html" style="padding: 10px 20px;">(<?php echo $_SESSION['fname']." ".$_SESSION['lname'] ?>) Log Out</a>
</li></ul>
        </div>
        <div class="u-custom-menu u-nav-container-collapse">
          <div class="u-black u-container-style u-inner-container-layout u-opacity u-opacity-95 u-sidenav">
            <div class="u-inner-container-layout u-sidenav-overflow">
              <div class="u-menu-close"></div>
              <ul class="u-align-center u-nav u-popupmenu-items u-unstyled u-nav-2"><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Home.html" style="padding: 10px 20px;">Home</a>
</li>
</li><li class="u-nav-item"><a class="u-button-style u-nav-link" href="Log-In.html" style="padding: 10px 20px;">Log Out</a>
</li></ul>
            </div>
          </div>
          <div class="u-black u-menu-overlay u-opacity u-opacity-70"></div>
        </div>
      </nav></header>
    <section class="u-clearfix u-section-1" id="sec-1c05">
      <div class="u-clearfix u-sheet u-sheet-1" style="border-bottom: solid">      
        <h2 class="u-text u-text-default u-text-1">President</h2>
          <table align="center">
            <tr>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "votingsystem")            ;
                    $sql = "SELECT tblcandidatespres.idPresident, tblcandidatespres.idStudentInfo, tblstudentsinfo.firstname, tblstudentsinfo.lastname, tblstudentsinfo.program, tblstudentsinfo.year FROM tblstudentsinfo RIGHT OUTER JOIN tblcandidatespres ON tblcandidatespres.idStudentInfo=tblstudentsinfo.idStudentInfo";
                    $result = mysqli_query($conn, $sql);                    
                    if (mysqli_num_rows($result) >0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<td><img src='images/candidate.png' height=200px width=200px>";
                            echo "<h5>".$row['firstname']." ".$row['lastname']."</h5>";
                            echo "<h6>".$row['program']."<br> Year ".$row['year'];                                                    }
                    }
                ?>
            </tr>
        </table>
        
      </div>
    </section>


    <section class="u-clearfix u-section-2" id="carousel_3501">
      <div class="u-clearfix u-sheet u-sheet-1" style="border-bottom: solid">
        <h2 class="u-text u-text-default u-text-1">Vice President</h2>
        <table align="center">
            <tr>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "votingsystem")            ;
                    $sql = "SELECT tblcandidatesvicepres.idVicePresident, tblcandidatesvicepres.idStudentInfo, tblstudentsinfo.firstname, tblstudentsinfo.lastname, tblstudentsinfo.program, tblstudentsinfo.year FROM tblstudentsinfo RIGHT OUTER JOIN tblcandidatesvicepres ON tblcandidatesvicepres.idStudentInfo=tblstudentsinfo.idStudentInfo";
                    $result = mysqli_query($conn, $sql);
                    $count = 0;
                    if (mysqli_num_rows($result) >0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<td><img src='images/candidate.png' height=200px width=200px>";
                            echo "<h5>".$row['firstname']." ".$row['lastname']."</h5>";
                            echo "<h6>".$row['program']."<br> Year ".$row['year']."</h6></td>";                            
                        }
                    }
                ?>
            </tr>
        </table>
      </div>
    </section>



    <section class="u-clearfix u-section-3" id="carousel_2a38">
      <div class="u-clearfix u-sheet u-sheet-1" style="border-bottom: solid">
        <h2 class="u-text u-text-default u-text-1">Secretary</h2>
        <table align="center">
            <tr>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "votingsystem")            ;
                    $sql = "SELECT tblcandidatessec.idSecretary, tblcandidatessec.idStudentInfo, tblstudentsinfo.firstname, tblstudentsinfo.lastname, tblstudentsinfo.program, tblstudentsinfo.year FROM tblstudentsinfo RIGHT OUTER JOIN tblcandidatessec ON tblcandidatessec.idStudentInfo=tblstudentsinfo.idStudentInfo";
                    $result = mysqli_query($conn, $sql);
                    $count = 0;
                    if (mysqli_num_rows($result) >0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<td><img src='images/candidate.png' height=200px width=200px>";
                            echo "<h5>".$row['firstname']." ".$row['lastname']."</h5>";
                            echo "<h6>".$row['program']."<br> Year ".$row['year']."</h6></td>";                        }
                    }
                ?>
            </tr>
        </table>
      </div>
    </section>
    <section class="u-clearfix u-section-4" id="carousel_0610">
      <div class="u-clearfix u-sheet u-sheet-1" style="border-bottom: solid">
        <h2 class="u-text u-text-default u-text-1">Treasurer</h2>
        <table align="center">
            <tr>
                <?php
                    $conn = mysqli_connect("localhost", "root", "", "votingsystem")            ;
                    $sql = "SELECT tblcandidatestreas.idTreasurer, tblcandidatestreas.idStudentInfo, tblstudentsinfo.firstname, tblstudentsinfo.lastname, tblstudentsinfo.program, tblstudentsinfo.year FROM tblstudentsinfo RIGHT OUTER JOIN tblcandidatestreas ON tblcandidatestreas.idStudentInfo=tblstudentsinfo.idStudentInfo";
                    $result = mysqli_query($conn, $sql);
                    $count = 0;
                    if (mysqli_num_rows($result) >0){
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<td><img src='images/candidate.png' height=200px width=200px>";
                            echo "<h5>".$row['firstname']." ".$row['lastname']."</h5>";
                            echo "<h6>".$row['program']."<br> Year ".$row['year']."</h6></td>";                        }
                    }
                ?>
            </tr>
        </table>
      </div>
    </section>
    

    <section class="u-clearfix u-section-2" id="carousel_3501">
      <div class="u-clearfix u-sheet u-sheet-1">
        <b><p style="font-size: 30px;" align="center">Place you votes here</p></b>
        <form action="submit-vote.php" method="POST" style="align-content: center; padding: 10px">
          <table align="center">
            <tr><td>PRESIDENT</td><td> <select name="pres" style="width : 300px;"> <option selected disabled>-- Choose One --</option>
              <?php // PRESIDENT
                $conn = mysqli_connect("localhost", "root", "", "votingsystem");
                $sql = "SELECT tblcandidatespres.idPresident, tblcandidatespres.idStudentInfo, tblstudentsinfo.firstname, tblstudentsinfo.lastname FROM tblstudentsinfo RIGHT OUTER JOIN tblcandidatespres ON tblcandidatespres.idStudentInfo=tblstudentsinfo.idStudentInfo";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) >0){
                  while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <option value="<?php echo $row['idPresident'];?>"> <?php echo $row['firstname']." ".$row['lastname'];?> </option>
                  <?php
                  }
                }
              ?></td></tr>
            </select><br>
            <tr><td>VICE PRESIDENT</td> <td><select name="vp" style="width : 300px;"> <option value='null' selected disabled>-- Choose One --</option>
              <?php // PRESIDENT
                $conn = mysqli_connect("localhost", "root", "", "votingsystem");
                $sql = "SELECT tblcandidatesvicepres.idVicePresident, tblcandidatesvicepres.idStudentInfo, tblstudentsinfo.firstname, tblstudentsinfo.lastname FROM tblstudentsinfo RIGHT OUTER JOIN tblcandidatesvicepres ON tblcandidatesvicepres.idStudentInfo=tblstudentsinfo.idStudentInfo";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) >0){
                  while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <option value=<?php echo $row['idVicePresident'];?>> <?php echo $row['firstname']." ".$row['lastname'];?> </option>
                  <?php
                  }
                }
              ?></td></tr>
            </select><br>
            <tr><td>SECRETARY</td> <td><select name="sec" style="width : 300px;"> <option selected disabled>-- Choose One --</option>
              <?php // PRESIDENT
                $conn = mysqli_connect("localhost", "root", "", "votingsystem");
                $sql = "SELECT tblcandidatessec.idSecretary, tblcandidatessec.idStudentInfo, tblstudentsinfo.firstname, tblstudentsinfo.lastname FROM tblstudentsinfo RIGHT OUTER JOIN tblcandidatessec ON tblcandidatessec.idStudentInfo=tblstudentsinfo.idStudentInfo";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) >0){
                  while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <option value="<?php echo $row['idSecretary'];?>"> <?php echo $row['firstname']." ".$row['lastname'];?> </option>
                  <?php
                  }
                }
              ?></td></tr>
            </select>
            <tr><td>SECRETARY</td> <td><select name="treas" style="width : 300px;"><option selected disabled>-- Choose One --</option>
              <?php // PRESIDENT
                $conn = mysqli_connect("localhost", "root", "", "votingsystem");
                $sql = "SELECT tblcandidatestreas.idTreasurer, tblcandidatestreas.idStudentInfo, tblstudentsinfo.firstname, tblstudentsinfo.lastname FROM tblstudentsinfo RIGHT OUTER JOIN tblcandidatestreas ON tblcandidatestreas.idStudentInfo=tblstudentsinfo.idStudentInfo";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) >0){
                  while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <option value="<?php echo $row['idTreasurer'];?>"> <?php echo $row['firstname']." ".$row['lastname'];?> </option>
                  <?php
                  }
                }
              ?></td></tr>
            </select>            
          </table>
          <div class="u-align-center u-form-group u-form-submit">                  
                  <input type="submit" value="submit" class="u-btn u-btn-submit u-button-style">
                </div> 
        </form>
      </div>
    </section>
    
    <footer class="u-align-center u-clearfix u-footer u-grey-80 u-footer" id="sec-7315"><div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
        <p class="u-small-text u-text u-text-variant u-text-1">Powered by Information Technology Center 2021</p>
      </div></footer>    
  </body>
</html>
<?php
}else{
    header("Location: E-Voting.php");
    exit();
}
?>