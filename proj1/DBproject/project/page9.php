<?php
 session_start(); 
 include 'dbconnect.php';
 
 $con= dbcon();
 $id = $_SESSION['user_id'];
 $sql=mysqli_query($con,"SELECT * FROM users WHERE id = $id ");
 $user = mysqli_fetch_array($sql);
  
 // Initialize the session 
 // Store the submitted data sent 
 // via POST method, stored  
   
            
 ?> 
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Final Submission</title>
	<link rel="stylesheet" type="text/css" href="./Final Submission_files/favicon.ico">
	<link rel="icon" href="IIT-Patna-logo.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="./Final Submission_files/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./Final Submission_files/bootstrap-datepicker.css">
	<script type="text/javascript" src="./Final Submission_files/jquery.js.download"></script>
	<script type="text/javascript" src="./Final Submission_files/bootstrap.js.download"></script>
	<script type="text/javascript" src="./Final Submission_files/bootstrap-datepicker.js.download"></script>

	<link href="./Final Submission_files/css" rel="stylesheet"> 
	<link href="./Final Submission_files/css(1)" rel="stylesheet"> 
	<link href="./Final Submission_files/css(2)" rel="stylesheet"> 
	<link href="./Final Submission_files/css(3)" rel="stylesheet"> 
	<link href="./Final Submission_files/css(4)" rel="stylesheet"> 
	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link href="./Final Submission_files/css2" rel="stylesheet">


	
<style type="text/css">
	body { background-color: lightgray; padding-top:0px!important;}

</style></head>

<body>
<div class="container-fluid" style="background-color: #f7ffff; margin-bottom: 10px;">
	<div class="container">
        <div class="row" style="margin-bottom:10px; ">
        	<div class="col-md-8 col-md-offset-2">

        		<!--  <img src="https://ofa.iiti.ac.in/facrec_che_2023_july_02/images/IITIndorelogo.png" alt="logo1" class="img-responsive" style="padding-top: 5px; height: 120px; float: left;"> -->

        		<h3 style="text-align:center;color:#414002!important;font-weight: bold;font-size: 2.3em; margin-top: 3px; font-family: &#39;Noto Sans&#39;, sans-serif;">भारतीय प्रौद्योगिकी संस्थान पटना</h3>
    			<h3 style="text-align:center;color: #414002!important;font-weight: bold;font-family: &#39;Oswald&#39;, sans-serif!important;font-size: 2.2em; margin-top: 0px;">Indian Institute of Technology Patna</h3>
    			

        	</div>
        	

    	   
        </div>
		    <!-- <h3 style="text-align:center; color: #414002; font-weight: bold;  font-family: 'Fjalla One', sans-serif!important; font-size: 2em;">Application for Academic Appointment</h3> -->
    </div>
   </div> 
			<h3 style="color: rgb(225, 4, 37); margin-bottom: 20px; font-weight: bold; text-align: center; font-family: &quot;Noto Serif&quot;, serif; opacity: 0.248188;" class="blink_me">Application for Faculty Position</h3>

<style type="text/css">
body { padding-top:30px; }
.form-control { margin-bottom: 10px; }
.floating-box {
    display: inline-block;
    width: 150px;
    height: 75px;
    margin: 10px;
    border: 3px solid #73AD21;  
}
</style>
<style type="text/css">
body { padding-top:30px; }
.form-control { margin-bottom: 10px; }
label{
  padding: 0 !important;
}
hr{
  border-top: 1px solid #025198 !important;
  border-style: dashed!important;
  border-width: 1.2px;
}

.panel-heading{
  font-size: 1.3em;
  font-family: 'Oswald', sans-serif!important;
  letter-spacing: .5px;
}

.panel-info .panel-heading{
  font-size: 1.1em;
  font-family: 'Oswald', sans-serif!important;
  padding-top: 5px;
  padding-bottom: 5px;
}

.panel-danger .panel-heading{
  font-size: 1.1em;
  font-family: 'Oswald', sans-serif!important;
  padding-top: 5px;
  padding-bottom: 5px;
}

.btn-primary {
  padding: 9px;
}

