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
        background-color: #B345BB;
    }
    
    input:focus + .slider {
        box-shadow: 0 0 1px #B345BB;
    }
    /* toggle switch color end */
</style>

<div class="container">

    <!-- start top bar -->
    <section class="top-pannel">
        <p id="title">Fees</p>
        <div class="attendance-search-pannel">
            <center>
                <div class="box-align" style="width: 830px; margin-top: 10px;">
                    <input type="text" placeholder="Student ID" id="search_studentID" class="txtbox p" alt="please use month and class id">
                    <select name="month" id="search_month" class="txtbox p">
                        <option value="" disabled selected>Month</option>
                        <option value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                    <select name="status" id="status" class="txtbox p" style="width: 114px;">
                        <option value="" disabled selected>Status</option>
                        <option value="all">All</option>
                        <option value="paid">Paid</option>
                        <option value="not paid">Not Paid</option>
                    </select>
                    <input type="text" placeholder="Class ID" id="search_classID" class="txtbox p">
                    <button class="btn p btn-search" onclick="ShowPayment()">Search</button>
                </div>
            </center>
        </div>
    </section>
    <!-- end top bar -->

    <!-- start middle bar -->
    <div class="addnew-pannel">
        <p id="addnew">Add Fees</p>
        <center>
            <div  style="width: 1002px;text-align: left" class="label p">
                <label style="margin-left:387px">Class ID</label>
                <label style="margin-left: 172px;">Month</label>               
            </div>
            <div class="box-align" style="width: 1002px;">
                <input type="text" id="add_classID" class="txtbox p" style="margin-left:387px">
                <select name="month" id="add_month" class="txtbox p">
                    <option value="January">January</option>
                    <option value="February">February</option>
                    <option value="March">March</option>
                    <option value="April">April</option>
                    <option value="May">May</option>
                    <option value="June">June</option>
                    <option value="July">July</option>
                    <option value="August">August</option>
                    <option value="September">September</option>
                    <option value="October">October</option>
                    <option value="November">November</option>
                    <option value="December">December</option>
                </select>
                <button class="btn p btn-add" onclick="addStudentList()">Add</button>
            </div>
        </center>
    </div>
    <!-- end middle bar -->

    <!-- start result section -->
    <div class="show-results">
        <table class="p" id="table2">
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Payment Status</th>
                <th>Paid Date</th>
                <th>Fees Collector</th>
                <th></th>
            </tr>
            
            <tr><td colspan="5"><center><h1>Search Class to Show Results</h1></center></tr>
            
            
            
           
            
        </table>
    </div>
    <!-- end result section -->
    
</div>


<!-- start Modal -->
<div id="edit_payment" class="modal">
    <div class="modal-content" style="width: 441px;">
        <div class="modal-head">
            <p style="float:left" class="p">Edit Payment Status</p>
            <p class="close">&times;</p>
        </div>
        <center>
            <div class="box-align" style="width: 391px;text-align: left;margin-top: 14px;" >
                <p class="p" style="color: #000000;line-height: 16px;font-size: 14px;font-weight: normal;">Payment Status</p>
                <label class="switch">
                    <input type="checkbox" id='edit_toggle'>
                    <span class="slider round"></span>
                </label>
                <button class="btn p btn-save" onclick="setNewPayment()">Save</button>
            </div>
        </center>
    </div>

</div>
<!-- end Modal -->



<!-- start Modal -->
<div id="mark_payment" class="modal" style="padding-top: 10px; ">
    <div class="modal-content" style="width: 1157px;background-color: #F5F5F5;">
        <div class="modal-head">
            <p style="float:left" class="p">Mark Payments</p>
            <p class="close">&times;</p>
        </div>
        
        <div class="container" style="padding-top: 17px;">
            <!-- start top bar -->
            <section class="top-pannel">
                <p id="class_title">Grd7 Sinhala</p>
                <div class="classes-search-pannel" style="width: 384px;">
                    <center>
                        <div class="box-align" style="width: 319px; margin-top: 10px;">
                            <input type="text" placeholder="Student ID" id="ssstudentID" class="txtbox p">
                            <button class="btn p btn-search">Search</button>
                        </div>
                    </center>
                </div>
            </section>
            <!-- end top bar -->

            <!-- start result section -->
            <div class="show-results" style="margin-top: 58px;height: 80%;">
                <table class="p" id="table">
                    <!-- <tr>
                        <th>Student ID</th>
                        <th>Student</th>
                        <th></th>
                        <th></th>
                        <th>Not-Paid | Paid</th>
                    </tr>
                    <tr>
                        <td>C01</td>
                        <td>Grd7 Sinhala</td>
                        <td></td>
                        <td></td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" >
                                <span class="slider round"></span>
                            </label>
                        </td>
                    </tr> -->
                    
                    
                </table>
            </div>
            <div style="float:right;margin-top:23px">
                <button class="btn p btn-save" onclick="GetMarkedPayment()">Save</button>
            </div>
        </div>
        
    </div>

</div>
<!-- end Modal -->




