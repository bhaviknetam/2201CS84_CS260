<?php
 session_start(); 
 include 'dbconnect.php';

 $con= dbcon();
 $id = $_SESSION['user_id'];
 $sql=mysqli_query($con,"SELECT * FROM users WHERE id = $id ");
 $sql1 =mysqli_query($con,"SELECT * FROM personal_details WHERE id = $id");
 $user = mysqli_fetch_array($sql);
 $reg = mysqli_fetch_array($sql1);
  
 // Initialize the session 
 // Store the submitted data sent 
 // via POST method, stored  
   
            
 ?> 

<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Update your personal details</title>
	<link rel="stylesheet" type="text/css" href="./Update your personal details_files/favicon.ico">
	<link rel="icon" href="IIT-Patna-logo.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="./Update your personal details_files/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./Update your personal details_files/bootstrap-datepicker.css">
  <script type="text/javascript" src="./Update your personal details_files/jquery.js.download"></script>
	<script type="text/javascript" src="./Update your personal details_files/bootstrap.js.download"></script>
	<script type="text/javascript" src="./Update your personal details_files/bootstrap-datepicker.js.download"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

	<link href="./Update your personal details_files/css" rel="stylesheet"> 
	<link href="./Update your personal details_files/css(1)" rel="stylesheet"> 
	<link href="./Update your personal details_files/css(2)" rel="stylesheet"> 
	<link href="./Update your personal details_files/css(3)" rel="stylesheet"> 
	<link href="./Update your personal details_files/css(4)" rel="stylesheet"> 
	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link href="./Update your personal details_files/css2" rel="stylesheet">


	
<style type="text/css">
	body { background-color: lightgray; padding-top:0px!important;}

</style></head>

<body>
<script  src="sample1.js"></script>
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
			<h3 style="color: rgb(225, 4, 37); margin-bottom: 20px; font-weight: bold; text-align: center; font-family: &quot;Noto Serif&quot;, serif; opacity: 0.345492;" class="blink_me">Application for Faculty Position</h3>

<!-- <body onload="updateAb()">  -->

<style type="text/css">
body { padding-top:30px; }
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
.form-control { margin-bottom: 20px; }
label{
padding: 0 !important;
text-align: left!important;
font-family: 'Noto Serif', serif;
}

