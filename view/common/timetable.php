<style>
</style>

<div class="container">

    <!-- start top bar -->
    <section class="top-pannel">
        <p id="title">Timetable</p>
        <div class="timetable-search-pannel ">
            <center>
                <div class="box-align" style="width: 850px; margin-top: 10px;">
                    <input type="text" placeholder="Class ID" id="class ID" class="txtbox p">
                    <select name="subject" id="subject" class="txtbox p">
                        <option value="" disabled selected>Subject</option>
                        <option value="sinhala">Sinhala</option>
                        <option value="sinhala">Sinhala</option>
                    </select>
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
                        <option value="monday">Monday</option>
                        <option value="tuesday">Tuesday</option>
                        <option value="wednesday">Wednesday</option>
                        <option value="thursday">Thursday</option>
                        <option value="friday">Friday</option>
                        <option value="saturday">Saturday</option>
                        <option value="sunday">Sunday</option>
                    </select>
                    <button class="btn p btn-search">Search</button>
                </div>
            </center>
        </div>
    </section>
    <!-- end top bar -->

    <!-- start middle bar -->
    <div class="addnew-pannel">
        <p id="addnew">Add New Item</p>
        <center>
            <div  style="width: 1002px;text-align: left" class="label p">
                <label>Class ID</label>
                <label style="margin-left: 134px;">Day</label> 
                <label style="margin-left: 132px;">Start Time</label> 
                <label style="margin-left: 122px;">End Time</label> 
                <label style="margin-left: 128px;">Location</label>                
            </div>
            <div class="box-align" style="width: 1002px;">
                <input type="text" id="classID" class="txtbox p" style="width: 140px;">
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
                    <option value="sinhala">6.00</option>
                    <option value="sinhala">6.30</option>
                    <option value="sinhala">7.00</option>
                    <option value="sinhala">7.30</option>
                    <option value="sinhala">8.00</option>
                    <option value="sinhala">8.30</option>
                    <option value="sinhala">9.00</option>
                    <option value="sinhala">9.30</option>
                    <option value="sinhala">10.00</option>
                    <option value="sinhala">10.30</option>
                    <option value="sinhala">11.00</option>
                    <option value="sinhala">11.30</option>
                    <option value="sinhala">12.00</option>
                    <option value="sinhala">12.30</option>
                    <option value="sinhala">13.00</option>
                    <option value="sinhala">13.30</option>
                    <option value="sinhala">14.00</option>
                    <option value="sinhala">14.30</option>
                    <option value="sinhala">15.00</option>
                    <option value="sinhala">15.30</option>
                    <option value="sinhala">16.00</option>
                    <option value="sinhala">16.30</option>
                    <option value="sinhala">17.00</option>
                    <option value="sinhala">17.30</option>
                    <option value="sinhala">18.00</option>
                </select>
                <select name="end_time" id="end_time" class="txtbox p" style="width: 140px;">
                    <option value="sinhala">7.00</option>
                    <option value="sinhala">7.30</option>
                    <option value="sinhala">8.00</option>
                    <option value="sinhala">8.30</option>
                    <option value="sinhala">9.00</option>
                    <option value="sinhala">9.30</option>
                    <option value="sinhala">10.00</option>
                    <option value="sinhala">10.30</option>
                    <option value="sinhala">11.00</option>
                    <option value="sinhala">11.30</option>
                    <option value="sinhala">12.00</option>
                    <option value="sinhala">12.30</option>
                    <option value="sinhala">13.00</option>
                    <option value="sinhala">13.30</option>
                    <option value="sinhala">14.00</option>
                    <option value="sinhala">14.30</option>
                    <option value="sinhala">15.00</option>
                    <option value="sinhala">15.30</option>
                    <option value="sinhala">16.00</option>
                    <option value="sinhala">16.30</option>
                    <option value="sinhala">17.00</option>
                    <option value="sinhala">17.30</option>
                    <option value="sinhala">18.00</option>
                    <option value="sinhala">18.30</option>
                    <option value="sinhala">19.00</option>
                    <option value="sinhala">19.30</option>
                </select>
                <select name="location" id="location" class="txtbox p" style="width: 87px;">
                    <option value="A">Hall A</option>
                    <option value="B">Hall B</option>
                    <option value="C">Hall C</option>
                    <option value="D">Hall D</option>
                    <option value="E">Hall E</option>
                    <option value="F">Hall F</option>
                </select>
                <button class="btn p btn-add">Add</button>
            </div>
        </center>
    </div>
    <!-- end middle bar -->

    <!-- start result section -->
    <div class="show-results">
        <table class="p" id="table">
            <tr>
                <th>Hall</th>
                <th>Day</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Class Name</th>
                <th>Teacher</th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td>A</td>
                <td>Sunday</td>
                <td>08.00</td>
                <td>10.00</td>
                <td>Grd7 Sinhala</td>
                <td>Sman Kumara</td>
                <td><button class="btn p btn-edit" id="btn-edit" onclick="timetable_edit(2)">Edit</button></td>
                <td><button class="btn p btn-delete">Delete</button></td>
            </tr>
            <tr>
                <td>A</td>
                <td>Sunday</td>
                <td>08.00</td>
                <td>10.00</td>
                <td>Grd7 Sinhala</td>
                <td>Sman Kumara</td>
                <td><button class="btn p btn-edit" id="btn-edit" onclick="timetable_edit(3)">Edit</button></td>
                <td><button class="btn p btn-delete">Delete</button></td>
            </tr>
            <tr>
                <td>A</td>
                <td>Sunday</td>
                <td>08.00</td>
                <td>10.00</td>
                <td>Grd7 Sinhala</td>
                <td>Sman Kumara</td>
                <td><button class="btn p btn-edit" id="btn-edit" onclick="timetable_edit(4)">Edit</button></td>
                <td><button class="btn p btn-delete">Delete</button></td>
            </tr>
            <tr>
                <td>A</td>
                <td>Sunday</td>
                <td>08.00</td>
                <td>10.00</td>
                <td>Grd7 Sinhala</td>
                <td>Sman Kumara</td>
                <td><button class="btn p btn-edit" id="btn-edit">Edit</button></td>
                <td><button class="btn p btn-delete">Delete</button></td>
            </tr>
            <tr>
                <td>A</td>
                <td>Sunday</td>
                <td>08.00</td>
                <td>10.00</td>
                <td>Grd7 Sinhala</td>
                <td>Sman Kumara</td>
                <td><button class="btn p btn-edit" id="btn-edit">Edit</button></td>
                <td><button class="btn p btn-delete">Delete</button></td>
            </tr>
            <tr>
                <td>A</td>
                <td>Sunday</td>
                <td>08.00</td>
                <td>10.00</td>
                <td>Grd7 Sinhala</td>
                <td>Sman Kumara</td>
                <td><button class="btn p btn-edit" id="btn-edit">Edit</button></td>
                <td><button class="btn p btn-delete">Delete</button></td>
            </tr>
            <tr>
                <td>A</td>
                <td>Sunday</td>
                <td>08.00</td>
                <td>10.00</td>
                <td>Grd7 Sinhala</td>
                <td>Sman Kumara</td>
                <td><button class="btn p btn-edit" id="btn-edit">Edit</button></td>
                <td><button class="btn p btn-delete">Delete</button></td>
            </tr>
            <tr>
                <td>A</td>
                <td>Sunday</td>
                <td>08.00</td>
                <td>10.00</td>
                <td>Grd7 Sinhala</td>
                <td>Sman Kumara</td>
                <td><button class="btn p btn-edit" id="btn-edit">Edit</button></td>
                <td><button class="btn p btn-delete">Delete</button></td>
            </tr>
            <tr>
                <td>A</td>
                <td>Sunday</td>
                <td>08.00</td>
                <td>10.00</td>
                <td>Grd7 Sinhala</td>
                <td>Sman Kumara</td>
                <td><button class="btn p btn-edit" id="btn-edit">Edit</button></td>
                <td><button class="btn p btn-delete">Delete</button></td>
            </tr>
            <tr>
                <td>A</td>
                <td>Sunday</td>
                <td>08.00</td>
                <td>10.00</td>
                <td>Grd7 Sinhala</td>
                <td>Sman Kumara</td>
                <td><button class="btn p btn-edit" id="btn-edit">Edit</button></td>
                <td><button class="btn p btn-delete">Delete</button></td>
            </tr>
            <tr>
                <td>A</td>
                <td>Sunday</td>
                <td>08.00</td>
                <td>10.00</td>
                <td>Grd7 Sinhala</td>
                <td>Sman Kumara</td>
                <td><button class="btn p btn-edit" id="btn-edit">Edit</button></td>
                <td><button class="btn p btn-delete">Delete</button></td>
            </tr>
            <tr>
                <td>A</td>
                <td>Sunday</td>
                <td>08.00</td>
                <td>10.00</td>
                <td>Grd7 Sinhala</td>
                <td>Sman Kumara</td>
                <td><button class="btn p btn-edit" id="btn-edit">Edit</button></td>
                <td><button class="btn p btn-delete">Delete</button></td>
            </tr>
            <tr>
                <td>A</td>
                <td>Sunday</td>
                <td>08.00</td>
                <td>10.00</td>
                <td>Grd7 Sinhala</td>
                <td>Sman Kumara</td>
                <td><button class="btn p btn-edit" id="btn-edit">Edit</button></td>
                <td><button class="btn p btn-delete">Delete</button></td>
            </tr>
            <tr>
                <td>A</td>
                <td>Sunday</td>
                <td>08.00</td>
                <td>10.00</td>
                <td>Grd7 Sinhala</td>
                <td>Sman Kumara</td>
                <td><button class="btn p btn-edit" id="btn-edit">Edit</button></td>
                <td><button class="btn p btn-delete">Delete</button></td>
            </tr>
            <tr>
                <td>A</td>
                <td>Sunday</td>
                <td>08.00</td>
                <td>10.00</td>
                <td>Grd7 Sinhala</td>
                <td>Sman Kumara</td>
                <td><button class="btn p btn-edit" id="btn-edit">Edit</button></td>
                <td><button class="btn p btn-delete">Delete</button></td>
            </tr>
            <tr>
                <td>A</td>
                <td>Sunday</td>
                <td>08.00</td>
                <td>10.00</td>
                <td>Grd7 Sinhala</td>
                <td>Sman Kumara</td>
                <td><button class="btn p btn-edit" id="btn-edit">Edit</button></td>
                <td><button class="btn p btn-delete">Delete</button></td>
            </tr>
            
        </table>
    </div>
    <!-- end result section -->
    
