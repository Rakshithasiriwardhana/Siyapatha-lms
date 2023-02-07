<html>
<body>
    <div class="container">
        <!-- start top bar -->
        <section class="top-pannel">
            <p id="title">Timetable</p>
            <form method="POST">
                    <div class="timetable-search-pannel ">
                        <center>
                            <div class="box-align" style="width: 850px; margin-top: 10px;">
                                <input type="text" name="sub" id="sub" placeholder="Subject" class="txtbox p" style="width: 140px;">
                    
                                <select name="grade" id="grade" class="txtbox p" style="width: 114px;">
                                    <option value="" disabled selected>Grade</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                </select>
                        
                                <select name="day" id="day" class="txtbox p">
                                    <option value="" disabled selected>Day</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                </select>
                        
                                <input type="submit" name="search" value="Search" class="btn p btn-search">
                            </div>
                        </center>
                    </div>
            </form>
        </section>
            <!-- end top bar -->

            <!-- start middle bar -->
    <div class="addnew-pannel">
        <form method="POST" action="../../timetable/worker/addtt.php">
            <p id="addnew">Add New Item</p>
                <center>
                    <div  style="width: 1002px;text-align: left" class="label p">
                        <label style="margin-left: 10px;">Class ID</label>
                        <label style="margin-left: 120px;">Day</label> 
                        <label style="margin-left: 132px;">Start Time</label> 
                        <label style="margin-left: 130px;">End Time</label> 
                        <label style="margin-left: 135px;">Location</label>                
                    </div>
               
                    <div class="box-align" style="width: 1010px;">
                        <input type="text" name="classID" id="classID" class="txtbox p" style="width: 140px;">
                        <select name="day" id="day" class="txtbox p" style="width: 114px;">
                            <option value="Monday">Monday</option>
                            <option value="Tuesday">Tuesday</option>
                            <option value="Wednesday">Wednesday</option>
                            <option value="Thursday">Thursday</option>
                            <option value="Friday">Friday</option>
                            <option value="Saturday">Saturday</option>
                            <option value="Sunday">Sunday</option>
                        </select>
                    
                        <select name="start_time" id="start_time" class="txtbox p" style="width: 140px;">
                            <option value=6.00>6.00</option>
                            <option value=6.30>6.30</option>
                            <option value="7.00">7.00</option>
                            <option value="7.30">7.30</option>
                            <option value="8.00">8.00</option>
                            <option value="8.30">8.30</option>
                            <option value="9.00">9.00</option>
                            <option value="9.30">9.30</option>
                            <option value="10.00">10.00</option>
                            <option value="10.30">10.30</option>
                            <option value="11.00">11.00</option>
                            <option value="11.30">11.30</option>
                            <option value="12.00">12.00</option>
                            <option value="12.30">12.30</option>
                            <option value="13.00">13.00</option>
                            <option value="13.30">13.30</option>
                            <option value="14.00">14.00</option>
                            <option value="14.30">14.30</option>
                            <option value="15.00">15.00</option>
                            <option value="15.30">15.30</option>
                            <option value="16.00">16.00</option>
                            <option value="16.30">16.30</option>
                            <option value="17.00">17.00</option>
                            <option value="17.30">17.30</option>
                            <option value="18.00">18.00</option>
                        </select>
                    
                        <select name="end_time" id="end_time" class="txtbox p" style="width: 140px;">
                            <option value="7.00">7.00</option>
                            <option value="7.30">7.30</option>
                            <option value="8.00">8.00</option>
                            <option value="8.30">8.30</option>
                            <option value="9.00">9.00</option>
                            <option value="9.30">9.30</option>
                            <option value="10.00">10.00</option>
                            <option value="10.00">10.30</option>
                            <option value="11.00">11.00</option>
                            <option value="11.30">11.30</option>
                            <option value="12.00">12.00</option>
                            <option value="12.30">12.30</option>
                            <option value="13.00">13.00</option>
                            <option value="13.30">13.30</option>
                            <option value="14.00">14.00</option>
                            <option value="14.30">14.30</option>
                            <option value="15.00">15.00</option>
                            <option value="15.30">15.30</option>
                            <option value="16.00">16.00</option>
                            <option value="16.30">16.30</option>
                            <option value="17.00">17.00</option>
                            <option value="17.30">17.30</option>
                            <option value="18.00">18.00</option>
                            <option value="18.30">18.30</option>
                            <option value="19.00">19.00</option>
                            <option value="19.30">19.30</option>
                        </select>

                        <select name="location" id="location" class="txtbox p" style="width: 87px;">
                            <option value="A">Hall A</option>
                            <option value="B">Hall B</option>
                            <option value="C">Hall C</option>
                            <option value="D">Hall D</option>
                            <option value="E">Hall E</option>
                            <option value="F">Hall F</option>
                        </select>

                        <input type="submit" name="add" value="Add"  class="btn p btn-add"/>
                    </div>
                </center>
        </form>
    </div>
    <!-- end middle bar -->
    
        <!-- start result section -->
        <div class="show-results">
            <?php 
            include "../../timetable/worker/functiontt-worker.php";
            if(isset($_POST['search'])){
                
                $subject=$_POST['sub'];
                $gr=$_POST["grade"];
                $day=$_POST['day']; 
                
                
                echo "<table class='p' id='table'>";
                        echo "<tr>";
                            echo "<th>Hall</th>";
                            echo "<th>Day</th>";
                            echo "<th>Start Time</th>";
                            echo "<th>End Time</th>";
                            echo "<th>Class </th>";
                            echo "<th>Name </th>";
                            echo "<th>Teacher</th>";
                            echo "<th></th>";
                            echo "<th></th>";                
                        echo "</tr>";
                    
                    $timetable = new TimeTable();
                    $sql=$timetable->searchTimetable($subject,$gr,$day);
    
                    while($row=mysqli_fetch_array($sql))
                    {
        
                        echo "<tr>";
                            echo "<td>" . $row['location'] . "</td>";
                            echo "<td>" . $row['day'] . "</td>";
                            echo "<td>" . $row['start_time'] . "</td>";
                            echo "<td>" . $row['end_time'] . "</td>";
                            echo "<td> Grd"." ". $row['grade'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['first_name']. " " . $row['last_name'] . "</td>";
                            echo "<td><button class='btn p btn-edit' id='btn-edit' onclick='timetable_edit(1)'>Edit</button></td>";
                            echo "<td><button class='btn p btn-delete' value='Delete'>Delete</button></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }

                else{

                    echo "<table class='p' id='table'>";
                        echo "<tr>";
                            echo "<th>Hall</th>";
                            echo "<th>Day</th>";
                            echo "<th>Start Time</th>";
                            echo "<th>End Time</th>";
                            echo "<th>Class </th>";
                            echo "<th>Name </th>";
                            echo "<th>Teacher</th>";
                            echo "<th></th>";
                            echo "<th></th>";                
                        echo "</tr>";
                    $timetable = new TimeTable();
                    $sql=$timetable->getTimetabledetails();
                    while($row=mysqli_fetch_array($sql))
                    {
                        echo "<tr>";
                            echo "<td>" . $row['location'] . "</td>";
                            echo "<td>" . $row['day'] . "</td>";
                            echo "<td>" . $row['start_time'] . "</td>";
                            echo "<td>" . $row['end_time'] . "</td>";
                            echo "<td> Grd"." ". $row['grade'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>" . $row['first_name']. " " . $row['last_name'] . "</td>";
                            echo "<td><button class='btn p btn-edit' id='btn-edit' onclick='timetable_edit(1)'>Edit</button></td>";
                            echo "<td><button class='btn p btn-delete' value='Delete'>Delete</button></td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                }

                    
            ?>
        </div>
    <!-- end result section -->
    
    

    <!-- start Modal -->
    <div id="edit_timetable" class="modal">
        <div class="modal-content" style="width: 829px;">
        <form method="POST" action="../../timetable/worker/edittt.php">
            <div class="modal-head">
                <p style="float:left" class="p">Edit Time Table Item</p>
                <p class="close">&times;</p>
            </div>
            <center>
                <div  style="width: 771px;text-align: left;margin-top: 14px;" class="label p">
                    <label style="margin-left: 10;">Timetable ID</label>
                    <label style="margin-left: 132px;">Day</label> 
                    <label style="margin-left: 127px;">Start Time</label> 
                    <label style="margin-left: 120px;">End Time</label> 
                    <label style="margin-left: 125px;">Location</label>                
                </div>
                <div class="box-align" style="width: 771px;">
                    <input type="text" name="ttid" id="timetableid" class="txtbox p" style="width: 140px;">
                    <select name="day" id="day" class="txtbox p" style="width: 114px;">
                        <option value="monday">Monday</option>
                        <option value="tuesday">Tuesday</option>
                        <option value="wednesday">Wednesday</option>
                        <option value="thursday">Thursday</option>
                        <option value="friday">Friday</option>
                        <option value="saturday">Saturday</option>
                        <option value="sunday">Sunday</option>
                    </select>
                    <select name="start_time" id="start_time" class="txtbox p" style="width: 140px;">
                        <option value=6.00>6.00</option>
                        <option value="6.30">6.30</option>
                        <option value="7.00">7.00</option>
                        <option value="7.30">7.30</option>
                        <option value="8.00">8.00</option>
                        <option value="8.30">8.30</option>
                        <option value="9.00">9.00</option>
                        <option value="9.30">9.30</option>
                        <option value="10.00">10.00</option>
                        <option value="10.30">10.30</option>
                        <option value="11.00">11.00</option>
                        <option value="11.30">11.30</option>
                        <option value="12.00">12.00</option>
                        <option value="12.30">12.30</option>
                        <option value="13.00">13.00</option>
                        <option value="13.30">13.30</option>
                        <option value="14.00">14.00</option>
                        <option value="14.30">14.30</option>
                        <option value="15.00">15.00</option>
                        <option value="15.30">15.30</option>
                        <option value="16.00">16.00</option>
                        <option value="16.30">16.30</option>
                        <option value="17.00">17.00</option>
                        <option value="17.30">17.30</option>
                        <option value="18.00">18.00</option>
                    </select>
                    <select name="end_time" id="end_time" class="txtbox p" style="width: 140px;">
                        <option value="7.00">7.00</option>
                        <option value="7.30">7.30</option>
                        <option value="8.00">8.00</option>
                        <option value="8.30">8.30</option>
                        <option value="9.00">9.00</option>
                        <option value="9.30">9.30</option>
                        <option value="10.00">10.00</option>
                        <option value="10.00">10.30</option>
                        <option value="11.00">11.00</option>
                        <option value="11.30">11.30</option>
                        <option value="12.00">12.00</option>
                        <option value="12.30">12.30</option>
                        <option value="13.00">13.00</option>
                        <option value="13.30">13.30</option>
                        <option value="14.00">14.00</option>
                        <option value="14.30">14.30</option>
                        <option value="15.00">15.00</option>
                        <option value="15.30">15.30</option>
                        <option value="16.00">16.00</option>
                        <option value="16.30">16.30</option>
                        <option value="17.00">17.00</option>
                        <option value="17.30">17.30</option>
                        <option value="18.00">18.00</option>
                        <option value="18.30">18.30</option>
                        <option value="19.00">19.00</option>
                        <option value="19.30">19.30</option>
                    </select>
                    <select name="location" id="location" class="txtbox p" style="width: 87px;">
                        <option value="A">Hall A</option>
                        <option value="B">Hall B</option>
                        <option value="C">Hall C</option>
                        <option value="D">Hall D</option>
                        <option value="E">Hall E</option>
                        <option value="F">Hall F</option>
                    </select>
                </div>
            </center>
            <div style="margin-top:1px;margin-top: 15px;margin-left: 625px;">
                <input type="submit" value="Save" name="submit" class="btn p btn-add"/>
            </div>
       
        </div>

</div>

<!-- end Modal -->


<script>
    var modal = document.getElementById("edit_timetable");
    var span = document.getElementsByClassName("close")[0];

    var item_id=0;
    function timetable_edit(item){
        item_id=item;
        modal.style.display = "block";
        document.getElementById("checkval").value=item_id;
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
</form>
</body>
</html>


