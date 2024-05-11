<?php
 session_start(); 
 include 'dbconnect.php';
 
 $con= dbcon();
 $id = $_SESSION['user_id'];
 $sql=mysqli_query($con,"SELECT * FROM users WHERE id = $id ");
 $sql1 =mysqli_query($con,"SELECT * FROM summpublication WHERE id = $id");
 $bestpub =mysqli_query($con,"SELECT * FROM bestpublications WHERE id = $id");
 $pat =mysqli_query($con,"SELECT * FROM patents WHERE id = $id");
 $book =mysqli_query($con,"SELECT * FROM books WHERE id = $id");
 $bookchap =mysqli_query($con,"SELECT * FROM bookchapter WHERE id = $id");
 $user = mysqli_fetch_array($sql);
 $pub = mysqli_fetch_array($sql1);
 // Initialize the session 
 // Store the submitted data sent 
 // via POST method, stored  
   
            
 ?> 

<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Publication Details</title>
	<link rel="stylesheet" type="text/css" href="./Publication Details_files/favicon.ico">
	<link rel="icon" href="IIT-Patna-logo.ico" type="image/x-icon">
	<link rel="stylesheet" type="text/css" href="./Publication Details_files/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="./Publication Details_files/bootstrap-datepicker.css">
	<script type="text/javascript" src="./Publication Details_files/jquery.js.download"></script>
	<script type="text/javascript" src="./Publication Details_files/bootstrap.js.download"></script>
	<script type="text/javascript" src="./Publication Details_files/bootstrap-datepicker.js.download"></script>

	<link href="./Publication Details_files/css" rel="stylesheet"> 
	<link href="./Publication Details_files/css(1)" rel="stylesheet"> 
	<link href="./Publication Details_files/css(2)" rel="stylesheet"> 
	<link href="./Publication Details_files/css(3)" rel="stylesheet"> 
	<link href="./Publication Details_files/css(4)" rel="stylesheet"> 
	<link rel="preconnect" href="https://fonts.gstatic.com/">
	<link href="./Publication Details_files/css2" rel="stylesheet">


	
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
			<h3 style="color: rgb(225, 4, 37); margin-bottom: 20px; font-weight: bold; text-align: center; font-family: &quot;Noto Serif&quot;, serif; opacity: 0;" class="blink_me">Application for Faculty Position</h3>

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

