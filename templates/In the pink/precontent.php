    <div id="content" role="main">
    
        <article class="post">
          <h2 class="entry-title">
          		<?php
				$query  = "SELECT * FROM sites WHERE username='$username' AND type='' AND page='$page' ORDER BY recordListingID ASC";
				$result = mysql_query($query);
				
				$row = mysql_fetch_array($result, MYSQL_ASSOC);
				
				 $text=$row['recordText']; 
				$h2=short_str($text, 17, false);				 
			    echo $h2;
				?>
			    </h2>
         
         <div class="entry-content">
<?php
function short_str( $str, $len, $cut = true ) {
    if ( strlen( $str ) <= $len ) return $str;
    
    return ( $cut ? substr( $str, 0, $len ) : substr( $str, 0, strrpos( substr( $str, 0, $len ), ' ' ) ) ) . '...';
}
?>         	