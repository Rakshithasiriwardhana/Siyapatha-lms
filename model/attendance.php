<?php

class attendance{
    private $stu_id;
    private $class_id;
    private $date;
    private $status;
 

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
    function get_stu_id(){
        return $this->stu_id;
    }
    function get_class_id(){
        return $this->class_id;
    }
    function get_date(){
        return $this->date;
    }
    function get_status(){
        return $this->status;
    }

    ///////////////// set ///////////////////
    function set_stu_id($new_stu_id){
        $this->stu_id = $new_stu_id;
    }
    function set_class_id($new_class_id){
        $this->class_id = $new_class_id;
    }
    function set_date($new_date){
        $this->date = $new_date;
    }
    function set_status($new_status){
        $this->status = $new_status;
    }


}







?>