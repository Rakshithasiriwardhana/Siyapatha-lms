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


    <!-- start result section -->
    <div class="show-results" style="height: 87%;margin-top: 66px;">
        <table class="p" id="table">
            
            
           
            
        </table>
    </div>
    <!-- end result section -->
    
</div>





<script>

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
                show += "</tr>";
                for (var key in obj) {
                    if (obj.hasOwnProperty(key)) {
                        show += "<tr>";
                            show += "<td>"+ obj[key]["id"] +"</td>";
                            show += "<td>"+ obj[key]["name"] +"</td>";
                            show += "<td>"+ obj[key]["medium"] +"</td>";
                            show += "<td></td>";
                            
                        show += "</tr>";
                    }
                }
                //show += "</tbody>";
                $("#table").html(show);
            }
        })
        return false;
    }

    function search(){
        search_subject_id=document.getElementById("search_subjectID").value;
        $(document).ready(showAllSubjects(search_subject_id));
    }

</script>