span{
  font-size: 1.2em;
  font-family: 'Oswald', sans-serif!important;
  text-align: left!important;
  padding: 0px 10px 0px 0px!important;
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
.btn-primary {
  padding: 9px;
}
</style>
<script type="text/javascript">
             
            $(function () {
                $('#dob').datepicker({
                    format: 'dd/mm/yyyy',
                    autoclose: true
                });
            });
            function logout() {
    // Clear session variables
    sessionStorage.clear();

    // Redirect to Home_Page.php
    document.location = 'logout.php';
}
function disableBack() { window.history.forward(); }
        setTimeout("disableBack()", 0);
        window.onunload = function () { null };
</script>

<script type="text/javascript">
var tr="";
var counter_jour=1;
// var counter_confer=1;
var counter_book=1;
var counter_book_chapter=1;
var counter_patent=1;
  $(document).ready(function(){

    $("#add_more_jour").click(function(){
        create_tr();
        create_serial('jour');
        create_input('author[]', 'Author', 'author'+counter_jour,'jour', counter_jour, 'jour');
        create_input('title[]', 'Title', 'title'+counter_jour,'jour', counter_jour, 'jour');
        create_input('journal[]', 'Journal', 'journal'+counter_jour,'jour', counter_jour, 'jour');
        create_input('year[]', 'Year, Vol., Page', 'year'+counter_jour,'jour', counter_jour, 'jour');
        create_input('impact[]', 'Impact Factor','impact'+counter_jour, 'jour', counter_jour, 'jour');
        create_input('doi[]', 'DOI','doi'+counter_jour, 'jour', counter_jour, 'jour');
        create_input('status[]', 'Status', 'status'+counter_jour,'jour', counter_jour,'jour',true, true);
        counter_jour++;
        return false;
    });

    // $("#add_more_confer").click(function(){
    //     create_tr();
    //     create_serial('confer');
    //     create_input('cname[]', 'Conference','cname'+counter_confer, 'confer',counter_confer, 'confer');
    //     create_input('ctitle[]', 'Title', 'ctitle'+counter_confer,'confer',counter_confer, 'confer');
    //     create_input('cyear[]', 'Year', 'cyear'+counter_confer,'confer',counter_confer, 'confer',true);
    //     counter_confer++;
    //     return false;
    // });

    $("#add_more_book").click(function(){
        create_tr();
        create_serial('book');
        create_input('bauthor[]', 'Book','bauthor'+counter_book, 'book',counter_book, 'book');
        create_input('btitle[]', 'Title of the Book', 'btitle'+counter_book,'book',counter_book, 'book');
        create_input('byear[]', 'Year', 'byear'+counter_book,'book',counter_book, 'book');
        create_input('bisbn[]', 'ISBN', 'bisbn'+counter_book,'book',counter_book, 'book',true);
        // create_input('bstatus[]', 'Status', 'bstatus'+counter_book,'book', counter_book,'book',true, true);
        // create_input('dol[]', 'Date of Leaving', 'dol'+counter_exp,'exp',counter_exp, 'exp');
        // create_input('duration2[]', 'Duration','duration2'+counter_exp, 'exp',counter_exp,'exp', true);
        // //create_input('perce[]', 'Percentage', 'perce'+counter_exp,'exp', true);
        counter_book++;
        return false;
    });


    $("#add_more_book_chapter").click(function(){
        create_tr();
        create_serial('book_chapter');
        create_input('bc_author[]', 'Book Chapter','bc_author'+counter_book_chapter, 'book_chapter',counter_book_chapter, 'book_chapter');
        create_input('bc_title[]', 'Title', 'bc_title'+counter_book_chapter,'book_chapter',counter_book_chapter, 'book_chapter');
        create_input('bc_year[]', 'Year', 'bc_year'+counter_book_chapter,'book_chapter',counter_book_chapter, 'book_chapter');
        create_input('bc_isbn[]', 'ISBN', 'bc_isbn'+counter_book_chapter,'book_chapter',counter_book_chapter, 'book_chapter',true);
        counter_book_chapter++;
        return false;
    });


    $("#add_more_patent").click(function(){
        create_tr();
         create_serial('patent');
        create_input('pauthor[]', 'Inventor(s)','pauthor'+counter_patent, 'patent',counter_patent, 'patent');
        // create_input('p_year[]', 'Year of the patent','p_year'+counter_patent, 'patent',counter_patent, 'patent');
        create_input('ptitle[]', 'Title of Patent', 'ptitle'+counter_patent,'patent',counter_patent, 'patent');
        create_input('p_country[]', 'Country of patent','p_country'+counter_patent, 'patent',counter_patent, 'patent');
        create_input('p_number[]', 'Patent Number','p_number'+counter_patent, 'patent',counter_patent, 'patent');
        create_input('pyear_filed[]', 'DD/MM/YYYY','pyear_filed'+counter_patent, 'patent',counter_patent, 'patent');
        create_input('pyear_published[]', 'DD/MM/YYYY','pyear_published'+counter_patent, 'patent',counter_patent, 'patent');
        create_input('pyear_issued[]', 'DD/MM/YYYY','pyear_issued'+counter_patent, 'patent',counter_patent, 'patent',true);
        // create_input('pyear[]', 'Year', 'pyear'+counter_patent,'patent',counter_patent, 'patent',true);
        // create_input('pstatus[]', 'Status', 'pstatus'+counter_patent,'patent', patent,'patent',true, true);
        // create_input('dol[]', 'Date of Leaving', 'dol'+counter_exp,'exp',counter_exp, 'exp');
        // create_input('duration2[]', 'Duration','duration2'+counter_exp, 'exp',counter_exp,'exp', true);
        // //create_input('perce[]', 'Percentage', 'perce'+counter_exp,'exp', true);
        counter_patent++;
        return false;
    });
  });
  function create_select()
  {
    
  }
  function create_tr()
  {
    tr=document.createElement("tr");
  }
  function create_serial(tbody_id)
  {
    //console.log(tbody_id);
    var td=document.createElement("td");
    // var x=0;
     var x = document.getElementById(tbody_id).rows.length;
    // if(document.getElementById(tbody_id).rows)
    // {
    // }
    td.innerHTML=x;
     tr.appendChild(td);
  }
  function create_input(t_name, place_value, id, tbody_id, counter, remove_name, btn=false, select=false)
  {
    //console.log(counter);
    if(select==false)
    {

      var input=document.createElement("input");
      input.setAttribute("type", "text");
      input.setAttribute("name", t_name);
      input.setAttribute("id", id);
      input.setAttribute("placeholder", place_value);
      input.setAttribute("class", "form-control input-md");
      input.setAttribute("required", "");
      var td=document.createElement("td");
      td.appendChild(input);
    }
    if(select==true)
    {

      var sel=document.createElement("select");
      sel.setAttribute("name", t_name);
      sel.setAttribute("id", id);
      sel.setAttribute("class", "form-control input-md");
      sel.innerHTML+="<option>Select</option>";
      sel.innerHTML+="<option value='published'>Published</option>";
      sel.innerHTML+="<option value='accepted'>Accepted</option>";
      // sel.innerHTML+="<option value='in_preparation'>In-Preparation</option>";
      var td=document.createElement("td");
      td.appendChild(sel);
    }

    if(btn==true)
    {
      // alert();
      var but=document.createElement("button");
      but.setAttribute("class", "close");
      but.setAttribute("onclick", "remove_row('"+remove_name+"','"+counter+"', '"+tbody_id+"')");
      but.innerHTML="x";
      td.appendChild(but);
    }
    tr.setAttribute("id", "row"+counter);
    tr.appendChild(td);
    document.getElementById(tbody_id).appendChild(tr);
    
  }
  function remove_row(remove_name, n, tbody_id)
  {
    var tab=document.getElementById(remove_name);
    var tr=document.getElementById("row"+n);
    tab.removeChild(tr);
    var x = document.getElementById(tbody_id).rows.length;
    for(var i=0; i<=x; i++)
    {
      $("#"+tbody_id).find("tr:eq("+i+") td:first").text(i);
      
    }
    //var tbody=document.getElementById(tbody_id);
    //console.log(tbody[1].childNodes);
    // var row=tbody[0].getElementByTagName("tr");
    // var td=row[0].getElementByTagName("td");
    // td.innerHTML=i;
    // for(var i=1; i<=x; i++)
    // {
    //     var tbody=document.getElementById(tbody_id);
    //     var row=tbody[0].getElementByTagName("tr");
    //     var td=row[0].getElementByTagName("td");
    //     td.innerHTML=i;
    // }
  }
</script>
        
<!-- all bootstrap buttons classes -->
<!-- 
  class="btn btn-sm, btn-lg, "
  color - btn-success, btn-primary, btn-default, btn-danger, btn-info, btn-warning
-->



<a href="https://ofa.iiti.ac.in/facrec_che_2023_july_02/layout"></a>

<div class="container">
  
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-8 well">
            <form class="form-horizontal" action="savepage4.php" method="post" enctype="multipart/form-data">
              <input type="hidden" name="ci_csrf_token" value="">
            <fieldset>
             
                 <legend>
                  <div class="row">
                    <div class="col-md-10">
                    <h4>Welcome : <font color="#025198"><strong> <?php echo htmlspecialchars($user['FirstName']); ?>&nbsp;<?php echo htmlspecialchars($user['LastName']); ?></strong></font></h4>
                    </div>
                    <div class="col-md-2">
                    <a onclick="logout()"
                    class="btn btn-sm btn-success  pull-right">Logout</a>
                    </div>
                  </div>
                
                
        </legend>

             

    
            <!-- Form Name -->
            
              
            <!-- Text input-->
           
            <h4 style="text-align:center; font-weight: bold; color: #6739bb;">5. Summary of Publications *</h4>
            <div class="row">
              <div class="col-md-12">
              <div class="panel panel-success">
              <div class="panel-body">

                <span class="col-md-5 control-label" for="summary_journal_inter">Number of International Journal Papers</span>  
                <div class="col-md-1">
                <input id="summary_journal_inter" value="<?php if(isset($pub["noOfIntJnlPps"])) echo htmlspecialchars($pub["noOfIntJnlPps"]); ?>" name="summary_journal_inter" type="text" placeholder="" class="form-control input-md" required="" maxlength="3">
                </div>

                <span class="col-md-5 control-label" for="summary_journal">Number of National Journal Papers</span>  
                <div class="col-md-1">
                <input id="summary_journal" value="<?php if(isset($pub["noOfNatJnlPps"])) echo htmlspecialchars($pub['noOfNatJnlPps']); ?>" name="summary_journal" type="text" placeholder="" class="form-control input-md" required="" maxlength="3">
                </div>

                <span class="col-md-5 control-label" for="summary_conf_inter">Number of International Conference Papers</span>  
                <div class="col-md-1">
                <input id="summary_conf_inter" value="<?php if(isset($pub["noOfIntCnfPps"])) echo htmlspecialchars($pub['noOfIntCnfPps']); ?>" name="summary_conf_inter" type="text" placeholder="" class="form-control input-md" required="" maxlength="3">
                </div>

                <span class="col-md-5 control-label" for="summary_conf_national">Number of National Conference Papers</span>  
                <div class="col-md-1">
                <input id="summary_conf_national" value="<?php if(isset($pub["noOfNatCnfPps"])) echo htmlspecialchars($pub['noOfNatCnfPps']); ?>" name="summary_conf_national" type="text" placeholder="" class="form-control input-md" required="" maxlength="3">
                </div>

                <span class="col-md-5 control-label" for="patent_publish">Number of Patent(s) [Filed, Published, Granted] </span>  
                <div class="col-md-1">
                <input id="patent_publish" value="<?php if(isset($pub["noOfPatents"])) echo htmlspecialchars($pub['noOfPatents']); ?>" name="patent_publish" type="text" placeholder="" class="form-control input-md" required="" maxlength="3">
                </div>

                <span class="col-md-5 control-label" for="summary_book">Number of Book(s) </span>  
                <div class="col-md-1">
                <input id="summary_book" value="<?php if(isset($pub["noOfBooks"])) echo htmlspecialchars($pub['noOfBooks']); ?>" name="summary_book" type="text" placeholder="" class="form-control input-md" required="" maxlength="3">
                </div>

                <span class="col-md-5 control-label" for="summary_book_chapter">Number of Book Chapter(s)</span>  
                <div class="col-md-1">
                <input id="summary_book_chapter" value="<?php if(isset($pub["noOfBookChpt"])) echo htmlspecialchars($pub['noOfBookChpt']); ?>" name="summary_book_chapter" type="text" placeholder="" class="form-control input-md" required="" maxlength="3">
                </div>

              

              

               

                

              </div>
              </div>
              </div>
              </div>   

           
           <h4 style="text-align:center; font-weight: bold; color: #6739bb;">6. List of 10 Best Publications (Journal/Conference)</h4>

           <div class="container-fluid table-responsive">
              <div class="row">
                

               <div class="panel panel-success">
                <div class="panel-heading">List of 10 Best Publications (Journal/Conference) &nbsp;&nbsp;&nbsp;
                  <button class="btn btn-sm btn-danger" id="add_more_jour">Add Details</button>
                </div>
                <table class="table table-bordered">
                    <tbody id="jour">
                    
                    <tr height="30px">
                      <th class="col-md-1"> S. No.</th>
                      <th class="col-md-2"> Author(s) </th>
                      <th class="col-md-1"> Title</th>
                      <th class="col-md-2"> Name of Journal/Conference </th>
                      <th class="col-md-1"> Year, Vol., Page</th>
                      <th class="col-md-1"> Impact Factor </th>
                      <th class="col-md-1"> DOI</th>
                      <th class="col-md-2"> Status</th>
                    </tr>


                                        
                    <?php
            $a=1;
            while ($row = mysqli_fetch_assoc($bestpub)) {
              
              ?>
              <tr height="60px">
                      <td class="col-md-1"> 
                      <?php echo htmlspecialchars($a); ?>            </td>
                      <td class="col-md-2"> 
                          <input  name="author[]" type="text" value="<?php if(isset($row["author"])) echo htmlspecialchars($row["author"]); ?>" placeholder="Author" class="form-control input-md"> 
                        </td>
                      <td class="col-md-2"> 
                        <input  name="title[]" type="text" value="<?php if(isset($row["title"])) echo htmlspecialchars($row["title"]); ?>" placeholder="Title" class="form-control input-md"> 
                      </td>
                      <td class="col-md-2"> 
                        <input  name="journal[]" type="text" value="<?php if(isset($row["name"])) echo htmlspecialchars($row["name"]); ?>" placeholder="Journal Name" class="form-control input-md"> 
                      </td>
                      <td class="col-md-2"> 
                        <input id="year1" name="year[]" type="text" value="<?php if(isset($row["year"])) echo htmlspecialchars($row["year"]); ?>" placeholder="Year of publication" class="form-control input-md"> 
                      </td>
                      <td class="col-md-2"> 
                        <input id="impact1" name="impact[]" type="text" value="<?php if(isset($row["impactFactor"])) echo htmlspecialchars($row["impactFactor"]); ?>" placeholder="Impact Factor" class="form-control input-md"> 
                      </td>
                      <td class="col-md-2"> 
                        <input id="doi1" name="doi[]" type="text" value="<?php if(isset($row["doi"])) echo htmlspecialchars($row["doi"]); ?>" placeholder="DOI" class="form-control input-md"> 
                      </td>

                      
                      <td class="col-md-2"> 
                        
                        <select id="status" name="status[]" class="form-control input-md">
                            <option value="">Select</option>
                            <option value="published" <?php if(isset($row["status"]) and $row["status"] == 'Published'){ echo ' selected="selected"'; } ?>>Published</option>
                            <option value="accepted" <?php if(isset($row["status"]) and $row["status"] == 'Accepted'){ echo ' selected="selected"'; } ?>>Accepted</option>
                            
                        </select>

                      </td>
                    </tr>
                             <?php
                             $a++;
                    }
                             ?>           
                    
                                      </tbody>
                </table>

               </div>
              
            </div>

              
            </div> 
 
                <!-- Conference input-->
                
            <!--  <div class="container-fluid table-responsive">
              <div class="row">

                <div class="panel panel-success">
                 <div class="panel-heading">(B) Conference (List of 10 Best Publications)&nbsp;&nbsp;&nbsp;
                  <button class="btn btn-sm btn-danger" id="add_more_confer">Add Details</button>
                </div>
                 <table class="table table-bordered">
                     <tbody id="confer">
                     
                     <tr height="30px">
                       <th class="col-md-2"> S. No. </th>
                       <th class="col-md-3"> Name of the Conference</th>
                       <th class="col-md-5"> Title of Paper </th>
                       <th class="col-md-2"> Year </th>
                     </tr>


                                        </tbody>
                 </table>
            </div>

              
            </div> 
          </div> -->

           <!-- Patent Text -->

             <div class="container-fluid table-responsive">

              <h4 style="text-align:center; font-weight: bold; color: #6739bb;">7. List of  Patent(s), Book(s), Book Chapter(s)</h4>
             <div class="row">

           <div class="panel panel-success">
            <div class="panel-heading">(A) Patent(s)&nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_more_patent">Add Details</button>  </div>
            <table class="table table-bordered">
                <tbody id="patent">
                
                <tr height="30px">
                  <th class="col-md-1"> S. No.</th>
                  <th class="col-md-1"> Inventor(s) </th>
                  <!-- <th class="col-md-2"> Year of Patent </th> -->
                  <th class="col-md-2"> Title of Patent </th>
                  <th class="col-md-1"> Country of Patent </th>
                  <th class="col-md-1"> Patent Number</th>
                  <th class="col-md-1"> Date of Filing</th>
                  <th class="col-md-1"> Date of Published</th>
                  <th class="col-md-1"> Status Filed/Published/Granted</th>
                  <!-- <th class="col-md-1"> Date of Filed/Published (If not granted, mention "Awaited")</th> -->
                </tr>


                                
                <?php
            $a=1;
            while ($row = mysqli_fetch_assoc($pat)) {
              
              ?>
                    <tr height="60px">
                  <td class="col-md-1"> 
                  <?php echo htmlspecialchars($a); ?>                    </td>
                  <td class="col-md-1"> 
                      <input id="pauthor1" name="pauthor[]" type="text" value="<?php echo htmlspecialchars($row["inventor"]); ?>" placeholder="Author(s)" class="form-control input-md" required=""> 
                    </td>
                 <!--  <td class="col-md-2"> 
                    <input id="p_year1" name="p_year[]" type="text" value=""  placeholder="Year" class="form-control input-md" required=""> 
                  </td> -->
                  <td class="col-md-1"> 
                    <input id="ptitle1" name="ptitle[]" type="text" value="<?php echo htmlspecialchars($row["title"]); ?>" placeholder="Title" class="form-control input-md" required=""> 
                  </td>
                  <td class="col-md-1"> 
                    <input id="p_country1" name="p_country[]" type="text" value="<?php echo htmlspecialchars($row["country"]); ?>" placeholder="Country" class="form-control input-md" required=""> 
                  </td>
                  <td class="col-md-1"> 
                    <input id="p_number1" name="p_number[]" type="text" value="<?php echo htmlspecialchars($row["patentNo"]); ?>" placeholder="Patent Number" class="form-control input-md" required=""> 
                  </td>
                  <td class="col-md-1"> 
                    <input id="pyear_filed1" name="pyear_filed[]" type="text" value="<?php echo htmlspecialchars($row["dof"]); ?>" placeholder="DD/MM/YYYY" class="form-control input-md" required=""> 
                  </td>
                   <td class="col-md-1"> 
                    <input id="pyear_published1" name="pyear_published[]" type="text" value="<?php echo htmlspecialchars($row["dop"]); ?>" placeholder="DD/MM/YYYY" class="form-control input-md" required=""> 
                  </td>
                   <td class="col-md-1"> 
                    <input id="pyear_issued1" name="pyear_issued[]" type="text" value="<?php echo htmlspecialchars($row["status"]); ?>" placeholder="DD/MM/YYYY" class="form-control input-md" required=""> 
                  </td>
             
                </tr>
                        <?php
                        $a++;
                    }
                        ?>        
                
                              </tbody>
            </table>
          </div>
             
           </div>

            
           </div>

            <!-- Book Text -->

             <div class="container-fluid table-responsive">
              <div class="row">

             <div class="panel panel-success">
             <div class="panel-heading">(B) Book(s) &nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_more_book">Add Details</button></div>

             <table class="table table-bordered">
                 <tbody id="book">
                 
                 <tr height="30px">
                   <th class="col-md-1"> S. No.</th>
                   <th class="col-md-2"> Author(s)</th>
                   <th class="col-md-2"> Title of the Book </th>
                   <th class="col-md-2"> Year of Publication </th>
                   <th class="col-md-2"> ISBN</th>
                   <!-- <th class="col-md-2"> Status</th> -->
                 </tr>


                                  
                 
                 <?php
            $a=1;
            while ($row = mysqli_fetch_assoc($book)) {
              ?>
              <tr height="60px">
                <td class="col-md-1"> 
                <?php echo htmlspecialchars($a); ?>         </td>
                   <td class="col-md-4"> 
                       <input id="bauthor1" name="bauthor[]" type="text" value="<?php echo htmlspecialchars($row["author"]); ?>  " placeholder="Author" class="form-control input-md" required=""> 
                     </td>
                   <td class="col-md-3"> 
                     <input id="btitle1" name="btitle[]" type="text" value="<?php echo htmlspecialchars($row["title"]); ?>  " placeholder="Title" class="form-control input-md" required=""> 
                   </td>
                   <td class="col-md-2"> 
                     <input id="byear1" name="byear[]" type="text" value="<?php echo htmlspecialchars($row["yop"]); ?>  " placeholder="Year of" class="form-control input-md" required=""> 
                   </td>
                   <td class="col-md-2"> 
                     <input id="bisbn1" name="bisbn[]" type="text" value="<?php echo htmlspecialchars($row["isbn"]); ?>  " placeholder="" class="form-control input-md" required=""> 
                   </td>
               
                 </tr>
                       <?php
                       $a++;
            }
                       ?>           
                
                                </tbody>
             </table>
            </div>
              
            
            </div>

             
            </div>


            <br>
            <br>

            <!-- Book chapter Text -->

             <div class="container-fluid table-responsive">
              <div class="row">

             <div class="panel panel-success">
             <div class="panel-heading">(C) Book Chapter(s)&nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger" id="add_more_book_chapter">Add Details</button></div>

             <table class="table table-bordered">
                 <tbody id="book_chapter">
                 
                 <tr height="30px">
                   <th class="col-md-1"> S. No.</th>
                   <th class="col-md-2"> Author(s)</th>
                   <th class="col-md-2"> Title of the Book Chapter(s) </th>
                   <th class="col-md-2"> Year of Publication </th>
                   <th class="col-md-2"> ISBN</th>
                   <!-- <th class="col-md-2"> Status</th> -->
                 </tr>


                                  
                 <?php
            $a=1;
            while ($row = mysqli_fetch_assoc($bookchap)) {
              
              ?>
              <tr height="60px">
                   <td class="col-md-1"> 
                   <?php echo htmlspecialchars($a); ?>   </td>
                   <td class="col-md-4"> 
                       <input id="bc_author1" name="bc_author[]" type="text" value="<?php echo htmlspecialchars($row["author"]); ?>  " placeholder="Author" class="form-control input-md" required=""> 
                     </td>
                   <td class="col-md-3"> 
                     <input id="bc_title1" name="bc_title[]" type="text" value="<?php echo htmlspecialchars($row["title"]); ?>  " placeholder="Title" class="form-control input-md" required=""> 
                   </td>
                   <td class="col-md-2"> 
                     <input id="bc_year1" name="bc_year[]" type="text" value="<?php echo htmlspecialchars($row["yop"]); ?>  " placeholder="Year of" class="form-control input-md" required=""> 
                   </td>
                   <td class="col-md-2"> 
                     <input id="bc_isbn1" name="bc_isbn[]" type="text" value="<?php echo htmlspecialchars($row["isbn"]); ?>  " placeholder="" class="form-control input-md" required=""> 
                   </td>
               
                 </tr>
                     <?php
                     $a++;
                    }
                     ?>             
                    </tbody>
             </table>
            </div>
              
            
            </div>

             
            </div>


            <br>
            <br>
            

 

            <h4 style="text-align:center; font-weight: bold; color: #6739bb;">8. Google Scholar Link *</h4>
            <div class="row">
            <div class="col-md-12">
            <div class="panel panel-success">
            <div class="panel-heading">URL</div>
            <div class="panel-body">
              <span class="col-md-2 control-label" for="google_link">Google Scholar Link </span>  
              <div class="col-md-10">
              <input id="google_link" value="<?php if(isset($pub["googleLink"])) echo htmlspecialchars($pub['googleLink']); ?>" name="google_link" type="text" placeholder="Google Scholar Link" class="form-control input-md" required="">
              </div>

              

            </div>
            </div>
            </div>
            </div>


            <!-- Button -->
<div class="form-group">

  <div class="col-md-1">
    <a href="page3.php" class="btn btn-primary pull-left">PREV</a>
  </div>

<div class="col-md-11">
  <button id="submit" type="submit" name="submit" value="Submit" class="btn btn-success pull-right">SAVE &amp; NEXT</button>
  
</div>

             
            </div>
           

            </fieldset>
            </form>
            
            

        </div>
    </div>
</div>

<div id="footer"></div>



<script type="text/javascript">

	
	function blinker() {
	    $('.blink_me').fadeOut(500);
	    $('.blink_me').fadeIn(500);
	}

	setInterval(blinker, 1000);
</script></body></html>