span{
font-size: 1.2em;
font-family: 'Oswald', sans-serif!important;
text-align: left!important;
padding: 0px 10px 0px 0px!important;
/*font-family: 'Noto Serif', serif;*/
font-weight: bold;
color: #414002;
/*margin-bottom: 20px!important;*/

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
.btn-primary{
padding: 9px;
}
</style>


<script type="text/javascript">
        function disableBack() { window.history.forward(); }
        setTimeout("disableBack()", 0);
        window.onunload = function () { null };
    </script>

<script type="text/javascript">  
//   $("#dob").focusout(function(){
//     alert();
//   ageCalculator();
// });
function logout() {
    // Clear session variables
    sessionStorage.clear();

    // Redirect to Home_Page.php
    document.location = 'logout.php';
}
function disableBack() { window.history.forward(); }
        setTimeout("disableBack()", 0);
        window.onunload = function () { null };

function ageCalculator() 
{
// alert('HI');  

debugger;  
var birthdate = document.getElementById('dob').value; // in "dd/MM/yyyy" format  
var senddate = document.getElementById('Date').value; // in "dd/MM/yyyy" format  
var x = birthdate.split("/");  
var y = senddate.split("/");  
var bdays = x[0];  
var bmonths = x[1];  
var byear = x[2];  
//alert(bdays);  
var sdays = y[0];  
var smonths = y[1];  
var syear = y[2];  
// alert(sdays);  
if (sdays < bdays) {  
sdays = parseInt(sdays) + 30;  
smonths = parseInt(smonths) - 1;  
//alert(sdays);  
var fdays = sdays - bdays;  
//alert(fdays);  
}  
else {  
var fdays = sdays - bdays;  
}  
if (smonths < bmonths) {  
smonths = parseInt(smonths) + 12;  
syear = syear - 1;  
var fmonths = smonths - bmonths;  
}  
else {  
var fmonths = smonths - bmonths;  
}  
var fyear = syear - byear; 
var year_to_days = fyear*365; 
var month_to_days = fmonths*30;
var newage = (fyear + ' years ' + fmonths + ' months ' + fdays + ' days');


var newage_year = (year_to_days+month_to_days+fdays);

document.getElementById("age").value = newage;
document.getElementById("age_days").value = newage_year;
// alert(newage);  
// document.getElementById("btnClickedValue").value = newage;
// window.location.href = window.location.href+'?newage='+newage;
}  


</script> 

<script type="text/javascript">
function updateAb(){     

alert('hi');   
}
</script>
<script type="text/javascript">
$(function () 
{
// $('#dob').datepicker({
//     format: 'dd/mm/yyyy',
//     autoclose: true,
//     onSelect: function() {
//              updateAb(selected);
//         }

// });
});
</script>
<!-- all bootstrap buttons classes -->
<!-- 
class="btn btn-sm, btn-lg, "
color - btn-success, btn-primary, btn-default, btn-danger, btn-info, btn-warning
-->



<a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/layout"></a>

<div class="container">

<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 well">
    <form class="form-horizontal" action="savepage1.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="ci_csrf_token" value="">
    <fieldset>
     
         <legend>

          <div class="row">
            <div class="col-md-8">
                              <h4>Welcome : <font color="#025198"><strong> <?php echo htmlspecialchars($user['FirstName']); ?>&nbsp;<?php echo htmlspecialchars($user['LastName']); ?></strong></font></h4>
            </div>
             
            <div class="col-md-3">

            <a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/facultypanel#" class="btn btn-sm btn-info pull-right" onclick="get_username('<?php echo $user['FirstName'].' '.$user['LastName'];?>', <?php echo $id; ?>)" data-target="#passModal" data-toggle="modal">Change Password</a>


            </div>
            <div class="col-md-1">
              <a class="btn btn-sm btn-success  pull-right" onclick="logout()">Logout</a>
            </div>
          </div>
        
        
</legend>


      
     
    
<div id="project_show">

<div class="row">
  <div class="col-md-12">

      <label class="col-md-2 control-label" for="adv_num">Advertisement Number *</label>    
      <div class="col-md-4">

      <select id="adv_num" name="adv_num" class="form-control input-md" required="">

          <option value="">Select</option>
          <option value="IITP/FACREC-CSE/2024/JULY/01" <?php if(isset($reg["AdvertisementNumber"]) and $reg["AdvertisementNumber"] == 'IITP/FACREC-CSE/2024/JULY/01'){ echo ' selected="selected"'; } ?>>IITP/FACREC-CSE/2024/JULY/01</option>
          
      </select>
        
      </div>

      <label class="col-md-2 control-label" for="doa">Date of Application </label>  
      <div class="col-md-4">
      <input id="doa" name="doa" type="date" readonly="readonly" placeholder="" class="form-control input-md" required="" value="<?php echo date("Y-m-d") ?>">
     </div>

      <label class="col-md-2 control-label" for="ref_num">Application Number</label>  
      <div class="col-md-4">

      <input id="ref_num" name="ref_num" type="text" readonly="readonly" placeholder="" class="form-control input-md" required="" value = "<?php echo $id ?>">
     </div>

      <label class="col-md-2 control-label" for="post">Post Applied for *</label>  
      <div class="col-md-4">
      <select id="post" name="post" class="form-control input-md" required="">
          <option value="">Select</option>
          <option value="Professor"  <?php if(isset($reg["PostAppliedfor"]) and $reg["PostAppliedfor"] == 'Professor'){ echo ' selected="selected"'; } ?>>Professor</option>
          <option value="Associate Professor"  <?php if(isset($reg["PostAppliedfor"]) and $reg["PostAppliedfor"] == 'Associate Professor'){ echo ' selected="selected"'; } ?>>Associate Professor</option>
          <option value="Assistant Professor Grade I"  <?php if(isset($reg["PostAppliedfor"]) and $reg["PostAppliedfor"] == 'Assistant Professor Grade I'){ echo ' selected="selected"'; } ?>>Assistant Professor Grade I</option>
          <option value="Assistant Professor Grade II"  <?php if(isset($reg["PostAppliedfor"]) and $reg["PostAppliedfor"] == 'Assistant Professor Grade II'){ echo ' selected="selected"'; } ?>>Assistant Professor Grade II</option>
      </select>
      </div>

      <label class="col-md-2 control-label" for="dept">Department/School *</label>  
      <div class="col-md-4">
      <select id="dept" name="dept" class="form-control input-md" required="">
          <option value="">Select</option>
          <option value="Computer Engineering" <?php if(isset($reg["Department_School"]) and $reg["Department_School"] == 'Computer Engineering'){ echo ' selected="selected"'; } ?>>Computer Engineering</option>
      </select>
        
      </div>
</div>
</div>
<hr>


    <!-- Form Name -->
    
      
    <!-- Text input-->
<!-- <h5><font color="#025198"><strong>1. Name:</strong></font></h5>             -->
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-success">
        <div class="panel-heading">1. Personal Details <small class="pull-right">Upload/Update Photo *</small></div>
          <div class="panel-body" style="height: 390px">
              <div class="col-md-10">
                <div class="row">

                  <span class="col-md-2 control-label" for="fname">First Name *</span>  
                    <div class="col-md-4">
                    <input id="fname" name="fname" type="text" placeholder="First name" class="form-control input-md" maxlength="15" required=""
                    value="<?php if(isset($reg['FirstName'])) echo htmlspecialchars($reg['FirstName']); ?>">

                    
                  </div>
                

                  <span class="col-md-2 control-label" for="mname">Middle Name</span>  
                    <div class="col-md-4">
                    <input id="mname" name="mname" type="text" placeholder="Middle name" class="form-control input-md" maxlength="12" 
                    value="<?php if(isset($reg['MiddleName'])) echo htmlspecialchars($reg['MiddleName']); ?>">
                    </div>

                  <span class="col-md-2 control-label" for="lname">Last Name *</span>  
                    <div class="col-md-4">
                    <input id="lname" name="lname" type="text" placeholder="Last name" class="form-control input-md" maxlength="15" required=""
                    value="<?php if(isset($reg['LastName'])) echo htmlspecialchars($reg['LastName']); ?>">
                    </div>


                  <span class="col-md-2 control-label" for="nationality">Nationality *</span>
                  <div class="col-md-4"> 
                    <select id="nationality" name="nationality" class="form-control input-md" required="">
                      <option value="">Select</option>
                      <!-- <option  value=" India"> India</option> -->
                      <option value=" Indian" <?php if(isset($reg["Nationality"]) and $reg["Nationality"] == ' Indian'){ echo ' selected="selected"'; } ?>> Indian</option>
                      <!-- <option  value="PIO">PIO</option> -->
                      <option value="OCI" <?php if(isset($reg["Nationality"]) and $reg["Nationality"] == 'OCI'){ echo ' selected="selected"'; } ?>>OCI</option>      
                    ?>
                    </select>
                  </div>



                 <!--  <span class="col-md-2 control-label" for="nationality">Nationality </span>  
                  <div class="col-md-4">
                  <input id="nationality" value=" Indian" name="nationality" type="text" placeholder="Nationality" class="form-control input-md" maxlength="15" required="">
                  </div> -->

                  <span class="col-md-2 control-label" for="dob">Date of Birth DD/MM/YYYY *</span>  
                  <div class="col-md-4">
                   <!--  <p id="dobdiv"> -->
                  <input id="dob" name="dob" type="date" placeholder="DD/MM/YYYY" class="form-control input-md" required="" value="<?php if(isset($reg['DateofBirth'])) echo htmlspecialchars($reg['DateofBirth']); ?>">
                <!-- </p> -->

                  <input type="hidden" name="Date" id="Date" value="31/08/2023">
                  <!-- <br/> 
                  <input type="hidden" id="btnClickedValue" name="btnClickedValue" value="" />
                  <button type="Button" onclick="ageCalculator()">Calculate</button >   -->

                    
                  </div>

                 <!--  <span class="col-md-2 control-label" for="age">Age</span>  
                  <div class="col-md-4">
                  <input id="age" name="age"  value="" type="text" class="form-control input-md" readonly>

                  <input id="age_days" name="age_days"  value="0" type="hidden" class="form-control input-md" readonly>
                  </div> -->

                 
                  <span class="col-md-2 control-label" for="gender">Gender *</span>
                  <div class="col-md-4"> 
                    <select id="gender" name="gender" class="form-control input-md" required="">
                      <option value="">Select</option>
                      <option value="Male" <?php if(isset($reg["Gender"]) and $reg["Gender"] == 'Male'){ echo ' selected="selected"'; } ?>>Male</option>
                      <option value="Female" <?php if(isset($reg["Gender"]) and $reg["Gender"] == 'Female'){ echo ' selected="selected"'; } ?>>Female</option>
                      <option value="Other" <?php if(isset($reg["Gender"]) and $reg["Gender"] == 'Other'){ echo ' selected="selected"'; } ?>>Other</option>    
                    </select>
                  </div>


                  <span class="col-md-2 control-label" for="mstatus">Marital Status *</span>
                  <div class="col-md-4"> 
                    <select id="mstatus" name="mstatus" class="form-control input-md" required="">
                      <option value="">Select</option>
                      <option value="Married" <?php if(isset($reg["MaritalStatus"]) and $reg["MaritalStatus"] == 'Married'){ echo ' selected="selected"'; } ?>>Married</option>
                      <option value="Unmarried" <?php if(isset($reg["MaritalStatus"]) and $reg["MaritalStatus"] == 'Unmarried'){ echo ' selected="selected"'; } ?>>Unmarried</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>

                  <span class="col-md-2 control-label" for="cast">Category</span>
                  <div class="col-md-4"> 
                    <input id="cast" name="cast" type="text" placeholder="Category" class="form-control input-md" required=""
                    value= "<?php if(isset($reg['Category'])) echo htmlspecialchars($reg['Category']); ?>">
                  </div>

                 <!--  <span class="col-md-2 control-label" for="disability_type">Type of Disability</span>
                  <div class="col-md-4"> 
                    <input id="disability_type" value="" name="disability_type"name="disability_type" type="text" placeholder="Type of Disability" class="form-control input-md" required="">
                  </div>
                     -->

                 <!--  <div class="col-md-6"> 
                  </div> -->
                </div>

                <div class="row">
                  <span class="col-md-2 control-label" for="mstatus">ID Proof *</span>
                  <div class="col-md-4"> 
                   
                      <select id="id_proof" name="id_proof" class="form-control input-md" required="">
                      <option value="">Select</option>
                       <!-- <option value="">Select</option> -->
                      <!--  <option value="AADHAR">AADHAR</option>
                       <option value="PAN-CARD">PAN-CARD</option>
                       <option value="DRIVING-LICENSE">DRIVING-LICENSE</option>
                       <option value="PASSPORT">PASSPORT</option>
                       <option value="OTHER">OTHER</option> -->


                      <option value="AADHAR" <?php if(isset($reg["IDProof"]) and $reg["IDProof"] == 'AADHAR'){ echo ' selected="selected"'; } ?>>AADHAR</option>
                      <option value="PAN-CARD" <?php if(isset($reg["IDProof"]) and $reg["IDProof"] == 'PAN-CARD'){ echo ' selected="selected"'; } ?>>PAN-CARD</option>
                      <option value="DRIVING-LICENSE" <?php if(isset($reg["IDProof"]) and $reg["IDProof"] == 'AADHAR'){ echo ' selected="selected"'; } ?>>
                      DRIVING-LICENSE</option>
                      <option value="VOTER ID" <?php if(isset($reg["IDProof"]) and $reg["IDProof"] == 'VOTER ID'){ echo ' selected="selected"'; } ?>>VOTER ID</option>
                      <option value="PASSPORT" <?php if(isset($reg["IDProof"]) and $reg["IDProof"] == 'PASSPORT'){ echo ' selected="selected"'; } ?>>PASSPORT</option>
                      <option value="RATION CARD" <?php if(isset($reg["IDProof"]) and $reg["IDProof"] == 'RATION CARD'){ echo ' selected="selected"'; } ?>>RATION CARD</option>
                      
                      <option value="OTHERS" <?php if(isset($reg["IDProof"]) and $reg["IDProof"] == 'OTHERS'){ echo ' selected="selected"'; } ?>>OTHERS</option>
                    </select>
                  </div>

                 
                  
                                        <span class="col-md-2 control-label" for="cast">Update ID Proof</span>
                    <div class="col-md-2"> 
                         <a href="<?php if(isset($reg["UpdateIDProof"])) echo $reg["UpdateIDProof"] ?>" class="btn btn-sm btn-success" target="_blank">View Uploaded File </a>
                    </div>
                     <div class="col-md-2"> 
                       <input id="id_card_file" name="userfile2" type="file" class="form-control input-md">
                    </div>
                     
                    
                    <span class="col-md-2 control-label" for="father_name">Father's Name *</span>  
                      <div class="col-md-4">
                      <input id="father_name" name="father_name" type="text" placeholder="Father&#39;s Name" class="form-control input-md" maxlength="30" required=""
                      value= "<?php if(isset($reg["FathersName"])) echo htmlspecialchars($reg["FathersName"]); ?>">
                      </div>
                  </div>
            </div>

        <div class="col-md-2 pull-right">
        <img src="<?php if(isset($reg["Filename"]) and $reg["Filename"]!=null) echo $reg["Filename"]; else echo "userdetails/person-dummy.jpg";?>" class="thumbnail pull-right" height="150" width="130">

            <input id="photo" name="userfile" type="file" class="form-control input-md">
          
         
        </div>
        </div>
      </div>
    </div>
  </div>




<div class="row">
<div class="col-md-12">
<div class="panel panel-success">
<!-- <div class="panel-heading">2. Address *</div> -->
<div class="panel-body">
    <div class="row">
      <div class="col-md-6">
        <span class="control-label" for="cadd">Correspondence Address </span>
        <br>
        <br>
       <textarea style="height:40px" placeholder="Street" class="form-control input-md" name="cadd" maxlength="200" required=""
       ><?php if(isset($reg["Street"])) echo htmlspecialchars($reg["Street"]); ?></textarea>

       <textarea style="height:40" placeholder="City" class="form-control input-md" name="cadd1" maxlength="200" required=""
       ><?php if(isset($reg["City"])) echo htmlspecialchars($reg["City"]); ?></textarea>

       <textarea style="height:40" placeholder="State" class="form-control input-md" name="cadd2" maxlength="200" required=""
        ><?php if(isset($reg["State"])) echo htmlspecialchars($reg["State"]);?></textarea>

       <textarea style="height:40" placeholder="Country" class="form-control input-md" name="cadd3" maxlength="200" required=""
       ><?php if(isset($reg['Country'])) echo htmlspecialchars($reg['Country']); ?></textarea>

       <textarea style="height:40;" placeholder="PIN/ZIP" class="form-control input-md" name="cadd4" maxlength="6" required=""
       ><?php if(isset($reg["PIN_ZIP"])) echo htmlspecialchars($reg["PIN_ZIP"]); ?></textarea>


      </div>


      <div class="col-md-6">
        <span class="control-label" for="padd">Permanent Address </span>
        <br>
        <br>
       <textarea style="height:40px" placeholder="Street" class="form-control input-md" name="padd" maxlength="200" required=""
       ><?php if(isset($reg["Street1"])) echo htmlspecialchars($reg["Street1"]); ?></textarea>

       <textarea style="height:40" placeholder="City" class="form-control input-md" name="padd1" maxlength="200" required=""
       ><?php if(isset($reg["City2"])) echo htmlspecialchars($reg["City2"]); ?></textarea>

       <textarea style="height:40" placeholder="State" class="form-control input-md" name="padd2" maxlength="200" required=""
       ><?php if(isset($reg["State1"])) echo htmlspecialchars($reg["State1"]); ?></textarea>

       <textarea style="height:40" placeholder="Country" class="form-control input-md" name="padd3" maxlength="200" required=""
       ><?php if(isset($reg['Country1'])) echo htmlspecialchars($reg['Country1']); ?></textarea>


       <textarea style="height:40;" placeholder="PIN/ZIP" class="form-control input-md" name="padd4" maxlength="6" required=""
       ><?php if(isset($reg["PIN_ZIP1"])) echo htmlspecialchars($reg["PIN_ZIP1"]); ?></textarea>

    
      </div>

    </div>

      
    </div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="panel panel-success">
<!-- <div class="panel-heading">3. Contact Details (with STD/ISD code)</div> -->
<div class="panel-body">
  <span class="col-md-2 control-label" for="mobile">Mobile *</span>  
  <div class="col-md-4">
  <input id="mobile" name="mobile" type="text" placeholder="Mobile" class="form-control input-md" required="" maxlength="20"
  value= "<?php if(isset($reg["Mobile"])) echo htmlspecialchars($reg["Mobile"]); ?>">
  </div>

  

  <span class="col-md-2 control-label" for="email">Email</span>  
  <div class="col-md-4">
  <input class="form-control input-md" id="email" name="email" type="text" placeholder="email" readonly="readonly" value= "<?php echo htmlspecialchars($_SESSION['email_address']); ?>" required="" >
  </div>

  <span class="col-md-2 control-label" for="mobile_2">Alternate Mobile </span>  
  <div class="col-md-4">
  <input id="mobile_2" name="mobile_2" type="text" placeholder="Alternate Mobile " class="form-control input-md" maxlength="20"
  value= "<?php if(isset($reg["AlternateMobile"])) echo htmlspecialchars($reg["AlternateMobile"]); ?>">
  </div>

  <span class="col-md-2 control-label" for="email_2">Alternate Email </span>  
  <div class="col-md-4">
  <input id="email_2" name="email_2" type="email" placeholder="Alternate Email" class="form-control input-md"
  value= "<?php if(isset($reg["AlternateEmail"])) echo htmlspecialchars($reg["AlternateEmail"]); ?>">
  </div> 
  
 
  <span class="col-md-2 control-label" for="landline">Landline Number</span>  
  <div class="col-md-4">
  <input id="landline" name="landline" type="text" placeholder="Landline Number" class="form-control input-md" maxlength="20"
  value= "<?php if(isset($reg["LandlineNumber"])) echo htmlspecialchars($reg["LandlineNumber"]); ?>">
  </div> 
  
  

</div>
</div>
</div>
</div>

<div class="form-group">

<div class="col-md-12">
<button id="submit" type="submit" name="submit" value="Submit" class="btn btn-success pull-right">SAVE &amp; NEXT</button>

</div>

</div>

<!-- add the div for hide -->
</div>
</fieldset></form></div>





</div>
</div>


<div id="passModal" class="modal fade" role="dialog">
<form action="change_password.php" method="post">
<div class="modal-dialog">
<div class="modal-content">
    <div class="modal-header">
        <h2>Change Password</h2>

    </div>
    <div class="modal-body">
        <h3>Change Password For : <font color="#3377a0"><strong id="username_mod"></strong></font></h3>
        <input type="hidden" name="fid" id="fid" value="">
        <div class="form-group">
            <label>Current Password</label>
            <input type="password" name="cr_password" placeholder="Current Password" class="form-control">
        </div>
        <div class="form-group">
            <label>New Password</label>
            <input type="password" name="n_password" placeholder="New Password" class="form-control">
        </div>
        <div class="form-group">
            <label>Confirm New Password</label>
            <input type="password" name="cn_password" placeholder="New Confirm Password" class="form-control">
        </div>
    </div>
    <div class="modal-footer">
        <button type="submit" name="submit" value="Submit" class="btn btn-info">Submit</button>
        <button class="btn btn-danger" data-dismiss="modal">Close</button>
    </div>
</div>
</div>
</form>
</div>


<script type="text/javascript">
  $(document).ready(function(){

    var show_status = '0';
    if(show_status==1){
      show1();
    }

  });
function get_username(u, fid)
{
document.getElementById("username_mod").innerHTML=u;
// document.getElementById("fname").value=u;
document.getElementById("fid").value=fid;
}
// function form_submit(a, b)
// {
//     window.location="https://ofa.iiti.ac.in/facrec_che_2023_july_02/news/change/"+a+"/"+b;
// }
</script>


<script type="text/javascript">
   function show_none()
   {
   // alert("Hello! I am an alert box!!");
   document.getElementById('project_show').style.display ='none';
   }

   function show1()
   {
   // alert("Hello! I am an alert box!!");
   document.getElementById('project_show').style.display = 'block';
   }
</script>

<div id="footer"></div>



<script type="text/javascript">
	
	function blinker() {
	    $('.blink_me').fadeOut(500);
	    $('.blink_me').fadeIn(500);
	}

	setInterval(blinker, 1000);
</script></body></html>