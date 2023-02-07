<style>
    /* status img start */
    .status-img-size{
        width: 35px;
        height: 35px;
        margin:auto;
    }
    /* status img end */

    /* toggle switch color start */
    input:checked + .slider {
        background-color: #00FF29;
    }
    
    input:focus + .slider {
        box-shadow: 0 0 1px #00FF29;
    }
    /* toggle switch color end */

    .warning{
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
        color: #FF0000;
    }
</style>

<div class="container">

    <!-- start top bar -->
    <section class="top-pannel">
        <p id="title">Attendance</p>
        <div class="attendance-search-pannel">
            <center>
                <div class="box-align" style="width: 830px; margin-top: 10px;">
                    <input type="text" placeholder="Student ID" id="search_studentID" class="txtbox p">
                    <input type="date" placeholder="Date" id="search_date" class="txtbox p">
                    <select name="status" id="status" class="txtbox p" style="width: 114px;">
                        <option value="" disabled selected>Status</option>
                        <option value="all">All</option>
                        <option value="absent">Absent</option>
                        <option value="present">Present</option>
                    </select>
                    <input type="text" placeholder="Class ID" id="search_classID" class="txtbox p">
                    <button class="btn p btn-search" onclick="ShowAttendance()">Search</button>
                </div>
            </center>
        </div>
    </section>
    <!-- end top bar -->

    <!-- start middle bar -->
    <div class="addnew-pannel">
        <p id="addnew">Add Attendance</p>
        <center>
            <div  style="width: 1002px;text-align: left" class="label p">
                <label style="margin-left:387px">Class ID</label>
                <label style="margin-left: 172px;">Date</label>               
            </div>
            <div class="box-align" style="width: 1002px;">
                <input type="text" id="add_class_id" class="txtbox p" style="margin-left:387px">
                <input type="date" id="add_date" class="txtbox p">
                <button class="btn p btn-add" onclick="attendance_mark(1)">Add</button>
            </div>
        </center>
    </div>
    <!-- end middle bar -->

    <!-- start result section -->
    <div class="show-results">
        <table class="p" id="table">
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Attendance Status</th>
                <th></th>
                <th></th>
            </tr>
            
           <tr><td colspan="5"><center><h1>Search Class to Show Results</h1></center></tr>
            
        </table>
        
    </div>
    <!-- end result section -->
    
</div>


<!-- start Modal -->
<div id="edit_attendance" class="modal">
    <div class="modal-content" style="width: 441px;">
        <div class="modal-head">
            <p style="float:left" class="p">Edit Attendance Status</p>
            <p class="close">&times;</p>
        </div>
        <center>
            <div class="box-align" style="width: 391px;text-align: left;margin-top: 14px;" >
                <p class="p" style="color: #000000;line-height: 16px;font-size: 14px;font-weight: normal;">Attendance Status</p>
                <label class="switch">
                    <input type="checkbox" id='edit_toggle'>
                    <span class="slider round"></span>
                </label>
                <button class="btn p btn-save" onclick="setNewAttendance()">Save</button>
            </div>
        </center>
    </div>

</div>
<!-- end Modal -->


<!-- start Modal -->
<div id="mark_attendance" class="modal" style="padding-top: 10px; ">
    <div class="modal-content" style="width: 1157px;background-color: #F5F5F5;">
        <div class="modal-head">
            <p style="float:left" class="p">Mark Attendance</p>
            <p class="close">&times;</p>
        </div>
        
        <div class="container" style="padding-top: 17px;">
            <!-- start top bar -->
            <section class="top-pannel">
                <p id="class_title">Grd7 Sinhala</p>
                <div class="classes-search-pannel" style="width: 384px;">
                    <center>
                        <div class="box-align" style="width: 319px; margin-top: 10px;">
                            <input type="text" placeholder="Student ID" id="studentIDd" class="txtbox p">
                            <button class="btn p btn-search">Search</button>
                        </div>
                    </center>
                </div>
            </section>
            <!-- end top bar -->

            <!-- start result section -->
            <div class="show-results" style="margin-top: 58px;height: 80%;">
                <table class="p" id="table2">
                    <!------------table view place---------------->
                    
                </table>
            </div>
            <div style="float:right;margin-top:23px">
                <button class="btn p btn-save" onclick="GetMarkedAttendance()">Save</button>
            </div>
        </div>
        
    </div>

</div>
<!-- end Modal -->




<script>
    var modal1 = document.getElementById("edit_attendance");
    var modal2 = document.getElementById("mark_attendance");
    var span = document.getElementsByClassName("close")[0];

    
    var student_id_clicked='';
    function attendance_edit(studentid,status){
        //alert(studentid+" "+status);
        modal1.style.display = "block";

        student_id_clicked = studentid;

        if(status=='absent'){
            document.getElementById("edit_toggle").checked = false;
        }else{
            document.getElementById("edit_toggle").checked = true;
        }
    }

    function attendance_mark(){
        modal2.style.display = "block";

        //ShowStudentList();
        addStudentList();
    }
    
    span.onclick = function() {
        modal1.style.display = "none";
        modal2.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
        if (event.target == modal2) {
            modal2.style.display = "none";
        }
    }
</script>




