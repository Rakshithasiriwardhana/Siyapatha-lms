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
    #add_adress_no, #add_address_street ,#add_address_city, #view_adress_no, #view_address_street ,#view_address_city{
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
    #view_tp, #view_adress_no, #view_address_street, #view_address_city{
        color: blue;
    }
</style>

<div class="container">

    <!-- start top bar -->
    <section class="top-pannel">
        <p id="title">Teachers</p>
        <div class="teacher-search-pannel">
            <center>
                <div class="box-align" style="width: 625px; margin-top: 10px;">
                    <input type="text" placeholder="Teacher ID" id="search_teacherID" class="txtbox p">
                    <select name="subject" id="subject_drop_menu" class="txtbox p">
                        
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
                        <img src="../../images/photos/teachers/teachers default.jpg" class="image">
                    </td>
                    <td>
                        <label class="label p">First Name</label><br>
                        <input type="text" id="view_fname" class="txtbox p" disabled>
                    </td>
                    <td>
                        <label class="label p">Last Name</label><br>
                        <input type="text" id="view_lname" class="txtbox p" disabled>
                    </td>
                    <td rowspan="4">
                        <label class="label p">Classes</label><br>
                        <textarea  id="view_classes" style="height: 158px;" disabled></textarea>
                    </td>
                    <td rowspan="2">
                        <label class="label p">Subjects</label><br>
                        <textarea  id="view_subjects" style="height: 68px;" disabled></textarea>
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
                        <input type="text" id="view_tp" class="txtbox p" maxlength="10" minlength="10">
                    </td>
                    <td>
                        <button class="btn p btn-delete" onclick="deleteteacher()">Delete</button>
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
<div id="add_teacher" class="modal">
    <div class="modal-content" style="width: 654px;">
        <form onsubmit="return false">
            <div class="modal-head">
                <p style="float:left" class="p">Add New Teacher</p>
                <p class="close">&times;</p>
            </div>
            <center>
                <div  style="width: 603px;text-align: left;margin-top: 14px;" class="label p">
                    <table id="details-view">
                        <tr>
                            <td>
                                <label class="label p">Teacher ID</label><br>
                                <input type="text" id="add_teacherid" class="txtbox p">
                            </td>
                            <td>
                                <label class="label p">First Name</label><br>
                                <input type="text" id="add_fname" class="txtbox p">
                            </td>
                            <td>
                                <label class="label p">Last Name</label><br>
                                <input type="text" id="add_lname" class="txtbox p">
                            </td>
                        </tr>
                        <tr>
                            <td rowspan="3">
                                <label class="label p">Teacher's Photo</label><br>
                                <div style="height: 81px;width: 177px;background: #E858F2;"></div>
                                <input type="file" class="btn p btn-upload" id="btn_upload" value="Upload Image">
                            </td>
                            <td>
                                <label class="label p">NIC</label><br>
                                <input type="text" id="add_nic" class="txtbox p" maxlength="10" minlength="12">
                            </td>
                            <td rowspan="3">
                                <label class="label p">Address</label><br>
                                <div class="squ">
                                    <label class="label p ">no.</label>
                                    <input type="text" id="add_adress_no" class="txtbox p"><br>
                                    <label class="label p">str.</label>
                                    <input type="text" id="add_address_street" class="txtbox p"><br>
                                    <label class="label p">city</label>
                                    <input type="text" id="add_address_city" class="txtbox p">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="label p">Email</label><br>
                                <input type="text" id="add_email" class="txtbox p">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="label p">TP no.</label><br>
                                <input type="text" id="add_tp" class="txtbox p" maxlength="10" minlength="10">
                            </td>
                        </tr>
                    </table>
                </div>
            </center>
            <div style="margin-top:1px;margin-top: 15px;margin-left: 252px;">
                <button class="btn p btn-save" onclick="validate()">Save</button>
                <input type="reset" class="btn p btn-clear" id="btn-clear" value="Clear" style="margin-left: 21px;">
            </div>
        </form>
    </div>

</div>
<!-- end Modal -->


