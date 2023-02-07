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
    #view_adress_no, #view_address_street ,#view_address_city, #add_adress_no, #add_address_street ,#add_address_city{
        width: 144px;
        margin-bottom: 7px;
    }
    #file{
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
    #view_tp, #view_adress_no, #view_address_street, #view_address_city, #view_grade{
        color: blue;
    }
</style>

<div class="container">

    <!-- start top bar -->
    <section class="top-pannel">
        <p id="title">Students</p>
        <div class="student-search-pannel">
            <center>
                <div class="box-align" style="width: 843px; margin-top: 10px;">
                    <input type="text" placeholder="Student ID" id="search_studentID" class="txtbox p">
                    <input type="text" placeholder="Class ID" id="classID" class="txtbox p">
                    <select name="grade" id="grade" class="txtbox p">
                        <option value="" disabled selected>Grade</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
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
                        <textarea  id="view_class" style="height: 158px;" disabled></textarea>
                    </td>
                    <td rowspan="2">
                        <label class="label p">Subjects</label><br>
                        <textarea  id="view_subject" style="height: 68px;" disabled></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label p">Grade</label><br>
                        <input type="text" id="view_grade" class="txtbox p">
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
                        <button class="btn p btn-delete" onclick="deleteStudent()">Delete</button>
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
<div id="add_student" class="modal">
    <div class="modal-content" style="width: 654px;">
        <form onsubmit="return false " >
            <div class="modal-head">
                <p style="float:left" class="p">Add New Student</p>
                <p class="close">&times;</p>
            </div>
            <center>
                <div  style="width: 603px;text-align: left;margin-top: 14px;" class="label p">
                    <table id="details-view">
                        <tr>
                            <td>
                                <label class="label p">Student ID</label><br>
                                <input type="text" id="add_studentid" name='studentID' class="txtbox p">
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
                                <label class="label p">Student's Photo</label><br>
                                <div style="height: 81px;width: 177px;background: #E858F2;"></div>
                                <input type="file" name= "file" class="btn p btn-upload" id="file" value="Upload Image">
                            </td>
                            <td>
                                <label class="label p">Grade</label><br>
                                <select name="grade" id="add_grade" class="txtbox p">
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                </select>
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
                <button class="btn p btn-save" name="submit" onclick="validate()">Save</button>
                <input type="reset" class="btn p btn-clear" id="btn-clear" value="Clear" style="margin-left: 21px;">
            </div>
        </form>
    </div>

</div>
<!-- end Modal -->


