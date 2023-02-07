<style>
    .title2{
        font-weight: 500;
        font-size: 30px;
        line-height: 42px;
        color: #423E9E;
        /* float: left; */
    }
    .box{
        background: #FFFFFF;
        box-shadow: 2px 4px 12px rgba(0, 0, 0, 0.25);
        border-radius: 20px;
        width: 189px;
        height: 166px;
    }
    .box2{
        background: #FFFEFF;
        border-radius: 20px 20px 0px 0px;
        width: 189px;
        height: 111px;
    }
    .box3{
        background: linear-gradient(158.61deg, #423E9E 14.07%, #B345BB 86.89%);
        border-radius: 0px 0px 20px 20px;
        width: 189px;
        height: 56px;
    }
    .count{
        color: #423E9E;
        font-weight: 900;
        font-size: 64px;
        line-height: 75px;
    }
    .img{
        margin-left: 130px;
        margin-top: 12px;
        width: 32px;
    }
    .title3{
        font-weight: 500;
        font-size: 24px;
        line-height: 28px;
        position: absolute;
        margin-top: 14px;
    }
    .shadow{
        box-shadow: 2px 4px 12px rgba(0, 0, 0, 0.25);
        border-radius: 15px;
    }
    .rs{
        line-height: 42px;
        color: #423E9E;
        font-size: 36px;
        font-weight: 900;
        position: absolute;
        margin-left: 26px;
        margin-top: 22px;
    }
    .income{
        margin-left: 26px;
        position: absolute;
        margin-top: 51px;
        font-weight: 900;
        font-size: 64px;
        line-height: 75px;
        color: #423E9E;
    }
    .month{
        color: #B345BB;
        font-weight: 500;
        font-size: 36px;
        line-height: 42px;
        float: right;
        margin-top: 109px;
        margin-right: 30px;
    }
    .squ{
        border: 1px solid #FFFFFF;
        box-sizing: border-box;
        border-radius: 15px;
        width: 394px;
        height: 138px;
        position: absolute;
        margin: 30px;
    }
    #btn_download{
        height: 44px;
        border-radius: 15px;
        margin-top: 12px;
    }
    #report{
        width: 326px;
        height: 30px;
        border-radius: 9px;
        font-weight: 500;
        font-size: 20px;
        line-height: 28px;
        color: #4A4A4A;
        padding-left: 96px;
    }
    
</style>
<div class="container">

    <!-- start top bar -->
    <section class="top-pannel">
        <p id="title">Home</p>
    </section>
    <!-- end top bar -->

    <!-- start middle bar -->
    <div class="addnew-pannel3">
        <center>
            <div  style="width: 892px" class=" box-align">
                <div class="box">
                    <div class="box2">
                        <div><img src="../../images/icons/teachers-2.svg" class="img"></div>
                        <p class="p count" id="teacher_count">0<p>
                    </div>
                    <div class="box3">
                        <p class="title3 p" style="margin-left: 44px;" >Teachers</p>
                    </div>
                </div>
                <div class="box">
                    <div class="box2">
                        <div><img src="../../images/icons/students-2.svg" class="img"></div>
                        <p class="p count" id="student_count">0<p>
                    </div>
                    <div class="box3">
                        <p class="title3 p" style="margin-left: 46px;">Students</p>
                    </div>
                </div>
                <div class="box">
                    <div class="box2">
                        <div><img src="../../images/icons/class-2.svg" class="img"></div>
                        <p class="p count" id="class_count">0<p>
                    </div>
                    <div class="box3">
                        <p class="title3 p" style="margin-left: 52px;">Classes</p>
                    </div>
                </div>
                <div class="box">
                    <div class="box2">
                        <div><img src="../../images/icons/class-2.svg" class="img"></div>
                        <p class="p count">5<p>
                    </div>
                    <div class="box3">
                        <p class="title3 p" style="margin-left: 67px;">Halls</p>
                    </div>
                </div>
            </div>
        </center>
    </div>
    <!-- end middle bar -->

    <!-- start result section -->
    <div class="dashboard">
        <center>
            <div class="box-align" style="width: 1050px;">
                <section >
                    <p class="title2 p" style="float:left">Today</p><br>
                    <div style="height:331px;overflow: auto;width:1050px;padding: 8px;" class="shadow">
                        <table class="p" id="table">
                           <!--  <tr>
                                <th>Hall</th>
                                <th>Class</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                            </tr>
                            <tr>
                                <td>A</td>
                                <td>Grd7 Sinhala</td>
                                <td>08.00</td>
                                <td>10.00</td>
                            </tr> -->
                            
                        </table>
                    </div>
                </section>
            </div>
        </center>
    </div>
    <!-- end result section -->
    
</div>



<script>

    $(document).ready(homeDetails);
    function homeDetails(){
        home_details=true;
        //alert("hi");
        $.ajax({
			url: "../../model/homeDAO.php",
			data: {
                home_details: home_details

			},
			dataType:"JSON",
			success:function(obj){
				var teacher="";
                var classes="";
                var student="";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
                           
                        teacher= obj[key]["teachers"];
                        classes= obj[key]["classes"];
                        student= obj[key]["students"];
                            
					}
				}
				
				$("#teacher_count").html(teacher);
                $("#student_count").html(classes);
                $("#class_count").html(student);
               
            }
		})
		return false;

    }






    $(document).ready(income);
    function income(){
        income=true;
        //alert("hi");
        $.ajax({
			url: "../../model/homeDAO.php",
			data: {
                income: income

			},
			dataType:"JSON",
			success:function(obj){
				var amount="";
                var month="";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
                           
                        amount= obj[key]["amount"];
                        month= obj[key]["month"];
                            
					}
				}
				
				$("#show_income").html(amount);
                $("#show_month").html(month);
               
            }
		})
		return false;

    }



    $(document).ready(today);
    function today(){
        today=true;
        
        $.ajax({
			url: "../../model/homeDAO.php",
			data: {
                today: today

			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				show += "<tr>";
                    show += "<th>Hall</th>";
                    show += "<th>Class</th>";
                    show += "<th>Start Time</th>";
                    show += "<th>End Time</th>";
                show += "</tr>";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
                        show += "<tr>";
                            show += "<td>"+ obj[key]["location"] +"</td>";
                            show += "<td>"+ obj[key]["name"] + "</td>";
                            show += "<td>"+ obj[key]["start"] +"</td>";
                            show += "<td>"+ obj[key]["end"] +"</td>";
                        show += "</tr>";
					}
				}
				
				$("#table").html(show);
            }
		})
		return false;

    }


</script>