<script>
    var modal = document.getElementById("add_teacher");
    var span = document.getElementsByClassName("close")[0];

    var item_id=0;
    function teacher_add(){
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


    function validate() {
        var id = document.getElementById("add_teacherid").value;
        var fname = document.getElementById("add_fname").value;
        var lname = document.getElementById("add_lname").value;
        var nic = document.getElementById("add_nic").value;
        var email = document.getElementById("add_email").value;
        var tp = document.getElementById("add_tp").value;
        var address_no = document.getElementById("add_adress_no").value;
        var address_street = document.getElementById("add_address_street").value;
        var address_city = document.getElementById("add_address_city").value;


        var letter = /^[A-Za-z]+$/;

        if(id=='') {                                     //////////////////////// id //////////////////////////////
            alert("Can't empty id");
            return false;
        }if(!fname.match(letter) || fname=='') {              ////////////////// first name /////////////////////
            alert("Enter characters only for first name");;
            return false;
        }else if(!lname.match(letter) || lname=='') {         ////////////////////////// last name //////////////
            alert("Enter characters only for Last name");;
            return false;
        }else if(nic=='') {                                    ///////////////////// nic /////////////////////
            alert("Can't empty NIC");
            document.getElementById("add_nic").value='';
            return false;
        }else if(!email.match(/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)) {  //////////////////// email ////////////
            alert("Enter valid email");
            document.getElementById("add_email").value='';
            return false;
        }else if(isNaN(tp) || tp==""){                              /////////////////////// tp ////////////////////////
            alert("Enter numbers only for TP no.");
            document.getElementById("add_tp").value='';
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
        }else{
            $(document).ready(addNewTeacher);           ///////////////////// call add user function ////////////////////////
        }
    }


    function UpdateValidate() {
        var tp = document.getElementById("view_tp").value;
        var address_no = document.getElementById("view_adress_no").value;
        var address_street = document.getElementById("view_address_street").value;
        var address_city = document.getElementById("view_address_city").value;
        
        if(isNaN(tp) || tp==""){                              /////////////////////// tp ////////////////////////
            alert("Enter numbers only for TP no.");
            document.getElementById("view_tp").value='';
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
        }else{
            $(document).ready(UpdateTeacher);           ///////////////////// call update teacher function ////////////////////////
        }
    }


    function search(){
        search_teacherID=document.getElementById("search_teacherID").value;
        $(document).ready(showAllTeacher(search_teacherID));
    }


    function addNewTeacher(){
        add_new_teacher=true;
        var id = document.getElementById("add_teacherid").value;
        var fname = document.getElementById("add_fname").value;
        var lname = document.getElementById("add_lname").value;
        var nic = document.getElementById("add_nic").value;
        var email = document.getElementById("add_email").value;
        var tp = document.getElementById("add_tp").value;
        var address_no = document.getElementById("add_adress_no").value;
        var address_street = document.getElementById("add_address_street").value;
        var address_city = document.getElementById("add_address_city").value;
        //var photo = document.getElementById("btn_upload").value;

        
        $.ajax({
			url: "../../model/adminDAO.php",
			data: {
                add_new_teacher: add_new_teacher,
				id: id,
                fname: fname,
                lname: lname,
                nic: nic,
                email: email,
                tp: tp,
                address_no: address_no,
                address_street: address_street,
                address_city: address_city

			},
			dataType:"JSON",
			success:function(message){
                $(document).ready(showAllTeacher(''));
				alert(message);
            }
		})
		return false;

    }


    $(document).ready(showAllTeacher(''));
	function showAllTeacher(search_teacher_id){
		
		$.ajax({
			url: "../../model/teacherDAO.php",
			data: {
				search_teacher_id: search_teacher_id
                
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<tr>";
                    show += "<th>ID</th>";
                    show += "<th>Name</th>";
                    show += "<th>Tp</th>";
                    show += "<th>Email</th>";
                    show += "<th></th>";
                    show += "<th><button class='btn p btn-add' onclick='teacher_add()'>New</button></th>";
                show += "</tr>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
                        show += "<tr>";
                            show += "<td>"+ obj[key]["id"] +"</td>";
                            show += "<td>"+ obj[key]["first_name"] +" "+ obj[key]["last_name"] +"</td>";
                            show += "<td>"+ obj[key]["contact_no"] +"</td>";
                            show += "<td>"+ obj[key]["email"] +"</td>";
                            show += "<td></td>";
                            show += "<td><button class='btn p btn-view' id='btn-view' onclick='showTeacher(\"" + obj[key]["id"] + "\")'>View</button></td>";
                        show += "</tr>";
					}
				}
				//show += "</tbody>";
				$("#table").html(show);
            }
		})
		return false;
	}


    var show_teacher_id='';
	function showTeacher(teacherid) {
        show_teacher_id = teacherid;
		$.ajax({
			url: "../../model/teacherDAO.php",
            data: {
				show_teacher_id: show_teacher_id
			},
			dataType:"JSON",
			success:function(data){
                document.getElementById("view_fname").value =(data.first_name);
				document.getElementById("view_lname").value = (data.last_name);
				document.getElementById("view_nic").value = (data.nic);
				document.getElementById("view_adress_no").value = (data.address_no);
				document.getElementById("view_address_street").value = (data.street);
				document.getElementById("view_address_city").value =(data.city);
				document.getElementById("view_email").value = (data.email);
                //document.getElementById("view_classes").value = (data.class);
                //document.getElementById("view_subjects").value = (data.subject);
				document.getElementById("view_tp").value = (data.contact_no);
                //document.getElementById("view_tpno").value = (data.photo);


                $(document).ready(getAllSubjectByTeacher(teacherid));   ////////////////// show subject list /////////////////
                $(document).ready(getAllClassByTeacher(teacherid));   ////////////////// show class list /////////////////
                
			}
		})
		return false;
	}


    function UpdateTeacher(){
        update_teacher=true;
        var teacher_id = show_teacher_id;
        var tp = document.getElementById("view_tp").value;
        var address_no = document.getElementById("view_adress_no").value;
        var address_street = document.getElementById("view_address_street").value;
        var address_city = document.getElementById("view_address_city").value;
        
        $.ajax({
			url: "../../model/adminDAO.php",
			data: {
                update_teacher: update_teacher,
                teacher_id: teacher_id,
                tp: tp,
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


    $(document).ready(getAllSubjectId);
    function getAllSubjectId(){
        var all_subject_id=true;
		$.ajax({
			url: "../../model/subjectDAO.php",
			data: {
				all_subject_id: all_subject_id

			},
			dataType:"JSON",
			success:function(obj){
				var subject_drop_menu="";
                subject_drop_menu +="<option value='' disabled selected>Subject</option>";
                subject_drop_menu += "<option value='all' >All Subjects</option>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
                        subject_drop_menu += "<option value='"+ obj[key]["subject_id"] +"'>"+ obj[key]["subject_name"] +"</option>";
					}
				}
				$("#subject_drop_menu").html(subject_drop_menu);
            }
		})
		return false;
        
    }   
    

    function getAllSubjectByTeacher(teacher_id){
        var get_subject_names=true;
		$.ajax({
			url: "../../model/subjectDAO.php",
			data: {
                get_subject_names: get_subject_names,
				teacher_id: teacher_id

			},
			dataType:"JSON",
			success:function(obj){
				var subject_names="";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
                        subject_names +=  obj[key]["subject_name"] + '\n';
					}
				}
				$("#view_subjects").html(subject_names);
            }
		})
		return false;

    }


    function getAllClassByTeacher(teacher_id){
        var get_class_names=true;
		$.ajax({
			url: "../../model/classUnitDAO.php",
			data: {
                get_class_names: get_class_names,
				teacher_id: teacher_id

			},
			dataType:"JSON",
			success:function(obj){
				var class_names="";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
                        class_names +=  obj[key]["class_name"] + '\n';
					}
				}
				$("#view_classes").html(class_names);
            }
		})
		return false;

    }


    function deleteteacher(){
        delete_teacher=true;
        var id = show_teacher_id;
        
        $.ajax({
			url: "../../model/adminDAO.php",
			data: {
                delete_teacher: delete_teacher,
				id: id

			},
			dataType:"JSON",
			success:function(message){
                $(document).ready(showAllTeacher(''));
				alert(message);
                location.reload();
            }
		})
		return false;

    }


</script>