<script>
    var modal = document.getElementById("add_student");
    var span = document.getElementsByClassName("close")[0];

    var item_id=0;
    function student_add(){
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
        var id = document.getElementById("add_studentid").value;
        var fname = document.getElementById("add_fname").value;
        var lname = document.getElementById("add_lname").value;
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
            $(document).ready(addNewStudent);           ///////////////////// call add student function ////////////////////////
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
            $(document).ready(UpdateStudent);           ///////////////////// call update teacher function ////////////////////////
        }
    }


    function search(){
        search_student_id=document.getElementById("search_studentID").value;
        $(document).ready(showAllStudent(search_student_id));
    }


    function addNewStudent(){
        add_new_student=true;
        var id = document.getElementById("add_studentid").value;
        var fname = document.getElementById("add_fname").value;
        var lname = document.getElementById("add_lname").value;
        var grade = document.getElementById("add_grade").value;
        var email = document.getElementById("add_email").value;
        var tp = document.getElementById("add_tp").value;
        var address_no = document.getElementById("add_adress_no").value;
        var address_street = document.getElementById("add_address_street").value;
        var address_city = document.getElementById("add_address_city").value;
        //var photo = document.getElementById("btn_upload").value;

        
        $.ajax({
			url: "../../model/adminDAO.php",
			data: {
                add_new_student: add_new_student,
				id: id,
                fname: fname,
                lname: lname,
                grade: grade,
                email: email,
                tp: tp,
                address_no: address_no,
                address_street: address_street,
                address_city: address_city

			},
			dataType:"JSON",
			success:function(message){
                $(document).ready(showAllStudent(''));
				alert(message);
                addimage();
            }
		})
		return false;

    }


    $(document).ready(showAllStudent(''));
	function showAllStudent(search_student_id){
		
		$.ajax({
			url: "../../model/studentDAO.php",
			data: {
				search_student_id: search_student_id
                
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<tr>";
                    show += "<th>ID</th>";
                    show += "<th>Name</th>";
                    show += "<th>Grade</th>";
                    show += "<th>Tp</th>";
                    show += "<th>Email</th>";
                    show += "<th><button class='btn p btn-add' onclick='student_add()'>New</button></th>";
                show += "</tr>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
                        show += "<tr>";
                            show += "<td>"+ obj[key]["id"] +"</td>";
                            show += "<td>"+ obj[key]["first_name"] +" "+ obj[key]["last_name"] +"</td>";
                            show += "<td>"+ obj[key]["grade"] +"</td>";
                            show += "<td>"+ obj[key]["contact_no"] +"</td>";
                            show += "<td>"+ obj[key]["email"] +"</td>";
                            show += "<td><button class='btn p btn-view' id='btn-view' onclick='showStudent(\"" + obj[key]["id"] + "\")'>View</button></td>";
                        show += "</tr>";
					}
				}
				
				$("#table").html(show);
            }
		})
		return false;
	}


    var show_student_id='';
	function showStudent(studentid) {
        show_student_id = studentid;
		$.ajax({
			url: "../../model/studentDAO.php",
            data: {
				show_student_id: show_student_id
			},
			dataType:"JSON",
			success:function(data){
                document.getElementById("view_fname").value =(data.first_name);
				document.getElementById("view_lname").value = (data.last_name);
				document.getElementById("view_grade").value = (data.grade);
				document.getElementById("view_adress_no").value = (data.address_no);
				document.getElementById("view_address_street").value = (data.street);
				document.getElementById("view_address_city").value =(data.city);
				document.getElementById("view_email").value = (data.email);
                //document.getElementById("view_classes").value = (data.class);
                //document.getElementById("view_subjects").value = (data.subject);
				document.getElementById("view_tp").value = (data.contact_no);
                //document.getElementById("view_tpno").value = (data.photo);


                $(document).ready(getAllSubjectByStudent(studentid));   ////////////////// show subject list /////////////////
                $(document).ready(getAllClassByStudent(studentid));   ////////////////// show class list /////////////////
                
			}
		})
		return false;
	}


    function UpdateStudent(){
        update_student=true;
        var student_id = show_student_id;
        var tp = document.getElementById("view_tp").value;
        var address_no = document.getElementById("view_adress_no").value;
        var address_street = document.getElementById("view_address_street").value;
        var address_city = document.getElementById("view_address_city").value;
        var grade = document.getElementById("view_grade").value;
        
        $.ajax({
			url: "../../model/adminDAO.php",
			data: {
                update_student: update_student,
                student_id: student_id,
                tp: tp,
                address_no: address_no,
                address_street: address_street,
                address_city: address_city,
                grade: grade

			},
			dataType:"JSON",
			success:function(message){
				alert(message);
            }
		})
		return false;

    }

/* 
    $(document).ready(getAllSubjectId);
    function getAllSubjectId(){
        var all_subject_id=true;
		$.ajax({
			url: "http://localhost/projects/Siyapatha/model/subjectDAO.php",
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
        
    }  */  
    

    function getAllSubjectByStudent(studentid){
        var get_subject_names=true;
		$.ajax({
			url: "../../model/subjectDAO.php",
			data: {
                get_subject_names: get_subject_names,
				studentid: studentid

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


    function getAllClassByStudent(studentid){
        var get_class_names=true;
		$.ajax({
			url: "../../model/classUnitDAO.php",
			data: {
                get_class_names: get_class_names,
				studentid: studentid

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


    function deleteStudent(){
        delete_student=true;
        var id = show_student_id;
        
        $.ajax({
			url: "../../model/adminDAO.php",
			data: {
                delete_student: delete_student,
				id: id

			},
			dataType:"JSON",
			success:function(message){
                $(document).ready(showAllStudent(''));
				alert(message);
                location.reload();
            }
		})
		return false;

    }


</script>




<script>



    //var imageName="";
 /*    function addimage(){
        


        var name = document.getElementById("file").files[0].name;
        var form_data = new FormData();
        var ext = name.split('.').pop().toLowerCase();
        if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1){
            alert("Invalid Image File");
        }
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("file").files[0]);
        var f = document.getElementById("file").files[0];
        var fsize = f.size||f.fileSize;
        if(fsize > 2000000){
            alert("Image File Size is very big");
        }else{
            form_data.append("file", document.getElementById('file').files[0]);
            $.ajax({
                url:"upload.php",
                method:"POST",
                data: form_data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend:function(){
                    $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                },   
                success:function(data){
                    //$('#uploaded_image').html(data);
                    //alert(data);
                    //imageName=data;
                    updateImage("'"+ data + "'");
                    //alert(imageName);
                }
            });
        }
    }
 */


  /*   
    function updateImage(imageName){
        student_updateImage=true;
        var id = document.getElementById("add_studentid").value;
        
        
        $.ajax({
			url: "../../model/adminDAO.php",
			data: {
                student_updateImage: student_updateImage,
                id: id,
                imageName: imageName,
                

			},
			//dataType:"JSON",
			success:function(message){
				//alert(message);
            }
		})
		return false;
        
    }
     */
</script>