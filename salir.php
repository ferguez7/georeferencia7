<?php
session_start();
if(session_destroy()) {  echo '<META HTTP-EQUIV=Refresh CONTENT="1; URL=index.php">' ;   }
?>