.Acae_data
{
  font-size: 1.1em;
  font-weight: bold;
  color: #414002;
}


.upload_crerti
{
  font-size: 1.1em;
  font-weight: bold;
  color: red;
  text-align: center;
}

.update_crerti
{
  font-size: 1.1em;
  font-weight: bold;
  color: green;
  text-align: center;
}
p
{
  padding-top: 10px;
}
</style>

<!-- all bootstrap buttons classes -->
<!-- 
  class="btn btn-sm, btn-lg, "
  color - btn-success, btn-primary, btn-default, btn-danger, btn-info, btn-warning
-->



<a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/layout"></a>

<div class="container">
  
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 well">
            
              
            <fieldset>
             
                 <legend>
                  <div class="row">
                    <div class="col-md-10">
                        <h4>Welcome : <font color="#025198"><strong><?php echo htmlspecialchars($user['FirstName']); ?>&nbsp;<?php echo htmlspecialchars($user['LastName']); ?></strong></font></h4>
                    </div>
                    <div class="col-md-2">
                      <a onclick="logout()" class="btn btn-sm btn-success  pull-right">Logout</a>
                    </div>
                  </div>
                
                
        </legend>
       </fieldset>

<!-- publication file upload           -->

<form class="form-horizontal" action="preview.php" method="post" enctype="multipart/form-data">


<!-- Payment file upload           -->


<input type="hidden" name="ci_csrf_token" value="">
<div class="row">

<div class="col-md-12">
      <div class="panel panel-success ">
      <div class="panel-heading">23. Final Declaration *</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12">

                <textarea style="height:60px" placeholder="" class="form-control input-md" name="my_state" readonly="">                I hereby declare that I have carefully read and understood the instructions and particulars mentioned in the advertisment and this application form. I further declare that all the entries along with the attachments uploaded in this form are true to the best of my knowledge and belief.
              </textarea>

          <input type="checkbox" name="decl_status" value="1" required="">  
         
        </div>
          <br>
          <br>
          <br>
          <div class="col-md-4">
          
          </div>

         <!--  <label class="col-md-4"><strong> Name of Applicant</strong></label>
          <div class="col-md-4">
          <input id="name" value="" name="name" type="text" placeholder="Name of the Applicant" class="form-control input-md" required="">
        </div> -->
        </div>
      </div>
    </div>
    </div>


 </div>      
 
  <h5 style="font-weight: bold; color:red;">Note: The form can be edited till the cutoff date of the rolling advertisment.</h5>
<hr> 
<div class="form-group">
<div class="col-md-12">
  <!-- <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/acde" class="btn btn-primary pull-left">BACK</a> -->
  <a href="page8.php" class="btn btn-primary pull-left">PREV</i></a>
  <button type="submit" name="preview" value="preview" class="btn btn-info pull-right">SAVE &amp; SUBMIT</button>
  <!-- <button type="submit" name="submit" value="Submit" class="btn btn-success">SAVE</button> -->


</div>

<!-- <div class="col-md-2">

  <button id="submit" type="submit" name="submit" value="Submit" onclick="return confirm_box()" class="btn btn-success pull-right">Final Submission</button>

</div>
 -->

</div>

</form>
</div> 
</div>
<script type="text/javascript">
function confirm_box()
{
  if(confirm("Dear Candidate, \n\nAre you sure that you are ready to submit the application? Press OK to submit the application. Press CANCEL to edit. \nOnce you press OK you cannot make any changes.\n\nThank you."))
  {
    return true;
  }
  else
  {
    return false;
  }
}
function submit_frm()
{
  alert();
  document.getElementById("upload_frm").submit();
}
</script>



<div id="footer"></div>



<script type="text/javascript">
	function logout() {
    // Clear session variables
    sessionStorage.clear();

    // Redirect to Home_Page.php
    document.location = 'logout.php';
}
function disableBack() { window.history.forward(); }
        setTimeout("disableBack()", 0);
        window.onunload = function () { null };
	function blinker() {
	    $('.blink_me').fadeOut(500);
	    $('.blink_me').fadeIn(500);
	}

	setInterval(blinker, 1000);
</script></div></body></html>