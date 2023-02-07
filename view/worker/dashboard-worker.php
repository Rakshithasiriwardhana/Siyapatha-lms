<?php
    session_start();

?>

<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Siyapatha</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
        <link href="../../css/dashboard-style.css" rel="stylesheet" type="text/css">
    </head>

    <body>
        <nav class="nav-main">
            <center>
                <img src="../../images/icons/graduation-cap.svg" width="50px" id="logo" alt=""/>
                <p id="institute">Siyapatha</p>
            </center>
            <ul>
                <li>
                    <a href="dashboard-worker.php?home">
                        <img src="../../images/icons/nav-button-select.svg" class="button-select" alt=""/>
                        <button class="nav-button p " id="home">Home</button>
                    </a>
                </li>
                <li>
                    <a href="dashboard-worker.php?timetable">
                        <img src="../../images/icons/nav-button-select.svg" class="button-select" alt=""/>
                        <button class="nav-button p" id="timetable" >Timetable</button> 
                    </a>         
                </li>
                <li>
                    <a href="dashboard-worker.php?teachers">
                        <img src="../../images/icons/nav-button-select.svg" class="button-select" alt=""/>
                        <button class="nav-button p" id="teachers" >Teachers</button>
                    </a>
                </li>
                <li>
                    <a href="dashboard-worker.php?students">
                        <img src="../../images/icons/nav-button-select.svg" class="button-select" alt=""/>
                        <button class="nav-button p" id="students" >Students</button>
                    </a>
                </li>
                <li>
                    <a href="dashboard-worker.php?subjects">
                        <img src="../../images/icons/nav-button-select.svg" class="button-select" alt=""/>
                        <button class="nav-button p" id="subjects" >Subjects</button>
                    </a>
                </li>
                <li>
                    <a href="dashboard-worker.php?classes">
                        <img src="../../images/icons/nav-button-select.svg" class="button-select" alt=""/>
                        <button class="nav-button p" id="classes" >Classes</button>
                    </a>
                </li>
                <li>
                    <a href="dashboard-worker.php?attendance">
                        <img src="../../images/icons/nav-button-select.svg" class="button-select" alt=""/>
                        <button class="nav-button p" id="attendance" >Attendance</button>
                    </a>
                </li>
                <li>
                    <a href="dashboard-worker.php?fees">
                        <img src="../../images/icons/nav-button-select.svg" class="button-select" alt=""/>
                        <button class="nav-button p" id="fees" > Fees</button>
                    </a>
                </li>
            </ul>
        </nav>
        
        <header class="header">
            <div class="user-type" >
            <p id="user-type">Worker</p>
            </div>
            <p id="user" >Hi <?php  echo $_SESSION["username"] ?></p>
            <a href="../../logout.php"><input type="submit" class="p button-purple" id="logout" value="Logout"></a>
        </header>
        
            
        <div class="window-loader">
        <?php
            if(isset($_GET['home'])){
                include "home-worker.php";
            }elseif(isset($_GET['timetable'])){
                include ('timetable-worker.php');
            }elseif(isset($_GET['teachers'])){
                include ('teacher-worker.php');
            }elseif(isset($_GET['students'])){
                include ('student-worker.php');
            }elseif(isset($_GET['subjects'])){
                include ('subjects-worker.php');
            }elseif(isset($_GET['classes'])){
                include ('class-worker.php');
            }elseif(isset($_GET['attendance'])){
                include ('../common/attendance.php');
            }elseif(isset($_GET['fees'])){
                include ('../common/fees.php');
            }else{
                include ('home-worker.php');
            }
	    ?>




        </div>



    </body>
</html>


