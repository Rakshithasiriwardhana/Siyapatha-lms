<style>
    #details-view, #details-view tr, #details-view td{
        margin: 0;  
        padding-left: 24px;
        padding-right: 0;
        padding-top: 0;
        padding-bottom: 0;
        border: 0;
        outline: 0;
        font-size: 100%;
        /* vertical-align: baseline; */
        background: transparent;
        height: 0;
        border-collapse: collapse;
	    border: none;
    }
    .image{
        height: 142px;
        width: 142px;
    }
    #show-results{
        margin-top: 267px;
        height: 58%;
    }
    #details-view{
        text-align: left;
    }
    textarea{
        border: 1px solid #999999;
        box-sizing: border-box;
        border-radius: 13px;
        width: 177px;
        resize: none;
        outline:none;
        padding: 10px;
    }
    .squ{
        border: 1px solid #999999;
        box-sizing: border-box;
        border-radius: 13px;
        width: 177px;
        height: 114px;
        border: 1px solid #999999;
        padding-left: 4px;
        padding-right: 3px;
        padding-top: 9px;
    }
    #add_user_addr_no, #add_user_addr_street ,#add_user_addr_city,#view_adress_no, #view_address_street ,#view_address_city{
        width: 144px;
        margin-bottom: 7px;
    }
    #btn_upload{
        border-radius: 0;
        box-shadow: 0 0;
        content: 'Select some files';
        display: block;
    }
    input[type=file]::-webkit-file-upload-button {
        content: 'Select some files';
        border: 2px solid #6c5ce7;
        padding: .2em .4em;
        border-radius: .2em;
        background-color: #a29bfe;
        transition: 1s;
        opacity: 0;
    }
    #view_tpno, #view_adress_no, #view_address_street, #view_address_city, #view_password, #view_usertype{
        color: blue;
    }
</style>

<div class="container">

    <!-- start top bar -->
    <section class="top-pannel">
        <p id="title">User</p>
        <div class="user-search-pannel">
            <center>
                <div class="box-align" style="width: 341px; margin-top: 10px;">
                    <select name="grade" id="id_drop_menu" class="txtbox p">
                        <option value="" disabled selected>User ID</option>
                        <!-- <option value="UO1">U01</option>
                        <option value="U02">U02</option> -->
                    </select>
                    <button class="btn p btn-search" onclick="search()">Search</button>
                </div>
            </center>
        </div>
    </section>
    <!-- end top bar -->

    <!-- start middle bar -->
    <div class="addnew-pannel2">
        <center>
            <table id="details-view">
                <tr>
                    <td rowspan="4">
                        <img src="../../images/photos/users/users default.jpg" class="image">
                    </td>
                    <td>
                        <label class="label p">First Name</label><br>
                        <input type="text" id="view_fname" class="txtbox p" disabled>
                    </td>
                    <td>
                        <label class="label p">Last Name</label><br>
                        <input type="text" id="view_lname" class="txtbox p" disabled>
                    </td>
                    <td>
                        <label class="label p">User Type</label><br>
                        <select name="type" id="view_usertype" class="txtbox p">
                            <option value="worker">Worker</option>
                            <option value="admin">Admin</option>
                        </select>
                    </td>
                    <td rowspan="2">
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label p">NIC</label><br>
                        <input type="text" id="view_nic" class="txtbox p" disabled>
                    </td>
                    <td rowspan="3">
                        <label class="label p">Address</label><br>
                        <div class="squ">
                            <label class="label p ">no.</label>
                            <input type="text" id="view_adress_no" class="txtbox p"><br>
                            <label class="label p">str.</label>
                            <input type="text" id="view_address_street" class="txtbox p"><br>
                            <label class="label p">city</label>
                            <input type="text" id="view_address_city" class="txtbox p">
                        </div>
                    </td>
                    <td rowspan="3">
                        <label class="label p"></label><br>
                        <div class="squ">
                            <label class="label p ">User Name</label>
                            <input type="text" id="view_user_name" class="txtbox p" style="width:167px" disabled><br>
                            <label class="label p">Password</label>
                            <input type="text" id="view_password" class="txtbox p"  style="width:167px" placeholder="Enter new password">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label p">Email</label><br>
                        <input type="text" id="view_email" class="txtbox p" disabled>
                    </td>
                    <td>
                        <button class="btn p btn-save" onclick="UpdateValidate()">Save</button>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label p">TP no.</label><br>
                        <input type="text" id="view_tpno" class="txtbox p" maxlength="10" minlength="10">
                    </td>
                    <td>
                        <button class="btn p btn-delete" onclick="deleteUser()">Delete</button>
                    </td>
                </tr>
            </table>
        </center>
    </div>
    <!-- end middle bar -->

    <!-- start result section -->
    <div class="show-results" id="show-results">
        <table class="p" id="table">
           <!------------table view place---------------->
            

            
           
            
        </table>
    </div>
    <!-- end result section -->
    
