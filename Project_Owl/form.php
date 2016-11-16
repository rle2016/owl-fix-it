<?php
require_once "php/db_connect.php";
require_once "php/functions.php";

session_start();

if (isset($_SESSION['username_input']))
  {
    $username = $_SESSION['username_input'];
    $password = $_SESSION['password_input'];
 }
  else {
    echo "<script type='text/javascript'>alert('Please Sign-In to Access This');window.location.href='index.php'</script>";
}

  function destroy_session_and_data()
  {
    $_SESSION = array();
    setcookie(session_name(), '', time() - 2592000, '/');
    session_destroy();
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <title>Owl Fix It</title>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body onload="initialize();">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index.php"><img src="images/owl-logo.png" class="img-responsive" height="260" width="160" alt=""></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden"><a href="#page-top"></a></li>
                    <li><a class="page-scroll" href="wall.php">Home</a></li>
                    <li><a class="page-scroll" href="form.php">Upload Photo</a></li>
                    <li><a class="page-scroll" href="settings.php">Settings</a></li>
                    <li><a class="page-scroll" href="logout.php">Logout</a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
    </nav>
    <div class="container">    
        <div class="row">
            <div id="formParent" class="col-md-6 col-md-offset-3 text-center">
                <form id="form" class="form-horizontal" method="POST" action="wall.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Location" class="control-label col-xs-1">Location</label>
                            <div class="col-xs-11">
                            <div class="drop-down">
                                <select class="form-control" id="select" name="location" id="location">
                                <option value="Select Option">Select Option</option>
                                <option  value="38(GY)-ARENA">38(GY)-ARENA</option>
                                <option  value="11(FH)-ATHLETIC FIELD HOUSE">11(FH)-ATHLETIC FIELD HOUSE</option>
                                <option  value="11A(FW)-ATHLETIC FIELD HOUSE WEST">11A(FW)-ATHLETIC FIELD HOUSE WEST</option>
                                <option  value="62(PW)-B.P.W. SCHOLARSHIP HOUSE">62(PW)-B.P.W. SCHOLARSHIP HOUSE</option>
                                <option  value="25(KH)-BARRY KAYE HALL">25(KH)-BARRY KAYE HALL</option>
                                <option  value="48(BB)-BASEBALL STADIUM">48(BB)-BASEBALL STADIUM</option>
                                <option  value="12(BS)-BEHAVIORAL SCIENCE BUILDING">12(BS)-BEHAVIORAL SCIENCE BUILDING</option>
                                <option  value="76(BK)-BOOKSTORE">76(BK)-BOOKSTORE</option>
                                <option  value="69(CO)-CAMPUS OPERATIONS BUILDING">69(CO)-CAMPUS OPERATIONS BUILDING</option>
                                <option  value="31A(AU)-CAROLE & BARRY KAYE AUDITORIUM">31A(AU)-CAROLE & BARRY KAYE AUDITORIUM</option>
                                <option  value="22(CM)-COMPUTER CENTER">22(CM)-COMPUTER CENTER</option>
                                <option  value="31D(CE)-CONTINUING EDUCATION HALL">31D(CE)-CONTINUING EDUCATION HALL</option>
                                <option  value="44(SO)-COLLEGE FOR DESIGN & SOCIAL INQUIRY">44(SO)-COLLEGE FOR DESIGN & SOCIAL INQUIRY</option>
                                <option  value="9(AL)-COLLEGE OF ARTS & LETTERS, DOROTHY F. SCMIDT">9(AL)-COLLEGE OF ARTS & LETTERS, DOROTHY F. SCMIDT</option>
                                <option  value="86(BU)-COLLEGE OF BUSINESS">86(BU)-COLLEGE OF BUSINESS</option>
                                <option  value="47(ED)-COLLEGE OF EDUCATION">47(ED)-COLLEGE OF EDUCATION</option>
                                <option  value="96(EE)-COLLEGE OF ENGINEERING AND COMPUTER SCIENCE">96(EE)-COLLEGE OF ENGINEERING AND COMPUTER SCIENCE</option>
                                <option  value="71(BC)COLLEGE OF MEDICINE, CHARLES E. SCHMIDT">71(BC)COLLEGE OF MEDICINE, CHARLES E. SCHMIDT</option>
                                <option  value="84(NU)-COLLEGE OF NURING, CHRISTINE E. LYNN">84(NU)-COLLEGE OF NURING, CHRISTINE E. LYNN</option>
                                <option  value="43(SE)-COLLEGE OF SCIENCE, CHARLES E. SCHMIDT">43(SE)-COLLEGE OF SCIENCE, CHARLES E. SCHMIDT</option>
                                <option  value="97(CU)-CULTURE AND SOCIETY BUILDING">97(CU)-CULTURE AND SOCIETY BUILDING</option>
                                <option  value="87(DS)-DESANTIS PAVILION">87(DS)-DESANTIS PAVILION</option>
                                <option  value="52(AH)-DOROTHY F. SCHMIDT ARTS & HUMANITIES">52(AH)-DOROTHY F. SCHMIDT ARTS & HUMANITIES</option>
                                <option  value="51(PA)-DOROTHY F. SCHMIDT PERFORMING ARTS CENTER">51(PA)-DOROTHY F. SCHMIDT PERFORMING ARTS CENTER</option>
                                <option  value="53(VA)-DOROTHY F. SCHMIDT VISUAL ARTS CENTER">53(VA)-DOROTHY F. SCHMIDT VISUAL ARTS CENTER</option>
                                <option  value="75(PR)-ELEANOR R. BALDWIN HOUSE, PRESIDENT'S RESIDENCE">75(PR)-ELEANOR R. BALDWIN HOUSE, PRESIDENT'S RESIDENCE</option>
                                <option  value="96(EE)-ENGINEERING EAST">96(EE)-ENGINEERING EAST</option>
                                <option  value="36(EG)-ENGINEERING WEST">36(EG)-ENGINEERING WEST</option>
                                <option  value="85(EH)-ENVIRONMENTAL HEALTH SUPPORT FACILITY">85(EH)-ENVIRONMENTAL HEALTH SUPPORT FACILITY</option>
                                <option  value="100(FS)-FAU STADIUM">100(FS)-FAU STADIUM</option>
                                <option  value="24(FL)-FLEMING HALL">24(FL)-FLEMING HALL</option>
                                <option  value="23(FW)-FLEMING WEST">23(FW)-FLEMING WEST</option>
                                <option  value="31C(LL)FRIEDBERG LIFELONG LEARNING CENTER">31C(LL)FRIEDBERG LIFELONG LEARNING CENTER</option>
                                <option  value="73(GN)-GENERAL CLASSROOM-NORTH">73(GN)-GENERAL CLASSROOM-NORTH</option>
                                <option  value="2(GS)-GENERAL CLASSROOM-SOUTH">2(GS)-GENERAL CLASSROOM-SOUTH</option>
                                <option  value="92(GP)-GLADES PARK TOWERS">92(GP)-GLADES PARK TOWERS</option>
                                <option  value="49(DP)-GLADYS DAVIS PAVILION-LEARNING ALLY">49(DP)-GLADYS DAVIS PAVILION-LEARNING ALLY</option>
                                <option  value="89(HP)-HERITAGE PARK TOWERS">89(HP)-HERITAGE PARK TOWERS</option>    
                                <option  value="3A(LY)-HILLEL JEWISH LIFE CENTER">3A(LY)-HILLEL JEWISH LIFE CENTER</option>
                                <option  value="18(DM)-HOUSING ASSISTANT'S HOUSE(PRIVATE RESIDENCE)">18(DM)-HOUSING ASSISTANT'S HOUSE(PRIVATE RESIDENCE)</option>
                                <option  value="70(IR)-INDIAN RIVER TOWERS">70(IR)-INDIAN RIVER TOWERS</option>    
                                <option  value="41(IG)-INFORMATION BOOTH">41(IG)-INFORMATION BOOTH</option>
                                <option  value="4(IS)-INSTRUCTIONAL SERVICES">4(IS)-INSTRUCTIONAL SERVICES</option>
                                <option  value="98(IV)-INNOVATION VILLAGE APARTMENTS-NORTH">98(IV)-INNOVATION VILLAGE APARTMENTS-NORTH</option>    
                                <option  value="99(IV)-INNOVATION VILLAGE APARTMENTS-SOUTH">99(IV)-INNOVATION VILLAGE APARTMENTS-SOUTH</option>
                                <option  value="45(CC)-KAREN SLATTERY CHILD DEVELOPMENT CENTER">45(CC)-KAREN SLATTERY CHILD DEVELOPMENT CENTER</option>
                                <option  value="T-10(VC)-LABS-ARTS AND LETTERS">T-10(VC)-LABS-ARTS AND LETTERS</option>
                                <option  value="31B(LO)-LIVE OAK PAVILION">31B(LO)-LIVE OAK PAVILION</option>
                                <option  value="97(CU)-LIVING ROOM THEATER IN CULTURE AND SOCIETY BUILDING">97(CU)-LIVING ROOM THEATER IN CULTURE AND SOCIETY BUILDING</option>
                                <option  value="79(AZ)-LOUIS & ANNE GREEN MEMORY & WELLNESS CENTER">79(AZ)-LOUIS & ANNE GREEN MEMORY & WELLNESS CENTER</option>    
                                <option  value="94(FA)-MARLEEN & HAROLD FORKAS ALUMNI CENTER">94(FA)-MARLEEN & HAROLD FORKAS ALUMNI CENTER</option>
                                <option  value="104(ME)-OFFICE BUILDING ONE">104(ME)-OFFICE BUILDING ONE</option>
                                <option  value="93(OD)-OFFICE DEPOT CENTER FOR EXECUTIVE EDUCATION">93(OD)-OFFICE DEPOT CENTER FOR EXECUTIVE EDUCATION</option>
                                <option  value="81(PK)-PARKING GARAGE I)">81(PK)-PARKING GARAGE I</option>
                                <option  value="88(PK)-PARKING GARAGE II">88(PK)-PARKING GARAGE II</option>
                                <option  value="103(PK)-PARKING GARAGE III">103(PK)-PARKING GARAGE III</option>
                                <option  value="77(PV)-PAVILION-STUDENT SERVICES">77(PV)-PAVILION-STUDENT SERVICES</option>
                                <option  value="45A(CC)-PETER AND NONA GORDON LIBRARY AND MEDIA CENTER">45A(CC)-PETER AND NONA GORDON LIBRARY AND MEDIA CENTER</option>
                                <option  value="55(PS)-PHYSICAL SCIENCE BUILDING">55(PS)-PHYSICAL SCIENCE BUILDING</option>
                                <option  value="35(PG)-PLANT GROWTH COMPLEX">35(PG)-PLANT GROWTH COMPLEX</option>   
                                <option  value="T-5(TB)-PROPERTY MGMT. ARCHAEOLOGY GEOLOGY LABS">T-5(TB)-PROPERTY MGMT. ARCHAEOLOGY GEOLOGY LABS</option>
                                <option  value="91(RC)-RECREATION AND FITNESS CENTER">91(RC)-RECREATION AND FITNESS CENTER</option>   
                                <option  value="66(GR)-RESEARCH GREENHOUSE">66(GR)-RESEARCH GREENHOUSE</option>
                                <option  value="35A(RS)-RESEARCH SUPPORT FACILITY">35A(RS)-RESEARCH SUPPORT FACILITY</option>
                                <option  value="6(DM)-RESIDENCE HALL-ALGONQUIN">6(DM)-RESIDENCE HALL-ALGONQUIN</option>
                                <option  value="39(AG)-RITTER ART GALLERY">39(AG)-RITTER ART GALLERY</option>
                                <option  value="74(RC)-ROPES COURSE PAVILION">74(RC)-ROPES COURSE PAVILION</option>
                                <option  value="T-11(TB)-ROTC)">T-11(TB)-ROTC</option>
                                <option  value="3(LY)-S.E WIMBERLY LIBRARY">3(LY)-S.E WIMBERLY LIBRARY</option>
                                <option  value="1(SC)-SANSON LIFE SCIENCES">1(SC)-SANSON LIFE SCIENCES</option>
                                <option  value="51(PA)-SCHMIDT CENTER GALLERY IN DOROTHY F. SCHMIDT COLLEGE OF ARTS & LETTERS-PERFORMING ARTS">51(PA)-SCHMIDT CENTER GALLERY IN DOROTHY F. SCHMIDT COLLEGE OF ARTS & LETTERS-PERFORMING ARTS</option>
                                <option  value="43(SE)-SCIENCE BUILDING">43(SE)-SCIENCE BUILDING</option>
                                <option  value="86(BU)-SEAN STEIN PAVILION IN COLLEGE OF BUSINESS">86(BU)-SEAN STEIN PAVILION IN COLLEGE OF BUSINESS</option>
                                <option  value="78(SR)-SOCCER FIELD RESTROOMS-GLADES ROAD">78(SR)-SOCCER FIELD RESTROOMS-GLADES ROAD</option>
                                <option  value="44(SO)-SOCIAL SCIENCE BUILDING">44(SO)-SOCIAL SCIENCE BUILDING</option>
                                <option  value="68(SB)-SOFTBALL STADIUM">68(SB)-SOFTBALL STADIUM</option>
                                <option  value="101(SP)-STADIUM SUPPORT FACILITY">101(SP)-STADIUM SUPPORT FACILITY</option>
                                <option  value="84(NU)-STAND AMONG FRIENDS IN C.E. LYNN COLLEGE OF NURSING">84(NU)-STAND AMONG FRIENDS IN C.E. LYNN COLLEGE OF NURSING</option>
                                <option  value="31E(CR)-STUDENT ACTIVITIES CENTER">31E(CR)-STUDENT ACTIVITIES CENTER</option>
                                <option  value="8W(SS)-STUDENT HEALTH SERVICES">8W(SS)-STUDENT HEALTH SERVICES</option>
                                <option  value="46(SH)-STUDENT HOUSING OFFICES">46(SH)-STUDENT HOUSING OFFICES</option>
                                <option  value="8(SS)-STUDENT SERVICES & CAFETERIA">8(SS)-STUDENT SERVICES & CAFETERIA</option>
                                <option  value="80(SU)-STUDENT SUPPORT SERVICES">80(SU)-STUDENT SUPPORT SERVICES</option>
                                <option  value="31(UN)-STUDENT UNION">31(UN)-STUDENT UNION</option>
                                <option  value="51(PA)-STUDIO ONE THEATRE IN DOROTHY F. SCHMIDT COLLEGE OF ARTS & LETTERS-PERFORMING ARTS TECH RUNWAY">51(PA)-STUDIO ONE THEATRE IN DOROTHY F. SCHMIDT COLLEGE OF ARTS & LETTERS-PERFORMING ARTS TECH RUNWAY</option>
                                <option  value="106(TE)-TECH RUNWAY">106(TE)-TECH RUNWAY</option>
                                <option  value="67(AC)-TOM OXLEY ATHLETIC CENTERY">67(AC)-TOM OXLEY ATHLETIC CENTERY</option>
                                <option  value="9(AL)-UNIVERSITY THEATRE IN DOROTHY F. SCHMIDT COLLEGE OF ARTS & LETTERS">9(AL)-UNIVERSITY THEATRE IN DOROTHY F. SCHMIDT COLLEGE OF ARTS & LETTERS</option>
                                <option  value="56-61(SA)-UNIVERSITY VILLAGE STUDENT APARTMENTS">56-61(SA)-UNIVERSITY VILLAGE STUDENT APARTMENTS</option>
                                <option  value="5(UT)-UTILITIE">5(UT)-UTILITIES</option>
                                <option  value="67B(TC)-WALLY SANGER OWL CLUB CENTER">67B(TC)-WALLY SANGER OWL CLUB CENTER</option>
                                
                            </select>
                            </div>
                            </div>
                    </div>
                      
                    <div class="form-group">
                        <label for="text" class="control-label col-xs-1">Description</label>
                        <div class="col-xs-11">
                            <div class="description">
                            <textarea class="form-control" id="description" name="description" maxlength="140" placeholder="140 characters" required></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="sr-only" for="image">Original Image</label>
                        <img id="image" name="image" src="images/default.png" width="50%">
                    </div>
                    <br>
                    <input type="file" id="upload" name="upload" accept="image/*" required="true" class="filestyle" data-buttonName="btn-primary" data-buttonBefore="true"> 
                    <hr>
                    <div id="buttonPost" class="form-group">         
                    <input type="submit" value="Upload Post" class="btn btn-primary col-md-offset-1" required="true">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div id="footer">
        <footer class="text-center">
            <div class="row">
                <div class="col-lg-12">
                    Copyright &copy; 2016 Team Petabyte
                </div>
            </div>
        </footer>
    </div>
    <!-- JavaScript placed at bottom for faster page loadtimes. -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    <script src="js/functions.js"></script>
    <script src="js/bootstrap-filestyle.min.js"></script>

</body>
</html>
<?php $connection->close(); ?>
