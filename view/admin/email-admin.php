<style>
    textarea{
        border: 1px solid #999999;
        box-sizing: border-box;
        border-radius: 15px;
        width: 476px;
        height: 340px;
        resize: none;
        outline: none;
        padding: 10px;
        margin-bottom: 20px;
    }
    .title2{
        font-weight: normal;
        font-size: 18px;
        line-height: 21px;
        color: #3C3C3C;
        margin-top: 15px;
        margin-bottom: 2px;
    }
    .btn-clear{
        float: left;
        margin-left: 24px;
    }
    .btn-send{
        float: right;
        margin-right: 24px;
    }
</style>
<div class="container">

    <!-- start top bar -->
    <section class="top-pannel">
        <p id="title">Send Emails</p>
    </section>
    <!-- end top bar -->

    <!-- start middle bar -->
    <div class="addnew-pannel">
        <p id="addnew">Get Email Addresses</p>
        <center>
            <div  style="width: 1002px;text-align: left" class="label p">
                <label>Teacher</label> 
                <label style="margin-left: 161px;">Class ID</label> 
                <label style="margin-left: 161px;">Student ID</label> 
                <label style="margin-left: 148px;">All</label>                
            </div>
            <div class="box-align" style="width: 1002px;">
                <select name="teacher" id="teacher" class="txtbox p" >
                    <option></option>
                    <option value="monday">Sadun Karunanayake</option>
                    <option value="tuesday">Kapila Bandara</option>
                </select>
                <input type="text" id="classID" class="txtbox p" >
                <input type="text" id="studentID" class="txtbox p" >
                <select name="all_addresses" id="all_addresses" class="txtbox p">
                    <option></option>
                    <option value="teachers">All Teachers</option>
                    <option value="students">All Students</option>
                    <option value="workers">All Workers</option>
                </select>
                <button class="btn p btn-add" onclick="getAddress()">Add</button>
            </div>
        </center>
    </div>
    <!-- end middle bar -->

    <!-- start result section -->
    <div class="email-new">
        <center>
            <div class="box-align" style="width: 1050px;">
                <form style="width: 50%;float: left;">
                    <section>
                        <p class="title2">Email Addresses</p>
                        <textarea id="address_show"></textarea>
                        <input type="reset" class="btn p btn-clear" id="btn-clear" value="Clear">
                    </section>
                </form>
                <form style="width: 50%;float: right;" onsubmit="return false">
                    <section>
                        <p class="title2">Message</p>
                        <textarea placeholder="Type your message here..." id="msg"></textarea>
                        <input type="reset" class="btn p btn-clear" id="btn-clear" value="Clear">
                        <button class="btn p btn-send" id="emailsend" onclick="sendEmail()">Send</button>
                    </section>
                </form>
            </div>
        </center>
    </div>
    <!-- end result section -->
    
</div>


<script>


    function getAddress(){
        get_email=true;
        var type = document.getElementById("all_addresses").value;
        //alert(type);
        
        $.ajax({
			url: "../../model/sendEmailDAO.php",
			data: {
                get_email: get_email,
				type: type

			},
			dataType:"JSON",
			success:function(obj){
				var show="";
				for (var key in obj) {
					if (obj.hasOwnProperty(key)) {
                            show += "" + obj[key]["address"] +",";
					}
				}
				
				$("#address_show").val(show);
               
            }
		})
		return false;

    }


    function sendEmail(){
        send_email=true;
        var address = document.getElementById("address_show").value;
        var msg = document.getElementById("msg").value;
        //alert(type);
        
        $.ajax({
			url: "../../model/sendEmailDAO.php",
			data: {
                send_email: send_email,
				address: address,
                msg: msg
			},
			//dataType:"JSON",
			success:function(obj){
				alert("Send Email Successful!!!");
               
            }
		})
		return false;

    }
</script>