</div>

<!-- start Modal -->
<div id="edit_timetable" class="modal">
    <div class="modal-content" style="width: 829px;">
        <div class="modal-head">
            <p style="float:left" class="p">Edit Time Table Item</p>
            <p class="close">&times;</p>
        </div>
        <center>
            <div  style="width: 771px;text-align: left;margin-top: 14px;" class="label p">
                <label>Class ID</label>
                <label style="margin-left: 132px;">Day</label> 
                <label style="margin-left: 127px;">Start Time</label> 
                <label style="margin-left: 120px;">End Time</label> 
                <label style="margin-left: 125px;">Location</label>                
            </div>
            <div class="box-align" style="width: 771px;">
                <input type="text"  class="txtbox p" style="width: 140px;">
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
                    <option value="sinhala">6.00</option>
                    <option value="sinhala">6.30</option>
                    <option value="sinhala">7.00</option>
                    <option value="sinhala">7.30</option>
                    <option value="sinhala">8.00</option>
                    <option value="sinhala">8.30</option>
                    <option value="sinhala">9.00</option>
                    <option value="sinhala">9.30</option>
                    <option value="sinhala">10.00</option>
                    <option value="sinhala">10.30</option>
                    <option value="sinhala">11.00</option>
                    <option value="sinhala">11.30</option>
                    <option value="sinhala">12.00</option>
                    <option value="sinhala">12.30</option>
                    <option value="sinhala">13.00</option>
                    <option value="sinhala">13.30</option>
                    <option value="sinhala">14.00</option>
                    <option value="sinhala">14.30</option>
                    <option value="sinhala">15.00</option>
                    <option value="sinhala">15.30</option>
                    <option value="sinhala">16.00</option>
                    <option value="sinhala">16.30</option>
                    <option value="sinhala">17.00</option>
                    <option value="sinhala">17.30</option>
                    <option value="sinhala">18.00</option>
                </select>
                <select name="end_time" id="end_time" class="txtbox p" style="width: 140px;">
                    <option value="sinhala">7.00</option>
                    <option value="sinhala">7.30</option>
                    <option value="sinhala">8.00</option>
                    <option value="sinhala">8.30</option>
                    <option value="sinhala">9.00</option>
                    <option value="sinhala">9.30</option>
                    <option value="sinhala">10.00</option>
                    <option value="sinhala">10.30</option>
                    <option value="sinhala">11.00</option>
                    <option value="sinhala">11.30</option>
                    <option value="sinhala">12.00</option>
                    <option value="sinhala">12.30</option>
                    <option value="sinhala">13.00</option>
                    <option value="sinhala">13.30</option>
                    <option value="sinhala">14.00</option>
                    <option value="sinhala">14.30</option>
                    <option value="sinhala">15.00</option>
                    <option value="sinhala">15.30</option>
                    <option value="sinhala">16.00</option>
                    <option value="sinhala">16.30</option>
                    <option value="sinhala">17.00</option>
                    <option value="sinhala">17.30</option>
                    <option value="sinhala">18.00</option>
                    <option value="sinhala">18.30</option>
                    <option value="sinhala">19.00</option>
                    <option value="sinhala">19.30</option>
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
            <button class="btn p btn-save" >Save</button>
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