</div>



<!-- start Modal -->
<div id="add_user" class="modal">
    <div class="modal-content" style="width: 859px;">
        <form name="myForm" onsubmit="return false">
            <div class="modal-head">
                <p style="float:left" class="p">Add New User</p>
                <p class="close">&times;</p>
            </div>
            <center>
                <div  style="width: 828px;text-align: left;margin-top: 14px;" class="label p">
                    <table id="details-view">
                        <tr>
                            <td>
                                <label class="label p">User ID</label><br>
                                <input type="text"  class="txtbox p" id="add_user_id" >
                            </td>
                            <td>
                                <label class="label p">First Name</label><br>
                                <input type="text"  class="txtbox p" id="add_user_fname" >
                            </td>
                            <td>
                                <label class="label p">Last Name</label><br>
                                <input type="text"  class="txtbox p" id="add_user_lname" >
                            </td>
                            <td>
                                <label class="label p">User Type</label><br>
                                <select name="type"  class="txtbox p" id="add_user_type">
                                    <option value="worker">Worker</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </td>
                            <td rowspan="2">
                                
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="3">
                                <label class="label p">User's Photo</label><br>
                                <div style="height: 81px;width: 177px;background: #E858F2;"></div>
                                <input type="file" class="btn p btn-upload" id="btn_upload" value="Upload Image">
                            </td>
                            <td>
                                <label class="label p">NIC</label><br>
                                <input type="text"  class="txtbox p" id="add_user_nic"  maxlength="12" minlength="10">
                            </td>
                            <td rowspan="3">
                                <label class="label p">Address</label><br>
                                <div class="squ">
                                    <label class="label p ">no.</label>
                                    <input type="text" id="add_user_addr_no" class="txtbox p" ><br>
                                    <label class="label p" >str.</label>
                                    <input type="text"  class="txtbox p" id="add_user_addr_street" ><br>
                                    <label class="label p">city</label>
                                    <input type="text"  class="txtbox p" id="add_user_addr_city" >
                                </div>
                            </td>
                            <td rowspan="3">
                                <label class="label p"></label><br>
                                <div class="squ">
                                    <label class="label p ">User Name</label>
                                    <input type="text"  class="txtbox p" style="width:167px" id="add_user_username" ><br>
                                    <label class="label p">Password</label>
                                    <input type="text"  class="txtbox p"  style="width:167px" id="add_user_password"  minlength="8">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="label p">Email</label><br>
                                <input type="email"  class="txtbox p" id="add_user_email" >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="label p">TP no.</label><br>
                                <input type="text"  class="txtbox p" id="add_user_tp" placeholder="07xxxxxxxx" maxlength="10" minlength="10" >
                            </td>
                        </tr>
                    </table>
                </div>
            </center>
            <div style="margin-top:1px;margin-top: 15px;margin-left: 442px;">
                <input type="submit" class="btn p btn-save"  value="Save" onclick="validate()">
                <input type="reset" class="btn p btn-clear" id="btn-clear" value="Clear" style="margin-left: 21px;">
            </div>
        </form>
    </div>

</div>
<!-- end Modal -->


<script>
    var modal = document.getElementById("add_user");
    var span = document.getElementsByClassName("close")[0];

    var item_id=0;
    function user_add(){
        modal.style.display = "block";
    }
    
    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>