<script>



    function addStudentList(){
        var add_class_student=true;
        var class_id = document.getElementById("add_class_id").value;
        var date_new = document.getElementById("add_date").value.split('-');
        var date= date_new[1]+'-'+date_new[2]+'-'+date_new[0];


        //alert(class_id+" "+date);
        
        $.ajax({
			url: "../../model/attendanceDAO.php",
			data: {
                add_class_student: add_class_student,
                class_id: class_id,
                date: date

			},
			
			success:function(message){
                //alert(message);
                ShowStudentList();
            }
		})
		return false;

    }




    function ShowStudentList(){
		show_student_list=true;
        var class_id = document.getElementById("add_class_id").value;
        var date_new = document.getElementById("add_date").value.split('-');
        var date= date_new[1]+'-'+date_new[2]+'-'+date_new[0];
        
        //alert(class_id+" "+date);

		$.ajax({
			url: "../../model/attendanceDAO.php",
			data: {
				show_student_list: show_student_list,
                class_id: class_id,
                date: date
                
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<tr>";
                    show += "<th>Student ID</th>";
                    show += "<th>Student</th>";
                    show += "<th>Warnings</th>";
                    show += "<th></th>";
                    show += "<th>Absent | Present</th>";
                show += "</tr>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
                        show += "<tr>";
                            show += "<td>"+ obj[key]["id"] +"</td>";
                            show += "<td>"+ obj[key]["name"] +"</td>";
                            show += "<td><p class='warning'>"+ obj[key]["warning"] +"</p></td>";
                            show += "<td></td>";
                            show += "<td>";
                                show += "<label class='switch'>";
                                show += "<input type='checkbox'  value='"+ obj[key]["id"] +"'>";
                                show += "<span class='slider round'></span>";
                                show += "</label>";
                            show += "</td>";
                            
                        show += "</tr>";
					}
				}
				
				$("#table2").html(show);
            }
		})
		return false;
	}





    function GetMarkedAttendance() {
        
        var attendance_list = new Array();
 
        var tblatendance = document.getElementById("table2");
 
        var chks = tblatendance.getElementsByTagName("INPUT");
 
        for (var i = 0; i < chks.length; i++) {
            if (chks[i].checked) {
                //attendance.push("'"+ chks[i].value +"'");
                attendance_list.push("'"+ chks[i].value +"'");
            }
        }

        if (attendance_list.length > 0) {
            
            var attendance = attendance_list;
            var add_attendance=true;
            var class_id = document.getElementById("add_class_id").value;            
            var date_new = document.getElementById("add_date").value.split('-');
            var date= date_new[1]+'-'+date_new[2]+'-'+date_new[0];

            //alert(class_id+"" +date+" "+attendance);

            $.ajax({
                url: "../../model/attendanceDAO.php",
                data: {
                    add_attendance: add_attendance,
                    attendance: attendance,
                    date: date,
                    class_id: class_id
                    
                },
                //dataType:"JSON",
                success:function(data){
                    //$('#studentIDd').html(data);
                    alert (data);
                }
            })
            return false;



        }
    }




    function ShowAttendance(){
		show_attendance_list=true;
        var class_id = document.getElementById("search_classID").value;
        var date_new = document.getElementById("search_date").value.split('-');
        var date= date_new[1]+'-'+date_new[2]+'-'+date_new[0];
        
        //alert(class_id+" "+date);

		$.ajax({
			url: "../../model/attendanceDAO.php",
			data: {
				show_attendance_list: show_attendance_list,
                class_id: class_id,
                date: date
                
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<tr>";
                    show += "<th>Student ID</th>";
                    show += "<th>Student Name</th>";
                    show += "<th>Attendance Status</th>";
                    show += "<th></th>";
                    show += "<th></th>";
                show += "</tr>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
                        show += "<tr>";
                            show += "<td>"+ obj[key]["student_id"] +"</td>";
                            show += "<td>"+ obj[key]["student_name"] +"</td>";
                            if(obj[key]["status"] == 'absent'){
                                show +="<td><div class='status-img-size'><img src='../../images/icons/absent.svg'></div></td>";
                            }else{
                                show +="<td><div class='status-img-size'><img src='../../images/icons/present.svg'></div></td>";
                            }
                            show += "<td></td>";
                            
                            var stuid = obj[key]["student_id"];
                            var status = obj[key]["status"];

                            show += "<td><button class='btn p btn-edit' id='btn-edit' onclick='attendance_edit(" +'"'+stuid+'"'+','+'"'+status+'"'+ ")'>Edit</button></td>";
                            
                        show += "</tr>";
					}
				}
				//alert(obj);
				$("#table").html(show);
            }
		})
		return false;
	}




    function setNewAttendance() {
        var new_attendance_status=true;
        var new_status ="";
        if(document.getElementById("edit_toggle").checked == true){
            new_status = "present";
        }else{
            new_status = "absent";
        }


        var class_id = document.getElementById("search_classID").value;
        var date_new = document.getElementById("search_date").value.split('-');
        var date= date_new[1]+'-'+date_new[2]+'-'+date_new[0];

        $.ajax({
            url: "../../model/attendanceDAO.php",
            data: {
                new_attendance_status: new_attendance_status,
                new_status: new_status,
                student_id_clicked: student_id_clicked,
                class_id: class_id,
                date: date

                
            },
            //dataType:"JSON",
            success:function(msg){
                ShowAttendance();
                alert (msg);
                modal1.style.display = "none";
            }
        })
        return false; 



        
    }

</script>


