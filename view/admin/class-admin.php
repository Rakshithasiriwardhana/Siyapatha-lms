<style>
</style>

<div class="container">

    <!-- start top bar -->
    <section class="top-pannel">
        <p id="title">Classes</p>
        <div class="classes-search-pannel">
            <center>
                <div class="box-align" style="width: 822px; margin-top: 10px;">
                    <input type="text" placeholder="Class ID" id="search_classID" class="txtbox p">
                    <select name="subject" id="subject_drop_menu" class="txtbox p">
                        <option value="" disabled selected>Subject</option>
                    </select>
                    <select name="grade" id="grade" class="txtbox p" style="width: 114px;">
                        <option value="" disabled selected>Grade</option>
                        <option value=""></option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                    </select>
                    <select name="teacher" id="teacher_drop_menu2" class="txtbox p">
                        
                    </select>
                    <button class="btn p btn-search" onclick="search()">Search</button>
                </div>
            </center>
        </div>
    </section>
    <!-- end top bar -->

    <!-- start middle bar -->
    <div class="addnew-pannel">
        <p id="addnew">Add New Class</p>
        <center>
            <div  style="width: 1002px;text-align: left" class="label p">
                <label>Class ID</label>
                <label style="margin-left: 87px;">Class Name</label> 
                <label style="margin-left: 135px;">Subject ID</label> 
                <label style="margin-left: 75px;">Grade</label>
                <label style="margin-left: 67px;">Teacher ID</label> 
                <label style="margin-left: 105px;">Fees</label>                  
            </div>
            <div class="box-align" style="width: 1006px;">
                <input type="text" id="add_classID" class="txtbox p" style="width: 114px;">
                <input type="text" id="add_class_name" class="txtbox p" style="width: 177px;">
                <select name="day" id="subject_drop_menu2" class="txtbox p" style="width: 114px;">
                    
                </select>
                <select name="grade" id="add_grade" class="txtbox p" style="width: 80px;">
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                </select>
                
                <select name="grade" id="teacher_drop_menu" class="txtbox p" style="width: 140px;">

                </select>
                <input type="text" id="add_fees" class="txtbox p" style="width: 92px;">
                <button class="btn p btn-add" onclick="emptyFieldCheck()">Add</button>
            </div>
        </center>
    </div>
    <!-- end middle bar -->

    <!-- start result section -->
    <div class="show-results">
        <table class="p" id="table">
            
            <!------------table view place---------------->
            
            
        </table>
    </div>
    <!-- end result section -->
    
</div>



<!-- start Modal -->
<div id="studentclass" class="modal" style="padding-top: 10px; ">
    <div class="modal-content" style="width: 1157px;background-color: #F5F5F5;">
        <div class="modal-head">
            <p style="float:left" class="p">Students of Class</p>
            <p class="close">&times;</p>
        </div>
        
        <div class="container" style="padding-top: 15px;">
            <!-- start top bar -->
            <section class="top-pannel">
                <p id="class_title">Grd7 Sinhala</p>
                <div class="classes-search-pannel" style="width: 584px;">
                    <center>
                        <div class="box-align" style="width: 519px; margin-top: 10px;">
                            <input type="text" placeholder="Student Name" id="classID" class="txtbox p">
                            <input type="text" placeholder="Student ID" id="studentID" class="txtbox p">
                            <button class="btn p btn-search">Search</button>
                        </div>
                    </center>
                </div>
            </section>
            <!-- end top bar -->

            <!-- start middle bar -->
            <div class="addnew-pannel">
                <p id="addnew">Add Student to Class</p>
                <center>
                    <div  style="width: 150px;text-align: left;margin-left: 200px;" class="label p">
                        <label style="margin-left: 87px;">Student ID</label>                
                    </div>
                    <div class="box-align" style="width: 401px;FLOAT: RIGHT;margin-right: 30px;">
                        <input type="text" placeholder="Student ID" id="add_class_studentID" class="txtbox p">
                        <button class="btn p btn-add" onclick="addStudentToClass()">Add</button>
                    </div>
                </center>
            </div>
            <!-- end middle bar -->

            <!-- start result section -->
            <div class="show-results">
                <table class="p" id="table2">
                    <!------------table view place---------------->
                    
                    
                    
                    
                </table>
            </div>
        </div>
        
    </div>

</div>
<!-- end Modal -->


