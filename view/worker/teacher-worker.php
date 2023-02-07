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
    #adress_no, #address_street ,#address_city{
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
                    <td rowspan="4">
                        <label class="label p">Subjects</label><br>
                        <textarea  id="view_subjects" style="height: 158px;" disabled></textarea>
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
                            <input type="text" id="adress_no" class="txtbox p" disabled><br>
                            <label class="label p">str.</label>
                            <input type="text" id="address_street" class="txtbox p" disabled><br>
                            <label class="label p">city</label>
                            <input type="text" id="address_city" class="txtbox p" disabled>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label p">Email</label><br>
                        <input type="text" id="view_email" class="txtbox p" disabled>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="label p">TP no.</label><br>
                        <input type="text" id="view_tp" class="txtbox p" disabled>
                    </td>
                </tr>
            </table>
        </center>
    </div>
    <!-- end middle bar -->

    <!-- start result section -->
    <div class="show-results" id="show-results">
        <table class="p" id="table">
 
            
           
            
        </table>
    </div>
    <!-- end result section -->
    
</div>




<script>








    function search(){
        search_teacherID=document.getElementById("search_teacherID").value;
        $(document).ready(showAllTeacher(search_teacherID));
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
                    show += "<th></th>";
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
				document.getElementById("adress_no").value = (data.address_no);
				document.getElementById("address_street").value = (data.street);
				document.getElementById("address_city").value =(data.city);
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





</script>




