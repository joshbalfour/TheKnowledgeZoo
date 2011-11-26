<?php ob_start("ob_gzhandler"); //gzip compression?>
<?php 
/*
 * Joshua Balfour - Candidate Number 3176
 * notice to examiner:
 * Unless stated otherwise in a header such as this, the code on the page was written by myself.
 */

?>
<?php // include("php/obfuscation.php")?>
<?php $index=true;?>
<?php //include("php/bc.php");
if (!($ns)){ if ($_SERVER['SERVER_NAME']=='theknowledgezoo.com' or $_SERVER['SERVER_NAME']=='www.theknowledgezoo.com'){header('Location: /learn'); $lawl=true;}; if ($_SERVER['SERVER_NAME']=='admin.theknowledgezoo.com'){header('Location: /admin'); $lawl=true;}  }?> 

<?php if (!($lawl)){
header('Location: http://www.theknowledgezoo.com');



 }?>

<?php /*<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
        <title>Home</title>        
        <link rel="stylesheet" type="text/css" href="css/index.css" />        
    </head>
    <body>
    	<section id="page"> 
            <section id="articles">                
                <article id="article1">                    
                    <div class="line"></div>                   
                    <div class="articleBody clear">
                    	<h3>are you a ...</h3>
                    		<div style="padding-left: 150px;">
                   				<div class="button"><a href="admin" style=" padding-top:13px; padding-left: 3px;">Teacher</a></div>
                    			<div style="padding-left: 100px; padding-top: 20px;">
                    				<div class="button"><a href="learn" style=" padding-top:13px; padding-left: 48px;">Pupil</a></div>
                    			</div>
                    		</div>
                   		 <h3>or are you ...</h3>
                    	<div style="padding-left: 300px;">
                    		<div class="button"><a href="signup" style="; padding-top:13px; padding-left: 40px;">New?</a></div>
                    	</div>
                    </div>
                  <div class="line"></div>
                </article>				
            </section>
        <footer>            
           <p>Copyright 2011 - Joshua Balfour</p>                      
        </footer>            
	</section>  
    </body>
</html>
<?php 
/*
<?php require("php/db.php");?>
$query5  = "SELECT DISTINCT username FROM sites";
				$result5 = mysql_query($query5);
				
				while($row5 = mysql_fetch_array($result5, $conn))
				{
				if (!($row5['username']==''))
				{
				?>
				<li><a href="sites/<?php echo $row5['username']?>"><?php echo $row5['username']?></a></li>
				
				<?php 
				}
				}?>
*/
?>