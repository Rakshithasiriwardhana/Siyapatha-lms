<?php

class user{
    private $id;
    private $first_name;
    private $last_name;
    private $type;
    private $photo;
    private $email;
    private $contact_no;
    private $address_no;
    private $address_street;
    private $address_city;
    private $nic;
    private $username;
    private $password;

    /* public function __construct($values) {
		$this->id = isset($values['id']) ? $values['id'] : NULL;
		$this->first_name = isset($values['first_name']) ? $values['first_name'] : NULL;
        $this->last_name = isset($values['last_name']) ? $values['last_name'] : NULL;
		$this->type = isset($values['type']) ? $values['type'] : NULL;
        $this->photo = isset($values['photo']) ? $values['photo'] : NULL;
		$this->email = isset($values['email']) ? $values['email'] : NULL;
        $this->contact_no = isset($values['contact_no']) ? $values['contact_no'] : NULL;
		$this->address_no = isset($values['address_no']) ? $values['address_no'] : NULL;
        $this->address_street = isset($values['address_street']) ? $values['address_street'] : NULL;
		$this->address_city = isset($values['address_city']) ? $values['address_city'] : NULL;
        $this->nic = isset($values['nic']) ? $values['nic'] : NULL;
		$this->username = isset($values['username']) ? $values['username'] : NULL;
        $this->password = isset($values['password']) ? $values['password'] : NULL;
	} */
    /* private function __construct($id,$first_name,$last_name,$type,$photo,$email,$contact_no,$address_no,$address_street,$address_city,$nic){
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->type = $type;
        $this->photo = $photo;
        $this->email = $email;
        $this->contact_no = $contact_no;
        $this->address_no = $address_no;
        $this->address_street = $address_street;
        $this->address_city = $address_city;
        $this->nic = $nic;
    } */

    //////////////////// get //////////////////
    function get_id(){
        return $this->id;
    }
    function get_first_name(){
        return $this->first_name;
    }
    function get_last_name(){
        return $this->last_name;
    }
    function get_type(){
        return $this->type;
    }
    function get_photo(){
        return $this->photo;
    }function get_email(){
        return $this->email;
    }
    function get_contact_no(){
        return $this->contact_no;
    }
    function get_address_no(){
        return $this->address_no;
    }
    function get_address_street(){
        return $this->address_street;
    }
    function get_address_city(){
        return $this->address_city;
    }
    function get_nic(){
        return $this->nic;
    }
    function get_username(){
        return $this->username;
    }
    function get_password(){
        return $this->password;
    }

    ///////////////// set ///////////////////
    function set_id($new_id){
        $this->id = $new_id;
    }
    function set_first_name($new_first_name){
        $this->first_name = $new_first_name;
    }
    function set_last_name($new_last_name){
        $this->last_name = $new_last_name;
    }
    function set_type($new_type){
        $this->type = $new_type;
    }
    function set_photo($new_photo){
        $this->photo = $new_photo;
    }
    function set_email($new_email){
        $this->email = $new_email;
    }
    function set_contact_no($new_contact_no){
        $this->contact_no = $new_contact_no;
    }
    function set_address_no($new_address_no){
        $this->address_no = $new_address_no;
    }
    function set_address_street($new_address_street){
        $this->address_street = $new_address_street;
    }
    function set_address_city($new_address_city){
        $this->address_city = $new_address_city;
    }
    function set_nic($new_nic){
        $this->nic = $new_nic;
    }
    function set_username($new_username){
        $this->username = $new_username;
    }
    function set_password($new_password){
        $this->password = $new_password;
    }


}


/* $user=new user("1","saman","karunapala","worker","no","ttt@r","12121212","no1","main street","kandy","9898989898");
$user2=new user("1","saman","karunapala","worker","no","ttt@r","12121212","no1","main street","matale","9898989898");
echo $user->get_address_city();
echo $user2->get_address_city();

$user2->set_address_city("jafna");
echo $user2->get_address_city();
 */







?>