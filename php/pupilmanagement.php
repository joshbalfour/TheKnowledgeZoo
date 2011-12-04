<?php 
// algorithm for adding a new pupil and gui for adding a new pupil and listing current pupil's credentials
include("auth.php");
$pupilname=$_POST['pupilname'];
$hwkid=$_POST['id'];

if (!($pupilname==''))
{
	if ($hwkid=='')
	{
	$newpupil=true;
	}
}
function randomstring()
{
	include("db.php");
    $query2  = "SELECT * FROM strings WHERE used is NULL";
	$result2 = mysql_query($query2,$conn);
	while($row2 = mysql_fetch_array($result2, MYSQL_ASSOC))
	{$randomstring=$row2['string'];};
	$query3 = "UPDATE strings SET used='yes' WHERE string='$randomstring'";
	if (!mysql_query($query3, $conn))
	{
	die('Error: ' . mysql_error());
	}
    return $randomstring;
}
if ($newpupil)
{
	  
	  $pupilusername=randomstring();
	  $pupilpassword=randomstring();
	  $sql="INSERT INTO quiz_users (username,masterusername,password,name) VALUES ('$pupilusername','$username','$pupilpassword','$pupilname')";
	  $exec=true;
}
if ($exec)
{
	 
if (!mysql_query($sql, $conn))
	{
	$failed=true;
	}
else
{
	$success=true;
}
}
?>
		<!--[if !IE]>start content<![endif]-->
		<div id="content">
			<div class="inner">
			<?php if ($failed){?>
				<div class="section">
					<ul class="system_messages">
						<li class="red"><span class="ico"></span><strong class="system_title">There was an error adding the pupil !</strong> <a href="" class="close">CLOSE</a></li>
					</ul>
				</div>
			<?php }?>
			<?php if ($success){?>
				<div class="section">
					<ul class="system_messages">
						<li class="green"><span class="ico"></span><strong class="system_title">Pupil added successfully !</strong> <a href="" class="close">CLOSE</a></li>
					</ul>
				</div>
			<?php }?>
				<!--[if !IE]>start section<![endif]-->
				<div class="section">
					
					<!--[if !IE]>start title wrapper<![endif]-->
					<div class="title_wrapper">
						<span class="title_wrapper_top"></span>
						<div class="title_wrapper_inner">
							<span class="title_wrapper_middle"></span>
							<div class="title_wrapper_content">
								<h2>Pupils</h2>
							</div>
						</div>
						<span class="title_wrapper_bottom"></span>
					</div>
					<!--[if !IE]>end title wrapper<![endif]-->
					
					<!--[if !IE]>start section content<![endif]-->
					<div class="section_content">
						<span class="section_content_top"></span>
						
						<div class="section_content_inner">
							<!--[if !IE]>start table_wrapper<![endif]-->
							<div class="table_wrapper">
								<div class="table_wrapper_inner">
								<?php include ("pupils.php")?>
								</div>
							</div>
							<!--[if !IE]>end table_wrapper<![endif]-->
							<?php include ("newpupil.php")?>
							
						</div>
						
						<span class="section_content_bottom"></span>
					</div>
					<!--[if !IE]>end section content<![endif]-->
				</div>
				<!--[if !IE]>end section<![endif]-->
				
				
				
				
			</div>
		</div>
		<!--[if !IE]>end content<![endif]-->