<script>
    
    function search(){
        search_userid=document.getElementById("id_drop_menu").value;
        $(document).ready(showAllUser(search_userid));
    }



    function validate() {
        var id = document.getElementById("add_user_id").value;
        var fname = document.getElementById("add_user_fname").value;
        var lname = document.getElementById("add_user_lname").value;
        var nic = document.getElementById("add_user_nic").value;
        var email = document.getElementById("add_user_email").value;
        var tp = document.getElementById("add_user_tp").value;
        var username = document.getElementById("add_user_username").value;
        var password = document.getElementById("add_user_password").value;
        var address_no = document.getElementById("add_user_addr_no").value;
        var address_street = document.getElementById("add_user_addr_street").value;
        var address_city = document.getElementById("add_user_addr_city").value;


        var letter = /^[A-Za-z]+$/;

        if(id=='') {                                     //////////////////////// id //////////////////////////////
            alert("Can't empty User id");
            return false;
        }if(!fname.match(letter) || fname=='') {              ////////////////// first name /////////////////////
            alert("Enter characters only for first name");;
            return false;
        }else if(!lname.match(letter) || lname=='') {         ////////////////////////// last name //////////////
            alert("Enter characters only for Last name");;
            return false;
        }else if(nic=='') {                                    ///////////////////// nic /////////////////////
            alert("Can't empty NIC");
            document.getElementById("add_user_nic").value='';
            return false;
        }else if(!email.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)) {  //////////////////// email ////////////
            alert("Enter valid email");
            document.getElementById("add_user_email").value='';
            return false;
        }else if(isNaN(tp) || tp==""){                              /////////////////////// tp ////////////////////////
            alert("Enter numbers only for TP no.");
            document.getElementById("add_user_tp").value='';
            return false;
        }else if(address_city=='') {                               ////////////////////////// address city //////////////////
            alert("Can't empty address city");
            return false;
        }else if(address_street=='') {                          /////////////////////////////// address street /////////////////
            alert("Can't empty address street");
            return false;
        }else if(address_no=='') {                              //////////////////////////// address no ////////////////////////
            alert("Can't empty address no");
            return false;
        }else if(username=='') {                                   /////////////////////////// username ////////////////////////
            alert("Can't empty Username");
            return false;
        }else if(!password.match(/[a-z]/g) || !password.match(/[A-Z]/g) || !password.match(/[0-9]/g) || !password.match(/[^a-zA-Z\d]/g)){     ////////// password ///////////////
            alert("Password must contain:\n - A Lowercase Letter\n - A Capital Letter\n - A number\n - A special character");
            return false;
        }else{
            $(document).ready(addNewUser);           ///////////////////// call add user function ////////////////////////
        }
    } 



    function UpdateValidate() {
        var tp = document.getElementById("view_tpno").value;
        var address_no = document.getElementById("view_adress_no").value;
        var address_street = document.getElementById("view_address_street").value;
        var address_city = document.getElementById("view_address_city").value;
        var password = document.getElementById("view_password").value;
        
        if(isNaN(tp) || tp==""){                              /////////////////////// tp ////////////////////////
            alert("Enter numbers only for TP no.");
            document.getElementById("view_tpno").value='';
            return false;
        }else if(address_city=='') {                               ////////////////////////// address city //////////////////
            alert("Can't empty address city");
            return false;
        }else if(address_street=='') {                          /////////////////////////////// address street /////////////////
            alert("Can't empty address street");
            return false;
        }else if(address_no=='') {                              //////////////////////////// address no ////////////////////////
            alert("Can't empty address no");
            return false;
        }else if(password !='' && (!password.match(/[a-z]/g) || !password.match(/[A-Z]/g) || !password.match(/[0-9]/g) || !password.match(/[^a-zA-Z\d]/g))){     ////////// password ///////////////
            alert("Password must contain:\n - A Lowercase Letter\n - A Capital Letter\n - A number\n - A special character");
            return false;
        }else{
            $(document).ready(UpdateUser);           ///////////////////// call update user function ////////////////////////
        }
    } 



	$(document).ready(showAllUser('all'));
	function showAllUser(search_userid){
		//var search_userid="all";
		$.ajax({
			url: "../../model/userDAO.php",
			data: {
				search_userid: search_userid
                
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<tr>";
                    show += "<th>ID</th>";
                    show += "<th>Name</th>";
                    show += "<th>Type</th>";
                    show += "<th>Tp</th>";
                    show += "<th>Email</th>";
                    show += "<th><button class='btn p btn-add' onclick='user_add()'>New</button></th>";
                show += "</tr>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
                        show += "<tr>";
                            show += "<td>"+ obj[key]["id"] +"</td>";
                            show += "<td>"+ obj[key]["first_name"] +" "+ obj[key]["last_name"] +"</td>";
                            show += "<td>"+ obj[key]["type"] +"</td>";
                            show += "<td>"+ obj[key]["contact_no"] +"</td>";
                            show += "<td>"+ obj[key]["email"] +"</td>";
                            show += "<td><button class='btn p btn-view' id='btn-view' onclick='showUser(\"" + obj[key]["id"] + "\")'>View</button></td>";
                        show += "</tr>";
					}
				}
				//show += "</tbody>";
				$("#table").html(show);
            }
		})
		return false;
	}


    var show_user_id='';
	function showUser(userid) {
        show_user_id = userid;
		$.ajax({
			url: "../../model/userDAO.php",
            data: {
				show_user_id: show_user_id
			},
			dataType:"JSON",
			success:function(data){
                document.getElementById("view_fname").value =(data.first_name);
				document.getElementById("view_lname").value = (data.last_name);
				document.getElementById("view_usertype").value = (data.type);
				document.getElementById("view_nic").value = (data.nic);
				document.getElementById("view_adress_no").value = (data.address_no);
				document.getElementById("view_address_street").value = (data.address_street);
				document.getElementById("view_address_city").value =(data.address_city);
				document.getElementById("view_user_name").value = (data.username);
				//document.getElementById("view_password").value = (data.password);
				document.getElementById("view_email").value = (data.email);
				document.getElementById("view_tpno").value = (data.contact_no);
                //document.getElementById("view_tpno").value = (data.photo);
			}
		})
		return false;
	}



    $(document).ready(getAllUserId);
    function getAllUserId(){
        var all_user_id=true;
		$.ajax({
			url: "../../model/userDAO.php",
			data: {
				all_user_id: all_user_id

			},
			dataType:"JSON",
			success:function(obj){
				var id_drop_menu="";
                id_drop_menu +="<option value='' disabled selected>User ID</option>";
                id_drop_menu +="<option value='all'>All Users</option>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
                        id_drop_menu += "<option value='"+ obj[key]["id"] +"'>"+ obj[key]["id"] +"</option>";
					}
				}
				$("#id_drop_menu").html(id_drop_menu);
            }
		})
		return false;




    }



    function addNewUser(){
        add_new_user=true;
        var id = document.getElementById("add_user_id").value;
        var fname = document.getElementById("add_user_fname").value;
        var lname = document.getElementById("add_user_lname").value;
        var type = document.getElementById("add_user_type").value;
        var nic = document.getElementById("add_user_nic").value;
        var email = document.getElementById("add_user_email").value;
        var tp = document.getElementById("add_user_tp").value;
        var username = document.getElementById("add_user_username").value;
        var password = document.getElementById("add_user_password").value;
        var address_no = document.getElementById("add_user_addr_no").value;
        var address_street = document.getElementById("add_user_addr_street").value;
        var address_city = document.getElementById("add_user_addr_city").value;
        //var photo = document.getElementById("btn_upload").value;

        
        $.ajax({
			url: "../../model/adminDAO.php",
			data: {
                add_new_user: add_new_user,
				id: id,
                fname: fname,
                lname: lname,
                type: type,
                nic: nic,
                email: email,
                tp: tp,
                username: username,
                password: password,
                address_no: address_no,
                address_street: address_street,
                address_city: address_city

			},
			dataType:"JSON",
			success:function(message){
                $(document).ready(showAllUser('all'));
                $(document).ready(getAllUserId);
				alert(message);
            }
		})
		return false;

    }



    function UpdateUser(){
        update_user=true;
        if(document.getElementById("view_password").value =='' ){
            var password = 'false';
        }else{
            var password = document.getElementById("view_password").value;
        }
        var username = document.getElementById("view_user_name").value;
        var email = document.getElementById("view_email").value;
        var type = document.getElementById("view_usertype").value;
        var tp = document.getElementById("view_tpno").value;
        var address_no = document.getElementById("view_adress_no").value;
        var address_street = document.getElementById("view_address_street").value;
        var address_city = document.getElementById("view_address_city").value;
        //alert(email+" "+type+" "+ tp+" "+ password +" "+address_no+" "+ address_street+" "+ address_city);
        
        $.ajax({
			url: "../../model/adminDAO.php",
			data: {
                update_user: update_user,
                username: username,
				email: email,
                type: type,
                tp: tp,
                password: password,
                address_no: address_no,
                address_street: address_street,
                address_city: address_city

			},
			dataType:"JSON",
			success:function(message){
				alert(message);
            }
		})
		return false;

    }


    function deleteUser(){
        delete_user=true;
        var id = show_user_id;
        $.ajax({
			url: "../../model/adminDAO.php",
			data: {
                delete_user: delete_user,
				id: id

			},
			dataType:"JSON",
			success:function(message){
                $(document).ready(showAllUser('all'));
                $(document).ready(getAllUserId);
                location.reload();
				alert(message);
            }
		})
		return false;

    }


</script>