<script>
    var modal = document.getElementById("studentclass");
    var span = document.getElementsByClassName("close")[0];

    
    /* function show_class(classid){
        modal.style.display = "block";
        //document.getElementById("checkval").value=item_id;
    } */
    
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
        search_classID=document.getElementById("search_classID").value;
        $(document).ready(showAllClass(search_classID));
    }


    function emptyFieldCheck(){
        var id = document.getElementById("add_classID").value;
        var name = document.getElementById("add_class_name").value;
        var teacher = document.getElementById("teacher_drop_menu").value;
        var fee = document.getElementById("add_fees").value;
        var subject = document.getElementById("subject_drop_menu2").value;

        if(id == '' || name == '' || teacher =='' || fee == '' || subject == ''){
            alert("Please Fill all fields!!!!");
            return false;
        }else{
            addNewClass();
        }
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
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
                        subject_drop_menu += "<option value='"+ obj[key]["subject_id"] +"'>"+ obj[key]["subject_id"] +"</option>";
					}
				}
				$("#subject_drop_menu").html(subject_drop_menu);
                $("#subject_drop_menu2").html(subject_drop_menu);
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
				var teacher_drop_menu="";
                teacher_drop_menu +="<option value='' disabled selected>Teacher ID</option>";
                teacher_drop_menu +="<option value=''></option>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
                            teacher_drop_menu += "<option value='"+ obj[key]["id"] +"'>"+ obj[key]["id"] +"</option>";
                            
					}
				}
				
				$("#teacher_drop_menu").html(teacher_drop_menu);
                $("#teacher_drop_menu2").html(teacher_drop_menu);
            }
		})
		return false;
	}


    $(document).ready(showAllClass(''));
    function showAllClass(search_class_id){
        
        $.ajax({
            url: "../../model/classUnitDAO.php",
            data: {
                search_class_id: search_class_id
                
            },
            dataType:"JSON",
            success:function(obj){
                var show="";
                show += "<tr>";
                    show += "<th>ID</th>";
                    show += "<th>Class Name</th>";
                    show += "<th>Subject ID</th>";
                    show += "<th>Grade</th>";
                    show += "<th>Fee(Rs.)</th>";
                    show += "<th>Teacher</th>";
                    show += "<th></th>";
                    show += "<th></th>";
                show += "</tr>";
                for (var key in obj) {
                    if (obj.hasOwnProperty(key)) {
                        show += "<tr>";
                            show += "<td>"+ obj[key]["class_id"] +"</td>";
                            show += "<td>"+ obj[key]["class_name"] + "</td>";
                            show += "<td>"+ obj[key]["subject"] +"</td>";
                            show += "<td>"+ obj[key]["grade"] +"</td>";
                            show += "<td>"+ obj[key]["fee"] +"</td>";
                            show += "<td>"+ obj[key]["teacher_name"] +"</td>";
                            
                            show += "<td><button class='btn p btn-student' id='btn-student' onclick='showAllClassStudent(\"" + obj[key]["class_id"] + "\")'>Student</button></td>";
                            show += "<td><button class='btn p btn-delete'  onclick='deleteClass(\"" + obj[key]["class_id"] + "\")'>Delete</button></td>";
                        show += "</tr>";
                    }
                }
                
                $("#table").html(show);
            }
        })
        return false;
    }


    function addNewClass(){
        add_new_class=true;
        var id = document.getElementById("add_classID").value;
        var name = document.getElementById("add_class_name").value;
        var subject = document.getElementById("subject_drop_menu2").value;
        var grade = document.getElementById("add_grade").value;
        var teacher = document.getElementById("teacher_drop_menu").value;
        var fee = document.getElementById("add_fees").value;

        
        $.ajax({
			url: "../../model/adminDAO.php",
			data: {
                add_new_class: add_new_class,
				id: id,
                name: name,
                subject: subject,
                grade: grade,
                teacher: teacher,
                fee: fee

			},
			dataType:"JSON",
			success:function(message){
                $(document).ready(showAllClass(''));
				alert(message);
                if(message=='Class Add successful!!!'){
                    var id = document.getElementById("add_classID").value = '';
                    var name = document.getElementById("add_class_name").value ='';
                    var subject = document.getElementById("subject_drop_menu2").value ='';
                    var teacher = document.getElementById("teacher_drop_menu").value ='';
                    var fee = document.getElementById("add_fees").value ='';
                }
            }
		})
		return false;

    }


    var stclassid='';
    function showAllClassStudent(search_class_student_id){
        modal.style.display = "block";  ////////////// modal preview /////////////
        
        stclassid=search_class_student_id;
        
        var search_students_class = true;
        
        $.ajax({
            url: "../../model/classUnitDAO.php",
            data: {
                search_students_class: search_students_class,
                search_class_student_id: search_class_student_id
                
            },
            dataType:"JSON",
            success:function(obj){
                var show="";
                show += "<tr>";
                    show += "<th>ID</th>";
                    show += "<th>Student</th>";
                    show += "<th>Email</th>";
                    show += "<th>TP</th>";
                    show += "<th></th>";
                show += "</tr>";
                for (var key in obj) {
                    if (obj.hasOwnProperty(key)) {
                        show += "<tr>";
                            show += "<td>"+ obj[key]["student_id"] +"</td>";
                            show += "<td>"+ obj[key]["student_name"] + "</td>";
                            show += "<td>"+ obj[key]["email"] +"</td>";
                            show += "<td>"+ obj[key]["contact_no"] +"</td>";
                            show += "<td><button class='btn p btn-delete'  onclick='studentDeleteFromClass(\"" + obj[key]["student_id"] + "\")'>Delete</button></td>";
                        show += "</tr>";
                    }
                }
                
                $("#table2").html(show);
            }
        })
        return false;
    }


    function deleteClass(id){
        delete_class=true;
        
        $.ajax({
			url: "../../model/adminDAO.php",
			data: {
                delete_class: delete_class,
				id: id

			},
			dataType:"JSON",
			success:function(message){
                $(document).ready(showAllClass(''));
				alert(message);
                //location.reload();
            }
		})
		return false;

    }


    function addStudentToClass(){
        add_new_student_to_class=true;
        var classid = stclassid;
        var studentid = document.getElementById("add_class_studentID").value;

        
        $.ajax({
			url: "../../model/adminDAO.php",
			data: {
                add_new_student_to_class: add_new_student_to_class,
				classid: classid,
                studentid: studentid

			},
			dataType:"JSON",
			success:function(message){
                $(document).ready(showAllClassStudent(classid));
				alert(message);
                var id = document.getElementById("add_class_studentID").value = '';
                
            }
		})
		return false;

    }

    function studentDeleteFromClass(studentid){
        delete_student_from_class=true;
        var classid=stclassid;
        //alert(stclassid+" "+studentid);
        $.ajax({
			url: "../../model/adminDAO.php",
			data: {
                delete_student_from_class: delete_student_from_class,
				studentid: studentid,
                classid: classid
			},
			dataType:"JSON",
			success:function(message){
                $(document).ready(showAllClassStudent(classid));
				alert(message);
            }
		})
		return false;

    }


</script>