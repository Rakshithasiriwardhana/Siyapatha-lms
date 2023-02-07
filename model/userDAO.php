<?php
include "dbcon.php";
include "user.php";
class userDAO{
    
    function getAllUser($user_id){
        $arr=[];
        $db = new Db;

        if($user_id=='all'){
            $query="SELECT * FROM user";
        }else{
            $query="SELECT * FROM user WHERE user_id='$user_id'";
        }

        $result=mysqli_query($db->dbConnection(),$query);
        while($row=mysqli_fetch_assoc($result)){
            $my_array = [];
            $user=new user($my_array);
            
            $user->set_id($row['user_id']);
            $user->set_first_name($row['first_name']);
            $user->set_last_name($row['last_name']);
            $user->set_email($row['email']);
            $user->set_contact_no($row['contact_no']);
            $user->set_type($row['type']);
            $user->set_photo($row['photo']);
            $user->set_address_no($row['address_no']);
            $user->set_address_street($row['street']);
            $user->set_address_city($row['city']);
            $user->set_nic( $row['nic']);
            
            array_push($arr, [
            'id' => $user->get_id(),
            'first_name' => $user->get_first_name(),
            'last_name' => $user->get_last_name(),
            'email' => $user->get_email(),
            'contact_no' => $user->get_contact_no(),
            'type' => $user->get_type(),
            'photo' => $user->get_photo(),
            'address_no' => $user->get_address_no(),
            'address_street' => $user->get_address_street(),
            'address_city' => $user->get_address_city(),
            'nic' => $user->get_nic(),
            ]); 
        }
        echo json_encode($arr);
    }

    function getUser($user_id){
        $db = new Db;

        $query="SELECT * FROM user,login WHERE user_id='$user_id' AND user.user_id=login.uid;";
        
        $result=mysqli_query($db->dbConnection(),$query);
        while($row=mysqli_fetch_assoc($result)){
            
            $user=new user();
            
            $user->set_id($row['user_id']);
            $user->set_first_name($row['first_name']);
            $user->set_last_name($row['last_name']);
            $user->set_email($row['email']);
            $user->set_contact_no($row['contact_no']);
            $user->set_type($row['type']);
            $user->set_photo($row['photo']);
            $user->set_address_no($row['address_no']);
            $user->set_address_street($row['street']);
            $user->set_address_city($row['city']);
            $user->set_nic($row['nic']);
            $user->set_password($row['password']);
            $user->set_username($row['username']);
            
            $data["id"]=$user->get_id();
            $data["first_name"]=$user->get_first_name();
            $data["last_name"]=$user->get_last_name();
            $data["email"]=$user->get_email();
            $data["contact_no"]=$user->get_contact_no();
            $data["type"]=$user->get_type();
            $data["photo"]=$user->get_photo();
            $data["address_no"]=$user->get_address_no();
            $data["address_street"]=$user->get_address_street();
            $data["address_city"]=$user->get_address_city();
            $data["nic"]=$user->get_nic();
            $data["password"]=$user->get_password();
            $data["username"]=$user->get_username();
 
        }
        echo json_encode($data);
    }

    function getAllUserId(){
        $arr=[];
        $db = new Db;

        
        $query="SELECT user_id FROM user"; 
        $result=mysqli_query($db->dbConnection(),$query);
        while($row=mysqli_fetch_assoc($result)){
           
            $user=new user();
            
            $user->set_id($row['user_id']);
            
            
            array_push($arr, [
            'id' => $user->get_id()
            ]); 
        }
        echo json_encode($arr);
    }

}


    $userdao=new userDAO;

    if(isset($_GET['show_user_id'])){
        $uid=$_GET['show_user_id'];
        $userdao->getUser($uid);
    } 

    if(isset($_GET['search_userid'])){
        $search_userid=$_GET['search_userid'];
        $userdao->getAllUser($search_userid);
    }

    if(isset($_GET['all_user_id'])){
        $userdao->getAllUserId();
    }
?>