<script>
    var modal1 = document.getElementById("edit_payment");
    var modal2 = document.getElementById("mark_payment");
    var span = document.getElementsByClassName("close")[0];


    var student_id_clicked='';
    function payment_edit(studentid,status){
        //alert(studentid);
        modal1.style.display = "block";

        student_id_clicked = studentid;

        if(status=='not-paid'){
            document.getElementById("edit_toggle").checked = false;
        }else{
            document.getElementById("edit_toggle").checked = true;
        }
    }

    /* function payment_mark(classID){
        modal2.style.display = "block";
    } */
    
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
        modal2.style.display = "block";
        var add_class_student=true;
        var class_id = document.getElementById("add_classID").value;
        var month = document.getElementById("add_month").value;


        
        
        $.ajax({
			url: "../../model/paymentDAO.php",
			data: {
                add_class_student: add_class_student,
                class_id: class_id,
                month: month

			},
			
			success:function(message){
                //alert(message);
                ShowStudentList();
            }
		})
		return false;

    }



    function ShowStudentList(){
        //modal2.style.display = "block";

		show_student_list=true;
        var class_id = document.getElementById("add_classID").value;
        var month = document.getElementById("add_month").value;
        
        //alert(class_id+" "+month);

		$.ajax({
			url: "../../model/paymentDAO.php",
			data: {
                show_student_list: show_student_list,
                class_id: class_id,
                month: month

			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<tr>";
                    show += "<th>Student ID</th>";
                    show += "<th>Student</th>";
                    show += "<th></th>";
                    show += "<th></th>";
                    show += "<th>Not-Paid | Paid</th>";
                show += "</tr>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
                        show += "<tr>";
                            show += "<td>"+ obj[key]["stid"] +"</td>";
                            show += "<td>"+ obj[key]["stname"] +"</td>";
                            show += "<td></td>";
                            show += "<td></td>";
                            show += "<td>";
                                show += "<label class='switch'>";
                                show += "<input type='checkbox'  value='"+ obj[key]["stid"] +"'>";
                                show += "<span class='slider round'></span>";
                                show += "</label>";
                            show += "</td>";
                            
                        show += "</tr>";
					}
				}
				
				$("#table").html(show);
            }
		})
		return false;
	}


    function GetMarkedPayment() {
        
        var payment_list = new Array();
 
        var tblatendance = document.getElementById("table");
 
        var chks = tblatendance.getElementsByTagName("INPUT");
 
        for (var i = 0; i < chks.length; i++) {
            if (chks[i].checked) {
                //attendance.push("'"+ chks[i].value +"'");
                payment_list.push("'"+ chks[i].value +"'");
            }
        }

        if (payment_list.length > 0) {
            
            var payment = payment_list;
            var add_payment=true;
            var class_id = document.getElementById("add_classID").value;
            var month = document.getElementById("add_month").value;

            //alert(class_id+"" +date+" "+attendance);

            $.ajax({
                url: "../../model/paymentDAO.php",
                data: {
                    add_payment: add_payment,
                    payment: payment,
                    month: month,
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


    function ShowPayment(){
		show_payment_list=true;
        var class_id = document.getElementById("search_classID").value;
        var month = document.getElementById("search_month").value;
        
        //alert(class_id+" "+date);

		$.ajax({
			url: "../../model/paymentDAO.php",
			data: {
				show_payment_list: show_payment_list,
                class_id: class_id,
                month: month
                
			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<tr>";
                    show += "<th>Student ID</th>";
                    show += "<th>Student Name</th>";
                    show += "<th>Payment Status</th>";
                    show += "<th>Paid Date</th>";
                    show += "<th>Fees Collector</th>";
                    show += "<th></th>";
                show += "</tr>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
                        show += "<tr>";
                            show += "<td>"+ obj[key]["student_id"] +"</td>";
                            show += "<td>"+ obj[key]["student_name"] +"</td>";
                            if(obj[key]["status"] == 'not-paid'){
                                show +="<td><div class='status-img-size'><img src='../../images/icons/not_paid.svg'></div></td>";
                            }else{
                                show +="<td><div class='status-img-size'><img src='../../images/icons/paid.svg'></div></td>";
                            }
                            
                            show += "<td>"+ obj[key]["date"] +"</td>";
                            show += "<td>"+ obj[key]["uid"] +"</td>";
                            
                            var stuid = obj[key]["student_id"];
                            var status = obj[key]["status"];

                            show += "<td><button class='btn p btn-edit' id='btn-edit' onclick='payment_edit(" +'"'+stuid+'"'+','+'"'+status+'"'+ ")'>Edit</button></td>";
                            
                        show += "</tr>";
					}
				}
				//alert(obj);
				$("#table2").html(show);
            }
		})
		return false;
	}


    function setNewPayment() {
        var new_payment_status=true;
        var new_status ="";
        if(document.getElementById("edit_toggle").checked == true){
            new_status = "payed";
        }else{
            new_status = "not-paid";
        }


        var class_id = document.getElementById("search_classID").value;
        var month = document.getElementById("search_month").value;

        //alert(new_status+" "+student_id_clicked+" "+class_id+" "+month);

        $.ajax({
            url: "../../model/paymentDAO.php",
            data: {
                new_payment_status: new_payment_status,
                new_status: new_status,
                student_id_clicked: student_id_clicked,
                class_id: class_id,
                month: month

                
            },
            //dataType:"JSON",
            success:function(msg){
                ShowPayment();
                alert (msg);
                modal1.style.display = "none";
            }
        })
        return false; 



        
    }

</script>
