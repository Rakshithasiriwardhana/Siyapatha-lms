<?php
include "dbcon.php";


class login{
    



    function verifyUser($username,$password){
        
        $db = new Db;
       
        
        $query="SELECT password FROM login WHERE username='$username'"; 
        $result=mysqli_query($db->dbConnection(),$query);
        
        if (mysqli_num_rows($result) > 0) {
            while($row=mysqli_fetch_assoc($result)){
                $hashed_password=$row['password'];
                if(password_verify($password, $hashed_password)){
                    $query="SELECT uid FROM login WHERE username='$username'";
                    $result=mysqli_query($db->dbConnection(),$query);
                    while($row=mysqli_fetch_assoc($result)){
                        $uid=$row['uid'];
                        $query="SELECT type FROM user WHERE user_id='$uid'";
                        $result=mysqli_query($db->dbConnection(),$query);
                        while($row=mysqli_fetch_assoc($result)){
                            echo $row['type'];
                            if($row['type']=='admin'){
                                echo "<script type='text/javascript'>location.href = './view/admin/dashboard-admin.php';</script>";
                            }elseif($row['type']=='worker'){
                                echo "<script type='text/javascript'>location.href = './view/worker/dashboard-worker.php';</script>";
                            }
                        }
                    }
                    session_start();
                    $_SESSION["id"] = $uid;
                    $_SESSION["username"] = $username;
                }else{
                    echo 'password incorrect!!!';
                }
            }

        }else{
            echo 'username incorrect!!!';
        }


        

    }


}


    

  


    if(isset($_GET['login'])){
        $login =new login;

        $username = $_GET['username'];
        $password = $_GET['password'];
        $login->verifyUser($username,$password);
    }
    
    


?>



