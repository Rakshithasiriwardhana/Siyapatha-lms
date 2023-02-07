<style>
</style>

<div class="container">

    <!-- start top bar -->
    <section class="top-pannel">
        <p id="title">Subjects</p>
        <div class="subject-search-pannel">
            <center>
                <div class="box-align" style="width: 625px; margin-top: 10px;">
                    <input type="text" placeholder="Subject ID" id="search_subjectID" class="txtbox p">
                    <select name="day" id="medium" class="txtbox p">
                        <option value="" disabled selected>Medium</option>
                        <option value="monday">Sinhala</option>
                        <option value="tuesday">English</option>
                    </select>
                    <button class="btn p btn-search" onclick="search()">Search</button>
                </div>
            </center>
        </div>
    </section>
    <!-- end top bar -->

    <!-- start middle bar -->
    <div class="addnew-pannel">
        <p id="addnew">Add New Subject</p>
        <center>
            <div  style="width: 1002px;text-align: left" class="label p">
                <label>Subject ID</label>
                <label style="margin-left: 217px;">Subject</label> 
                <label style="margin-left: 240px;">Medium</label>         
            </div>
            <div class="box-align" style="width: 1002px;">
                <input type="text" id="add_subject_id" class="txtbox p">
                <input type="text" id="add_subject" class="txtbox p">
                <select name="medium" id="add_medium" class="txtbox p">
                    <option value="Sinhala">Sinhala</option>
                    <option value="English">English</option>
                </select>
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




<script>

    function emptyFieldCheck(){
        var id = document.getElementById("add_subject_id").value;
        var name = document.getElementById("add_subject").value;
        var medium = document.getElementById("add_medium").value;

        if(id == '' || name == '' || medium ==''){
            alert("Please Fill Subject ID and Subject!!!!");
            return false;
        }else{
            addNewSubject();
        }
    }

    function search(){
        search_subject_id=document.getElementById("search_subjectID").value;
        $(document).ready(showAllSubjects(search_subject_id));
    }

    $(document).ready(showAllSubjects(''));
    function showAllSubjects(search_subject_id){
        
        $.ajax({
            url: "../../model/subjectDAO.php",
            data: {
                search_subject_id: search_subject_id
                
            },
            dataType:"JSON",
            success:function(obj){
                var show="";
                show += "<tr>";
                    show += "<th>Subject ID</th>";
                    show += "<th>Subject</th>";
                    show += "<th>Medium</th>";
                    show += "<th></th>";
                    show += "<th></th>";
                show += "</tr>";
                for (var key in obj) {
                    if (obj.hasOwnProperty(key)) {
                        show += "<tr>";
                            show += "<td>"+ obj[key]["id"] +"</td>";
                            show += "<td>"+ obj[key]["name"] +"</td>";
                            show += "<td>"+ obj[key]["medium"] +"</td>";
                            show += "<td></td>";
                            show += "<td><button class='btn p btn-delete'  onclick='deleteSubject(\"" + obj[key]["id"] + "\")'>Delete</button></td>";
                        show += "</tr>";
                    }
                }
                //show += "</tbody>";
                $("#table").html(show);
            }
        })
        return false;
    }


    function addNewSubject(){
        add_new_subject=true;
        var id = document.getElementById("add_subject_id").value;
        var name = document.getElementById("add_subject").value;
        var medium = document.getElementById("add_medium").value;
        
        $.ajax({
			url: "../../model/adminDAO.php",
			data: {
                add_new_subject: add_new_subject,
				id: id,
                name: name,
                medium: medium
                

			},
			dataType:"JSON",
			success:function(message){
                $(document).ready(showAllSubjects(''));
				alert(message);
                id = document.getElementById("add_subject_id").value ='';
                name = document.getElementById("add_subject").value ='';
            }
		})
		return false;

    }


    function deleteSubject(id){
        delete_subject=true;
        
        $.ajax({
			url: "../../model/adminDAO.php",
			data: {
                delete_subject: delete_subject,
				id: id
                

			},
			dataType:"JSON",
			success:function(message){
                $(document).ready(showAllSubjects(''));
				alert(message);
                location.reload();
            }
		})
		return false;

    }
</script>




