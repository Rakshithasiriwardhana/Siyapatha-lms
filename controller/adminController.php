<?php
include "../model/adminDAO.php";


/* $admindao=new adminDAO;*/

$id = "234";
$first_name = "234";
$last_name = "234";
$type = "234";
$photo = "234";
$email = "234";
$contact_no = "234";
$address_no = "234";
$address_street = "234";
$address_city = "234";
$nic = "234";
$username = "234";
$password = "234";


/*$admindao->addUserProfile($id,$first_name,$last_name,$type,$photo,$email,$contact_no,$address_no,$address_street,$address_city,$nic); */


$my_array = ['id'=>$id,'first_name'=>$first_name,'last_name'=>$last_name,'type'=>$type,'photo'=>$photo,'email'=>$email,'contact_no'=>$contact_no,'address_no'=>$address_no,'address_street'=>$address_street,'address_city'=>$address_city,'nic'=>$nic,'username'=>$username,'password'=>$password];
//$my_array = ['id'=>'sfd','first_name'=>'sfd','last_name'=>'sfd','type'=>'sfd','photo'=>'sfd','email'=>'sfd','contact_no'=>'sfd','address_no'=>'sfd','address_street'=>'sfd','address_city'=>'sfd','nic'=>'sfd','username'=>'sfd','password'=>'sfd'];

    $user=new user($my_array);

   /*  $admindao=new adminDAO();
    $admindao->viewData(); */

    /* echo "<pre>";
    print_r(get_object_vars($user));
    echo "</pre>"; */

?>