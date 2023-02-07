<?php
    session_start();

?>

<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="utf-8">
        <title>Siyapatha</title>
        <link href="../../css/dashboard-style.css" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
    </head>

    <body>
        <nav class="nav-main">
            <center>
                <img src="../../images/icons/graduation-cap.svg" width="50px" id="logo" alt=""/>
                <p id="institute">Siyapatha</p>
            </center>
            <ul>
                <li>
                    <a href="dashboard-admin.php?home">
                        <img src="../../images/icons/nav-button-select.svg" class="button-select" alt=""/>
                        <button class="nav-button p " id="home">Home</button>
                    </a>
                </li>
                <li>
                    <a href="dashboard-admin.php?timetable">
                        <img src="../../images/icons/nav-button-select.svg" class="button-select" alt=""/>
                        <button class="nav-button p" id="timetable" >Timetable</button> 
                    </a>         
                </li>
                <li>
                    <a href="dashboard-admin.php?teachers">
                        <img src="../../images/icons/nav-button-select.svg" class="button-select" alt=""/>
                        <button class="nav-button p" id="teachers" >Teachers</button>
                    </a>
                </li>
                <li>
                    <a href="dashboard-admin.php?students">
                        <img src="../../images/icons/nav-button-select.svg" class="button-select" alt=""/>
                        <button class="nav-button p" id="students" >Students</button>
                    </a>
                </li>
                <li>
                    <a href="dashboard-admin.php?subjects">
                        <img src="../../images/icons/nav-button-select.svg" class="button-select" alt=""/>
                        <button class="nav-button p" id="subjects" >Subjects</button>
                    </a>
                </li>
                <li>
                    <a href="dashboard-admin.php?classes">
                        <img src="../../images/icons/nav-button-select.svg" class="button-select" alt=""/>
                        <button class="nav-button p" id="classes" >Classes</button>
                    </a>
                </li>
                <li>
                    <a href="dashboard-admin.php?attendance">
                        <img src="../../images/icons/nav-button-select.svg" class="button-select" alt=""/>
                        <button class="nav-button p" id="attendance" >Attendance</button>
                    </a>
                </li>
                <li>
                    <a href="dashboard-admin.php?fees">
                        <img src="../../images/icons/nav-button-select.svg" class="button-select" alt=""/>
                        <button class="nav-button p" id="fees" > Fees</button>
                    </a>
                </li>
                <li>
                    <a href="dashboard-admin.php?email">
                        <img src="../../images/icons/nav-button-select.svg" class="button-select" alt=""/>
                        <button class="nav-button p" id="send_email" >Send Email</button>
                    </a>    
                </li>
                <li>
                    <a href="dashboard-admin.php?users">
                        <img src="../../images/icons/nav-button-select.svg" class="button-select" alt=""/>
                        <button class="nav-button p" id="users" >Users</button>
                    </a>
                   
                </li>
            </ul>
        </nav>
        
        <header class="header">
            <div class="user-type" >
            <p id="user-type">Admin</p>
            </div>
            <p id="user" >Hi <?php  echo $_SESSION["username"] ?></p>
            <a href="../../logout.php"><input type="submit" class="p button-purple" id="logout" value="Logout"></a>
        </header>
        
            
        <div class="window-loader">
        <?php
            if(isset($_GET['home'])){
                include "home-admin.php";
            }elseif(isset($_GET['timetable'])){
                include ('timetable-admin.php');
            }elseif(isset($_GET['teachers'])){
                include ('teacher-admin.php');
            }elseif(isset($_GET['students'])){
                include ('student-admin.php');
            }elseif(isset($_GET['subjects'])){
                include ('subjects-admin.php');
            }elseif(isset($_GET['classes'])){
                include ('class-admin.php');
            }elseif(isset($_GET['attendance'])){
                include ('../common/attendance.php');
            }elseif(isset($_GET['fees'])){
                include ('../common/fees.php');
            }elseif(isset($_GET['email'])){
                include ('email-admin.php');
            }elseif(isset($_GET['users'])){
                include ('user-admin.php');
            }else{
                include ('home-admin.php');
            }
	    ?>




        </div>



    </body>
</html>


