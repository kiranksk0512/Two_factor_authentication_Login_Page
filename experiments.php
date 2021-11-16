<?php 

session_start(); 
if(!isset($_SESSION['sess_user']))
 { 
     $_SESSION['sess_user']=$_GET['session'];
//header('Location:../login/testlogin.php');
 }
 else
 {
     $rolen='user';
 }

 include('../dbconfigure.php');

if(isset($_POST['delete']))
{
 
 $cnt=array();
 $cnt=$_POST['selection'];
 $cont=0;
 
 foreach($cnt as $delid)
  {
     
    $cont++;
     
     $query= mysqli_query($con,"DELETE FROM metrics_1_3_1 WHERE id='$delid'");
         
}
       
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
   <title>Kramah Software India Private Limited</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
       <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME CSS -->
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" />
     <!-- FLEXSLIDER CSS -->
	<link href="assets/css/flexslider.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />    
  	<!-- Google	Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
	<!--script for onfunction-->
	<script language="javascript" type="text/javascript">


	
function do_this(){

        var checkboxes = document.getElementsByName('selection[]');
       
          var checkbox = document.getElementById('toggle');

        if(checkbox.value == 'select'){
            for (var i in checkboxes){
                checkboxes[i].checked = 'FALSE';
            }
            checkbox.value = 'deselect'
        }else{
            for (var i in checkboxes){
                checkboxes[i].checked = '';
            }
            checkbox.value = 'select';
        }
           
       
           
    }

   

</script>
	<style>
	
	

	.tooltip {
    position: relative;
    display: inline-block;
    
}
th{
text-align:center;
}
td{
text-align:center;
}

.tooltip .tooltiptext {
    visibility: hidden;
    width: 120px;
    background-color: black;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;

    /* Position the tooltip */
    position: absolute;
    z-index: 1;
}

.tooltip:hover .tooltiptext {
    visibility: visible;
}
	

    </style>
	
</head>
<body >
   
    
<div class="navbar navbar-inverse navbar-fixed-top " id="menu">
 <div class="container">
 <div class="navbar-header">
 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span> </button>
 <a class="navbar-brand" href="#"><img class="logo-custom" src="assets/img/logo.png" alt="" /></a></div>
 
 <?php
//if($_SESSION['role']=='admin' && $school_name='Mechanical Engineering')
//{
    
   // for($i=0;$i<5;$i++)
//{
if($_SESSION['school_name'] !='admin')
{
//	$query=mysqli_query($con,"SELECT * FROM metrics_1_1_1 where school_name='{$_SESSION['school_name']}'");
//}
?>
	<div class="navbar-collapse collapse move-me">
							<ul class="nav navbar-nav navbar-right">
								<li ><a href="../Dashboard/Final%20Dashboard/homepage.html">HOME</a></li>
								<li><a href="../Dashboard/Final Dashboard/ds.html">DASHBOARD</a></li>
								<li><a href="../Key_Indicator/Criteria/Criteria.html">NAAC REPORT PORTAL</a></li>

								<li><a href="../final_report.php">NAAC SCORING PORTAL</a></li>
								<li><a href="../Dashboard/Final%20Dashboard/profile/index.php">USER PROFILE</a></li>
								<li><a href="../login/prologin.php">LOGOUT</a></li>
							</ul>
						</ul>
					</div>


	<?php
				}else
				{
					?>
					<div class="navbar-collapse collapse move-me">
						<ul class="nav navbar-nav navbar-right">
							<li ><a href="../Dashboard/Final%20Dashboard/homepage.html">HOME</a></li>
								<li><a href="../Dashboard/Final Dashboard/ds.html">DASHBOARD</a></li>
								<li><a href="../Key_Indicator/Criteria/Criteria.html">NAAC REPORT PORTAL</a></li>

								<li><a href="../final_report.php">NAAC SCORING PORTAL</a></li>
								<li><a href="../Dashboard/Final%20Dashboard/profile/index.php">USER PROFILE</a></li>
								<li><a href="http://mitwpu-engineering1.kramah.online//TCPDF/new/criteria1.php">DOWNLOAD SSR</a></li>

								<li><a href="../login/prologin.php">LOGOUT</a></li>
								
								

						</ul>
					</ul>
				</div>
	<?php
			}
			?>
		</div>
	</div>

 <?php
session_start();
				//	$ss=$_SESSION['sess_user'];
					error_reporting(E_ALL);
$rolen='';
include('../dbconfigure.php');
$query1=mysqli_query($con,"SELECT role FROM userlogin where id=$ss");

while($row1 = mysqli_fetch_assoc($query1))
{
 $rolen= $row1['role'];

}	
// print $rolen;
//print $ss;
 
if($rolen!='user')
{
?>
<div class="navbar-collapse collapse move-me">
 <ul class="nav navbar-nav navbar-right">
 <li ><a href="../Dashboard/Final%20Dashboard/homepage.html">HOME</a></li>
 <li><a href="../Dashboard/Final Dashboard/ds.html">DASHBOARD</a></li>
 <li><a href="../Key_Indicator/Criteria/Criteria.html">NAAC REPORT PORTAL</a></li>
 
 <li><a href="../final_report.php">NAAC SCORING PORTAL</a></li>
	<li><a href="../Dashboard/Final%20Dashboard/profile/index.php">USER PROFILE</a></li>
	<li><a href="../login/prologin.php">LOGOUT</a></li>
	
 </ul>
 </ul>
 </div>
 
<?php
}else
{
?>
<div class="navbar-collapse collapse move-me">
 <ul class="nav navbar-nav navbar-right">
 <li ><a href="../naacuser2/userhome2.0.php">HOME</a></li>
 <li><a href="../sample/QLM - 1.3.1.jpg">SAMPLEDOCUMENT</a></li>
	<li><a href="../login/prologin.php">LOGOUT</a></li>
	
 </ul>
 </ul>
 </div>
<?php
}
?>
 </div>
 </div>



      <!--NAVBAR SECTION END--><br/><br/>
        <div  class="tag-line" >
         <div class="container">
           <div class="row  text-center" >
           
               <div class="col-lg-12  col-md-12 col-sm-12">
               

<?php
if($rolen!='user')
{
?>
        <h2 data-scroll-reveal="enter from the bottom after 0.1s" ><span class="bckleft"> <a  href="../Key_Indicator/ki1_3.php" class="btn btn-primary btn-lg" > Back  </a></span>

</h2>

<?php
}
?>

<h2>

<i class="fa fa-circle-o-notch"></i> 1.3.1 Institution integrates crosscutting issues relevant to Professional
Ethics ,Gender, Human Values ,Environment and Sustainability into
the Curriculum<i class="fa fa-circle-o-notch"></i> 
		


		      <!-- <h3>WELCOME TO DASHBOARDA END</h3>-->
			     <!-- REPLACE YOUR SEARCH.PHP PAGE LINK>-->
                     <span class="sendright">  <form class="search" action="search_1_3_1.php" method="GET">
							<input type="text" name="query" placeholder="Search..."   required>
							<button  class ="btn btn-danger btn-lg">GO</button>
								</form>
                      </span>
		
		
		</h2> <!-- <h3>WELCOME TO DASHBOARDA END</h3>-->
                   </div>
               </div>
             </div>
        
    </div>
    <!--END OF THE ROW--> 
 
   

 <?php
 error_reporting(E_ALL);

include('../dbconfigure.php');
$current_year =date('Y');
for($i=0;$i<5;$i++)
{
			
			$year=$current_year;
			$form_no='1.3.1';
		
			
			$sql=mysqli_query($con,"SELECT count(*) as data FROM metrics_1_3_1 WHERE year='$year'AND (file IS NOT NULL AND file>'') ");
		  $result =mysqli_fetch_array($sql);
           $key = $result['data'];
			
			if($key ==0)
			{
				 $data_avl="No";
		         $data_val=0;
				
				
			}
            else
            {
				 $data_avl="Yes";
				 $data_val=1;
			}
 				
				$sql_proof=mysqli_query($con,"SELECT count(*) as proof FROM metrics_1_3_1 WHERE year='$year'AND (file IS NOT NULL AND file>'') ");
		        $result_proof =mysqli_fetch_array($sql_proof);
                $key_proof = $result_proof['proof'];
				
				if($key_proof ==0)
			{
				
				$Proof_avl="No";
		        $proof_val=0;
				
			}
            else
            {
				$Proof_avl="Yes";
				$proof_val=1;
			}
				
				
				
				$sql2 =	mysqli_query($con,"select * from criteria1_0  where form_no ='$form_no' and Year_present ='$year'"); 
      
           
		          $row = mysqli_fetch_array($sql2);	
			        if($row)
			{

 
		
			$update= mysqli_query($con,"update criteria1_0 set data_avl='$data_avl',data_val='$data_val',Proof_avl='$Proof_avl',proof_val='$proof_val' where form_no ='$form_no' and Year_present ='$year'") ; 
			
   
			}
			else {
			  
				$result =mysqli_query($con,"INSERT INTO criteria1_0(form_no,Year_present,Proof_avl,proof_val,data_val,data_avl) VALUES( '$form_no','$year','$Proof_avl','$proof_val','$data_val','$data_avl')");
			    
			
			}
				
				
			
			
		
				
			
				
				
			
				$current_year--;
		
	
	
}





if (isset($_GET['id'])) 
{
$id = $_GET['id'];
$query = mysqli_query($con,"delete FROM metrics_1_3_1 where id=$id");
}
?>



	<form action="home_1_3_1.php" method="post" class="form"  name="frm">	

<center>
<table cellspacing=0 border=3 width="1200" height="260" >
<th> <input type="checkbox" id="toggle" value="select" onClick="do_this()"  ></br>Select All</th>

    <!--YOUR TABLE HERE.... ONLY FROM <tr><td> with no div tag--> 
<!--<th>Upload document</th>-->
<th>Write description in maximum of 500 words </th>
<th>Any additional information</th>
<th>Upload the list and description of the courses which address the Gender, Environment and Sustainability, Human Values and Professional Ethics into the Curriculum</th>
		
			
				<th>Edit</th>
				<th>Delete</th>
    
				
			  
				
			
				

<?php
///if($_SESSION['school_name'] !='admin')
//{
///$query=mysqli_query($con,"SELECT * FROM metrics_1_3_1 where school_name='{$_SESSION['school_name']}'");
//}
///else{
$query=mysqli_query($con,"SELECT * FROM metrics_1_3_1 ");
///}
 
		while($row = mysqli_fetch_assoc($query))
		{
			$id=$row['id'];
			
			$file = $row['file']; 
			$fileImage = $row['fileImage'];
			$fileImage1=$row['fileImage1'];
		   // $year=$row['year'];
		  ///  $school_name=$row['school_name'];
		    
			echo '<tr>' . '<td>'.'<center>';
			echo "<input type=\"checkbox\" name=\"selection[]\" value =".$id.">". '<br/>' . '<td>'.'<center>';
			
			 echo $file.'<br/>' . '<td>'.'<center>';
			 echo "<a href=\"$fileImage\">View Document</a>".'<br/>' . '<td>'.'<center>';
			  echo "<a href=\"$fileImage1\">View Document</a>".'<br/>' . '<td>'.'<center>';
           //echo "<a href=\"$fileImage\">View Document</a>".'<br/>' . '<td>'.'<center>';
           //echo "<a href=$fileImage1\">View Document</a>".'<br/>' . '<td>'.'<center>';
	
//	echo $year . '<br/>' . '<td>'.'<center>';
///////	echo $school_name . '<br/>' . '<td>'.'<center>';
	     
				echo"<a href=\"edit.php?id=$row[id]\"><center><img src=\"edit.png\" height=\"30\"></center></a>	
     <td><a href=\"delete_1_3_1.php?id=$row[id]\"><img src=\"delete.png\" height=\"25\" onClick=\"return confirm('Are you sure you want to delete?')\"></a>";				

			
		
		}
?>
</tr>

				


</table>  </center>
<!--
<input style="margin-left:30px;"  input type="submit"   name="delete" value="DeleteAll"   class ="btn btn-primary btn-lg"><br/><br/><br/>

-->
</form>

<!--REPLACE YOUR INSERT.PHP HERE--


<button style="margin-left:30px;"  type="submit" onclick = "location.href = 'insert_1_3_1.php'" class ="btn btn-primary btn-lg" >Create Record </button><br/>

<!--replace your  download link here--> 
<!--
        <form action="download_1_3_1.php" method="post" class="form">
	  
	 <br/><input style="margin-left:30px;" input  type="submit" name="exp" value="Download"  class ="btn btn-primary btn-lg"> 
  <div class="tooltip">
<img src="ii.png" width="13" height="13" alt="symbol"> 
 <span class="tooltiptext">Download The Details.</span>
</div>
</form>

         <!--replace your  homeupload here--> 
         <!--
	<form action="homeupload_1_3_1.php" method="post" enctype="multipart/form-data" id="importFrm" class="form"> 

 
	<input style="margin-left:30px;"  type="file" name="file"  >
    			
           	  
		     
<input style="margin-left:30px;" type="submit"   name ="importSubmit" value="Upload"   class ="btn btn-primary btn-lg">	<a class="hideDisplay">
 <div class="tooltip">
<img src="ii.png" width="13" height="13" alt="symbol">
<span class="tooltiptext">Upload The Documents.</span>
</div>
<br/><br/>

</form>
        --->
		<br/><br/>
      
		
                
      
	
       <!--HOME SECTION END--> 
	       
   
    <div id="footer">
      copy&copyright | Kramah Software India Private Limited | All Rights Reserved
        <!--  &copy 2012 kramahsoftware.com | All Rights Reserved |  <a href="http://Kramahsoftwares.com" style="color: #fff" target="_blank">Design by : padmanabha s</a>-->
    </div>
     <!-- FOOTER SECTION END-->
   
      <!--  Jquery Core Script -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="assets/js/bootstrap.js"></script>
    <!--  Flexslider Scripts --> 
         <script src="assets/js/jquery.flexslider.js"></script>
     <!--  Scrolling Reveal Script -->
    <script src="assets/js/scrollReveal.js"></script>
    <!--  Scroll Scripts --> 
    <script src="assets/js/jquery.easing.min.js"></script>
    <!--  Custom Scripts --> 
         <script src="assets/js/custom.js"></script>
</body>
</html>
